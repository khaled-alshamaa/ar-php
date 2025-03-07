<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Calculate the Similarity between two Arabic Strings</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>

<body>

<div class="Paragraph">
<h2>Calculate the Similarity between two Arabic Strings:</h2>

<p>The similar_text() function provides a robust way to compare two Arabic strings by calculating how closely they match, 
both character-by-character and in their overall structure. Internally, it utilizes the Needleman-Wunsch algorithm, 
a well-known sequence alignment technique, which assigns scores to matches, mismatches, and gaps (insertions or deletions). 
Three key factors influence how characters are scored against each other: keyboard proximity, graphical similarity, and 
phonetic similarity. Keyboard proximity involves checking how close two characters are on a typical Arabic keyboard layout; 
graphical similarity considers how closely characters share certain shapes; and phonetic similarity groups characters that 
produce similar sounds.</p>

<p>By analyzing these three factors, the similar_text() function combines them into a single measure of similarity for each 
pair of characters, and from there produces a total alignment score for the entire pair of strings. As an additional feature, 
the function allows retrieval of this score as a raw value and as a percentage. The percentage expresses the comparison 
result as a fraction of the maximum possible alignment score, giving an intuitive measure of overall closeness between 
the two strings.</p>

<p>Another powerful aspect of this functionality lies in its configurability. The setSimilarityWeight() method enables you 
to assign relative importance to keyboard, graphical, or phonetic similarities. If you wish to emphasize one factor—such 
as phonetic closeness—more strongly than others, you can increase its corresponding weight. Conversely, you can de-emphasize 
or even ignore one of the factors by reducing its weight to zero. This allows fine-grained control over how much each type 
of similarity influences the final measure, making the comparison flexible enough to cater to diverse use cases, from 
spell-checking and autocorrection to natural language processing and search optimization.</p>

<div class="Paragraph">
<h2 dir="ltr" id="example-1">
<a href="#example-1" class="anchor"><img src="./images/link_icon.png" width="16" border="0"></a>Example Output 1:</h2>

<?php
$keyboardWeight = 50;
$graphicWeight  = 50;
$phoneticWeight = 50;
$use_case = null;

if (isset($_GET['keyboardWeight'])) $keyboardWeight = filter_var($_GET['keyboardWeight'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 0, 'max_range' => 100]]);
if (isset($_GET['graphicWeight'])) $graphicWeight = filter_var($_GET['graphicWeight'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 0, 'max_range' => 100]]);
if (isset($_GET['phoneticWeight'])) $phoneticWeight = filter_var($_GET['phoneticWeight'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 0, 'max_range' => 100]]);
if (isset($_GET['use_case'])) $use_case = filter_var($_GET['use_case'], FILTER_SANITIZE_STRING);

?>

<form method="get">
<input type="range" min="0" max="100" value="<?php echo $keyboardWeight; ?>" class="slider" id="keyboardWeight" name="keyboardWeight" 
       onChange="document.getElementById('k').innerHTML = this.value; for (const radio of document.getElementsByName('use_case'))radio.checked = false"> 
       Keyboard Similarity Weight (<span id="k"><?php echo $keyboardWeight; ?></span>%)<br/>

<input type="range" min="0" max="100" value="<?php echo $graphicWeight; ?>" class="slider" id="graphicWeight" name="graphicWeight"  
       onChange="document.getElementById('g').innerHTML = this.value; for (const radio of document.getElementsByName('use_case'))radio.checked = false"> 
	   Graphic Similarity Weight (<span id="g"><?php echo $graphicWeight; ?></span>%)<br/>
	   
<input type="range" min="0" max="100" value="<?php echo $phoneticWeight; ?>" class="slider" id="phoneticWeight" name="phoneticWeight" 
       onChange="document.getElementById('p').innerHTML = this.value; for (const radio of document.getElementsByName('use_case'))radio.checked = false"> 
	   Phonetic Similarity Weight (<span id="p"><?php echo $phoneticWeight; ?></span>%)<br/>

<p>
	<input type="radio" id="keyboard" name="use_case" value="keyboard" <?php if($use_case == 'keyboard') echo " checked " ?>
		   onClick="document.getElementById('keyboardWeight').value = 100;
					document.getElementById('graphicWeight').value  = 20;
					document.getElementById('phoneticWeight').value = 0;"> 
					<label for="keyboard">Data Entry (Keyboard)</label>

	<input type="radio" id="ocr" name="use_case" value="ocr" <?php if($use_case == 'ocr') echo " checked " ?>
		   onClick="document.getElementById('keyboardWeight').value = 0;
					document.getElementById('graphicWeight').value  = 100;
					document.getElementById('phoneticWeight').value = 0;"> 
					<label for="ocr">Scanned Document (OCR)</label>

	<input type="radio" id="asr" name="use_case" value="asr" <?php if($use_case == 'asr') echo " checked " ?>
		   onClick="document.getElementById('keyboardWeight').value = 0;
					document.getElementById('graphicWeight').value  = 0;
					document.getElementById('phoneticWeight').value = 100;"> 
					<label for="asr">Speech Recognition (ASR)</label>
</p>

<input type="submit" value="Recalculate"/>
</form>
<?php

error_reporting(E_ALL);

/*
  // Autoload files using Composer autoload
  require_once __DIR__ . '/../vendor/autoload.php';
*/

require '../src/Arabic.php';
$Arabic = new \ArPHP\I18N\Arabic();

$Arabic->setSimilarityWeight('keyboardWeight', $keyboardWeight)
	   ->setSimilarityWeight('graphicWeight', $graphicWeight)
	   ->setSimilarityWeight('phoneticWeight', $phoneticWeight);

echo "<p>";

$perc = 0;

$sim = $Arabic->similar_text('مرحباً','مرحب', $perc);
$sim = round($sim, 2); $perc = round($perc, 2);
echo "similarity (مرحباً، مرحب): $sim ($perc%)<br>";

$sim = $Arabic->similar_text('مرحباً','مرحبا', $perc);
$sim = round($sim, 2); $perc = round($perc, 2);
echo "similarity (مرحباً، مرحبا): $sim ($perc%)<br>";

$sim = $Arabic->similar_text('مرحباً','مرحبًا', $perc);
$sim = round($sim, 2); $perc = round($perc, 2);
echo "similarity (مرحبًا، مرحباً): $sim ($perc%)<br>";

echo "</p><p>";

$sim = $Arabic->similar_text('إستعمال','استعمال', $perc);
$sim = round($sim, 2); $perc = round($perc, 2);
echo "similarity (إستعمال، استعمال): $sim ($perc%)<br>";

$sim = $Arabic->similar_text('إستعمال','مستعمال', $perc);
$sim = round($sim, 2); $perc = round($perc, 2);
echo "similarity (إستعمال، مستعمال): $sim ($perc%)<br>";

echo "</p><p>";

$sim = $Arabic->similar_text('مدرست','مدرسة', $perc);
$sim = round($sim, 2); $perc = round($perc, 2);
echo "similarity (مدرست، مدرسة): $sim ($perc%)<br>";

$sim = $Arabic->similar_text('مدرست','مدرس', $perc);
$sim = round($sim, 2); $perc = round($perc, 2);
echo "similarity (مدرست، مدرس): $sim ($perc%)<br>";

echo "</p><p>";

$sim = $Arabic->similar_text('ظرب','ضرب', $perc);
$sim = round($sim, 2); $perc = round($perc, 2);
echo "similarity (ظرب، ضرب): $sim ($perc%)<br>";

$sim = $Arabic->similar_text('ظرب','كرب', $perc);
$sim = round($sim, 2); $perc = round($perc, 2);
echo "similarity (ظرب، كرب): $sim ($perc%)<br>";

echo "</p><p>";

$sim = $Arabic->similar_text('استفسر','الاستفسارات', $perc);
$sim = round($sim, 2); $perc = round($perc, 2);
echo "similarity (استفسر، الاستفسارات): $sim ($perc%)<br>";

$sim = $Arabic->similar_text('استفسر','استنكر', $perc);
$sim = round($sim, 2); $perc = round($perc, 2);
echo "similarity (استفسر، استنكر): $sim ($perc%)<br>";

echo "</p><p>";

$sim = $Arabic->similar_text('استفسر','اشتفسر', $perc);
$sim = round($sim, 2); $perc = round($perc, 2);
echo "similarity (استفسر، اشتفسر): $sim ($perc%)<br>";

echo "</p><p>";

/////////////////////////////////////////////////////////////////

// https://www.php.net/manual/en/function.levenshtein.php#113702

// Convert an UTF-8 encoded string to a single-byte string suitable for
// functions such as levenshtein.
// 
// The function simply uses (and updates) a tailored dynamic encoding
// (in/out map parameter) where non-ascii characters are remapped to
// the range [128-255] in order of appearance.
//
// Thus it supports up to 128 different multibyte code points max over
// the whole set of strings sharing this encoding.
//
function utf8_to_extended_ascii($str, &$map)
{
    // find all multibyte characters (cf. utf-8 encoding specs)
    $matches = array();
    if (!preg_match_all('/[\xC0-\xF7][\x80-\xBF]+/', $str, $matches))
        return $str; // plain ascii string
    
    // update the encoding map with the characters not already met
    foreach ($matches[0] as $mbc)
        if (!isset($map[$mbc]))
            $map[$mbc] = chr(128 + count($map));
    
    // finally remap non-ascii characters
    return strtr($str, $map);
}

// Didactic example showing the usage of the previous conversion function but,
// for better performance, in a real application with a single input string
// matched against many strings from a database, you will probably want to
// pre-encode the input only once.
//
function mb_levenshtein($string1, $string2, $insertion_cost = 1, $replacement_cost = 1, $deletion_cost = 1)
{
    $charMap = array();
    $string1 = utf8_to_extended_ascii($string1, $charMap);
    $string2 = utf8_to_extended_ascii($string2, $charMap);

    return levenshtein($string1, $string2, $insertion_cost, $replacement_cost, $deletion_cost);
}

echo 'levenshtein("استقلال", "مستقل") = ' . levenshtein("استقلال", "مستقل");
echo "<br>";
echo 'mb_levenshtein("استقلال", "مستقل") = ' . mb_levenshtein("استقلال", "مستقل");

echo "</p>";
?>
</div><br />

<div class="Paragraph">
<h2 dir="ltr">Example Code 1:</h2>
<?php
$code = <<< ENDALL
<?php
	\$Arabic = new \\ArPHP\\I18N\\Arabic();
?>
ENDALL;

highlight_string($code);
?>
<hr/><i>Related Documentation: 
<a href="https://khaled-alshamaa.github.io/ar-php/classes/ArPHP-I18N-Arabic.html#method_similar_text" target="_blank">similar_text</a>
</i>
</div>
<footer><i><a href="https://github.com/khaled-alshamaa/ar-php">Ar-PHP</a>, an open-source library for website developers to process Arabic content</i></footer>
</body>
</html>
