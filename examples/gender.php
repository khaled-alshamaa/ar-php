<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Arabic Gender Guesser</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>

<body>

<div class="Paragraph">
<h2>Example Output:</h2>
<?php

error_reporting(E_STRICT);
$time_start = microtime(true);

/*
  // Autoload files using Composer autoload
  require_once __DIR__ . '/../vendor/autoload.php';
*/

require '../src/arabic.php';
$Arabic = new \ArPHP\I18N\Arabic();

$names = array('أحمد بشتو','أحمد منصور','الحبيب الغريبي','المعز بو لحية',
                  'توفيق طه','جلنار موسى','جمال  ريان','جمانة نمور',
                  'جميل عازر','حسن جمول','حيدر عبد الحق','خالد صالح',
                  'خديجة بن قنة','ربى خليل','رشا عارف','روزي عبده',
                  'سمير سمرين','صهيب الملكاوي','عبد الصمد ناصر','علي الظفيري',
                  'فرح البرقاوي','فيروز زياني','فيصل القاسم','لونه الشبل',
                  'ليلى الشايب','لينا زهر الدين','محمد البنعلي',
                  'محمد الكواري','محمد خير البوريني','محمد كريشان',
                  'منقذ العلي','منى سلمان','ناجي سليمان','نديم الملاح',
                  'وهيبة بوحلايس');

echo <<< END
<center>
  <table border="0" cellspacing="2" cellpadding="5" width="60%">
    <tr>
      <td colspan="2">
        <b>Al Jazeera Reporters (Class Example):</b>
      </td>
    </tr>
    <tr>
      <td bgcolor="#27509D" align="center" width="50%">
        <b><font color="#ffffff">Name (sample input)</font></b>
      </td>
      <td bgcolor="#27509D" align="center" width="50%">
        <b><font color="#ffffff">Gender (auto generated)</font></b>
      </td>
    </tr>
END;

foreach ($names as $name) {
    if ($Arabic->isFemale($name) == true) {
        $gender  = 'Female';
        $bgcolor = '#FFF0FF';
    } else {
        $gender = 'Male';
        $bgcolor = '#E0F0FF';
    }
    echo '<tr><td bgcolor="'.$bgcolor.'" align="center">';
    echo '<font face="Tahoma">'.$name.'</font></td>';
    echo '<td bgcolor="'.$bgcolor.'" align="center">'.$gender.'</td></tr>';
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

    \$names = array('أحمد بشتو','أحمد منصور','الحبيب الغريبي','المعز بو لحية',
                      'توفيق طه','جلنار موسى','جمال  ريان','جمانة نمور',
                      'جميل عازر','حسن جمول','حيدر عبد الحق','خالد صالح',
                      'خديجة بن قنة','ربى خليل','رشا عارف','روزي عبده',
                      'سمير سمرين','صهيب الملكاوي','عبد الصمد ناصر','علي الظفيري',
                      'فرح البرقاوي','فيروز زياني','فيصل القاسم','لونه الشبل',
                      'ليلى الشايب','لينا زهر الدين','محمد البنعلي',
                      'محمد الكواري','محمد خير البوريني','محمد كريشان',
                      'منقذ العلي','منى سلمان','ناجي سليمان','نديم الملاح',
                      'وهيبة بوحلايس');

    echo <<< END
<center>
  <table border="0" cellspacing="2" cellpadding="5" width="60%">
    <tr>
      <td colspan="2">
        <b>Al Jazeera Reporters (Class Example):</b>
      </td>
    </tr>
    <tr>
      <td bgcolor="#27509D" align="center" width="50%">
        <b><font color="#ffffff">Name (sample input)</font></b>
      </td>
      <td bgcolor="#27509D" align="center" width="50%">
        <b><font color="#ffffff">Gender (auto generated)</font></b>
      </td>
    </tr>
END;

    foreach (\$names as \$name) {
        if (\$Arabic->isFemale(\$name) == true) { 
           \$gender  = 'Female';
           \$bgcolor = '#FFF0FF';
        } else {
           \$gender = 'Male';
           \$bgcolor = '#E0F0FF';
        }
        echo '<tr><td bgcolor="'.\$bgcolor.'" align="center">';
        echo '<font face="Tahoma">'.\$name.'</font></td>';
        echo '<td bgcolor="'.\$bgcolor.'" align="center">'.\$gender.'</td></tr>';
    }

    echo '</table></center>';
ENDALL;

highlight_string($code);

$time_end = microtime(true);
$time = $time_end - $time_start;

echo "<hr />Total execution time is $time seconds<br />\n";
echo 'Amount of memory allocated to this script is ' . memory_get_usage() . ' bytes';
?>
</div>
</body>
</html>
