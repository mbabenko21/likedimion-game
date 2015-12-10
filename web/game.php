<?php
if(!defined('ROOT')){header("Location: /?");}
$account = $ld->accounts->findOne(["_id" => $_SESSION["aid"]]);
if(!isset($_SESSION["pid"])){
    require ROOT . "/game/cabinet.php";
} else {

    $loc_i = [];
    $fName = ROOT."/game/".$_GET["game"].".php";
    if(file_exists($fName)){
        require $fName;
    } else {
        require "404.php";
    }

}