<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 03.12.2015
 * Time: 20:33
 */
$page = "";
if (!$_GET["aid"]) {
    $actor = $player;
} else {
    try {
        $actor = $G->player->findOne(["_id" => new MongoId($_GET["aid"])]);
    } catch(MongoException $e){
        $actor = $player;
    }
    if (!$actor) {
        $actor = $player;
    }
}
if($actor["loc"] == $player["loc"]){
    $title = $actor["title"];
    $page .= msg('race_'.$actor["race"]."_".$actor["sex"]).",".msg('class_'.$actor["class"]);
} else {
    $title = "Ошибка";
    $page.="Не накого смотреть";
}
$page.='<div class="hr"></div> <a class="button button_info upper" href="{route}GAME_MAIN{/route}">в игру</a>';
display($page, $title);

