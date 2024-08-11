<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Arabic Dialect Identification</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>

<body>

<div class="Paragraph">
<h2>Arabic Dialect Identification:</h2>

<p>Arabic is a rich language with a wide collection of dialects in addition to Modern Standard Arabic (MSA).
Arabic dialects differ in various ways from MSA. These include phonological, morphological, lexical, and 
syntactic differences. Although, in theory, Arabic dialects can be classified in various ways, categorizations 
of Arabic dialects remain arbitrary and primarily based on geographical divisions. Dialect identification 
is the task of automatically detecting the source variety of a given text or speech segment.</p>

<p>MSA is the only variety that is standardized, regulated, and taught in schools, necessitated by its use 
in written communication and formal venues. The regional dialects, used primarily for day-to-day dealings 
and spoken communication, remain somewhat absent from written communication compared with MSA. One domain 
of written communication in which both MSA and dialectal Arabic are commonly used is the online domain: 
Dialectal Arabic has a strong presence in blogs, forums, chatrooms, and user/reader commentary.</p>
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

$sentences = array('الله، هو إيه أصله ده',
                   'ليش عم تحكي هيك يا بعدي',
                   'ما أبغي أسمع حاجة زود',
				   'يعيشك، إحنا نحبوك بالزاف');

echo <<< END
<center>
  <table border="0" cellspacing="2" cellpadding="5" width="60%" dir="rtl">
    <tr>
      <td bgcolor="#27509D" align="center" width="50%">
        <b><font color="#ffffff">Arabic Sentence (sample input)</font></b>
      </td>
      <td bgcolor="#27509D" align="center" width="25%">
        <b><font color="#ffffff">Dialect (auto generated)</font></b>
      </td>
      <td bgcolor="#27509D" align="center" width="25%">
        <b><font color="#ffffff">Probability (auto generated)</font></b>
      </td>
    </tr>
END;

foreach ($sentences as $sentence) {
    $analysis = $Arabic->arDialect($sentence);

	switch ($analysis['dialect']) {
		case 'Egyptian':
			$dialect = 'Egyptian - مصري';
			break;
		case 'Levantine':
			$dialect = 'Levantine - شامي';
			break;
		case 'Maghrebi':
			$dialect = 'Maghrebi - مغاربي';
			break;
		case 'Peninsular':
			$dialect = 'Peninsular - خليجي';
			break;
	}
    
    $probability = sprintf('%0.1f', round(100 * $analysis['probability'], 1));
    
    echo '<tr><td bgcolor="#f5f5f5" align="right">';
    echo '<font face="Tahoma">'.$sentence.'</font></td>';
    echo '<td bgcolor="#f5f5f5" align="center">'.$dialect.'</td>';
    echo '<td bgcolor="#f5f5f5" align="center">'.$probability.'%</td></tr>';
}

echo '</table></center>';
?>
</div><br />

<div class="Paragraph">
<h2 dir="ltr">Example Code 1:</h2>
<?php
$code = <<< ENDALL
<?php
	\$Arabic = new \\ArPHP\\I18N\\Arabic();

	\$sentences = array('الله، هو إيه أصله ده',
					   'ليش عم تحكي هيك يا بعدي',
					   'ما أبغي أسمع حاجة زود',
					   'يعيشك، إحنا نحبوك بالزاف');

	echo <<< END
	<center>
	  <table border="0" cellspacing="2" cellpadding="5" width="60%" dir="rtl">
		<tr>
		  <td bgcolor="#27509D" align="center" width="50%">
			<b><font color="#ffffff">Arabic Sentence (sample input)</font></b>
		  </td>
		  <td bgcolor="#27509D" align="center" width="25%">
			<b><font color="#ffffff">Dialect (auto generated)</font></b>
		  </td>
		  <td bgcolor="#27509D" align="center" width="25%">
			<b><font color="#ffffff">Probability (auto generated)</font></b>
		  </td>
		</tr>
	END;

	foreach (\$sentences as \$sentence) {
		\$analysis = \$Arabic->arDialect(\$sentence);

		switch (\$analysis['dialect']) {
			case 'Egyptian':
				\$dialect = 'Egyptian - مصري';
				break;
			case 'Levantine':
				\$dialect = 'Levantine - شامي';
				break;
			case 'Maghrebi':
				\$dialect = 'Maghrebi - مغاربي';
				break;
			case 'Peninsular':
				\$dialect = 'Peninsular - خليجي';
				break;
		}
		
		\$probability = sprintf('%0.1f', round(100 * \$analysis['probability'], 1));
		
		echo '<tr><td bgcolor="#f5f5f5" align="right">';
		echo '<font face="Tahoma">'.\$sentence.'</font></td>';
		echo '<td bgcolor="#f5f5f5" align="center">'.\$dialect.'</td>';
		echo '<td bgcolor="#f5f5f5" align="center">'.\$probability.'%</td></tr>';
	}

	echo '</table></center>';
ENDALL;

highlight_string($code);
?>
<hr/><i>Related Documentation: 
<a href="https://khaled-alshamaa.github.io/ar-php/classes/ArPHP-I18N-Arabic.html#method_arDialect" target="_blank">arDialect</a>
</i>
</div>
<footer><i><a href="https://github.com/khaled-alshamaa/ar-php">Ar-PHP</a>, an open-source library for website developers to process Arabic content</i></footer>
</body>
</html>
