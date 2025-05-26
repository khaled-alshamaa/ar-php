<?php

namespace ArPHP\MZK;

class Speller {

    private $conn;
    private $stemmer;
	private $pspell_link;
    private $spelling_cache = [];
    private $corpus_cache = [];

    private $english = [];
    // -- start stats section
    // important for probability calc
    private $char_count = [];

    private $insertion_confusion = [];
    private $replace_confusion = [];
    private $transpose_confusion = [];
    private $deletion_confusion = [];
    private $stop = [];
    
    // ---- end stats section
    
    private $debug = true;
    private $rootDirectory = '';



    public function __construct(Array $options = [] ) {

        $this->rootDirectory = dirname(__FILE__);
		
		$tmpfile_path = sys_get_temp_dir().DIRECTORY_SEPARATOR.'sarahspell.db';
		if (!file_exists($tmpfile_path)) {
			$enabled_exts = get_loaded_extensions();
			if(!in_array("zlib", $enabled_exts)) {
				echo "zlib extension is not enabled, it is needed to extract SarahSpell's DB." . PHP_EOL;
				echo "Possible solutions:" . PHP_EOL;
				echo "(1) Enable zlib in your PHP configuration" . PHP_EOL;
				echo "(2) Manually extract the DB from `vendor\khaled.alshamaa\ar-php\src\data\SarahSpell\sarahspell.db.gz` to your `temp` directory and retry" . PHP_EOL;
				exit();
			}			
			copy('compress.bzip2://' . $this->rootDirectory.'/data/SarahSpell/sarahspell.db.gz', $tmpfile_path);
		}

        try {
            $this->conn = new \PDO('sqlite:'.$tmpfile_path,null,null,[\PDO::ATTR_PERSISTENT => true]);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $data = json_decode(file_get_contents($this->rootDirectory . "/data/SarahSpell/confusion.json"), true);
        $this->char_count = $data['char_count'];
        // -- start stats section
        $this->english = $data['english'];
        // important for probability calc
        $this->insertion_confusion = $data['insertion_confusion'];
        $this->replace_confusion = $data['replace_confusion'];
        $this->transpose_confusion = $data['transpose_confusion'];
        $this->deletion_confusion = $data['deletion_confusion'];
        $this->stop = $data['stop'];
    }


private function is_english($word) {
    return !(strlen($word) != mb_strlen($word, 'utf-8'));
}


	
    public function get_version() {
        return "v1.0-rc1";
    }

    function spell_check($r, $with_suggests = false, $second_language = 'en',$use_stemmer = false) {
        
        $this->corpus_cache = [];
        $this->spelling_cache = [];

        $suggestion_array = [];
        $stemmed_words = [];
        $stemmed_sugg = [];
        $displayed_cache = [];
        $no_sugg_cache = [];
		
        if(function_exists("pspell_new")) {
		    $this->pspell_link = pspell_new($second_language);
        }
		

        $r = str_replace("   ", " ", $this->clean_text($r));
        $r = str_replace("  ", " ", $this->clean_text($r));
        $r = str_replace(explode(" ", "_ … « \t » , . “ ” "), " ", $this->clean_text($r));
        $r = str_replace("\r", " ", $r);
        $words = explode(" ", implode(" ", explode("\n", preg_replace('~\x{00a0}~siu', ' ', $r))));
        $prev_word = '';
        $y = [];

        foreach ($words as $wi => $word) {

			 if($this->is_english($this->strip_tashkeel($word)) and $this->pspell_link != null) {
				if(!pspell_check($this->pspell_link, $word)) {
					if ($with_suggests) $suggestions = pspell_suggest($this->pspell_link, $word);

					$suggestion_array[] = [
						'word' => $word,
						'stemming' => [],
						'sugg' => $with_suggests ? $suggestions: [],
						'context' => ''
					];
					//skip the english word
					continue;
				}				
			}


            if (mb_strlen($word) > 50)
                continue;

            if (mb_strlen($word) == 0)
                continue;
					 
			$word = trim($this->clean_word($this->strip_tashkeel($word)));									 
			$word = preg_replace('/(\x{200e}|\x{200f})/u', '', $word);

            if ($this->is_stopword($word)) {
                $prev_word = $word;
                continue;
            }
            if ((int) $word > 0)
                continue;
                
            if (array_key_exists($word, $this->corpus_cache)) {
                $in_corpus = $this->corpus_cache[$word];
            } else {
                $in_corpus = $this->query_corpus($word);
                $this->corpus_cache[$word] = $in_corpus;
            }

            if (!$in_corpus) {
                $stemmed_word = [];
                $sgg = [];

                if($with_suggests) {
                    if (array_key_exists($word, $this->spelling_cache)) {
                        $sgg = $this->spelling_cache[$word];
                    } else {
                        // TODO: might want to postpone this until we are sure the word is not in dict                        
                        @$this->spelling_cache[$word] = $this->suggestions_for_word($word, $prev_word);
                        $sgg = @$this->spelling_cache[$word];
                    }
                }

                $stem_hit = false;
                $prefix_hit = false;

                if (!$stem_hit and ! $prefix_hit and ! isset($displayed_cache[$word]) and count($sgg) > 0) {
                    $context = "";
                    
                    foreach ($sgg as $gx) {
                        $y[] = $gx['prior']['gram'];
                    }

                    $suggestion_array[] = [
                        'word' => $word,
                        'stemming' => [
                            'pr' => @$stemmed_word['pr'],
                            'root' => @$stemmed_word['root'],
                            'su' => @$stemmed_word['su']
                        ],
                        'sugg' => $y,
                        'context' => $context
                    ];
                    @$displayed_cache[$word] ++;
                } else if (!$stem_hit and ! $prefix_hit and isset($displayed_cache[$word])) {
                    @$displayed_cache[$word] ++;
                }

                

                if (count($sgg) == 0 and ! $stem_hit and ! $prefix_hit) {
                    @$displayed_cache[$word] ++;
                    if (!in_array($word, array_keys($no_sugg_cache))) {
                        $context = "";
                        $word_sugg = 'no sugg';
                        $no_sugg_cache[$word] = [
                            'word' => $word,
                            'stemming' => [
                                'pr' => @$stemmed_word['pr'],
                                'root' => @$stemmed_word['root'],
                                'su' => @$stemmed_word['su']
                            ],
                            'context' => $context
                        ];
                    }
                }
            }

            $prev_word = $word;
            $y = [];
        }

        $return_array = [
            "suggestion_array" => $suggestion_array,
            "displayed_cache" => $displayed_cache,
            "no_sugg_cache" => $no_sugg_cache,
            "stemmed_words" => $stemmed_words,
            "stemmed_sugg" => $stemmed_sugg,
        ];


        return $return_array;
    }

    /* begin functions */


// -----------
    private function cmp($a, $b) {
        //The comparison function must return an integer less than, equal to, or greater than zero if the first argument is considered to be respectively less than, equal to, or greater than the second.
        if ($a['c|p'] == $b['c|p']) {
            $r = 0;
        }
        $a['c|p'] > $b['c|p'] ? $r = -1 : $r = 1;
        return $r;
    }

// ------------
    private function clean_word($word) {
        return str_replace($this->english, "", $word);
    }

// ------------
    private  function clean_text($word) {

        $western_arabic = array('0','1','2','3','4','5','6','7','8','9');
        $eastern_arabic = array('٠','١','٢','٣','٤','٥','٦','٧','٨','٩');
        $word = str_replace($eastern_arabic, $western_arabic, $word);


        
        $bad = ["•", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "؟", "\\", "\"", ":", "،", ".", "؛", "(", ")", "*", "-", "/", '&nbsp;', "—", "[","]","˂",">"];
        //
        return str_replace($bad, " ", $word);
    }

// ------------
    private function prepare_query_corpus($word, $sugg = false) {
        return true;
    }

// ------------
private function interpolateQuery($query, $params) {
    $keys = array();

    # build a regular expression for each parameter
    foreach ($params as $key => $value) {
        if (is_string($key)) {
            $keys[] = '/:'.$key.'/';
        } else {
            $keys[] = '/[?]/';
        }
    }

    $query = preg_replace($keys, $params, $query, 1, $count);

    return $query;
}
// ------------
    private function do_query_corpus($sugg_arr) {

        static $q_num;

        $imploded_words = [];
        foreach ($sugg_arr as $s) {
            $imploded_words[] = @$s['sugg'];
        }

        $sql = 'select * from myisam_unigrams_2 where gram in (:imploded_words)';
        $res = $this->fetchAll($sql, ["imploded_words" => $imploded_words]);

        $res2 = [];
        
        if (count($res) > 0 or count($res2) > 0)
            return array_merge($res,$res2);
        else
            return false;
    }

// ------------
    private function fetchAll($sql, $params) {

    $copied = [];

    foreach($params as $param => $value) {
        if(is_array($value)) {
            $copied[$param] = implode(",",array_map(function($e)  {
                return $this->conn->quote($e);
            },$value));
        } else {
            $copied[$param] = $this->conn->quote($value);
        }
    }

    try {
        $sth = $this->conn->prepare($this->interpolateQuery($sql, $copied));
        $sth->execute();
    } catch(\PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    return $sth->fetchAll();

}

// ------------
    private function query_corpus($word, $sugg = false) {
        static $q_num;
        $bloom_prob = true;

        if (!$bloom_prob) {
            return false;
        } else {
            $sql = 'select * from myisam_unigrams_2 where gram =:word';
            $res = $this->fetchAll($sql, ["word" => $word]);

            return count($res) > 0;
        }
    }


// -----

    private function is_stopword($word) {
        return in_array($word, $this->stop);
    }

// -----
    private function suggestions_for_word($word, $prev_word) {

        $found_sugg = [];


        $sugg = $this->generate_suggestions([$word]);
        $arr_possibly_incorpus = [];
        $arr_possibly_incorpus_index = [];

        foreach ($sugg as $sg) {
            if ($this->prepare_query_corpus(@$sg['sugg'], true)) {
                $arr_possibly_incorpus[] = $sg;
                $arr_possibly_incorpus_index[] = @$sg['sugg'];
            }
        }

        $valid_sugg = $this->do_query_corpus($arr_possibly_incorpus);

        if ($valid_sugg !== false) {
            foreach ($valid_sugg as $gram_data) {
                $hit_index = array_search($gram_data['gram'], $arr_possibly_incorpus_index);
                $sg = $arr_possibly_incorpus[$hit_index];
                $index = $sg['pos'];
                $sg['log_prop'] = $this->calc_prop($sg['type'], mb_substr($word, $index, 1), mb_substr($sg['sugg'], $index, 1));

                if ($sg['log_prop'] + $gram_data['prob'] != -INF) {
                    $found_sugg[$gram_data['gram']] = @['prior' => $gram_data, 'error' => $sg, 'c|p' => $sg['log_prop'] + $gram_data['prob']];
                }
            }
        }

        
        if (is_array($found_sugg)) {
            $z = usort($found_sugg, [$this, "cmp"]);
        }

        return $found_sugg;
    }

// ----------
    private function calc_prop($type, $error_letter, $correct_letter) {
        $key = $correct_letter . $error_letter;
        $b = -1;
        if ($type == 'delete')
            $b = @$this->deletion_confusion[$key];
        else if ($type == 'insert')
            $b = @$this->insertion_confusion[$key];
        else if ($type == 'replace')
            $b = @$this->replace_confusion[$key];
        else if ($type == 'transpose')
            $b = @$this->transpose_confusion[$key];
        else
            $b = -1;

        $count = @$this->char_count[$error_letter] + @$this->char_count[$correct_letter];
        return @log10($b / $count);
    }




// ------------------

    private function generate_suggestions($arr) {
        foreach ($arr as $vv) {
            $letters = $this->mb_str_split($vv);
            $splits = $this->split_string($vv);

            $b = array_merge(
                    $this->replace_variate($splits, $letters),
                    $this->transpose_variate($splits),
                    $this->del_variate($splits),
                    $this->ins_variate_1($splits)
                );

            return $b;
        }
    }

// -----

    private function mb_str_split($string) {
        # Split at all position not after the start: ^
        # and not before the end: $
        return preg_split('/(?<!^)(?!$)/u', $string);
    }

    private function split_string($word) {
        $splits = array();
        $b = range(0, mb_strlen($word) - 1);

        foreach ($b as $index) {
            $splits[] = [mb_substr($word, 0, $index), mb_substr($word, $index)];
        }
        return $splits;
    }

    private function replace_variate($splits, $letters) {
        $replaces = [];
        // ----
        
        $alphabet = $this->reverse_and_export($this->replace_confusion);

        foreach ($splits as $lnr) {
            if ($lnr[1]) {
		$alph = [];
                $alph = @$alphabet[mb_substr($lnr[1], 0, 1)];
                foreach (@$alph as $letter) {
                    $element = ['sugg' => $lnr[0] . $letter . mb_substr($lnr[1], 1), "delta" => $letter, 'type' => 'replace', 'pos' => mb_strlen($lnr[0])];
                    $replaces[] = $element;
                }
            }
        }

        return $replaces;
    }

    private function transpose_variate($splits) {
        $transposes = [];

        foreach ($splits as $lnr) {
            if (mb_strlen($lnr[1]) > 1) {
                $element = ['sugg' => $lnr[0] . mb_substr($lnr[1], 1, 1) . mb_substr($lnr[1], 0, 1) . mb_substr($lnr[1], 2), "delta" => mb_substr($lnr[1], 1, 1) . mb_substr($lnr[1], 0, 1), 'type' => 'transpose', 'pos' => mb_strlen($lnr[0])];
                $transposes[] = $element;
            }
        }
        return $transposes;
    }


    /// -------------------

    private function ins_variate_1($splits) {
        $inserts = [];
        foreach ($splits as $lnr) {
            if ($lnr[1]) {
                $element = ['sugg' => $lnr[0] . mb_substr($lnr[1], 1), 'delta' => mb_substr($lnr[1], 0, 1), 'type' => 'insert', 'pos' => mb_strlen($lnr[0])];
                $inserts[] = $element;
            }
        }

        return $inserts;
    }

    /// -------------------

    private function del_variate($splits) {
        $deletes = [];
        // ---------------------        
        $alphabet = $this->reverse_and_export($this->deletion_confusion);

        foreach ($splits as $lnr) {
	    $alph = [];
            $alph = @$alphabet[mb_substr($lnr[1], 0, 1)];

            foreach (@$alph as $letter) {
                $element = ['sugg' => $lnr[0] . $letter . $lnr[1], "delta" => $letter, 'type' => 'delete', 'pos' => mb_strlen($lnr[0])];
                $deletes[] = $element;
            }
        }

        return $deletes;
    }


    private function strip_tashkeel($text) {
        $tashkeel = array(
            "ّ",
            "ْ",
            "ٍ",
            "ِ",
            "ٌ",
            "ُ",
            "ً",
            "َ");

        return str_replace($tashkeel, "", $text);
    }


    private function reverse_and_export($array) {
        foreach($array as $key => $useless) {
            $correct = mb_substr($key, 0,1);
            $wrong = mb_substr($key, 1);
            $reversed[$wrong][] = $correct;
        }
        return $reversed;
    }    

}
