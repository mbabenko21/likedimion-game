<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 07.12.2015
 * Time: 13:52
 */
require "./resize_crop.php";


$coord = explode(".", $_GET["loc"]);
$src = __DIR__."/public/".$coord[0].".png";
if(file_exists($src)) {
    crop($src, array($coord[1] - 50, $coord[2], 320, 240), false);
} else {
    // Тип содержимого
    header('Content-Type: image/png');

// Создание изображения
    $im = imagecreatetruecolor(400, 30);

// Создание цветов
    $white = imagecolorallocate($im, 255, 255, 255);
    $grey = imagecolorallocate($im, 128, 128, 128);
    $black = imagecolorallocate($im, 0, 0, 0);
    imagefilledrectangle($im, 0, 0, 399, 29, $white);

// Текст надписи
    $text = 'Карта данной области недоступна.';
// Замена пути к шрифту на пользовательский
    $font = 'public/9567.ttf';

// Тень
    imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);

// Текст
    imagettftext($im, 20, 0, 10, 20, $black, $font, $text);

    imagepng($im);
    imagedestroy($im);
}
