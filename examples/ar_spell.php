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
<h2 dir="ltr" id="example-1">
<a href="#example-1" class="anchor"><img src="./images/link_icon.png" width="16" border="0"></a>ASC Demo in ArPHP</h2>
<?php

error_reporting(0);

require '../src/Arabic.php';

$Arabic = new \ArPHP\I18N\Arabic();

$text = "
والان وصلت الحوسبه الكمومية التي تعتمد على فيزياء الكم. نعم هي في المرحلة التجريبية ولكن إذا نجحت مشاريع كمبيوتراتها فستكون هذه الآلات قوية للغاية.
 ولكن لو تركت بدون تنظيم وتم تطبيقها في حياتنا اليومية، فربما تكون خطرا آخرا يهدد حياتنا وكوكبنا. 
 
 المذرشة
 الدرمسة
 الدمرسة
 المدسرة
";




$y = $Arabic->spellSuggestCorrections("المذرشة");

echo "<pre>";
print_r($y);
echo "</pre>";

echo "<hr>";

$y = $Arabic->spellCheck($text);

echo "<pre>";
print_r($y);
echo "</pre>";

echo "<hr>";

$y = $Arabic->spellSuggestCorrectionsText($text);

echo "<pre>";
print_r($y);
echo "</pre>";

echo "<hr>";

?>
<hr/>

</div>
<footer><i>المُصحِّح - Arabic Spell Checker</i></footer>
</body>
</html>
