<?php
error_reporting(E_ALL);

header("Content-type: image/jpeg");

if (isset($_GET['day'])) {
    $day  = (int) $_GET['day'];
} else {
    $day = 24;
}

$all  = ImageCreateFromJPEG('./images/moon.jpg');
$moon = ImageCreateTrueColor(50, 50);

if ($day > 29 || $day < 1) {
    $day = 1;
}
$day--;
ImageCopyResampled($moon, $all, 0, 0, $day*50, 0, 50, 50, 50, 50);

ImageJPEG($moon, null, 80);

ImageDestroy($all);
ImageDestroy($moon);
?>