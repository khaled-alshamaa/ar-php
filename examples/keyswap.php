<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Convert keyboard language programmatically (English - Arabic)</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>

<body>

<div class="Paragraph" dir="rtl">
<h2 dir="ltr">Example Output 1 (a):</h2>
<?php
error_reporting(E_STRICT);
$time_start = microtime(true);

/*
  // Autoload files using Composer autoload
  require_once __DIR__ . '/../vendor/autoload.php';
*/

require '../src/arabic.php';
$Arabic = new \ArPHP\I18N\Arabic();

$str = "Hpf lk hgkhs hglj'vtdkK Hpf hg`dk dldg,k f;gdjil Ygn
,p]hkdm hgHl,v tb drt,k ljv]]dk fdk krdqdk>";
echo "<u><i>Before - English Keyboard:</i></u><br />$str<br /><br />";

$text = $Arabic->swapEa($str);
echo "<u><i>After:</i></u><br />$text<br /><br />";

?>
</div><br />
<div class="Paragraph">
<h2>Example Code 1 (a):</h2>
<?php
$code = <<< END
<?php
    \$Arabic = new \\ArPHP\\I18N\\Arabic();

    \$str = "Hpf lk hgkhs hglj'vtdkK Hpf hg`dk dldg,k f;gdjil Ygn
    ,p]hkdm hgHl,v tb drt,k ljv]]dk fdk krdqdk>";
    echo "<u><i>Before - English Keyboard:</i></u><br />\$str<br /><br />";
    
    \$text = \$Arabic->swapEa(\$str);
    echo "<u><i>After:</i></u><br />\$text<br /><br />";
?>
END;

highlight_string($code);

?>
</div>
<br />
<div class="Paragraph" dir="rtl">
<h2 dir="ltr">Example Output 1 (b):</h2>
<?php
$str = 'Hpf lk hgkhs hgljùvtdkK Hpf hg²dk dldg;k fmgdjil Ygn 
;p$hkd, hgHl;v tb drt;k ljv$$dk fdk krdadk/';
echo "<u><i>Before - French Keyboard:</i></u><br />$str<br /><br />";

$text = $Arabic->swapFa($str);
echo "<u><i>After:</i></u><br />$text<br /><br /><b>جبران خليل جبران</b>";

?>
</div><br />
<div class="Paragraph">
<h2>Example Code 1 (b):</h2>
<?php
$code = <<< END
<?php
    \$Arabic = new \\ArPHP\\I18N\\Arabic();

    \$str = 'Hpf lk hgkhs hgljùvtdkK Hpf hg²dk dldg;k fmgdjil Ygn 
    ;p\$hkd, hgHl;v tb drt;k ljv\$\$dk fdk krdadk/';
    echo "<u><i>Before - French Keyboard:</i></u><br />\$str<br /><br />";

    \$text = \$Arabic->swapFa(\$str);
    echo "<u><i>After:</i></u><br />\$text<br /><br /><b>جبران خليل جبران</b>";
?>
END;

highlight_string($code);

?>
</div>
<br />
<div class="Paragraph">
<h2 dir="ltr">Example Output 2:</h2>
<?php
    $str = "ِىغ هىفثممهلثىف بخخم ؤشى ةشنث فاهىلس لاهللثق ةخقث ؤخةحمثء شىي ةخقث رهخمثىفز ÷ف فشنثس ش فخعؤا خب لثىهعس شىي ش مخف خب ؤخعقشلث فخ ةخرث هى فاث خححخسهفث يهقثؤفهخىز";
    echo "<u><i>Before:</i></u><br />$str<br /><br />";
    
    $text = $Arabic->swapAe($str);
    echo "<u><i>After:</i></u><br />$text<br /><br /><b>Albert Einstein</b>";
?>

</div><br />
<div class="Paragraph">
<h2>Example Code 2:</h2>
<?php
$code = <<< END
<?php
    \$Arabic = new \\ArPHP\\I18N\\Arabic();
    
    \$str = "ِىغ هىفثممهلثىف بخخم ؤشى ةشنث فاهىلس لاهللثق ةخقث ؤخةحمثء شىي ةخقث رهخمثىفز ÷ف فشنثس ش فخعؤا خب لثىهعس شىي ش مخف خب ؤخعقشلث فخ ةخرث هى فاث خححخسهفث يهقثؤفهخىز";
    
    echo "<u><i>Before:</i></u><br />\$str<br /><br />";
    
    \$text = \$Arabic->swapAe(\$str);
    echo "<u><i>After:</i></u><br />\$text<br /><br /><b>Albert Einstein</b>";
?>
END;

highlight_string($code);

?>
</div>
<br />
<div class="Paragraph">
<h2 dir="ltr">Example Output 3:</h2>
<?php
    $examples = array("ff'z g;k fefhj", "FF'Z G;K FEFHJ", 'ٍمخصمغ لاعف سعقثمغ', 'sLOWLY BUT SURELY');

    foreach ($examples as $example) {
        $fix = $Arabic->fixKeyboardLang($example);

        echo '<font color="red">' . $example . '</font> => ';
        echo '<font color="blue">' . $fix . '</font><br />';
    }
?>

</div><br />
<div class="Paragraph">
<h2>Example Code 3:</h2>
<?php
$code = <<< END
<?php
    \$Arabic = new \\ArPHP\\I18N\\Arabic();
    
    \$examples = array("ff'z g;k fefhj", "FF'Z G;K FEFHJ", 'ٍمخصمغ لاعف سعقثمغ', 'sLOWLY BUT SURELY');

    foreach (\$examples as \$example) {
        \$fix = \$Arabic->fixKeyboardLang(\$example);

        echo '<font color="red">' . \$example . '</font> => ';
        echo '<font color="blue">' . \$fix . '</font><br />';
    }
?>
END;

highlight_string($code);

$time_end = microtime(true);
$time = $time_end - $time_start;

echo "<hr />Total execution time is $time seconds<br />\n";
echo 'Amount of memory allocated to this script is ' . memory_get_usage() . ' bytes';

?>
</div>
</body>
</html>
