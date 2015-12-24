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
if ($_SESSION["pid"]) {
    $player = $ld->players->findOne(["_id" => $_SESSION["pid"]]);
    if ($player) {
            $playerHelper = new \Likedimion\Helper\PlayerHelper($player);
            $playerHelper->setDispatcher($eventDispatcher);
            $playerHelper->update();
            $loc_i = [];
            if (false === $adminSession) {
                \Likedimion\Game::AI($player);
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

            $playerHelper->update();
            if (!$ld->players->update(["_id" => $_SESSION["pid"]], $playerHelper->getPlayer())) {
                throw new MongoException("Not update");
            };
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