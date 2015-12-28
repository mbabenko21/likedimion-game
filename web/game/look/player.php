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
if ($_GET["pid"]) {
    $player = $ld->players->findOne(["_id" => new MongoId($_GET["pid"])]);
} else {
    $player = $playerHelper->getPlayer();
}
$title = "Персонаж";
if (!is_null($player)) {
    $title = $player["title"] . " " . $player["level"] . " ур.";
    if ($player["sex"] == \Likedimion\Game::SEX_MAN) {
        $page .= "мужч.";
    } else {
        $page .= "женщ.";
    }
    $page .= ", в игре " . (floor((time() - $player["create"]) / (3600 * 24))) . " д.";
    $page .= "<div class='hr'></div>";
    $lev = $player["level"];
    if ($lev < 5) $stmp .= "Новичок";
    if ($lev >= 5 && $lev < 10) $stmp .= "Начинающий";
    if ($lev >= 10 && $lev < 20) $stmp .= "Умелый";
    if ($lev >= 20 && $lev < 30) $stmp .= "Опытный";
    if ($lev >= 30 && $lev < 40) $stmp .= "Искусный";
    if ($lev >= 40 && $lev < 50) $stmp .= "Профессионал";
    if ($lev >= 50 && $lev < 60) $stmp .= "Известный";
    if ($lev >= 60 && $lev < 70) $stmp .= "Знаменитый";
    if ($lev >= 70 && $lev < 80) $stmp .= "Мастер";
    if ($lev >= 80 && $lev < 90) $stmp .= "Грандмастер";
    if ($lev >= 90 && $lev < 100) $stmp .= "Лорд";
    if ($lev >= 100) $stmp .= "Великий лорд";
    $page .= "<span class='text-justify strong'>" . $stmp . " " . $lang["class"][$player["class"]] . ", " . $player["level"] . " ур.</span>";
    $page .= "<div class='hr'></div>";
    //Экипировка
    if($_GET["getEquip"]) {
        $page .= "<ul class='list-group'>";
        foreach ($player["equip"] as $slot => $item) {
            $slotName = (isset($lang["equip"][$slot])) ? $lang["equip"][$slot] : $slot;
            $page .= "<li class='list-group-item'><h6 class='list-group-item-heading strong text-uppercase'>" . $slotName . "</h6>";
            if (!empty($item)) {
                $page .= "<a href='/?game=look&type=item&iId=" . $item["iid"] . "&from=equip_" . $slot . "'>" . $item["titles"]["nom"] . "</a>";
            } else {
                $page .= "<span class='text-muted strong'>ничего не одето</span>";
            }
            $page .= "</li>";
        }
        $page .= "</ul>";
        $page .= "<a class='button' href='/?game=actor&pid=".$player["_id"]."'>скрыть экипировку</a>";
    } else {
        $page .= "<a class='button' href='/?game=actor&pid=".$player["_id"]."&getEquip=1'>показать экипировку</a>";
    }
} else {
    $page .= "Не на кого смотреть";
}