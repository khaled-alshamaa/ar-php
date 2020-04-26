<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Arabic/Islamic Date and Calendar</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>

<body>

<div class="Paragraph" dir="rtl">
<h2 dir="ltr">Example Output:</h2>
<?php

error_reporting(E_STRICT);
$time_start = microtime(true);

date_default_timezone_set('GMT');
$time = time();

echo date('l j F Y h:i:s A', $time);
echo '<br /><br />';

/*
  // Autoload files using Composer autoload
  require_once __DIR__ . '/../vendor/autoload.php';
*/

require '../src/arabic.php';
$Arabic = new \ArPHP\I18N\Arabic();

$correction = $Arabic->dateCorrection($time);
echo $Arabic->date('l j F Y h:i:s A', $time, $correction);

$day = $Arabic->date('j', $time, $correction);
echo ' [<a href="moon.php?day='.$day.'" target=_blank>القمر الليلة</a>]';
echo '<br /><br />';

$Arabic->setDateMode(8);
echo $Arabic->date('l j F Y h:i:s A', $time, $correction);
echo '<br /><br />';

$Arabic->setDateMode(2);
echo $Arabic->date('l j F Y h:i:s A', $time);
echo '<br /><br />';

$Arabic->setDateMode(3);
echo $Arabic->date('l j F Y h:i:s A', $time);
echo '<br /><br />';

$Arabic->setDateMode(4);
echo $Arabic->date('l j F Y h:i:s A', $time);
echo '<br /><br />';

$Arabic->setDateMode(5);
echo $Arabic->date('l j F Y h:i:s A', $time);
echo '<br /><br />';

$Arabic->setDateMode(6);
echo $Arabic->date('l j F Y h:i:s A', $time);
echo '<br /><br />';

$Arabic->setDateMode(7);
echo $Arabic->date('l j F Y h:i:s A', $time);

?>
</div><br />
<div class="Paragraph">
<h2>Example Code:</h2>
<?php
$code = <<< END
<?php
    date_default_timezone_set('GMT');
    \$time = time();

    echo date('l j F Y h:i:s A', \$time);
    echo '<br /><br />';

	\$Arabic = new \\ArPHP\\I18N\\Arabic();

    \$correction = \$Arabic->dateCorrection (\$time);
    echo \$Arabic->date('l j F Y h:i:s A', \$time, \$correction);
	echo '<br /><br />';

	\$Arabic->setDateMode(8);
	echo \$Arabic->date('l j F Y h:i:s A', \$time, \$correction);
	echo '<br /><br />';

    \$Arabic->setDateMode(2);
    echo \$Arabic->date('l j F Y h:i:s A', \$time);
    echo '<br /><br />';
    
    \$Arabic->setDateMode(3);
    echo \$Arabic->date('l j F Y h:i:s A', \$time);
    echo '<br /><br />';

    \$Arabic->setDateMode(4);
    echo \$Arabic->date('l j F Y h:i:s A', \$time);
    echo '<br /><br />';

    \$Arabic->setDateMode(5);
    echo \$Arabic->date('l j F Y h:i:s A', \$time);
    echo '<br /><br />';

    \$Arabic->setDateMode(6);
    echo \$Arabic->date('l j F Y h:i:s A', \$time);
    echo '<br /><br />';

    \$Arabic->setDateMode(7);
    echo \$Arabic->date('l j F Y h:i:s A', \$time);
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