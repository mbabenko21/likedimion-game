<?php
if(!defined('ROOT')){header("Location: /?");}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 06.12.2015
 * Time: 15:56
 */
use Likedimion\Helper\View;
$sid = session_id();
if(empty($_GET["cb"])) {
    $cabinet = "main";
} else {
    $cabinet = $_GET["cb"];
}

if(file_exists(ROOT."/cabinet/".$cabinet.".php")){
    require ROOT."/cabinet/".$cabinet.".php";
} else {
    require ROOT . "/404.php";
}
//View::display($page, "кабинет");