<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>المُصحِّح - Arabic Spell Checker</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>

<body>

<br />

<div class="Paragraph">
<h2 dir="ltr" >ASC (المُصحِّح) Demo in ArPHP</h2>
    <p align="justified">

        The ASC (المُصحِّح) package in ArPHP Library adds fast, reliable spell-checking to web sites and intranets.
        <br>
        Our spell checker comes in two versions: an open source, bundled with ArPHP, and a paid extended version.
        <br>
        The bundle features:
        <ul>
        <li>A high Performance spelling engine which can be scaled to large user bases.
        <li>Pspell support to provide spell checking for more languages
        <li>LanguageTool Support for style and grammar checking (Extended Version)
        <li>Advanced spell checking support for space and 2ED errors (Extended Version)
    </ul>

    <br>

    For more information please contact info@arabicspellchecker.com


    </p>
</div>

<?php

error_reporting(0);

require '../src/Arabic.php';

$Arabic = new \ArPHP\I18N\Arabic();
//<a href="#example-1" class="anchor"><img src="./images/link_icon.png" width="16" border="0"></a>

$text = "
والان وصلت الحوسبه الكمومية التي تعتمد على فيزياء الكم. نعم هي في المرحلة التجريبية ولكن إذا نجحت مشاريع كمبيوتراتها فستكون هذه الآلات قوية للغاية.
 ولكن لو تركت بدون تنظيم وتم تطبيقها في حياتنا اليومية، فربما تكون خطرا آخرا يهدد حياتنا وكوكبنا. 

";

$y = $Arabic->spellGetMisspelled($text);



//echo "<hr>";

//$y = $Arabic->spellSuggestCorrectionsText($text);

/*echo "<pre>";
print_r($y);
echo "</pre>";

echo "<hr>";*/

?>

<br>

<div class="Paragraph">
    <h2 dir="ltr" >Example output 1</h2>
    <p align="justified">
        <pre>
// Extract candidate misspelled words from a text
<?php print_r($y); ?>
        </pre>
    </pre>
</div>

<br>

<div class="Paragraph">
    <h2 dir="ltr" >Example output 2</h2>
    <p align="justified">
    <pre>
// Get candidate misspelled words and their correction suggestions
<?php
$y = $Arabic->spellSuggestCorrections($text);

print_r($y);
?>
        </pre>
</div>

<?php
$code ='
<?php

require \'../src/Arabic.php\';

$Arabic = new \ArPHP\I18N\Arabic();

$text = "
والان وصلت الحوسبه الكمومية التي تعتمد على فيزياء الكم. نعم هي في المرحلة التجريبية ولكن إذا نجحت مشاريع كمبيوتراتها فستكون هذه الآلات قوية للغاية.
 ولكن لو تركت بدون تنظيم وتم تطبيقها في حياتنا اليومية، فربما تكون خطرا آخرا يهدد حياتنا وكوكبنا. 

";

$misspelled = $Arabic->spellGetMisspelled($text);
print_r($misspelled);
';
?>

<div class="Paragraph">
    <h2 dir="ltr" >Example output 2</h2>
    <p align="justified">
        <?php
        highlight_string($code);
        ?>
    </p>
</div>


<footer><i>المُصحِّح - Arabic Spell Checker</i></footer>
</body>
</html>
