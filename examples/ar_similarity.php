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

<p></p>

<div class="Paragraph">
<h2 dir="ltr" id="example-1">
<a href="#example-1" class="anchor"><img src="./images/link_icon.png" width="16" border="0"></a>Example Output 1:</h2>
<?php

error_reporting(E_ALL);

/*
  // Autoload files using Composer autoload
  require_once __DIR__ . '/../vendor/autoload.php';
*/

require '../src/Arabic.php';
$Arabic = new \ArPHP\I18N\Arabic();

$Arabic->setSimilarityWeight('keyboardWeight', 1)
	   ->setSimilarityWeight('graphicWeight', 1)
	   ->setSimilarityWeight('phoneticWeight', 1);

echo "<p>";

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
