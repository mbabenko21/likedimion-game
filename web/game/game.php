<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 03.12.2015
 * Time: 15:20
 */
if(isset($_COOKIE["LD"])) {
    if(isset($_SESSION["aid"])){
        if($G->locations->count() < 1){
            require_once ROOT_DIR."/data/blank.php";
        }
        $player = $G->players->findOne(["_id" => new MongoId($_SESSION["aid"])]);
        if(!is_null($player)) {
            $action = $_GET["game"];
            if (file_exists(ROOT_DIR . "/game/g_" . $action . ".php")) {
                require ROOT_DIR . "/game/g_" . $action . ".php";
            } else {
                require ROOT_DIR . "/site/404.php";
            }
            $player["last_action"] = microtime();
            $G->players->update(["_id" => new MongoId($player["_id"])], $player);
        } else {
            $_SESSION = [];
            header("Location: ".Routes::getRoute("CABINET"));
        }
    } else {
        header("Location: ".Routes::getRoute("CABINET"));
    }
} else {
    header("Location: ".Routes::getRoute("MAIN_PAGE"));
}