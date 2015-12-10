<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 06.12.2015
 * Time: 15:58
 */
use Likedimion\Helper\View;

if (!defined('ROOT')) {
    header("Location: /?");
}
$adminSession = false;
if (empty($_GET["game"])) {
    $_GET["game"] = "travel";
}
if (!empty($_GET["admin"])) {
    $adminSession = true;
}
$player = $ld->players->findOne(["_id" => $_SESSION["pid"]]);
if($player) {
    $playerHelper = new \Likedimion\Helper\PlayerHelper($player);
    $playerHelper->setDispatcher($eventDispatcher);
    $playerHelper->calcParams();
    $loc_i = [];
    if (false === $adminSession) {
        $fName = ROOT . "/game/" . $_GET["game"] . ".php";
        if (file_exists($fName)) {
            require $fName;
        } else {
            require ROOT . "/404.php";
        }
    } elseif ($player["role"] == \Likedimion\Game::ROLE_ADMIN) {
        $fName = ROOT . "/admin/" . $_GET["admin"] . ".php";
        if (file_exists($fName)) {
            require $fName;
        } else {
            require ROOT . "/404.php";
        }
    } else {
        require ROOT . "/503.php";
    }

    $playerHelper->calcParams();
    if(!$ld->players->update(["_id" => $_SESSION["pid"]], $playerHelper->getPlayer())){
        throw new MongoException("Not update");
    };
} else {
    if($_SESSION["pid"]){
        unset($_SESSION["pid"]);
    }

    header("Location: /?");
}