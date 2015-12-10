<?php
if (!defined('ROOT')) {
    header("Location: /?");
}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 10.12.2015
 * Time: 21:03
 */
if($_GET["pid"]){
    $player = $ld->players->findOne(["_id" => new MongoId($_GET["pid"])]);
}
$title = "Персонаж";
if(!is_null($player)){
    $title = $player["title"]." ".$player["level"]." ур.";
} else {
    $page .= "Не на кого смотреть";
}