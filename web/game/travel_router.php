<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 25.12.2015
 * Time: 21:25
 */

if($_GET["go"]){
    require "go.php";
}

if($_GET["section"]){
    $file = __DIR__."/travel/s_".$_GET["section"].".php";
    if(file_exists($file)){
        require_once $file;
    }
}