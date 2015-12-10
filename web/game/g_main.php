<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 03.12.2015
 * Time: 15:32
 */
if ($_GET["move"]) {
    $newLocId = $_GET["move"];
    if (isset($locations[$newLocId])) {
        $oldLocId = $player["loc"];
        $player["loc"] = $newLocId;
    }
    $G->players->update(["_id" => new MongoId($player["_id"])], $player);
}
$loc = $locations[$player["loc"]];
$LOCATION = $G->locations->findOne(["loc_id" => $player["loc"]]);

$page = "";
$page .= require_once ROOT_DIR . "/views/game_actor_header.php";
if (isset($loc)) {
    //Life and mana bar
    $lifePercent = $player["char_params"][0] / $player["char_params"][1] * 100;
    $manaPercent = $player["char_params"][2] / $player["char_params"][3] * 100;
    $lifePercent = round($lifePercent, 2, PHP_ROUND_HALF_ODD);
    $manaPercent = round($manaPercent, 2, PHP_ROUND_HALF_ODD);
    $page .= <<<EOL
    <div class="progress">
        <div class="progress-bar progress-bar-danger progress-bar-striped" style="width:{$lifePercent}%">{$player["char_params"][0]}/{$player["char_params"][1]} ({$lifePercent}%)</div>
    </div>
    <div class="progress">
        <div class="progress-bar progress-bar-waiting progress-bar-striped" style="width:{$manaPercent}%">{$player["char_params"][2]}/{$player["char_params"][3]} ({$manaPercent}%)</div>
    </div>
EOL;
    $page .= "<div class=\"hr\"></div>";
    //buffs

    //objects
    if ($LOCATION["object_list"]) {
        foreach ($LOCATION["object_list"] as $objId => $obj) {
            if(isset($obj["on_use"])){
                $page .= '<a href="/?game=use&use='.$objId.'">'.$obj["title"].'</a>';
            }
        }
        $page .= "<div class=\"hr\"></div>";
    }

    //doors
    $loc = explode("|", $loc);
    $title = $loc[0];
    for ($i = 2; $i < count($loc); $i += 2) {
        $page .= <<<EOL
        <div>
            <a class="button button_notice upper" href = '{route}GAME_MAIN{/route}&move={$loc[$i + 1]}'>{$loc[$i]}</a>
        </div>
EOL;
    }
} else {
    $title = "Ошибка";
    $page = <<<EOT
<p class="al8">Вы находитесь в месте из которого нельзя выбраться</p>
EOT;
}
$game_links = require_once ROOT_DIR . "/views/game_links.php";
$page .= $game_links;
display($page, $title);