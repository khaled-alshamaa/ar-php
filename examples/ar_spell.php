<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>المُصحِّح - Arabic Spell Checker</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>

<body>

<div class="Paragraph">
<h2>ASC (المُصحِّح) Demo in ArPHP</h2>
    <p align="justified">
        The ASC (المُصحِّح) package in ArPHP Library adds fast, reliable spell-checking to web sites and intranets.<br/>
        Our spell checker comes in two versions: an open source, bundled with ArPHP, and a paid extended version.<br/>
        The bundle features:
        <ul>
			<li>A high Performance spelling engine which can be scaled to large user bases.</li>
			<li>Pspell support to provide spell checking for more languages.</li>
			<li>LanguageTool Support for style and grammar checking (Extended Version).</li>
			<li>Advanced spell checking support for space and 2ED errors (Extended Version).</li>
		</ul>
		<br/>For more information please contact info@arabicspellchecker.com
    </p>
</div><br />

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

$text = <<< END
والان وصلت الحوسبه الكمومية التي تعاتمد على فيزياء الكم. نعم هي في المرحلة التجريبية، ولكن إذا نجحت فستكون هذه الآلات قوية للغاية.
لكن لو تركت تطبيقاتها بدون تتظيم وتم تطبيقها في على أرض الواقع، فربما تكون مصدرا لخظر آخر يهدد حياتنا وكوكبنا. 
END;

echo "<p align=justified dir=rtl>$text</p>";

$y = $Arabic->spellGetMisspelled($text);

echo "<b>Extract candidate misspelled words from a text:</b><pre>";
print_r($y);
echo "</pre>";

$y = $Arabic->spellSuggestCorrections($text);

echo "<b>Get candidate misspelled words and their correction suggestions:</b><pre>";
print_r($y);
echo "</pre>";
?>
</div><br />

<div class="Paragraph">
<h2 dir="ltr">Example Code 1:</h2>
<?php
$code = <<< ENDALL
<?php
	\$Arabic = new \\ArPHP\\I18N\\Arabic();

	\$text = <<< END
	والان وصلت الحوسبه الكمومية التي تعاتمد على فيزياء الكم. نعم هي في المرحلة التجريبية، ولكن إذا نجحت فستكون هذه الآلات قوية للغاية.
	لكن لو تركت تطبيقاتها بدون تتظيم وتم تطبيقها في على أرض الواقع، فربما تكون مصدرا لخظر آخر يهدد حياتنا وكوكبنا. 
	END;

	echo "<p align=justified dir=rtl>\$text</p>";

	\$y = \$Arabic->spellGetMisspelled(\$text);

	echo "<b>Extract candidate misspelled words from a text:</b><pre>";
	print_r(\$y);
	echo "</pre>";

	\$y = \$Arabic->spellSuggestCorrections(\$text);

	echo "<b>Get candidate misspelled words and their correction suggestions:</b><pre>";
	print_r(\$y);
	echo "</pre>";
	?>
ENDALL;

highlight_string($code);
?>
<hr/><i>Related Documentation: 
<a href="https://khaled-alshamaa.github.io/ar-php/classes/ArPHP-I18N-Arabic.html#method_spellGetMisspelled" target="_blank">spellGetMisspelled</a> and 
<a href="https://khaled-alshamaa.github.io/ar-php/classes/ArPHP-I18N-Arabic.html#method_spellSuggestCorrections" target="_blank">spellSuggestCorrections</a> 
</i>
</div>
<footer><i><a href="https://github.com/khaled-alshamaa/ar-php">Ar-PHP</a>, an open-source library for website developers to process Arabic content</i></footer>
</body>
</html>
