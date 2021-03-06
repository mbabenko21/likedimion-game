<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 06.12.2015
 * Time: 15:58
 */
use Likedimion\Game;
use Likedimion\Helper\View;

if (!defined('ROOT')) {
    header("Location: /?");
}
$adminSession = false;

if ($_SESSION["pid"]) {
    Game::init()->setDb($ld);
    Game::init()->setDispatcher(require "event_dispatcher.php");
    Game::init()->setPlayer($_SESSION["pid"]);
    $player = Game::init()->getPlayer();
    $loc = $ld->locations->findOne(["lid" => $player["loc"]]);
    if($loc) {
        $locationHelper = new \Likedimion\Helper\LocationHelper($loc);
        $locationHelper->setCollection($ld->locations);
        Game::init()->addService('loc.helper', $locationHelper);
    }


    if(count($player["event"]) > 0){
        foreach($_GET as $key => $value){
            if(isset($player["event"][$key])){
                $player["event"][$key] = $value;
            }
        }
        $_GET = array_merge($_GET, $player["event"]);
    }
    if (empty($_GET["game"])) {
        $_GET["game"] = "travel";
    }
    if (!empty($_GET["admin"])) {
        $adminSession = true;
    }
    if ($player) {
        $playerHelper = new \Likedimion\Helper\PlayerHelper($player);
        $playerHelper->setCollection($ld->players);
        $supervision = new \Likedimion\Ai\Supervision();
        $supervision->setLocHelper($locationHelper);
        Game::init()->addService('player.helper', $playerHelper);
        Game::init()->addService('supervision', $supervision);
        Game::init()->ai();
        if (!$playerHelper->isTimed("online")) {
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
            } elseif ($player["role"] == \Likedimion\Game::ROLE_ADMIN or $player["role"] == \Likedimion\Game::ROLE_RAZRAB) {
                $fName = ROOT . "/admin/" . $_GET["admin"] . ".php";
                if (file_exists($fName)) {
                    require $fName;
                } else {
                    require ROOT . "/404.php";
                }
            } else {
                require ROOT . "/503.php";
            }
            $playerHelper = Game::init()->getService("player.helper");
            $playerHelper->calcParams();
            $playerHelper->addTimer('last_action', 0)
                ->addTimer("online", $config["online_time"]);

            if (!$ld->players->update(["_id" => $_SESSION["pid"]], $playerHelper->getPlayer())) {
                throw new MongoException("Not update");
            };
        } else {
            $pid = $_SESSION["pid"];
            $locationHelper->removePlayer($_SESSION["pid"])
                ->update();
            $playerHelper->clearJournal()->update();
            $msg = $player["title"] . (($player["sex"] == "m") ? " исчез " : " исчезла ");
            //$locationHelper->addJournal($msg, $ld->players, $pid);
            $page = <<<EOT
        <p class="tabs__link tabs__link_active">Ваш персонаж покинул игру.</p>
        <div class="hr"></div>
        <a class="tabs__link" href="/?">повторить</a> вход
EOT;
            unset($_SESSION["pid"]);
            \Likedimion\Helper\View::display($page, "Ошибка.");
        }
    } else {
        if ($_SESSION["pid"]) {
            unset($_SESSION["pid"]);
        }
        header("Location: /?");
    }
} else {
    $page = <<<EOT
        <p class="tabs__link tabs__link_active">Ваш персонаж покинул игру.</p>
        <div class="hr"></div>
        <a class="tabs__link" href="/?">повторить</a> вход
EOT;

    \Likedimion\Helper\View::display($page, "Ошибка.");
}