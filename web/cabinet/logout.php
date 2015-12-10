<?php
if(!defined('ROOT')){header("Location: /?");}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 06.12.2015
 * Time: 19:40
 */

if(isset($_SESSION["aid"])){
    unset($_SESSION["aid"]);
}

if(isset($_SESSION["pid"])){
    unset($_SESSION["pid"]);
}

header("Location: /?");