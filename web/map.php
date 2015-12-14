<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 07.12.2015
 * Time: 13:52
 */
require "./resize_crop.php";


$coord = explode(".", $_GET["loc"]);
$src = "public/".$coord[0].".png";

crop($src, array($coord[1]-50, $coord[2], 240, 320),false);
