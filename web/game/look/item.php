<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 17.12.2015
 * Time: 18:05
 */

$title = "О предмете";
$item = [];
if ($_GET["from"]) {
    $player = \Likedimion\Game::init()->getService('player.helper')->getPlayer();
    $from = preg_split("/[_\-#:]/", $_GET["from"]);
    switch ($from[0]) {
        case "equip":
            $item = $player["equip"][$from[1]];
            break;
        case "inventory":
            if (isset($player["inventory"][$_GET["iId"]])) {
                $item = $player["inventory"][$_GET["iId"]];
            }
            break;
        case "loc":
            /** @var \Likedimion\Helper\LocationHelper $locHelper */
            $locHelper = \Likedimion\Game::init()->getService('loc.helper');
            $loc = $locHelper->getCollection()->findOne(["lid" => $from[1]]);
            if($loc){
                $item = $loc["loc"][$_GET["iId"]];
            }
            break;
        default:
            $page .= "<div class='alert alert-warning'>Не на что смотреть</div>";
            break;
    }
} else {
    try {
        $item = $ld->items->findOne(["iid" => $_GET["iId"]]);
    } catch (MongoException $e) {
        $page .= "<div class='alert alert-warning'>Не удалось найти предмет, поскольку отсутствует подключение к базе данных<br/>Ошибка: " . $e->getMessage() . "</div>";
    }
}

if (!empty($item)) {
    $title = $item["titles"]["nom"];
    if (!empty($item["info"])) {
        $page .= "<div class='alert alert-info' style='margin-bottom: 0;'>" . $item["info"] . "</div>";
    } else {
        $page .= "<div class='alert alert-info' style='margin-bottom: 0;'>нет описания</div>";
    }
    $page .= "Тип: <span class='strong'>" . $lang["item_types"][$item["type"]] . "</span><br/>";
    if (isset($item["item"]["war_stats"]) and array_sum($item["item"]["war_stats"]) > 0) {
        for ($i = 0; $i < count($item["item"]["war_stats"]); $i++) {
            if ($item["item"]["war_stats"][$i] > 0) {
                $mod = ($item["item"]["war_stats"][$i] > 0) ? "+" : "-";
                $page .= "<span class='text-warning text-uppercase strong'>" . $lang["war_stats"][$i] . "</span>: <span class='strong'>" . $mod . $item["item"]["war_stats"][$i] . "</span><br/>";
            }
        }
    }

    if (
        isset($item["item"]["base_stats_add"]) or isset($item["item"]["war_p_skills_add"])
    ) {
        $page .= "<div class='hr'></div>";
        if (array_sum($item["item"]["base_stats_add"]) > 0) {
            for ($i = 0; $i < count($item["item"]["base_stats_add"]); $i++) {
                if ($item["item"]["base_stats_add"][$i] > 0) {
                    $mod = ($item["item"]["base_stats_add"][$i] > 0) ? "+" : "-";
                    $page .= "<span class='text-warning text-uppercase strong'>" . $lang["base_params"][$i] . "</span> <span class='strong'>" . $mod . $item["item"]["base_stats_add"][$i] . "</span><br/>";
                }
            }
            unset($i);
        }
        if (array_sum($item["item"]["war_p_skills_add"]) > 0) {
            for ($i = 0; $i < count($item["item"]["war_p_skills_add"]); $i++) {
                if ($item["item"]["war_p_skills_add"][$i] > 0) {
                    $mod = ($item["item"]["war_p_skills_add"][$i] > 0) ? "+" : "-";
                    $page .= "<span class='text-warning text-uppercase strong'>" . $lang["war_skills"][$i] . "</span> <span class='strong'>" . $mod . $item["item"]["war_p_skills_add"][$i] . "</span><br/>";
                }
            }
            unset($i);
        }
    }
} else {
    $page .= "<div class='alert alert-warning'>Не на что смотреть</div>";
}

//\Likedimion\Helper\View::display($page, $title, \Likedimion\Helper\View::CARD_DEFAULT);