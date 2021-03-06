<?php
//error_reporting(E_WARNING|E_ERROR);
define("ROOT", __DIR__);
require "../vendor/autoload.php";
require "config.php";
require ROOT."/../data/lang.php";
$magic = require ROOT . "/../data/magic.php";
//set_error_handler('\\Likedimion\\Helper\\View::errorHandler');
require "dispatcher.php";
define("START_TIME", \Likedimion\Helper\DateHelper::microtimeFloat(microtime()));
//session_start();
$l_info = [];
$l_timers = [];
if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
}

$addr = ($_ENV["ENV"] && $_ENV["ENV"] == "production") ? $config["game"]["mongodb"]["production"] : $config["game"]["mongodb"]["development"];
$mongoClient = new MongoClient($addr);
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