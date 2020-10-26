<?php
    error_reporting(E_STRICT);
    $time_start = microtime(true);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Arabic Query Class</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>

<body>

<div class="Paragraph" dir="rtl">
<h2 dir="ltr">Example Output:</h2>
    <font face="Tahoma" size="2">
    <form action="ar_query.php" method="GET" name="search">
        إبحث عن (Search for): <input type="text" name="keyword" value="<?php echo $_GET['keyword']; ?>"> 
        <input type="submit" value="بحث (Go)" name="submit" />
         (مثال: فلسطينيون)<br />
        <blockquote><blockquote><blockquote>
            <input type="radio" name="mode" value="0" <?php if ($_GET['mode'] == '0' || !isset($_GET['mode'])) echo "checked"; ?> /> أي من الكلمات (Any word)
            <input type="radio" name="mode" value="1" <?php if ($_GET['mode'] == '1') echo "checked"; ?> /> كل الكلمات (All words)
        </blockquote></blockquote></blockquote>
    </form>

<?php if (!isset($_GET['keyword'])) { $_GET['keyword'] = 'فلسطينيون'; } ?>
    <hr />
    نتائج البحث عن (Results of) <b><?php echo $_GET['keyword']; ?></b>:<br />
<?php
    /*
      // Autoload files using Composer autoload
      require_once __DIR__ . '/../vendor/autoload.php';
    */

    require '../src/arabic.php';
    $Arabic = new \ArPHP\I18N\Arabic();
        
    echo $Arabic->arQueryAllForms($_GET['keyword']);
    $keyword = $_GET['keyword'];
    $keyword = str_replace('\"', '"', $keyword);

    $Arabic->setQueryStrFields('field');
    $Arabic->setQueryMode($_GET['mode']);

    $strCondition = $Arabic->arQueryWhereCondition($keyword);
    $strOrderBy   = $Arabic->arQueryOrderBy($keyword);

    $StrSQL = "SELECT `field` FROM `table` WHERE $strCondition ORDER BY $strOrderBy";
?>

    <hr />
    صيغة استعلام قاعدة البيانات <span dir="ltr">(SQL Query Statement)</span>
    <br /><textarea dir="ltr" align="left" cols="80" rows="4"><?php echo $StrSQL; ?></textarea>

</div><br />
<div class="Paragraph">
<h2>Example Code:</h2>
<?php
$code = <<< END
<?php
    \$Arabic = new \\ArPHP\\I18N\\Arabic();
        
    echo \$Arabic->arQueryAllForms(\$_GET['keyword']);
    \$keyword = \$_GET['keyword'];
    \$keyword = str_replace('\\"', '"', \$keyword);

    \$Arabic->setQueryStrFields('field');
    \$Arabic->setQueryMode(\$_GET['mode']);

    \$strCondition = \$Arabic->arQueryWhereCondition(\$keyword);
    \$strOrderBy   = \$Arabic->arQueryOrderBy(\$keyword);

    \$SQL = "SELECT `field` FROM `table` WHERE \$strCondition ORDER BY \$strOrderBy";
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
