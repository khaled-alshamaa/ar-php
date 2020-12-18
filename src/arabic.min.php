<?php
namespace ArPHP\I18N;
class Arabic
{
public $version='5.5';
private $arStandardPatterns=array();
private $arStandardReplacements=array();
private $arFemaleNames;
private $strToTimeSearch=array();
private $strToTimeReplace=array();
private $hj=array();
private $strToTimePatterns=array();
private $strToTimeReplacements=array();
private $umAlqoura;
private $arFinePatterns=array("/'+/u", "/([\- ])'/u", '/(.)#/u');
private $arFineReplacements=array("'", '\\1', "\\1'\\1");
private $diariticalSearch=array();
private $diariticalReplace=array();
private $en2arPregSearch=array();
private $en2arPregReplace=array();
private $en2arStrSearch=array();
private $en2arStrReplace=array();
private $ar2enPregSearch=array();
private $ar2enPregReplace=array();
private $ar2enStrSearch=array();
private $ar2enStrReplace=array();
private $iso233Search=array();
private $iso233Replace=array();
private $rjgcSearch=array();
private $rjgcReplace=array();
private $sesSearch=array();
private $sesReplace=array();
private $arDateMode=1;
private $arDateJSON;
private $arNumberIndividual=array();
private $arNumberComplications=array();
private $arNumberArabicIndic=array();
private $arNumberOrdering=array();
private $arNumberCurrency=array();
private $arNumberSpell=array();
private $arNumberFeminine=1;
private $arNumberFormat=1;
private $arNumberOrder=1;
private $arabizi=array();
private $arLogodd;
private $enLogodd;
private $arKeyboard;
private $enKeyboard;
private $frKeyboard;
private $soundexTransliteration=array();
private $soundexMap=array();
private $arSoundexCode=array();
private $arPhonixCode=array();
private $soundexLen=4;
private $soundexLang='en';
private $soundexCode='soundex';
private $arGlyphs=null;
private $arGlyphsHex=null;
private $arGlyphsPrevLink=null;
private $arGlyphsNextLink=null;
private $arGlyphsVowel=null;
private $arQueryFields=array();
private $arQueryLexPatterns=array();
private $arQueryLexReplacements=array();
private $arQueryMode=0;
private $salatYear=1975;
private $salatMonth=8;
private $salatDay=2;
private $salatZone=2;
private $salatLong=37.15861;
private $salatLat=36.20278;
private $salatElevation=0;
private $salatAB2=-0.833333;
private $salatAG2=-18;
private $salatAJ2=-18;
private $salatSchool='Shafi';
private $salatView='Sunni';
private $arNormalizeAlef=array('أ','إ','آ');
private $arNormalizeDiacritics=array('َ','ً','ُ','ٌ','ِ','ٍ','ْ','ّ');
private $arSeparators=array('.',"\n",'،','؛','(','[','{',')',']','}',',',';');
private $arCommonChars=array('ة','ه','ي','ن','و','ت','ل','ا','س','م',
'e', 't', 'a', 'o', 'i', 'n', 's');
private $arSummaryCommonWords=array();
private $arSummaryImportantWords=array();
private $rootDirectory;
public function __construct()
{
mb_internal_encoding('UTF-8');
$this->rootDirectory=dirname(__FILE__);
$this->arFemaleNames=file($this->rootDirectory . '/data/ar_female.txt', FILE_IGNORE_NEW_LINES);
$this->umAlqoura=file_get_contents($this->rootDirectory . '/data/um_alqoura.txt');
$this->arDateJSON=json_decode(file_get_contents($this->rootDirectory . '/data/ar_date.json'), true);
$this->arStandardInit();
$this->arStrToTimeInit();
$this->arTransliterateInit();
$this->arNumbersInit();
$this->arKeySwapInit();
$this->arSoundexInit();
$this->arGlyphsInit();
$this->arQueryInit();
$this->arSummaryInit();
}
private function arStandardInit()
{
$this->arStandardPatterns[]='/\r\n/u';
$this->arStandardPatterns[]='/([^\@])\n([^\@])/u';
$this->arStandardPatterns[]='/\r/u';
$this->arStandardReplacements[]="\n@@@\n";
$this->arStandardReplacements[]="\\1\n&&&\n\\2";
$this->arStandardReplacements[]="\n###\n";
$this->arStandardPatterns[]='/\s*([\.\،\؛\:\!\؟])\s*/u';
$this->arStandardReplacements[]='\\1 ';
$this->arStandardPatterns[]='/(\. ){2,}/u';
$this->arStandardReplacements[]='...';
$this->arStandardPatterns[]='/\s*([\(\{\[])\s*/u';
$this->arStandardPatterns[]='/\s*([\)\}\]])\s*/u';
$this->arStandardReplacements[]=' \\1';
$this->arStandardReplacements[]='\\1 ';
$this->arStandardPatterns[]='/\s*\"\s*(.+)((?<!\s)\"|\s+\")\s*/u';
$this->arStandardReplacements[]=' "\\1" ';
$this->arStandardPatterns[]='/\s*\-\s*(.+)((?<!\s)\-|\s+\-)\s*/u';
$this->arStandardReplacements[]=' -\\1- ';
$this->arStandardPatterns[]='/\sو\s+([^و])/u';
$this->arStandardReplacements[]=' و\\1';
$this->arStandardPatterns[]='/\s+(\w+)\s*(\d+)\s+/';
$this->arStandardPatterns[]='/\s+(\d+)\s*(\w+)\s+/';
$this->arStandardReplacements[]=' <span dir="ltr">\\2 \\1</span> ';
$this->arStandardReplacements[]=' <span dir="ltr">\\1 \\2</span> ';
$this->arStandardPatterns[]='/\s+(\d+)\s*\%\s+/u';
$this->arStandardPatterns[]='/\n?@@@\n?/u';
$this->arStandardPatterns[]='/\n?&&&\n?/u';
$this->arStandardPatterns[]='/\n?###\n?/u';
$this->arStandardReplacements[]=' %\\1 ';
$this->arStandardReplacements[]="\r\n";
$this->arStandardReplacements[]="\n";
$this->arStandardReplacements[]="\r";
}
private function arStrToTimeInit()
{
$this->strToTimeSearch=file($this->rootDirectory . '/data/strtotime_search.txt', FILE_IGNORE_NEW_LINES);
$this->strToTimeReplace=file($this->rootDirectory . '/data/strtotime_replace.txt', FILE_IGNORE_NEW_LINES);
foreach ($this->arDateJSON['ar_hj_month'] as $month) {
$this->hj[]=(string)$month;
}
$this->strToTimePatterns[]='/َ|ً|ُ|ٌ|ِ|ٍ|ْ|ّ/';
$this->strToTimePatterns[]='/\s*ال(\S{3,})\s+ال(\S{3,})/';
$this->strToTimePatterns[]='/\s*ال(\S{3,})/';
$this->strToTimeReplacements[]='';
$this->strToTimeReplacements[]=' \\2 \\1';
$this->strToTimeReplacements[]=' \\1';
}
private function arTransliterateInit()
{
$path=$this->rootDirectory . '/data/transliteration';
$this->en2arStrSearch=file($path . '/en2ar_str_search.txt', FILE_IGNORE_NEW_LINES);
$this->en2arStrReplace=file($path . '/en2ar_str_replace.txt', FILE_IGNORE_NEW_LINES);
$this->en2arPregSearch=file($path . '/en2ar_preg_search.txt', FILE_IGNORE_NEW_LINES);
$this->en2arPregReplace=file($path . '/en2ar_preg_replace.txt', FILE_IGNORE_NEW_LINES);
$this->ar2enStrSearch=file($path . '/ar2en_str_search.txt', FILE_IGNORE_NEW_LINES);
$this->ar2enStrReplace=file($path . '/ar2en_str_replace.txt', FILE_IGNORE_NEW_LINES);
$this->sesSearch=file($path . '/ses_search.txt', FILE_IGNORE_NEW_LINES);
$this->sesReplace=file($path . '/ses_replace.txt', FILE_IGNORE_NEW_LINES);
$this->rjgcSearch=file($path . '/rjgc_search.txt', FILE_IGNORE_NEW_LINES);
$this->rjgcReplace=file($path . '/rjgc_replace.txt', FILE_IGNORE_NEW_LINES);
$this->diariticalSearch=file($path . '/diaritical_search.txt', FILE_IGNORE_NEW_LINES);
$this->diariticalReplace=file($path . '/diaritical_replace.txt', FILE_IGNORE_NEW_LINES);
$this->ar2enPregSearch=file($path . '/ar2en_preg_search.txt', FILE_IGNORE_NEW_LINES);
$this->ar2enPregReplace=file($path . '/ar2en_preg_replace.txt', FILE_IGNORE_NEW_LINES);
$this->iso233Search=file($path . '/iso233_search.txt', FILE_IGNORE_NEW_LINES);
$this->iso233Replace=file($path . '/iso233_replace.txt', FILE_IGNORE_NEW_LINES);
}
private function arNumbersInit()
{
$json=json_decode(file_get_contents($this->rootDirectory . '/data/ar_numbers.json'), true);
foreach ($json['individual']['male'] as $num) {
if (isset($num['grammar'])) {
$grammar=$num['grammar'];
$this->arNumberIndividual["{$num['value']}"][1]["$grammar"]=(string)$num['text'];
} else {
$this->arNumberIndividual["{$num['value']}"][1]=(string)$num['text'];
}
}
foreach ($json['individual']['female'] as $num) {
if (isset($num['grammar'])) {
$grammar=$num['grammar'];
$this->arNumberIndividual["{$num['value']}"][2]["$grammar"]=(string)$num['text'];
} else {
$this->arNumberIndividual["{$num['value']}"][2]=(string)$num['text'];
}
}
foreach ($json['individual']['gt19'] as $num) {
if (isset($num['grammar'])) {
$grammar=$num['grammar'];
$this->arNumberIndividual["{$num['value']}"]["$grammar"]=(string)$num['text'];
} else {
$this->arNumberIndividual["{$num['value']}"]=(string)$num['text'];
}
}
foreach ($json['complications'] as $num) {
$scale=$num['scale'];
$format=$num['format'];
$this->arNumberComplications["$scale"]["$format"]=(string)$num['text'];
}
foreach ($json['arabicIndic'] as $html) {
$value=$html['value'];
$this->arNumberArabicIndic["$value"]=$html['text'];
}
foreach ($json['order']['male'] as $num) {
$this->arNumberOrdering["{$num['value']}"][1]=(string)$num['text'];
}
foreach ($json['order']['female'] as $num) {
$this->arNumberOrdering["{$num['value']}"][2]=(string)$num['text'];
}
foreach ($json['individual']['male'] as $num) {
if ($num['value'] < 11) {
$str=str_replace(array('أ','إ','آ'), 'ا', (string)$num['text']);
$this->arNumberSpell[$str]=(int)$num['value'];
}
}
foreach ($json['individual']['female'] as $num) {
if ($num['value'] < 11) {
$str=str_replace(array('أ','إ','آ'), 'ا', (string)$num['text']);
$this->arNumberSpell[$str]=(int)$num['value'];
}
}
foreach ($json['individual']['gt19'] as $num) {
$str=str_replace(array('أ','إ','آ'), 'ا', (string)$num['text']);
$this->arNumberSpell[$str]=(int)$num['value'];
}
foreach ($json['currency'] as $money) {
$this->arNumberCurrency[$money['iso']]['ar']['basic']=$money['ar_basic'];
$this->arNumberCurrency[$money['iso']]['ar']['fraction']=$money['ar_fraction'];
$this->arNumberCurrency[$money['iso']]['en']['basic']=$money['ar_basic'];
$this->arNumberCurrency[$money['iso']]['en']['fraction']=$money['en_fraction'];
$this->arNumberCurrency[$money['iso']]['decimals']=$money['decimals'];
}
}
private function arKeySwapInit()
{
$json=json_decode(file_get_contents($this->rootDirectory . '/data/arabizi.json'), true);
foreach ($json['transliteration'] as $item) {
$index=$item['id'];
$this->arabizi["$index"]=(string)$item['text'];
}
$json=json_decode(file_get_contents($this->rootDirectory . '/data/ar_keyswap.json'), true);
foreach ($json['arabic'] as $key) {
$index=(int)$key['id'];
$this->arKeyboard[$index]=(string)$key['text'];
}
foreach ($json['english'] as $key) {
$index=(int)$key['id'];
$this->enKeyboard[$index]=(string)$key['text'];
}
foreach ($json['french'] as $key) {
$index=(int)$key['id'];
$this->frKeyboard[$index]=(string)$key['text'];
}
$this->arLogodd=file($this->rootDirectory . '/data/logodd_ar.php');
$this->enLogodd=file($this->rootDirectory . '/data/logodd_en.php');
}
private function arSoundexInit()
{
$json=json_decode(file_get_contents($this->rootDirectory . '/data/ar_soundex.json'), true);
foreach ($json['arSoundexCode'] as $item) {
$index=$item['search'];
$this->arSoundexCode["$index"]=(string)$item['replace'];
}
foreach ($json['arPhonixCode'] as $item) {
$index=$item['search'];
$this->arPhonixCode["$index"]=(string)$item['replace'];
}
foreach ($json['soundexTransliteration'] as $item) {
$index=$item['search'];
$this->soundexTransliteration["$index"]=(string)$item['replace'];
}
$this->soundexMap=$this->arSoundexCode;
}
private function arGlyphsInit()
{
$this->arGlyphsPrevLink='،؟؛ـئبتثجحخسشصضطظعغفقكلمنهي';
$this->arGlyphsNextLink='ـآأؤإائبةتثجحخدذرز';
$this->arGlyphsNextLink .='سشصضطظعغفقكلمنهوىي';
$this->arGlyphsVowel='ًٌٍَُِّْ';
$this->arGlyphs['ً']=array('FE70','FE71');
$this->arGlyphs['ٌ']=array('FE72','FE72');
$this->arGlyphs['ٍ']=array('FE74','FE74');
$this->arGlyphs['َ']=array('FE76','FE77');
$this->arGlyphs['ُ']=array('FE78','FE79');
$this->arGlyphs['ِ']=array('FE7A','FE7B');
$this->arGlyphs['ّ']=array('FE7C','FE7D');
$this->arGlyphs['ْ']=array('FE7E','FE7E');
$this->arGlyphs='ًٌٍَُِّْٰ';
$this->arGlyphsHex='064B064B064B064B064C064C064C064C064D064D064D064D064E064E';
$this->arGlyphsHex .='064E064E064F064F064F064F06500650065006500651065106510651';
$this->arGlyphsHex .='06520652065206520670067006700670';
$this->arGlyphs    .='ءآأؤإئاب';
$this->arGlyphsHex .='FE80FE80FE80FE80FE81FE82FE81FE82FE83FE84FE83FE84FE85FE86';
$this->arGlyphsHex .='FE85FE86FE87FE88FE87FE88FE89FE8AFE8BFE8CFE8DFE8EFE8DFE8E';
$this->arGlyphsHex .='FE8FFE90FE91FE92';
$this->arGlyphs    .='ةتثجحخدذ';
$this->arGlyphsHex .='FE93FE94FE93FE94FE95FE96FE97FE98FE99FE9AFE9BFE9CFE9DFE9E';
$this->arGlyphsHex .='FE9FFEA0FEA1FEA2FEA3FEA4FEA5FEA6FEA7FEA8FEA9FEAAFEA9FEAA';
$this->arGlyphsHex .='FEABFEACFEABFEAC';
$this->arGlyphs    .='رزسشصضطظ';
$this->arGlyphsHex .='FEADFEAEFEADFEAEFEAFFEB0FEAFFEB0FEB1FEB2FEB3FEB4FEB5FEB6';
$this->arGlyphsHex .='FEB7FEB8FEB9FEBAFEBBFEBCFEBDFEBEFEBFFEC0FEC1FEC2FEC3FEC4';
$this->arGlyphsHex .='FEC5FEC6FEC7FEC8';
$this->arGlyphs    .='عغفقكلمن';
$this->arGlyphsHex .='FEC9FECAFECBFECCFECDFECEFECFFED0FED1FED2FED3FED4FED5FED6';
$this->arGlyphsHex .='FED7FED8FED9FEDAFEDBFEDCFEDDFEDEFEDFFEE0FEE1FEE2FEE3FEE4';
$this->arGlyphsHex .='FEE5FEE6FEE7FEE8';
$this->arGlyphs    .='هوىيـ،؟؛';
$this->arGlyphsHex .='FEE9FEEAFEEBFEECFEEDFEEEFEEDFEEEFEEFFEF0FEEFFEF0FEF1FEF2';
$this->arGlyphsHex .='FEF3FEF40640064006400640060C060C060C060C061F061F061F061F';
$this->arGlyphsHex .='061B061B061B061B';
$this->arGlyphs    .=chr(129).chr(141).chr(142).chr(144);
$this->arGlyphsHex .='FB56FB57FB58FB59FB7AFB7BFB7CFB7DFB8AFB8BFB8AFB8BFB92';
$this->arGlyphsHex .='FB93FB94FB95';
$this->arGlyphsPrevLink .=chr(129).chr(141).chr(142).chr(144);
$this->arGlyphsNextLink .=chr(129).chr(141).chr(142).chr(144);
$this->arGlyphs    .='';
$this->arGlyphsHex .='';
$this->arGlyphs    .='لآلألإلا';
$this->arGlyphsHex .='FEF5FEF6FEF5FEF6FEF7FEF8FEF7FEF8FEF9FEFAFEF9FEFAFEFBFEFC';
$this->arGlyphsHex .='FEFBFEFC';
}
private function arQueryInit()
{
$json=json_decode(file_get_contents($this->rootDirectory . '/data/ar_query.json'), true);
foreach ($json['preg_replace'] as $pair) {
$this->arQueryLexPatterns[]=(string)$pair['search'];
$this->arQueryLexReplacements[]=(string)$pair['replace'];
}
}
private function arSummaryInit()
{
$words=file($this->rootDirectory . '/data/ar_stopwords.txt', FILE_IGNORE_NEW_LINES);
$en_words=file($this->rootDirectory . '/data/en_stopwords.txt', FILE_IGNORE_NEW_LINES);
$words=array_merge($words, $en_words);
$this->arSummaryCommonWords=$words;
$words=file($this->rootDirectory . '/data/important_words.txt', FILE_IGNORE_NEW_LINES);
$this->arSummaryImportantWords=$words;
}
public function standard($text)
{
$text=preg_replace($this->arStandardPatterns, $this->arStandardReplacements, $text);
return $text;
}
public function isFemale($str)
{
$female=false;
$words=explode(' ', $str);
$str=$words[0];
$str=str_replace(array('أ','إ','آ'), 'ا', $str);
$last=mb_substr($str, -1, 1);
$beforeLast=mb_substr($str, -2, 1);
if (
$last=='ة' || $last=='ه' || $last=='ى' || $last=='ا'
|| ($last=='ء' && $beforeLast=='ا')
) {
$female=true;
} elseif (
preg_match("/^[اإ].{2}ا.$/u", $str)
|| preg_match("/^[إا].ت.ا.+$/u", $str)
) {
$female=true;
} else {
if (array_search($str, $this->arFemaleNames) > 0) {
$female=true;
}
}
return $female;
}
public function strtotime($text, $now)
{
$int=0;
for ($i=0; $i < 12; $i++) {
if (strpos($text, $this->hj[$i]) > 0) {
preg_match('/.*(\d{1,2}).*(\d{4}).*/', $text, $matches);
$fix=$this->mktimeCorrection($i + 1, $matches[2]);
$int=$this->mktime(0, 0, 0, $i + 1, $matches[1], $matches[2], $fix);
$temp=null;
break;
}
}
if ($int==0) {
$text=preg_replace($this->strToTimePatterns, $this->strToTimeReplacements, $text);
$text=str_replace($this->strToTimeSearch, $this->strToTimeReplace, $text);
$pattern='[ابتثجحخدذرزسشصضطظعغفقكلمنهوي]';
$text=preg_replace("/$pattern/", '', $text);
$int=strtotime($text, $now);
}
return $int;
}
public function mktime($hour, $minute, $second, $hj_month, $hj_day, $hj_year, $correction=0)
{
list($year, $month, $day)=$this->arDateIslamicToGreg($hj_year, $hj_month, $hj_day);
$unixTimeStamp=mktime($hour, $minute, $second, $month, $day, $year);
$unixTimeStamp=$unixTimeStamp + 3600 * 24 * $correction;
return $unixTimeStamp;
}
private function arDateIslamicToGreg($y, $m, $d)
{
$str=jdtogregorian($this->arDateIslamicToJd($y, $m, $d));
list($month, $day, $year)=explode('/', $str);
return array($year, $month, $day);
}
public function mktimeCorrection($m, $y)
{
if ($y >=1420 && $y < 1460) {
$calc=$this->mktime(0, 0, 0, $m, 1, $y);
$offset=(($y - 1420) * 12 + $m) * 11;
$d=substr($this->umAlqoura, $offset, 2);
$m=substr($this->umAlqoura, $offset + 3, 2);
$y=substr($this->umAlqoura, $offset + 6, 4);
$real=mktime(0, 0, 0, (int)$m, (int)$d, (int)$y);
$diff=(int)(($real - $calc) / (3600 * 24));
} else {
$diff=0;
}
return $diff;
}
public function hijriMonthDays($m, $y, $umAlqoura=true)
{
if ($y >=1320 && $y < 1460) {
$begin=$this->mktime(0, 0, 0, $m, 1, $y);
if ($m==12) {
$m2=1;
$y2=$y + 1;
} else {
$m2=$m + 1;
$y2=$y;
}
$end=$this->mktime(0, 0, 0, $m2, 1, $y2);
if ($umAlqoura===true) {
$c1=$this->mktimeCorrection($m, $y);
$c2=$this->mktimeCorrection($m2, $y2);
} else {
$c1=0;
$c2=0;
}
$days=($end - $begin) / (3600 * 24);
$days=$days - $c1 + $c2;
} else {
$days=false;
}
return $days;
}
public function en2ar($string, $locale='en_US')
{
setlocale(LC_ALL, $locale);
$string=iconv("UTF-8", "ASCII//TRANSLIT", $string);
$string=preg_replace('/[^\w\s]/', '', $string);
$string=strtolower($string);
$words=explode(' ', $string);
$string='';
foreach ($words as $word) {
$word=preg_replace($this->en2arPregSearch, $this->en2arPregReplace, $word);
$word=strtr($word, array_combine($this->en2arStrSearch, $this->en2arStrReplace));
$string .=' ' . $word;
}
return $string;
}
public function ar2en($string, $standard='UNGEGN')
{
$words=explode(' ', $string);
$string='';
for ($i=0; $i < count($words) - 1; $i++) {
$words[$i]=strtr($words[$i], 'ة', 'ت');
}
foreach ($words as $word) {
$temp=$word;
if ($standard=='UNGEGN+') {
$temp=strtr($temp, array_combine($this->diariticalSearch, $this->diariticalReplace));
} elseif ($standard=='RJGC') {
$temp=strtr($temp, array_combine($this->diariticalSearch, $this->diariticalReplace));
$temp=strtr($temp, array_combine($this->rjgcSearch, $this->rjgcReplace));
} elseif ($standard=='SES') {
$temp=strtr($temp, array_combine($this->diariticalSearch, $this->diariticalReplace));
$temp=strtr($temp, array_combine($this->sesSearch, $this->sesReplace));
} elseif ($standard=='ISO233') {
$temp=strtr($temp, array_combine($this->iso233Search, $this->iso233Replace));
}
$temp=preg_replace($this->ar2enPregSearch, $this->ar2enPregReplace, $temp);
$temp=strtr($temp, array_combine($this->ar2enStrSearch, $this->ar2enStrReplace));
$temp=preg_replace($this->arFinePatterns, $this->arFineReplacements, $temp);
if (preg_match('/[a-z]/', mb_substr($temp, 0, 1))) {
$temp=ucwords($temp);
}
$pos=strpos($temp, '-');
if ($pos > 0) {
if (preg_match('/[a-z]/', mb_substr($temp, $pos + 1, 1))) {
$temp2=substr($temp, 0, $pos);
$temp2 .='-' . strtoupper($temp[$pos + 1]);
$temp2 .=substr($temp, $pos + 2);
} else {
$temp2=$temp;
}
} else {
$temp2=$temp;
}
$string .=' ' . $temp2;
}
return $string;
}
public function setDateMode($mode=1)
{
$mode=(int) $mode;
if ($mode > 0 && $mode < 9) {
$this->arDateMode=$mode;
}
return $this;
}
public function getDateMode()
{
return $this->arDateMode;
}
public function date($format, $timestamp, $correction=0)
{
if ($this->arDateMode==1 || $this->arDateMode==8) {
$hj_txt_month=array();
if ($this->arDateMode==1) {
foreach ($this->arDateJSON['ar_hj_month'] as $id=> $month) {
$id++;
$hj_txt_month["$id"]=(string)$month;
}
}
if ($this->arDateMode==8) {
foreach ($this->arDateJSON['en_hj_month'] as $id=> $month) {
$id++;
$hj_txt_month["$id"]=(string)$month;
}
}
$patterns=array();
$replacements=array();
$patterns[]='Y';
$patterns[]='y';
$patterns[]='M';
$patterns[]='F';
$patterns[]='n';
$patterns[]='m';
$patterns[]='j';
$patterns[]='d';
$replacements[]='x1';
$replacements[]='x2';
$replacements[]='x3';
$replacements[]='x3';
$replacements[]='x4';
$replacements[]='x5';
$replacements[]='x6';
$replacements[]='x7';
if ($this->arDateMode==8) {
$patterns[]='S';
$replacements[]='';
}
$format=strtr($format, array_combine($patterns, $replacements));
$str=date($format, $timestamp);
if ($this->arDateMode==1) {
$str=$this->arDateEn2ar($str);
}
$timestamp=$timestamp + 3600 * 24 * $correction;
list($y, $m, $d)=explode(' ', date('Y m d', $timestamp));
list($hj_y, $hj_m, $hj_d)=$this->arDateGregToIslamic($y, $m, $d);
list($y, $m, $d)=explode(' ', date('Y m d', $timestamp));
list($hj_y, $hj_m, $hj_d)=$this->arDateGregToIslamic((int)$y, (int)$m, (int)$d);
$hj_d +=$correction;
if ($hj_d <=0) {
$hj_d=30;
list($hj_y, $hj_m, $temp)=$this->arDateGregToIslamic((int)$y, (int)$m, (int)$d + $correction);
} elseif ($hj_d > 30) {
list($hj_y, $hj_m, $hj_d)=$this->arDateGregToIslamic((int)$y, (int)$m, (int)$d + $correction);
}
$patterns=array();
$replacements=array();
$patterns[]='x1';
$patterns[]='x2';
$patterns[]='x3';
$patterns[]='x4';
$patterns[]='x5';
$patterns[]='x6';
$patterns[]='x7';
$replacements[]=$hj_y;
$replacements[]=substr($hj_y, -2);
$replacements[]=$hj_txt_month[$hj_m];
$replacements[]=$hj_m;
$replacements[]=sprintf('%02d', $hj_m);
$replacements[]=$hj_d;
$replacements[]=sprintf('%02d', $hj_d);
$str=strtr($str, array_combine($patterns, $replacements));
} elseif ($this->arDateMode==5) {
$year=date('Y', $timestamp);
$year -=632;
$yr=substr("$year", -2);
$format=str_replace('Y', (string)$year, $format);
$format=str_replace('y', $yr, $format);
$str=date($format, $timestamp);
$str=$this->arDateEn2ar($str);
} else {
$str=date($format, $timestamp);
$str=$this->arDateEn2ar($str);
}
return $str;
}
private function arDateEn2ar($str)
{
$patterns=array();
$replacements=array();
$str=strtolower($str);
foreach ($this->arDateJSON['en_day']['mode_full'] as $day) {
$patterns[]=(string)$day;
}
foreach ($this->arDateJSON['ar_day'] as $day) {
$replacements[]=(string)$day;
}
foreach ($this->arDateJSON['en_month']['mode_full'] as $month) {
$patterns[]=(string)$month;
}
$replacements=array_merge($replacements, $this->arDateArabicMonths($this->arDateMode));
foreach ($this->arDateJSON['en_day']['mode_short'] as $day) {
$patterns[]=(string)$day;
}
foreach ($this->arDateJSON['ar_day'] as $day) {
$replacements[]=(string)$day;
}
foreach ($this->arDateJSON['en_month']['mode_short'] as $m) {
$patterns[]=(string)$m;
}
$replacements=array_merge($replacements, $this->arDateArabicMonths($this->arDateMode));
foreach ($this->arDateJSON['preg_replace_en2ar'] as $p) {
$patterns[]=(string)$p['search'];
$replacements[]=(string)$p['replace'];
}
$str=strtr($str, array_combine($patterns, $replacements));
return $str;
}
private function arDateArabicMonths($mode)
{
$replacements=array();
foreach ($this->arDateJSON['ar_month']["mode_$mode"] as $month) {
$replacements[]=(string)$month;
}
return $replacements;
}
private function arDateGregToIslamic($y, $m, $d)
{
$jd=gregoriantojd($m, $d, $y);
list($year, $month, $day)=$this->arDateJdToIslamic($jd);
return array($year, $month, $day);
}
private function arDateJdToIslamic($jd)
{
$l=(int)$jd - 1948440 + 10632;
$n=(int)(($l - 1) / 10631);
$l=$l - 10631 * $n + 354;
$j=(int)((10985 - $l) / 5316) * (int)((50 * $l) / 17719) + (int)($l / 5670) * (int)((43 * $l) / 15238);
$l=$l - (int)((30 - $j) / 15) * (int)((17719 * $j) / 50) - (int)($j / 16) * (int)((15238 * $j) / 43) + 29;
$m=(int)((24 * $l) / 709);
$d=$l - (int)((709 * $m) / 24);
$y=(int)(30 * $n + $j - 30);
return array($y, $m, $d);
}
private function arDateIslamicToJd($y, $m, $d)
{
$jd=(int)((11 * $y + 3) / 30) + (int)(354 * $y) + (int)(30 * $m) - (int)(($m - 1) / 2) + $d + 1948440 - 385;
return $jd;
}
public function dateCorrection($time)
{
$calc=$time - (int)$this->date('j', $time) * 3600 * 24;
$y=$this->date('Y', $time);
$m=$this->date('n', $time);
$offset=(((int)$y - 1420) * 12 + (int)$m) * 11;
$d=substr($this->umAlqoura, $offset, 2);
$m=substr($this->umAlqoura, $offset + 3, 2);
$y=substr($this->umAlqoura, $offset + 6, 4);
$real=mktime(0, 0, 0, (int)$m, (int)$d, (int)$y);
$diff=(int)(($calc - $real) / (3600 * 24));
return $diff;
}
public function setNumberFeminine($value)
{
if ($value==1 || $value==2) {
$this->arNumberFeminine=$value;
}
return $this;
}
public function setNumberFormat($value)
{
if ($value==1 || $value==2) {
$this->arNumberFormat=$value;
}
return $this;
}
public function setNumberOrder($value)
{
if ($value==1 || $value==2) {
$this->arNumberOrder=$value;
}
return $this;
}
public function getNumberFeminine()
{
return $this->arNumberFeminine;
}
public function getNumberFormat()
{
return $this->arNumberFormat;
}
public function getNumberOrder()
{
return $this->arNumberOrder;
}
public function int2str($number)
{
if ($number==1 && $this->arNumberOrder==2) {
if ($this->arNumberFeminine==1) {
$string='الأول';
} else {
$string='الأولى';
}
} else {
if ($number < 0) {
$string='سالب ';
$number=(string) (-1 * $number);
} else {
$string='';
}
$temp=explode('.', (string)$number);
$string .=$this->arNumbersSubStr((int)$temp[0]);
if (!empty($temp[1])) {
$dec=$this->arNumbersSubStr((int)$temp[1]);
$string .=' فاصلة ' . $dec;
}
}
return $string;
}
public function money2str($number, $iso='SYP', $lang='ar')
{
$iso=strtoupper($iso);
$lang=strtolower($lang);
$number=sprintf("%01.{$this->arNumberCurrency[$iso]['decimals']}f", $number);
$temp=explode('.', $number);
$string='';
if ($temp[0] !=0) {
$string .=$this->arNumbersSubStr((int)$temp[0]);
$string .=' ' . $this->arNumberCurrency[$iso][$lang]['basic'];
}
if (!empty($temp[1]) && $temp[1] !=0) {
if ($string !='') {
if ($lang=='ar') {
$string .=' و ';
} else {
$string .=' and ';
}
}
$string .=$this->arNumbersSubStr((int)$temp[1]);
$string .=' ' . $this->arNumberCurrency[$iso][$lang]['fraction'];
}
return $string;
}
public function str2int($str)
{
$str=str_replace(array('أ','إ','آ'), 'ا', $str);
$str=str_replace('ه', 'ة', $str);
$str=preg_replace('/\s+/', ' ', $str);
$ptr=array('ـ', 'َ','ً','ُ','ٌ','ِ','ٍ','ْ','ّ');
$str=str_replace($ptr, '', $str);
$str=str_replace('مائة', 'مئة', $str);
$str=str_replace(array('احدى','احد'), 'واحد', $str);
$ptr=array('اثنا','اثني','اثنتا', 'اثنتي');
$str=str_replace($ptr, 'اثنان', $str);
$str=trim($str);
if (strpos($str, 'ناقص')===false && strpos($str, 'سالب')===false) {
$negative=false;
} else {
$negative=true;
}
$segment=array();
$max=count($this->arNumberComplications);
for ($scale=$max; $scale > 0; $scale--) {
$key=pow(1000, $scale);
$pattern=array('أ','إ','آ');
$format1=str_replace($pattern, 'ا', $this->arNumberComplications[$scale][1]);
$format2=str_replace($pattern, 'ا', $this->arNumberComplications[$scale][2]);
$format3=str_replace($pattern, 'ا', $this->arNumberComplications[$scale][3]);
$format4=str_replace($pattern, 'ا', $this->arNumberComplications[$scale][4]);
if (strpos($str, $format1) !==false) {
list($temp, $str)=explode($format1, $str);
$segment[$key]='اثنان';
} elseif (strpos($str, $format2) !==false) {
list($temp, $str)=explode($format2, $str);
$segment[$key]='اثنان';
} elseif (strpos($str, $format3) !==false) {
list($segment[$key], $str)=explode($format3, $str);
} elseif (strpos($str, $format4) !==false) {
list($segment[$key], $str)=explode($format4, $str);
if ($segment[$key]=='') {
$segment[$key]='واحد';
}
}
if (isset($segment[$key])) {
$segment[$key]=trim($segment[$key]);
}
}
$segment[1]=trim($str);
$total=0;
$subTotal=0;
foreach ($segment as $scale=> $str) {
$str=" $str ";
foreach ($this->arNumberSpell as $word=> $value) {
if (strpos($str, "$word ") !==false) {
$str=str_replace("$word ", ' ', $str);
$subTotal +=$value;
}
}
$total   +=$subTotal * $scale;
$subTotal=0;
}
if ($negative) {
$total=-1 * $total;
}
return $total;
}
private function arNumbersSubStr($number, $zero=true)
{
$blocks=array();
$items=array();
$zeros='';
$string='';
$number=($zero !=false) ? trim((string)$number) : trim((string)(float)$number);
if ($number > 0) {
if ($zero !=false) {
$fulnum=$number;
while (($fulnum[0])=='0') {
$zeros='صفر ' . $zeros;
$fulnum=substr($fulnum, 1, strlen($fulnum));
};
};
while (strlen($number) > 3) {
$blocks[]=substr($number, -3);
$number=substr($number, 0, strlen($number) - 3);
}
$blocks[]=$number;
$blocks_num=count($blocks) - 1;
for ($i=$blocks_num; $i >=0; $i--) {
$number=floor((float)$blocks[$i]);
$text=$this->arNumberWrittenBlock((int)$number);
if ($text) {
if ($number==1 && $i !=0) {
$text=$this->arNumberComplications[$i][4];
} elseif ($number==2 && $i !=0) {
$text=$this->arNumberComplications[$i][$this->arNumberFormat];
} elseif ($number > 2 && $number < 11 && $i !=0) {
$text .=' ' . $this->arNumberComplications[$i][3];
} elseif ($i !=0) {
$text .=' ' . $this->arNumberComplications[$i][4];
}
if ($this->arNumberOrder==2 && ($number > 1 && $number < 11)) {
$text='ال' . $text;
}
if ($text !='' && $zeros !='' && $zero !=false) {
$text=$zeros . ' ' . $text;
$zeros='';
};
$items[]=$text;
}
}
$string=implode(' و ', $items);
} else {
$string='صفر';
}
return $string;
}
private function arNumberWrittenBlock($number)
{
$items=array();
$string='';
if ($number > 99) {
$hundred=floor($number / 100) * 100;
$number=$number % 100;
if ($this->arNumberOrder==2) {
$pre='ال';
} else {
$pre='';
}
if ($hundred==200) {
$items[]=$pre . $this->arNumberIndividual[$hundred][$this->arNumberFormat];
} else {
$items[]=$pre . $this->arNumberIndividual[$hundred];
}
}
if ($number !=0) {
if ($this->arNumberOrder==2) {
if ($number <=10) {
$items[]=$this->arNumberOrdering[$number][$this->arNumberFeminine];
} elseif ($number < 20) {
$number -=10;
$item='ال' . $this->arNumberOrdering[$number][$this->arNumberFeminine];
if ($this->arNumberFeminine==1) {
$item .=' عشر';
} else {
$item .=' عشرة';
}
$items[]=$item;
} else {
$ones=$number % 10;
$tens=floor($number / 10) * 10;
if ($ones > 0) {
$items[]='ال' . $this->arNumberOrdering[$ones][$this->arNumberFeminine];
}
$items[]='ال' . $this->arNumberIndividual[$tens][$this->arNumberFormat];
}
} else {
if ($number==2 || $number==12) {
$items[]=$this->arNumberIndividual[$number][$this->arNumberFeminine][$this->arNumberFormat];
} elseif ($number < 20) {
$items[]=$this->arNumberIndividual[$number][$this->arNumberFeminine];
} else {
$ones=$number % 10;
$tens=floor($number / 10) * 10;
if ($ones==2) {
$items[]=$this->arNumberIndividual[2][$this->arNumberFeminine][$this->arNumberFormat];
} elseif ($ones > 0) {
$items[]=$this->arNumberIndividual[$ones][$this->arNumberFeminine];
}
$items[]=$this->arNumberIndividual[$tens][$this->arNumberFormat];
}
}
}
$items=array_diff($items, array(''));
$string=implode(' و ', $items);
return $string;
}
public function int2indic($number)
{
$str=strtr("$number", $this->arNumberArabicIndic);
return $str;
}
public function swapAe($text)
{
$output=$this->swapCore($text, 'ar', 'en');
return $output;
}
public function swapEa($text)
{
$output=$this->swapCore($text, 'en', 'ar');
return $output;
}
public function swapAf($text)
{
$output=$this->swapCore($text, 'ar', 'fr');
return $output;
}
public function swapFa($text)
{
$output=$this->swapCore($text, 'fr', 'ar');
return $output;
}
private function swapCore($text, $in, $out)
{
$output='';
$text=stripslashes($text);
$max=mb_strlen($text);
$inputMap=array();
$outputMap=array();
switch ($in) {
case 'ar':
$inputMap=$this->arKeyboard;
break;
case 'en':
$inputMap=$this->enKeyboard;
break;
case 'fr':
$inputMap=$this->frKeyboard;
break;
}
switch ($out) {
case 'ar':
$outputMap=$this->arKeyboard;
break;
case 'en':
$outputMap=$this->enKeyboard;
break;
case 'fr':
$outputMap=$this->frKeyboard;
break;
}
for ($i=0; $i < $max; $i++) {
$chr=mb_substr($text, $i, 1);
$key=array_search($chr, $inputMap);
if ($key===false) {
$output .=$chr;
} else {
$output .=$outputMap[$key];
}
}
return $output;
}
private function checkEn($str)
{
$lines=$this->enLogodd;
$logodd=array();
$line=array_shift($lines);
$line=rtrim($line);
$second=preg_split("/\t/", $line);
$temp=array_shift($second);
foreach ($lines as $line) {
$line=rtrim($line);
$values=preg_split("/\t/", $line);
$first=array_shift($values);
for ($i=0; $i < 27; $i++) {
$logodd["$first"]["{$second[$i]}"]=$values[$i];
}
}
$str=mb_strtolower($str);
$max=mb_strlen($str);
$rank=0;
for ($i=1; $i < $max; $i++) {
$first=mb_substr($str, $i - 1, 1);
$second=mb_substr($str, $i, 1);
if (isset($logodd["$first"]["$second"])) {
$rank +=$logodd["$first"]["$second"];
} else {
$rank -=10;
}
}
return $rank;
}
private function checkAr($str)
{
$lines=$this->arLogodd;
$logodd=array();
$line=array_shift($lines);
$line=rtrim($line);
$second=preg_split("/\t/", $line);
$temp=array_shift($second);
foreach ($lines as $line) {
$line=rtrim($line);
$values=preg_split("/\t/", $line);
$first=array_shift($values);
for ($i=0; $i < 37; $i++) {
$logodd["$first"]["{$second[$i]}"]=$values[$i];
}
}
$max=mb_strlen($str);
$rank=0;
for ($i=1; $i < $max; $i++) {
$first=mb_substr($str, $i - 1, 1);
$second=mb_substr($str, $i, 1);
if (isset($logodd["$first"]["$second"])) {
$rank +=$logodd["$first"]["$second"];
} else {
$rank -=10;
}
}
return $rank;
}
public function fixKeyboardLang($str)
{
preg_match_all("/([\x{0600}-\x{06FF}])/u", $str, $matches);
$arNum=count($matches[0]);
$nonArNum=mb_strlen(str_replace(' ', '', $str)) - $arNum;
$capital='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$small='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$strCaps=strtr($str, $capital, $small);
$arStrCaps=$this->swapEa($strCaps);
if ($arNum > $nonArNum) {
$arStr=$str;
$enStr=$this->swapAe($str);
$isAr=true;
$enRank=$this->checkEn($enStr);
$arRank=$this->checkAr($arStr);
$arCapsRank=$arRank;
} else {
$arStr=$this->swapEa($str);
$enStr=$str;
$isAr=false;
$enRank=$this->checkEn($enStr);
$arRank=$this->checkAr($arStr);
$arCapsRank=$this->checkAr($arStrCaps);
}
if ($enRank > $arRank && $enRank > $arCapsRank) {
if ($isAr) {
$fix=$enStr;
} else {
preg_match_all("/([A-Z])/u", $enStr, $matches);
$capsNum=count($matches[0]);
preg_match_all("/([a-z])/u", $enStr, $matches);
$nonCapsNum=count($matches[0]);
if ($capsNum > $nonCapsNum && $nonCapsNum > 0) {
$enCapsStr=strtr($enStr, $capital, $small);
$fix=$enCapsStr;
} else {
$fix='';
}
}
} else {
if ($arCapsRank > $arRank) {
$arStr=$arStrCaps;
$arRank=$arCapsRank;
}
if (!$isAr) {
$fix=$arStr;
} else {
$fix='';
}
}
return $fix;
}
public function setSoundexLen($integer)
{
$this->soundexLen=(int)$integer;
return $this;
}
public function setSoundexLang($str)
{
$str=strtolower($str);
if ($str=='ar' || $str=='en') {
$this->soundexLang=$str;
}
return $this;
}
public function setSoundexCode($str)
{
$str=strtolower($str);
if ($str=='soundex' || $str=='phonix') {
$this->soundexCode=$str;
if ($str=='phonix') {
$this->soundexMap=$this->arPhonixCode;
} else {
$this->soundexMap=$this->arSoundexCode;
}
}
return $this;
}
public function getSoundexLen()
{
return $this->soundexLen;
}
public function getSoundexLang()
{
return $this->soundexLang;
}
public function getSoundexCode()
{
return $this->soundexCode;
}
private function arSoundexMapCode($word)
{
$encodedWord='';
$max=mb_strlen($word);
for ($i=0; $i < $max; $i++) {
$char=mb_substr($word, $i, 1);
if (isset($this->soundexMap["$char"])) {
$encodedWord .=$this->soundexMap["$char"];
} else {
$encodedWord .='0';
}
}
return $encodedWord;
}
private function arSoundexTrimRep($word)
{
$lastChar=null;
$cleanWord=null;
$max=mb_strlen($word);
for ($i=0; $i < $max; $i++) {
$char=mb_substr($word, $i, 1);
if ($char !=$lastChar) {
$cleanWord .=$char;
}
$lastChar=$char;
}
return $cleanWord;
}
public function soundex($word)
{
$soundex=mb_substr($word, 0, 1);
$rest=mb_substr($word, 1, mb_strlen($word));
if ($this->soundexLang=='en') {
$soundex=$this->soundexTransliteration[$soundex];
}
$encodedRest=$this->arSoundexMapCode($rest);
$cleanEncodedRest=$this->arSoundexTrimRep($encodedRest);
$soundex .=$cleanEncodedRest;
$soundex=str_replace('0', '', $soundex);
$totalLen=mb_strlen($soundex);
if ($totalLen > $this->soundexLen) {
$soundex=mb_substr($soundex, 0, $this->soundexLen);
} else {
$soundex .=str_repeat('0', $this->soundexLen - $totalLen);
}
return $soundex;
}
private function getArGlyphs($char, $type)
{
$pos=mb_strpos($this->arGlyphs, $char, 0);
if ($pos > 49) {
$pos=($pos - 49) / 2 + 49;
}
$pos=$pos * 16 + $type * 4;
return substr($this->arGlyphsHex, $pos, 4);
}
private function arGlyphsPreConvert($str)
{
$crntChar=null;
$prevChar=null;
$nextChar=null;
$output='';
$chars=array();
$_temp=mb_strlen($str);
for ($i=0; $i < $_temp; $i++) {
$chars[]=mb_substr($str, $i, 1);
}
$max=count($chars);
for ($i=$max - 1; $i >=0; $i--) {
$crntChar=$chars[$i];
$prevChar=' ';
if ($i > 0) {
$prevChar=$chars[$i - 1];
}
if ($prevChar && mb_strpos($this->arGlyphsVowel, $prevChar, 0) !==false) {
$prevChar=$chars[$i - 2];
if ($prevChar && mb_strpos($this->arGlyphsVowel, $prevChar, 0) !==false) {
$prevChar=$chars[$i - 3];
}
}
$Reversed=false;
$flip_arr=')]>}';
$ReversedChr='([<{';
if ($crntChar && mb_strpos($flip_arr, $crntChar, 0) !==false) {
$crntChar=$ReversedChr[mb_strpos($flip_arr, $crntChar, 0)];
$Reversed=true;
} else {
$Reversed=false;
}
if ($crntChar && !$Reversed && (mb_strpos($ReversedChr, $crntChar, 0) !==false)) {
$crntChar=$flip_arr[mb_strpos($ReversedChr, $crntChar, 0)];
}
if (ord($crntChar) < 128) {
$output  .=$crntChar;
$nextChar=$crntChar;
continue;
}
if (
$crntChar=='ل' && isset($chars[$i + 1])
&& (mb_strpos('آأإا', $chars[$i + 1], 0) !==false)
) {
continue;
}
if ($crntChar && mb_strpos($this->arGlyphsVowel, $crntChar, 0) !==false) {
if (
isset($chars[$i + 1])
&& (mb_strpos($this->arGlyphsNextLink, $chars[$i + 1], 0) !==false)
&& (mb_strpos($this->arGlyphsPrevLink, $prevChar, 0) !==false)
) {
$output .='&#x' . $this->getArGlyphs($crntChar, 1) . ';';
} else {
$output .='&#x' . $this->getArGlyphs($crntChar, 0) . ';';
}
continue;
}
$form=0;
if (
($prevChar=='لا' || $prevChar=='لآ' || $prevChar=='لأ'
|| $prevChar=='لإ' || $prevChar=='ل')
&& (mb_strpos('آأإا', $crntChar, 0) !==false)
) {
if (mb_strpos($this->arGlyphsPrevLink, $chars[$i - 2], 0) !==false) {
$form++;
}
if (mb_strpos($this->arGlyphsVowel, $chars[$i - 1], 0)) {
$output .='&#x';
$output .=$this->getArGlyphs($crntChar, $form) . ';';
} else {
$output .='&#x';
$output .=$this->getArGlyphs($prevChar . $crntChar, $form) . ';';
}
$nextChar=$prevChar;
continue;
}
if ($prevChar && mb_strpos($this->arGlyphsPrevLink, $prevChar, 0) !==false) {
$form++;
}
if ($nextChar && mb_strpos($this->arGlyphsNextLink, $nextChar, 0) !==false) {
$form +=2;
}
$output  .='&#x' . $this->getArGlyphs($crntChar, $form) . ';';
$nextChar=$crntChar;
}
$output=$this->arGlyphsDecodeEntities($output, $exclude=array('&'));
return $output;
}
public function utf8Glyphs($str, $max_chars=50, $hindo=true)
{
$str=str_replace(array("\r\n", "\n", "\r"), " \n ", $str);
$str=str_replace("\t", "        ", $str);
$lines=array();
$words=explode(' ', $str);
$w_count=count($words);
$c_chars=0;
$c_words=array();
$english=array();
$en_index=-1;
$en_words=array();
$en_stack=array();
for ($i=0; $i < $w_count; $i++) {
$pattern='/^(\n?)';
$pattern .='[a-z\d\\/\@\#\$\%\^\&\*\(\)\_\~\"\'\[\]\{\}\;\,\|\-\.\:!]*';
$pattern .='([\.\:\+\=\-\!،؟]?)$/i';
if (preg_match($pattern, $words[$i], $matches)) {
if ($matches[1]) {
$words[$i]=mb_substr($words[$i], 1, mb_strlen($words[$i])) . $matches[1];
}
if ($matches[2]) {
$words[$i]=$matches[2] . mb_substr($words[$i], 0, -1);
}
$words[$i]=strrev($words[$i]);
$english[]=$words[$i];
if ($en_index==-1) {
$en_index=$i;
}
$en_words[]=true;
} elseif ($en_index !=-1) {
$en_count=count($english);
for ($j=0; $j < $en_count; $j++) {
$words[$en_index + $j]=$english[$en_count - 1 - $j];
}
$en_index=-1;
$english=array();
$en_words[]=false;
} else {
$en_words[]=false;
}
}
if ($en_index !=-1) {
$en_count=count($english);
for ($j=0; $j < $en_count; $j++) {
$words[$en_index + $j]=$english[$en_count - 1 - $j];
}
}
$en_start=false;
if ($en_start) {
$last=true;
$from=0;
$key=0;
foreach ($en_words as $key=> $value) {
if ($last !==$value) {
$to=$key - 1;
$en_stack[]=array($from, $to);
$from=$key;
}
$last=$value;
}
$en_stack[]=array($from, $key);
$new_words=array();
while (list($from, $to)=array_pop($en_stack)) {
for ($i=$from; $i <=$to; $i++) {
$new_words[]=$words[$i];
}
}
$words=$new_words;
}
for ($i=0; $i < $w_count; $i++) {
$w_len=mb_strlen($words[$i]) + 1;
if ($c_chars + $w_len < $max_chars) {
if (mb_strpos($words[$i], "\n", 0) !==false) {
$words_nl=explode("\n", $words[$i]);
$c_words[]=$words_nl[0];
$lines[]=implode(' ', $c_words);
$nl_num=count($words_nl) - 1;
for ($j=1; $j < $nl_num; $j++) {
$lines[]=$words_nl[$j];
}
$c_words=array($words_nl[$nl_num]);
$c_chars=mb_strlen($words_nl[$nl_num]) + 1;
} else {
$c_words[]=$words[$i];
$c_chars +=$w_len;
}
} else {
$lines[]=implode(' ', $c_words);
$c_words=array($words[$i]);
$c_chars=$w_len;
}
}
$lines[]=implode(' ', $c_words);
$maxLine=count($lines);
$output='';
for ($j=$maxLine - 1; $j >=0; $j--) {
$output .=$lines[$j] . "\n";
}
$output=rtrim($output);
$output=$this->arGlyphsPreConvert($output);
if ($hindo) {
$nums=array(
'0', '1', '2', '3', '4',
'5', '6', '7', '8', '9'
);
$arNums=array(
'٠', '١', '٢', '٣', '٤',
'٥', '٦', '٧', '٨', '٩'
);
foreach ($nums as $k=> $v) {
$p_nums[$k]='/' . $v . '/ui';
}
$output=preg_replace($p_nums, $arNums, $output);
foreach ($arNums as $k=> $v) {
$p_arNums[$k]='/([a-z-\d]+)' . $v . '/ui';
}
foreach ($nums as $k=> $v) {
$r_nums[$k]='${1}' . $v;
}
$output=preg_replace($p_arNums, $r_nums, $output);
foreach ($arNums as $k=> $v) {
$p_arNums[$k]='/' . $v . '([a-z-\d]+)/ui';
}
foreach ($nums as $k=> $v) {
$r_nums[$k]=$v . '${1}';
}
$output=preg_replace($p_arNums, $r_nums, $output);
}
return $output;
}
private function arGlyphsDecodeEntities($text, $exclude=array())
{
$table=array_flip(get_html_translation_table(HTML_ENTITIES));
$table=array_map('utf8_encode', $table);
$table['&apos;']="'";
$newtable=array_diff($table, $exclude);
$pieces=explode('&', $text);
$text=array_shift($pieces);
foreach ($pieces as $piece) {
if ($piece[0]=='#') {
if ($piece[1]=='x') {
$one='#x';
} else {
$one='#';
}
} else {
$one='';
}
$end=mb_strpos($piece, ';', 0);
$start=mb_strlen($one);
$two=mb_substr($piece, $start, $end - $start);
if ($one=='' && $two=='') {
$zero='&';
} else {
$zero='&' . $one . $two . ';';
}
$text .=$this->arGlyphsDecodeEntities2($one, $two, $zero, $newtable, $exclude) .
mb_substr($piece, $end + 1, mb_strlen($piece));
}
return $text;
}
private function arGlyphsDecodeEntities2($prefix, $codepoint, $original, &$table, &$exclude)
{
if (!$prefix) {
if (isset($table[$original])) {
return $table[$original];
} else {
return $original;
}
}
if ($prefix=='#x') {
$codepoint=base_convert($codepoint, 16, 10);
}
$str='';
if ($codepoint < 0x80) {
$str=chr((int)$codepoint);
} elseif ($codepoint < 0x800) {
$str=chr(0xC0 | ((int)$codepoint >> 6)) . chr(0x80 | ((int)$codepoint & 0x3F));
} elseif ($codepoint < 0x10000) {
$str=chr(0xE0 | ((int)$codepoint >> 12)) . chr(0x80 | (((int)$codepoint >> 6) & 0x3F)) .
chr(0x80 | ((int)$codepoint & 0x3F));
} elseif ($codepoint < 0x200000) {
$str=chr(0xF0 | ((int)$codepoint >> 18)) . chr(0x80 | (((int)$codepoint >> 12) & 0x3F)) .
chr(0x80 | (((int)$codepoint >> 6) & 0x3F)) . chr(0x80 | ((int)$codepoint & 0x3F));
}
if (in_array($str, $exclude, true)) {
return $original;
} else {
return $str;
}
}
public function setQueryArrFields($arrConfig)
{
if (is_array($arrConfig)) {
$this->arQueryFields=$arrConfig;
}
return $this;
}
public function setQueryStrFields($strConfig)
{
if (is_string($strConfig)) {
$this->arQueryFields=explode(',', $strConfig);
}
return $this;
}
public function setQueryMode($mode)
{
if (in_array($mode, array('0', '1'))) {
$this->arQueryMode=$mode;
}
return $this;
}
public function getQueryMode()
{
return $this->arQueryMode;
}
public function getQueryArrFields()
{
$fields=$this->arQueryFields;
return $fields;
}
public function getQueryStrFields()
{
$fields=implode(',', $this->arQueryFields);
return $fields;
}
public function arQueryWhereCondition($arg)
{
$sql='';
$search=array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
$replace=array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");
$arg=str_replace($search, $replace, $arg);
$phrase=explode("\"", $arg);
if (count($phrase) > 2) {
$arg='';
for ($i=0; $i < count($phrase); $i++) {
$subPhrase=$phrase[$i];
if ($i % 2==0 && $subPhrase !='') {
$arg .=$subPhrase;
} elseif ($i % 2==1 && $subPhrase !='') {
$wordCondition[]=$this->getWordLike($subPhrase);
}
}
}
$words=preg_split('/\s+/', trim($arg));
foreach ($words as $word) {
$exclude=array('(', ')', '[', ']', '{', '}', ',', ';', ':', '?', '!', '،', '؛', '؟');
$word=str_replace($exclude, '', $word);
$wordCondition[]=$this->getWordRegExp($word);
}
if (!empty($wordCondition)) {
if ($this->arQueryMode==0) {
$sql='(' . implode(') OR (', $wordCondition) . ')';
} elseif ($this->arQueryMode==1) {
$sql='(' . implode(') AND (', $wordCondition) . ')';
}
}
return $sql;
}
private function getWordRegExp($arg)
{
$arg=$this->arQueryLex($arg);
$sql=' REPLACE(' . implode(", 'ـ', '') REGEXP '$arg' OR REPLACE(", $this->arQueryFields) .
", 'ـ', '') REGEXP '$arg'";
return $sql;
}
private function getWordLike($arg)
{
$sql=implode(" LIKE '$arg' OR ", $this->arQueryFields) . " LIKE '$arg'";
return $sql;
}
public function arQueryOrderBy($arg)
{
$wordOrder=array();
$phrase=explode("\"", $arg);
if (count($phrase) > 2) {
$arg='';
for ($i=0; $i < count($phrase); $i++) {
if ($i % 2==0 && isset($phrase[$i])) {
$arg .=$phrase[$i];
} elseif ($i % 2==1 && isset($phrase[$i])) {
$wordOrder[]=$this->getWordLike($phrase[$i]);
}
}
}
$words=explode(' ', $arg);
foreach ($words as $word) {
if ($word !='') {
$wordOrder[]='CASE WHEN ' . $this->getWordRegExp($word) . ' THEN 1 ELSE 0 END';
}
}
$order='((' . implode(') + (', $wordOrder) . ')) DESC';
return $order;
}
private function arQueryLex($arg)
{
$arg=preg_replace($this->arQueryLexPatterns, $this->arQueryLexReplacements, $arg);
return $arg;
}
private function arQueryAllWordForms($word)
{
$wordForms=array($word);
$postfix1=array('كم', 'كن', 'نا', 'ها', 'هم', 'هن');
$postfix2=array('ين', 'ون', 'ان', 'ات', 'وا');
if (mb_substr($word, 0, 2)=='ال') {
$word=mb_substr($word, 2, mb_strlen($word));
}
$len=mb_strlen($word);
$wordForms[]=$word;
$str1=mb_substr($word, 0, -1);
$str2=mb_substr($word, 0, -2);
$str3=mb_substr($word, 0, -3);
$last1=mb_substr($word, -1, $len);
$last2=mb_substr($word, -2, $len);
$last3=mb_substr($word, -3, $len);
if ($len >=6 && $last3=='تين') {
$wordForms[]=$str3;
$wordForms[]=$str3 . 'ة';
$wordForms[]=$word . 'ة';
}
if ($len >=6 && ($last3=='كما' || $last3=='هما')) {
$wordForms[]=$str3;
$wordForms[]=$str3 . 'كما';
$wordForms[]=$str3 . 'هما';
}
if ($len >=5 && in_array($last2, $postfix2)) {
$wordForms[]=$str2;
$wordForms[]=$str2 . 'ة';
$wordForms[]=$str2 . 'تين';
foreach ($postfix2 as $postfix) {
$wordForms[]=$str2 . $postfix;
}
}
if ($len >=5 && in_array($last2, $postfix1)) {
$wordForms[]=$str2;
$wordForms[]=$str2 . 'ي';
$wordForms[]=$str2 . 'ك';
$wordForms[]=$str2 . 'كما';
$wordForms[]=$str2 . 'هما';
foreach ($postfix1 as $postfix) {
$wordForms[]=$str2 . $postfix;
}
}
if ($len >=5 && $last2=='ية') {
$wordForms[]=$str1;
$wordForms[]=$str2;
}
if (
($len >=4 && ($last1=='ة' || $last1=='ه' || $last1=='ت'))
|| ($len >=5 && $last2=='ات')
) {
$wordForms[]=$str1;
$wordForms[]=$str1 . 'ة';
$wordForms[]=$str1 . 'ه';
$wordForms[]=$str1 . 'ت';
$wordForms[]=$str1 . 'ات';
}
if ($len >=4 && $last1=='ى') {
$wordForms[]=$str1 . 'ا';
}
$trans=array('أ'=> 'ا', 'إ'=> 'ا', 'آ'=> 'ا');
foreach ($wordForms as $word) {
$normWord=strtr($word, $trans);
if ($normWord !=$word) {
$wordForms[]=$normWord;
}
}
$wordForms=array_unique($wordForms);
return $wordForms;
}
public function arQueryAllForms($arg)
{
$wordForms=array();
$words=explode(' ', $arg);
foreach ($words as $word) {
$wordForms=array_merge($wordForms, $this->arQueryAllWordForms($word));
}
$str=implode(' ', $wordForms);
return $str;
}
public function setSalatDate($m=8, $d=2, $y=1975)
{
if (is_numeric($y) && $y > 0 && $y < 3000) {
$this->salatYear=floor($y);
}
if (is_numeric($m) && $m >=1 && $m <=12) {
$this->salatMonth=floor($m);
}
if (is_numeric($d) && $d >=1 && $d <=31) {
$this->salatDay=floor($d);
}
return $this;
}
public function setSalatLocation($l1=36.20278, $l2=37.15861, $z=2, $e=0)
{
if (is_numeric($l1) && $l1 >=-180 && $l1 <=180) {
$this->salatLat=$l1;
}
if (is_numeric($l2) && $l2 >=-180 && $l2 <=180) {
$this->salatLong=$l2;
}
if (is_numeric($z) && $z >=-12 && $z <=12) {
$this->salatZone=floor($z);
}
if (is_numeric($e)) {
$this->salatElevation=$e;
}
return $this;
}
public function setSalatConf(
$sch='Shafi',
$sunriseArc=-0.833333,
$ishaArc=-17.5,
$fajrArc=-19.5,
$view='Sunni'
) {
$sch=ucfirst($sch);
if ($sch=='Shafi' || $sch=='Hanafi') {
$this->salatSchool=$sch;
}
if (is_numeric($sunriseArc) && $sunriseArc >=-180 && $sunriseArc <=180) {
$this->salatAB2=$sunriseArc;
}
if (is_numeric($ishaArc) && $ishaArc >=-180 && $ishaArc <=180) {
$this->salatAG2=$ishaArc;
}
if (is_numeric($fajrArc) && $fajrArc >=-180 && $fajrArc <=180) {
$this->salatAJ2=$fajrArc;
}
if ($view=='Sunni' || $view=='Shia') {
$this->salatView=$view;
}
return $this;
}
public function getPrayTime()
{
$unixtimestamp=mktime(0, 0, 0, $this->salatMonth, $this->salatDay, $this->salatYear);
if ($this->salatMonth <=2) {
$year=$this->salatYear - 1;
$month=$this->salatMonth + 12;
} else {
$year=$this->salatYear;
$month=$this->salatMonth;
}
$A=floor($year / 100);
$B=2 - $A + floor($A / 4);
$jd=floor(365.25 * ($year + 4716)) + floor(30.6001 * ($month + 1)) + $this->salatDay + $B - 1524.5;
$d=$jd - 2451545.0;  // jd is the given Julian date
$g=357.529 + 0.98560028 * $d;
$g=$g % 360 + ($g - ceil($g) + 1);
$q=280.459 + 0.98564736 * $d;
$q=$q % 360 + ($q - ceil($q) + 1);
$L=$q + 1.915 * sin(deg2rad($g)) + 0.020 * sin(deg2rad(2 * $g));
$L=$L % 360 + ($L - ceil($L) + 1);
$R=1.00014 - 0.01671 * cos(deg2rad($g)) - 0.00014 * cos(deg2rad(2 * $g));
$e=23.439 - 0.00000036 * $d;
$RA=rad2deg(atan2(cos(deg2rad($e)) * sin(deg2rad($L)), cos(deg2rad($L)))) / 15;
if ($RA < 0) {
$RA=24 + $RA;
}
$D=rad2deg(asin(sin(deg2rad($e)) * sin(deg2rad($L))));
$EqT=($q / 15) - $RA;  // equation of time
$Dhuhr=12 + $this->salatZone - ($this->salatLong / 15) - $EqT;
if ($Dhuhr < 0) {
$Dhuhr=24 + $Dhuhr;
}
$alpha=0.833 + 0.0347 * sqrt($this->salatElevation);
$n=-1 * sin(deg2rad($alpha)) - sin(deg2rad($this->salatLat)) * sin(deg2rad($D));
$d=cos(deg2rad($this->salatLat)) * cos(deg2rad($D));
$Sunrise=$Dhuhr - (1 / 15) * rad2deg(acos($n / $d));
$Sunset=$Dhuhr + (1 / 15) * rad2deg(acos($n / $d));
$n=-1 * sin(deg2rad(abs($this->salatAJ2))) - sin(deg2rad($this->salatLat)) * sin(deg2rad($D));
$Fajr=$Dhuhr - (1 / 15) * rad2deg(acos($n / $d));
$Imsak=$Fajr - (10 / 60);
$n=-1 * sin(deg2rad(abs($this->salatAG2))) - sin(deg2rad($this->salatLat)) * sin(deg2rad($D));
$Isha=$Dhuhr + (1 / 15) * rad2deg(acos($n / $d));
if ($this->salatSchool=='Shafi') {
$n=sin(atan(1 / (1 + tan(deg2rad($this->salatLat - $D))))) -
sin(deg2rad($this->salatLat)) * sin(deg2rad($D));
} else {
$n=sin(atan(1 / (2 + tan(deg2rad($this->salatLat - $D))))) -
sin(deg2rad($this->salatLat)) * sin(deg2rad($D));
}
$Asr=$Dhuhr + (1 / 15) * rad2deg(acos($n / $d));
if ($this->salatView=='Sunni') {
$Maghrib=$Sunset + 2 / 60;
} else {
$n=-1 * sin(deg2rad(4)) - sin(deg2rad($this->salatLat)) * sin(deg2rad($D));
$Maghrib=$Dhuhr + (1 / 15) * rad2deg(acos($n / $d));
}
if ($this->salatView=='Sunni') {
$Midnight=$Sunset + 0.5 * ($Sunrise - $Sunset);
} else {
$Midnight=0.5 * ($Fajr - $Sunset);
}
if ($Midnight > 12) {
$Midnight=$Midnight - 12;
}
$times=array($Fajr, $Sunrise, $Dhuhr, $Asr, $Maghrib, $Isha, $Sunset, $Midnight, $Imsak);
foreach ($times as $index=> $time) {
$hours=floor($time);
$minutes=round(($time - $hours) * 60);
if ($minutes < 10) {
$minutes="0$minutes";
}
$times[$index]="$hours:$minutes";
$times[9][$index]=$unixtimestamp + 3600 * $hours + 60 * $minutes;
if ($index==7 && $hours < 6) {
$times[9][$index] +=24 * 3600;
}
}
return $times;
}
public function getQibla()
{
$K_latitude=21.423333;
$K_longitude=39.823333;
$latitude=$this->salatLat;
$longitude=$this->salatLong;
$numerator=sin(deg2rad($K_longitude - $longitude));
$denominator=(cos(deg2rad($latitude)) * tan(deg2rad($K_latitude))) -
(sin(deg2rad($latitude)) * cos(deg2rad($K_longitude - $longitude)));
$q=atan($numerator / $denominator);
$q=rad2deg($q);
if ($this->salatLat > 21.423333) {
$q +=180;
}
return $q;
}
public function dms2dd($value)
{
$pattern="/(\d{1,2})°((\d{1,2})')?((\d{1,2})\")?([NSEW])/i";
preg_match($pattern, $value, $matches);
$degree=$matches[1] + ($matches[3] / 60) + ($matches[5] / 3600);
$direction=strtoupper($matches[6]);
if ($direction=='S' || $direction=='W') {
$degree=-1 * $degree;
}
return $degree;
}
public function dd2dms($value)
{
if ($value < 0) {
$value=abs($value);
$dd='-';
} else {
$dd='';
}
$degrees=(int)$value;
$minutes=(int)(($value - $degrees) * 60);
$seconds=round(((($value - $degrees) * 60) - $minutes) * 60, 4);
if ($degrees > 0) {
$dd .=$degrees . '°';
}
if ($minutes >=10) {
$dd .=$minutes . '\'';
} else {
$dd .='0' . $minutes . '\'';
}
if ($seconds >=10) {
$dd .=$seconds . '"';
} else {
$dd .='0' . $seconds . '"';
}
return $dd;
}
public function arSummaryLoadExtra()
{
$extra_words=file($this->rootDirectory . '/data/ar_stopwords_extra.txt');
$extra_words=array_map('trim', $extra_words);
$this->arSummaryCommonWords=array_merge($this->arSummaryCommonWords, $extra_words);
}
public function arSummary($str, $keywords, $int, $mode, $output, $style=null)
{
preg_match_all("/[^\.\n\،\؛\,\;](.+?)[\.\n\،\؛\,\;]/u", $str, $sentences);
$_sentences=$sentences[0];
if ($mode==1) {
$str=preg_replace("/\s{2,}/u", ' ', $str);
$totalChars=mb_strlen($str);
$totalSentences=count($_sentences);
$maxChars=round($int * $totalChars / 100);
$int=round($int * $totalSentences / 100);
} else {
$maxChars=99999;
}
$summary='';
$str=strip_tags($str);
$normalizedStr=$this->arNormalize($str);
$cleanedStr=$this->arCleanCommon($normalizedStr);
$stemStr=$this->arDraftStem($cleanedStr);
preg_match_all("/[^\.\n\،\؛\,\;](.+?)[\.\n\،\؛\,\;]/u", $stemStr, $sentences);
$_stemmedSentences=$sentences[0];
$wordRanks=$this->arSummaryRankWords($stemStr);
if ($keywords) {
$keywords=$this->arNormalize($keywords);
$keywords=$this->arDraftStem($keywords);
$words=explode(' ', $keywords);
foreach ($words as $word) {
$wordRanks[$word]=1000;
}
}
$sentencesRanks=$this->arSummaryRankSentences($_sentences, $_stemmedSentences, $wordRanks);
list($sentences, $ranks)=$sentencesRanks;
$minRank=$this->arSummaryMinAcceptedRank($sentences, $ranks, $int, $maxChars);
$totalSentences=count($ranks);
for ($i=0; $i < $totalSentences; $i++) {
if ($sentencesRanks[1][$i] >=$minRank) {
if ($output==1) {
$summary .=' ' . $sentencesRanks[0][$i];
} else {
$summary .='<span class="' . $style . '">' . $sentencesRanks[0][$i] . '</span>';
}
} else {
if ($output==2) {
$summary .=$sentencesRanks[0][$i];
}
}
}
if ($output==2) {
$summary=str_replace("\n", '<br />', $summary);
}
return $summary;
}
public function arSummaryKeywords($str, $int)
{
$patterns=array();
$replacements=array();
$metaKeywords='';
$patterns[]='/\.|\n|\،|\؛|\(|\[|\{|\)|\]|\}|\,|\;/u';
$replacements[]=' ';
$str=preg_replace($patterns, $replacements, $str);
$normalizedStr=$this->arNormalize($str);
$cleanedStr=$this->arCleanCommon($normalizedStr);
$str=preg_replace('/(\W)ال(\w{3,})/u', '\\1\\2', $cleanedStr);
$str=preg_replace('/(\W)وال(\w{3,})/u', '\\1\\2', $str);
$str=preg_replace('/(\w{3,})هما(\W)/u', '\\1\\2', $str);
$str=preg_replace('/(\w{3,})كما(\W)/u', '\\1\\2', $str);
$str=preg_replace('/(\w{3,})تين(\W)/u', '\\1\\2', $str);
$str=preg_replace('/(\w{3,})هم(\W)/u', '\\1\\2', $str);
$str=preg_replace('/(\w{3,})هن(\W)/u', '\\1\\2', $str);
$str=preg_replace('/(\w{3,})ها(\W)/u', '\\1\\2', $str);
$str=preg_replace('/(\w{3,})نا(\W)/u', '\\1\\2', $str);
$str=preg_replace('/(\w{3,})ني(\W)/u', '\\1\\2', $str);
$str=preg_replace('/(\w{3,})كم(\W)/u', '\\1\\2', $str);
$str=preg_replace('/(\w{3,})تم(\W)/u', '\\1\\2', $str);
$str=preg_replace('/(\w{3,})كن(\W)/u', '\\1\\2', $str);
$str=preg_replace('/(\w{3,})ات(\W)/u', '\\1\\2', $str);
$str=preg_replace('/(\w{3,})ين(\W)/u', '\\1\\2', $str);
$str=preg_replace('/(\w{3,})تن(\W)/u', '\\1\\2', $str);
$str=preg_replace('/(\w{3,})ون(\W)/u', '\\1\\2', $str);
$str=preg_replace('/(\w{3,})ان(\W)/u', '\\1\\2', $str);
$str=preg_replace('/(\w{3,})تا(\W)/u', '\\1\\2', $str);
$str=preg_replace('/(\w{3,})وا(\W)/u', '\\1\\2', $str);
$str=preg_replace('/(\w{3,})ة(\W)/u', '\\1\\2', $str);
$stemStr=preg_replace('/(\W)\w{1,3}(\W)/u', '\\2', $str);
$wordRanks=$this->arSummaryRankWords($stemStr);
arsort($wordRanks, SORT_NUMERIC);
$i=1;
foreach ($wordRanks as $key=> $value) {
if ($this->arSummaryAcceptedWord($key)) {
$metaKeywords .=$key . '، ';
$i++;
}
if ($i > $int) {
break;
}
}
$metaKeywords=mb_substr($metaKeywords, 0, -2);
return $metaKeywords;
}
private function arNormalize($str)
{
$str=str_replace($this->arNormalizeAlef, 'ا', $str);
$str=str_replace($this->arNormalizeDiacritics, '', $str);
$str=strtr($str, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz');
return $str;
}
private function arCleanCommon($str)
{
$str=str_replace($this->arSummaryCommonWords, ' ', $str);
return $str;
}
private function arDraftStem($str)
{
$str=str_replace($this->arCommonChars, '', $str);
return $str;
}
private function arSummaryRankWords($str)
{
$wordsRanks=array();
$str=str_replace($this->arSeparators, ' ', $str);
$words=preg_split("/[\s,]+/u", $str);
foreach ($words as $word) {
if (isset($wordsRanks[$word])) {
$wordsRanks[$word]++;
} else {
$wordsRanks[$word]=1;
}
}
foreach ($wordsRanks as $wordRank=> $total) {
if (mb_substr($wordRank, 0, 1)=='و') {
$subWordRank=mb_substr($wordRank, 1, mb_strlen($wordRank) - 1);
if (isset($wordsRanks[$subWordRank])) {
unset($wordsRanks[$wordRank]);
$wordsRanks[$subWordRank] +=$total;
}
}
}
return $wordsRanks;
}
private function arSummaryRankSentences($sentences, $stemmedSentences, $arr)
{
$sentenceArr=array();
$rankArr=array();
$max=count($sentences);
for ($i=0; $i < $max; $i++) {
$sentence=$sentences[$i];
$w=0;
$first=mb_substr($sentence, 0, 1);
$last=mb_substr($sentence, -1, 1);
if ($first=="\n") {
$w +=3;
} elseif (in_array($first, $this->arSeparators, true)) {
$w +=2;
} else {
$w +=1;
}
if ($last=="\n") {
$w +=3;
} elseif (in_array($last, $this->arSeparators, true)) {
$w +=2;
} else {
$w +=1;
}
foreach ($this->arSummaryImportantWords as $word) {
if ($word !='') {
$w +=substr_count($sentence, $word);
}
}
$_sentence=mb_substr($sentence, 0, -1);
$sentence=mb_substr($_sentence, 1, mb_strlen($_sentence));
if (!in_array($first, $this->arSeparators, true)) {
$sentence=$first . $sentence;
}
$stemStr=$stemmedSentences[$i];
$stemStr=mb_substr($stemStr, 0, -1);
$words=preg_split("/[\s,]+/u", $stemStr);
$totalWords=count($words);
if ($totalWords > 4) {
$totalWordsRank=0;
foreach ($words as $word) {
if (isset($arr[$word])) {
$totalWordsRank +=$arr[$word];
}
}
$wordsRank=$totalWordsRank / $totalWords;
$sentenceRanks=$w * $wordsRank;
$sentenceArr[]=$sentence . $last;
$rankArr[]=$sentenceRanks;
}
}
$sentencesRanks=array($sentenceArr, $rankArr);
return $sentencesRanks;
}
private function arSummaryMinAcceptedRank($str, $arr, $int, $max)
{
$len=array();
foreach ($str as $line) {
$len[]=mb_strlen($line);
}
rsort($arr, SORT_NUMERIC);
$totalChars=0;
$minRank=0;
for ($i=0; $i <=$int; $i++) {
if (!isset($arr[$i])) {
$minRank=0;
break;
}
$totalChars +=$len[$i];
if ($totalChars >=$max) {
$minRank=$arr[$i];
break;
}
$minRank=$arr[$i];
}
return $minRank;
}
private function arSummaryAcceptedWord($word)
{
$accept=true;
if (mb_strlen($word) < 3) {
$accept=false;
}
return $accept;
}
public function arIdentify($str)
{
$minAr=55436;
$maxAr=55698;
$probAr=false;
$arFlag=false;
$arRef=array();
$max=strlen($str);
$i=-1;
while (++$i < $max) {
$cDec=ord($str[$i]);
if ($cDec >=33 && $cDec <=58) {
#continue;
}
if (!$probAr && ($cDec==216 || $cDec==217)) {
$probAr=true;
continue;
}
if ($i > 0) {
$pDec=ord($str[$i - 1]);
} else {
$pDec=null;
}
if ($probAr) {
$utfDecCode=($pDec << 8) + $cDec;
if ($utfDecCode >=$minAr && $utfDecCode <=$maxAr) {
if (!$arFlag) {
$arFlag=true;
$arRef[]=$i - 1;
}
} else {
if ($arFlag) {
$arFlag=false;
$arRef[]=$i - 1;
}
}
$probAr=false;
continue;
}
if ($arFlag && !preg_match("/^\s$/", $str[$i])) {
$arFlag=false;
$arRef[]=$i;
}
}
return $arRef;
}
public function isArabic($str)
{
$isArabic=false;
$arr=$this->arIdentify($str);
if (count($arr)==1 && $arr[0]==0) {
$isArabic=true;
}
return $isArabic;
}
}
