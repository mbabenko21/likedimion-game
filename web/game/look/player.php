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
    if ($player["equip"]["rhand"]) {
        $page .= "<div class='hr'></div>в руках <a class='strong' href=''>" . $player["equip"]["rhand"]["titles"]["nom"] . "</a>";
        if ($player["equip"]["rhand"]["type"] == \Likedimion\Helper\ItemHelper::ITEM_SWORD
            and $player["equip"]["lhand"]
        ) {
            $page .= ", <a class='strong' href=''>" . $player["equip"]["lhand"]["titles"]["nom"] . "</a>";
        }
    } else {
        $page .= "<div class='hr'></div>в руках нет оружия";
    }
    //Экипировка
    $page .= "<ul class='list-group'>";
    if (!empty($player["equip"]["head"])) {
        $page .= <<<EOF
    <li class='list-group-item text-muted strong'>
        <a href="">{$player["equip"]["head"]["titles"]["nom"]}</a>
    </li>
EOF;
    } else {
        $page .= "<li class='list-group-item text-muted strong'>голова</li>";
    }
    if (!empty($player["equip"]["amulet"])) {
        $page .= <<<EOF
    <li class='list-group-item text-muted strong'>
        <a href="">{$player["equip"]["amulet"]["titles"]["nom"]}</a>
    </li>
EOF;
    } else {
        $page .= "<li class='list-group-item text-muted strong'>шея</li>";
    }
    if (!empty($player["equip"]["bodyarm"])) {
        $page .= <<<EOF
    <li class='list-group-item text-muted strong'>
        <a href="">{$player["equip"]["bodyarm"]["titles"]["nom"]}</a>
    </li>
EOF;
    } else {
        $page .= "<li class='list-group-item text-muted strong'>доспехи</li>";
    }
    if (!empty($player["equip"]["hands"])) {
        $page .= <<<EOF
    <li class='list-group-item text-muted strong'>
        <a href="">{$player["equip"]["hands"]["titles"]["nom"]}</a>
    </li>
EOF;
    } else {
        $page .= "<li class='list-group-item text-muted strong'>поручи</li>";
    }
    if (!empty($player["equip"]["gloves"])) {
        $page .= <<<EOF
    <li class='list-group-item text-muted strong'>
        <a href="">{$player["equip"]["gloves"]["titles"]["nom"]}</a>
    </li>
EOF;
    } else {
        $page .= "<li class='list-group-item text-muted strong'>перчатки</li>";
    }
    if (!empty($player["equip"]["ring"])) {
        $page .= <<<EOF
    <li class='list-group-item text-muted strong'>
        <a href="">{$player["equip"]["ring"]["titles"]["nom"]}</a>
    </li>
EOF;
    } else {
        $page .= "<li class='list-group-item text-muted strong'>кольцо</li>";
    }
    if (!empty($player["equip"]["legs"])) {
        $page .= <<<EOF
    <li class='list-group-item text-muted strong'>
        <a href="">{$player["equip"]["legs"]["titles"]["nom"]}</a>
    </li>
EOF;
    } else {
        $page .= "<li class='list-group-item text-muted strong'>поножи</li>";
    }
    if (!empty($player["equip"]["shoes"])) {
        $page .= <<<EOF
    <li class='list-group-item text-muted strong'>
        <a href="">{$player["equip"]["shoes"]["titles"]["nom"]}</a>
    </li>
EOF;
    } else {
        $page .= "<li class='list-group-item text-muted strong'>сапоги</li>";
    }

    $page .= "</ul>";
} else {
    $page .= "Не на кого смотреть";
}