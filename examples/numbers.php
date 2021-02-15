<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Spell numbers in the Arabic idiom</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>

<body>

<div class="Paragraph" dir="rtl">
<h2 dir="ltr">Example Output 1: المعدود مذكر مرفوع</h2>
<?php

error_reporting(E_STRICT);

/*
  // Autoload files using Composer autoload
  require_once __DIR__ . '/../vendor/autoload.php';
*/

require '../src/Arabic.php';
$Arabic = new \ArPHP\I18N\Arabic();

$Arabic->setNumberFeminine(1);
$Arabic->setNumberFormat(1);
           
$integer = 141592653589;

$text = $Arabic->int2str($integer);

echo "<center>$integer<br />$text</center>";
?>

</div><br />
<div class="Paragraph">
<h2>Example Code 1:</h2>
<?php
$code = <<< END
<?php
	\$Arabic = new \\ArPHP\\I18N\\Arabic();

    \$Arabic->setNumberFeminine(1);
    \$Arabic->setNumberFormat(1);

    \$integer = 141592653589;

    \$text = \$Arabic->int2str(\$integer);

    echo "<center>\$integer<br />\$text</center>";
END;

highlight_string($code);

?>
</div>
<br />
<div class="Paragraph" dir="rtl">
<h2 dir="ltr">Example Output 2: المعدود مؤنث منصوب أو مجرور</h2>
<?php
    $Arabic->setNumberFeminine(2);
    $Arabic->setNumberFormat(2);

    $integer = 141592653589;

    $text = $Arabic->int2str($integer);

    echo "<center>$integer<br />$text</center>";
?>

</div><br />
<div class="Paragraph">
<h2>Example Code 2:</h2>
<?php
$code = <<< END
<?php
	\$Arabic = new \\ArPHP\\I18N\\Arabic();

    \$Arabic->setNumberFeminine(2);
    \$Arabic->setNumberFormat(2);

    \$integer = 141592653589;
    
    \$text = \$Arabic->int2str(\$integer);
    
    echo "<center>\$integer<br />\$text</center>";
END;

highlight_string($code);

?>
</div><br />

<div class="Paragraph" dir="rtl">
<h2 dir="ltr">Example Output 3: المعدود مؤنث منصوب أو مجرور وهو سالب بفاصلة عشرية</h2>
<?php
    $Arabic->setNumberFeminine(2);
    $Arabic->setNumberFormat(2);
    
    $integer = '-2749.317';
    
    $text = $Arabic->int2str($integer);
    
    echo "<p dir=ltr align=center>$integer<br />$text</p>";
?>

</div><br />
<div class="Paragraph">
<h2>Example Code 3:</h2>
<?php
$code = <<< END
<?php
	\$Arabic = new \\ArPHP\\I18N\\Arabic();
    
    \$Arabic->setNumberFeminine(2);
    \$Arabic->setNumberFormat(2);
    
    \$integer = '-2749.317';
    
    \$text = \$Arabic->int2str(\$integer);
    
    echo "<p dir=ltr align=center>\$integer<br />\$text</p>";
END;

highlight_string($code);

?>
</div><br />

<div class="Paragraph" dir="rtl">
<h2 dir="ltr">Example Output 4: العملات العربية</h2>
<?php
    $Arabic->setNumberFeminine(1);
    $Arabic->setNumberFormat(1);

    $number = 7.25;
    $text   = $Arabic->money2str($number, 'KWD', 'ar');
    
    echo "<p align=center>$number<br />$text</p>";
?>

</div><br />
<div class="Paragraph">
<h2>Example Code 4:</h2>
<?php
$code = <<< END
<?php
	\$Arabic = new \\ArPHP\\I18N\\Arabic();

    \$Arabic->setNumberFeminine(1);
    \$Arabic->setNumberFormat(1);
    
    \$number = 7.25;
    \$text   = \$Arabic->money2str(\$number, 'KWD', 'ar');
    
    echo "<p align=center>\$number<br />\$text</p>";
END;

highlight_string($code);

?>
</div><br />

<div class="Paragraph" dir="rtl">
<h2 dir="ltr">Example Output 5: صيغ الجمع</h2>
<?php
    $number = 9;
    $text   = $Arabic->arPlural('تعليق', $number);
    $text   = str_replace('%d', $number, $text);
    
    echo "<p align=center>$text</p>";
    
    $number = 16;
    $text   = $Arabic->arPlural('صندوق', $number, 'صندوقان', 'صناديق', 'صندوقا');
    $text   = str_replace('%d', $number, $text);

    echo "<p align=center>$text</p>";
?>

</div><br />
<div class="Paragraph">
<h2>Example Code 5:</h2>
<?php
$code = <<< END
<?php
	\$Arabic = new \\ArPHP\\I18N\\Arabic();

    \$number = 9;
    \$text   = \$Arabic->arPlural('تعليق', \$number);
    \$text   = str_replace('%d', \$number, \$text);
    
    echo "<p align=center>\$text</p>";
    
    \$number = 16;
    \$text   = \$Arabic->arPlural('صندوق', \$number, 'صندوقان', 'صناديق', 'صندوقا');
    \$text   = str_replace('%d', \$number, \$text);

    echo "<p align=center>\$text</p>";
END;

highlight_string($code);

?>
</div><br />

<div class="Paragraph" dir="rtl">
<h2 dir="ltr">Example Output 6: الأرقام الهندية</h2>
<?php
    $text1 = '1975/8/2 9:43 صباحا';
    $text2 = $Arabic->int2indic($text1);
    
    echo "<p align=center>$text1<br />$text2</p>";
?>

</div><br />
<div class="Paragraph">
<h2>Example Code 6:</h2>
<?php
$code = <<< END
<?php
	\$Arabic = new \\ArPHP\\I18N\\Arabic();
    
    \$text1 = '1975/8/2 9:43 صباحا';
    \$text2 = \$Arabic->int2indic(\$text1);
    
    echo "<p align=center>\$text1<br />\$text2</p>";
END;

highlight_string($code);

?>
</div><br />

<div class="Paragraph" dir="rtl">
<h2 dir="ltr">Example Output 7: ترتيب لمعدود مؤنث منصوب أو مجرور</h2>
<?php
    $Arabic->setNumberFeminine(2);
    $Arabic->setNumberFormat(2);
    $Arabic->setNumberOrder(2);
    
    $integer = '17';
    
    $text = $Arabic->int2str($integer);
    
    echo "<p align=center>$integer<br />$text</p>";
?>

</div><br />
<div class="Paragraph">
<h2>Example Code 7:</h2>
<?php
$code = <<< END
<?php
	\$Arabic = new \\ArPHP\\I18N\\Arabic();
    
    \$Arabic->setNumberFeminine(2);
    \$Arabic->setNumberFormat(2);
    \$Arabic->setNumberOrder(2);
    
    \$integer = '17';
    
    \$text = \$Arabic->int2str(\$integer);
    
    echo "<p align=center>\$integer<br />\$text</p>";
END;

highlight_string($code);

?>
</div><br />

<div class="Paragraph" dir="rtl">
<h2 dir="ltr">Example Output 8: تحويل الرقم المكتوب إلى عدد صحيح من جديد</h2>
<?php
    $string  = 'مليار و مئتين و خمسة و ستين مليون و ثلاثمئة و ثمانية و خمسين ألف و تسعمئة و تسعة و سبعين';

    $integer = $Arabic->str2int($string);
    
    echo "<p align=center>$string<br />$integer</p>";
?>

</div><br />
<div class="Paragraph">
<h2>Example Code 8:</h2>
<?php
$code = <<< END
<?php
	\$Arabic = new \\ArPHP\\I18N\\Arabic();
    
    \$string  = 'مليار و مئتين و خمسة و ستين مليون و ثلاثمئة و ثمانية و خمسين ألف و تسعمئة و تسعة و سبعين';

    \$integer = \$Arabic->str2int(\$string);
    
    echo "<p align=center>\$string<br />\$integer</p>";
END;

highlight_string($code);
?>

</div>

</body>
</html>
