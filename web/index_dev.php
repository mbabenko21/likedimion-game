<?php
define("ROOT", __DIR__);
error_reporting(E_WARNING|E_ERROR);
require "../vendor/autoload.php";
require "config.php";
require ROOT."/../data/lang.php";
$magic = require ROOT . "/../data/magic.php";
require "dispatcher.php";
//session_start();
$l_info = [];
$l_timers = [];
if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
}

$mongoClient = new MongoClient('mongodb://localhost:27017');
$ld = $mongoClient->likedimion;

$admin = "mbabenko21@gmail.com";


//\Likedimion\Helper\View::display("Hello!!!", "World");
if(isset($_SESSION["aid"]) and isset($_SESSION["pid"])) {
    require "./game/main.php";
} elseif(isset($_SESSION["aid"]) and !isset($_SESSION["pid"])){
    require "./cabinet.php";
} else {
    require "./site.php";
}

//session_destroy();