<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Parse about any Arabic textual datetime description into a Unix timestamp</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>

<body>

<div class="Paragraph" dir="rtl">
<h2 dir="ltr">Example Output:</h2>
<?php

error_reporting(E_STRICT);

date_default_timezone_set('UTC');
$time = time();

echo date('l dS F Y', $time);
echo '<br /><br />';

/*
  // Autoload files using Composer autoload
  require_once __DIR__ . '/../vendor/autoload.php';
*/

require '../src/Arabic.php';
$Arabic = new \ArPHP\I18N\Arabic();

$str  = 'الخميس القادم';
$int  = $Arabic->strtotime($str, $time);
$date = date('l dS F Y', $int);
echo "$str - $int - $date<br /><br />";

$str  = 'الأحد الماضي';
$int  = $Arabic->strtotime($str, $time);
$date = date('l dS F Y', $int);
echo "$str - $int - $date<br /><br />";

$str  = 'بعد أسبوع و ثلاثة أيام';
$int  = $Arabic->strtotime($str, $time);
$date = date('l dS F Y', $int);
echo "$str - $int - $date<br /><br />";

$str  = 'منذ تسعة أيام';
$int  = $Arabic->strtotime($str, $time);
$date = date('l dS F Y', $int);
echo "$str - $int - $date<br /><br />";

$str  = 'قبل إسبوعين';
$int  = $Arabic->strtotime($str, $time);
$date = date('l dS F Y', $int);
echo "$str - $int - $date<br /><br />";

$str  = '2 آب 1975';
$int  = $Arabic->strtotime($str, $time);
$date = date('l dS F Y', $int);
echo "$str - $int - $date<br /><br />";

$str  = '1 رمضان 1429';
$int  = $Arabic->strtotime($str, $time);
$date = date('l dS F Y', $int);
echo "$str - $int - $date<br /><br />";
?>
</div><br />
<div class="Paragraph">
<h2>Example Code:</h2>
<?php
$code = <<< END
<?php
    date_default_timezone_set('UTC');
    \$time = time();

    echo date('l dS F Y', \$time);
    echo '<br /><br />';

	\$Arabic = new \\ArPHP\\I18N\\Arabic();

    \$str  = 'الخميس القادم';
    \$int  = \$Arabic->strtotime(\$str, \$time);
    \$date = date('l dS F Y', \$int);
    echo "\$str - \$int - \$date<br /><br />";
    
    \$str  = 'الأحد الماضي';
    \$int  = \$Arabic->strtotime(\$str, \$time);
    \$date = date('l dS F Y', \$int);
    echo "\$str - \$int - \$date<br /><br />";
    
    \$str  = 'بعد أسبوع و ثلاثة أيام';
    \$int  = \$Arabic->strtotime(\$str, \$time);
    \$date = date('l dS F Y', \$int);
    echo "\$str - \$int - \$date<br /><br />";
    
    \$str  = 'منذ تسعة أيام';
    \$int  = \$Arabic->strtotime(\$str, \$time);
    \$date = date('l dS F Y', \$int);
    echo "\$str - \$int - \$date<br /><br />";
    
    \$str  = 'قبل إسبوعين';
    \$int  = \$Arabic->strtotime(\$str, \$time);
    \$date = date('l dS F Y', \$int);
    echo "\$str - \$int - \$date<br /><br />";
    
    \$str  = '2 آب 1975';
    \$int  = \$Arabic->strtotime(\$str, \$time);
    \$date = date('l dS F Y', \$int);
    echo "\$str - \$int - \$date<br /><br />";

    \$str  = '1 رمضان 1429';
    \$int  = \$Arabic->strtotime(\$str, \$time);
    \$date = date('l dS F Y', \$int);
    echo "\$str - \$int - \$date<br /><br />";
END;

highlight_string($code);
?>
</div>
</body>
</html>
