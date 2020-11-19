<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>English-Arabic Transliteration</title>
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

$en_terms = array('George Bush', 'Paul Wolfowitz', 'Silvio Berlusconi?',
    'Guantanamo', 'Arizona', 'Maryland', 'Oracle', 'Yahoo', 'Google',
    'Formula1', 'Boeing', 'Caviar', 'Telephone', 'Internet', "Côte d'Ivoire");

echo <<< END
<center>
  <table border="0" cellspacing="2" cellpadding="5" width="500">
    <tr>
      <td bgcolor="#27509D" align="center" width="150">
        <b>
          <font color="#ffffff">
            English<br />(sample input)
          </font>
        </b>
      </td>
      <td bgcolor="#27509D" align="center" width="150">
        <b>
          <font color="#ffffff" face="Tahoma">
            Arabic<br />(auto generated)
          </font>
        </b>
      </td>
    </tr>
END;

foreach ($en_terms as $term) {
    echo '<tr><td bgcolor="#f5f5f5" align="left">'.$term.'</td>';
    echo '<td bgcolor="#f5f5f5" align="right"><font face="Tahoma">';
    echo $Arabic->en2ar($term);
    echo '</font></td></tr>';
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

    \$en_terms = array('George Bush', 'Paul Wolfowitz', 'Silvio Berlusconi?',
        'Guantanamo', 'Arizona', 'Maryland', 'Oracle', 'Yahoo', 'Google',
        'Formula1', 'Boeing', 'Caviar', 'Telephone', 'Internet', "Côte d'Ivoire");

    echo <<< END
<center>
  <table border="0" cellspacing="2" cellpadding="5" width="500">
    <tr>
      <td bgcolor="#27509D" align="center" width="150">
        <b>
          <font color="#ffffff">
            English<br />(sample input)
          </font>
        </b>
      </td>
      <td bgcolor="#27509D" align="center" width="150">
        <b>
          <font color="#ffffff" face="Tahoma">
            Arabic<br />(auto generated)
          </font>
        </b>
      </td>
    </tr>
END;

    foreach (\$en_terms as \$term) {
        echo '<tr><td bgcolor="#f5f5f5" align="left">'.\$term.'</td>';
        echo '<td bgcolor="#f5f5f5" align="right"><font face="Tahoma">';
        echo \$Arabic->en2ar(\$term);
        echo '</font></td></tr>';
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
