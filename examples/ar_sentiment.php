<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Arabic Sentiment Analysis</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>

<body>

<div class="Paragraph">
<h2>Example Output:</h2>
<?php

error_reporting(E_STRICT);

/*
  // Autoload files using Composer autoload
  require_once __DIR__ . '/../vendor/autoload.php';
*/

require '../src/Arabic.php';
$Arabic = new \ArPHP\I18N\Arabic();

$reviews = array('الخدمة كانت بطيئة',
                 'الإطلالة رائعة والطعام لذيذ',
                 'التبريد لا يعمل والواي فاي ضعيفة',
                 'النظافة مميزة وموظفي الاستقبال متعاونين',
                 'جاءت القطعة مكسورة والعلبة مفتوحة',
                 'المنتج مطابق للمواصفات والتسليم سريع');

echo <<< END
<center>
  <table border="0" cellspacing="2" cellpadding="5" width="60%">
    <tr>
      <td bgcolor="#27509D" align="center" width="70%">
        <b><font color="#ffffff">Arabic Review (sample input)</font></b>
      </td>
      <td bgcolor="#27509D" align="center" width="30%">
        <b><font color="#ffffff">Sentiment (auto generated)</font></b>
      </td>
    </tr>
END;

foreach ($reviews as $review) {
    if ($Arabic->arSentiment($review) > 0) {
        $sentiment = 'Positive';
        $bgcolor   = '#E0F0FF';
    } else {
        $sentiment = 'Negative';
        $bgcolor   = '#FFF0FF';
    }
    echo '<tr><td bgcolor="'.$bgcolor.'" align="right">';
    echo '<font face="Tahoma">'.$review.'</font></td>';
    echo '<td bgcolor="'.$bgcolor.'" align="center">'.$sentiment.'</td></tr>';
}

echo '</table></center>';
?>
</div><br />
<div class="Paragraph">
<h2>Example Code:</h2>
<?php
$code = <<< ENDALL
<?php
	\$Arabic = new \\ArPHP\\I18N\\Arabic();

    \$reviews = array('الخدمة كانت بطيئة',
                     'الإطلالة رائعة والطعام لذيذ',
                     'التبريد لا يعمل والواي فاي ضعيفة',
                     'النظافة مميزة وموظفي الاستقبال متعاونين',
                     'جاءت القطعة مكسورة والعلبة مفتوحة',
                     'المنتج مطابق للمواصفات والتسليم سريع');

    echo <<< END
<center>
  <table border="0" cellspacing="2" cellpadding="5" width="60%">
    <tr>
      <td bgcolor="#27509D" align="center" width="70%">
        <b><font color="#ffffff">Arabic Review (sample input)</font></b>
      </td>
      <td bgcolor="#27509D" align="center" width="30%">
        <b><font color="#ffffff">Sentiment (auto generated)</font></b>
      </td>
    </tr>
END;

    foreach (\$reviews as \$review) {
        if (\$Arabic->arSentiment(\$review) > 0) {
            \$sentiment = 'Positive';
            \$bgcolor   = '#E0F0FF';
        } else {
            \$sentiment = 'Negative';
            \$bgcolor   = '#FFF0FF';
        }
        echo '<tr><td bgcolor="'.\$bgcolor.'" align="right">';
        echo '<font face="Tahoma">'.\$review.'</font></td>';
        echo '<td bgcolor="'.\$bgcolor.'" align="center">'.\$sentiment.'</td></tr>';
    }

    echo '</table></center>';
ENDALL;

highlight_string($code);
?>
</div>
</body>
</html>
