<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Arabic Text ArStandard</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>

<body>

<div class="Paragraph">
<h2>Arabic Text Standardize:</h2>
<p align="justified">Standardize Arabic text just like rules followed in magazines and newspapers like 
spaces before and after punctuations, brackets and units etc ...</p>
</div><br />

<div class="Paragraph" dir="rtl">
<h2 dir="ltr">Example Output:</h2>
<?php
error_reporting(E_STRICT);

/*
  // Autoload files using Composer autoload
  require_once __DIR__ . '/../vendor/autoload.php';
*/

require '../src/Arabic.php';
$Arabic = new \ArPHP\I18N\Arabic();

$content = <<<END
هذا نص عربي ، و فيه علامات ترقيم بحاجة إلى ضبط و معايرة !و كذلك نصوص( بين 
أقواس )أو حتى مؤطرة"بإشارات إقتباس "أو- علامات إعتراض -الخ......
<br>
لذا ستكون هذه المكتبة أداة و وسيلة لمعالجة مثل هكذا حالات، بما فيها الواحدات 1 
Kg أو مثلا MB 16 وسواها حتى النسب المؤية مثل 20% أو %50 وهكذا ...
END;

    $str = $Arabic->standard($content);

    echo '<b>Origenal:</b>';
    echo '<p dir="rtl" align="justify">';
    echo $content . '</p>';
    
    echo '<b>Standard:</b>';
    echo '<p dir="rtl" align="justify">';
    echo $str . '</p>';
?>

</div><br />
<div class="Paragraph">
<h2>Example Code:</h2>
<?php
$code = <<< ENDALL
<?php
	\$Arabic = new \\ArPHP\\I18N\\Arabic();
    
    \$content = <<<END
هذا نص عربي ، و فيه علامات ترقيم بحاجة إلى ضبط و معايرة !و كذلك نصوص( بين 
أقواس )أو حتى مؤطرة"بإشارات إقتباس "أو- علامات إعتراض -الخ......
<br>
لذا ستكون هذه المكتبة أداة و وسيلة لمعالجة مثل هكذا حالات، بما فيها الواحدات 1 
Kg أو مثلا MB 16 وسواها حتى النسب المؤية مثل 20% أو %50 وهكذا ...
END;

    \$str = \$Arabic->standard(\$content);
    
    echo '<b>Origenal:</b>';
    echo '<p dir="rtl" align="justify">';
    echo \$content . '</p>';
    
    echo '<b>Standard:</b>';
    echo '<p dir="rtl" align="justify">';
    echo \$str . '</p>';
ENDALL;

highlight_string($code);
?>
</div><br />

<div class="Paragraph" dir="rtl">
<h2 dir="ltr">Example Output:</h2>
<?php
$content = <<<END
إذا رُمتَ أنْ تَحيا سَليماً مِن الأذى
...
وَ دينُكَ مَوفورٌ وعِرْضُكَ صَيِنُّ
<br />
لِســـــــانُكَ لا تَذكُرْ بِهِ عَورَةَ امرئٍ
...
فَكُلُّكَ عَوراتٌ وللنّاسِ ألسُنُ
END;
    
    echo '<b>Origenal</b>';
    echo '<p dir="rtl" align="justify">';
    echo $content . '</p>';

    $str1 = $Arabic->stripHarakat($content);
    
    echo '<hr /><b>Strip All Harakat</b>';
    echo '<p dir="rtl" align="justify">';
    echo $str1 . '</p>';

    $str2 = $Arabic->stripHarakat($content, FALSE, FALSE, FALSE, FALSE);
    
    echo '<hr /><b>Strip Harakat but Tatweel, Tanwen, Shadda, and Last Harakat</b>';
    echo '<p dir="rtl" align="justify">';
    echo $str2 . '</p>';
?>

</div><br />
<div class="Paragraph">
<h2>Example Code:</h2>
<?php
$code = <<< ENDALL
<?php
	\$Arabic = new \\ArPHP\\I18N\\Arabic();
    
\$content = <<<END
إذا رُمتَ أنْ تَحيا سَليماً مِن الأذى
...
وَ دينُكَ مَوفورٌ وعِرْضُكَ صَيِنُّ
<br />
لِســـــــانُكَ لا تَذكُرْ بِهِ عَورَةَ امرئٍ
...
فَكُلُّكَ عَوراتٌ وللنّاسِ ألسُنُ
END;
    
    echo '<b>Origenal</b>';
    echo '<p dir="rtl" align="justify">';
    echo \$content . '</p>';

    \$str1 = \$Arabic->stripHarakat(\$content);
    
    echo '<hr /><b>Strip All Harakat</b>';
    echo '<p dir="rtl" align="justify">';
    echo \$str1 . '</p>';

    \$str2 = \$Arabic->stripHarakat(\$content, FALSE, FALSE, FALSE, FALSE);
    
    echo '<hr /><b>Strip Harakat but Tatweel, Tanwen, Shadda, and Last Harakat</b>';
    echo '<p dir="rtl" align="justify">';
    echo \$str2 . '</p>';
ENDALL;

highlight_string($code);
?>
</div>
<footer><i><a href="https://github.com/khaled-alshamaa/ar-php">Ar-PHP</a>, an open-source library for website developers to process Arabic content</i></footer>
</body>
</html>
