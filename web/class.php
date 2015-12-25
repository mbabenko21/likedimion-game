<?php
error_reporting(E_ALL);
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 25.12.2015
 * Time: 1:53
 */
// файл и новый размер
$filename = 'public/class_'.$_GET["c"].".png";
$level = (!empty($_GET["l"])) ? $_GET["l"] : 1;
$text = "ур. ".$level;
$font = 'public/9567.ttf';
if(file_exists($filename)) {
    $percent = 0.5;

// тип содержимого
    header('Content-Type: image/png');

// получение нового размера
    list($width, $height) = getimagesize($filename);
    $newwidth = 32;
    $newheight = 32;
    $white = imagecolorallocate($im, 255, 255, 255);
    $grey = imagecolorallocate($im, 128, 128, 128);
    $black = imagecolorallocate($im, 0, 0, 0);

// загрузка
    $thumb = imagecreatetruecolor($newwidth, $newheight);
    $source = imagecreatefrompng($filename);
    imagefilledrectangle($im, 0, 0, 32, 32, $white);
// изменение размера
    imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    //imagettftext($thumb, 12, 0, 11, 21, $grey, $font, $text);
    //imagettftext($thumb, 12, 0, 10, 20, $black, $font, $text);

// вывод
    imagepng($thumb);
    imagedestroy($thumb);
} else {
    // Тип содержимого
    header('Content-Type: image/png');

// Создание изображения
    $im = imagecreatetruecolor(32, 32);

// Создание цветов
    $white = imagecolorallocate($im, 255, 255, 255);
    $grey = imagecolorallocate($im, 128, 128, 128);
    $black = imagecolorallocate($im, 0, 0, 0);
    imagefilledrectangle($im, 0, 0, 399, 29, $white);

// Текст надписи

// Замена пути к шрифту на пользовательский


// Тень
    imagettftext($im, 8, 0, 11, 21, $grey, $font, $text);

// Текст
    imagettftext($im, 8, 0, 10, 20, $black, $font, $text);

    imagepng($im);
    imagedestroy($im);
}