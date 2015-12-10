<?php
if (!defined('ROOT')) {
    header("Location: /?");
}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 07.12.2015
 * Time: 12:06
 */

if(empty($_GET["l"])){
    $_GET["l"] = "main";
}

$fName = ROOT . "/admin/locations/" . $_GET["l"] . ".php";
if (file_exists($fName)) {
    require $fName;
} else {
    require ROOT . "/404.php";
}