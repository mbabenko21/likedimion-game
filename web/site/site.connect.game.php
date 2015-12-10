<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 03.12.2015
 * Time: 15:23
 */
if(!isset($_SESSION["aid"])){
    $actor = $G->players->findOne(["_id" => new MongoId($_GET["aid"])]);
    if(!is_null($actor)){
        $_SESSION["aid"] = $_GET["aid"];
        header("Location: ".Routes::getRoute('GAME_MAIN'));
    } else {
        $page = <<<EOF
<p>Такого персонажа не существует</p>
<div class="hr"></div>
<input value="назад" type="button" class="button button_notice upper" onclick="history.back()"/>
EOF;
        ;

        display($page, "Ошибка");
    }
} else {
    header("Location: ".Routes::getRoute('GAME_MAIN'));
}