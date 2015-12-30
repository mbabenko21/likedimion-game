<?php
if(!defined('ROOT')){header("Location: /?");}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 07.12.2015
 * Time: 0:43
 * @var \Likedimion\Helper\LocationHelper $locHelper
 */

use Likedimion\Helper\View;
require "travel_router.php";

$page = "<script src=\"/js/jquery.slimscroll.min.js\"></script>";
$playerHelper = \Likedimion\Game::init()->getService('player.helper');
$player = $playerHelper->getPlayer();
$loc = $ld->locations->findOne(["lid" => $playerHelper->getPlayer()["loc"]]);
$locHelper = \Likedimion\Game::init()->getService('loc.helper');
$title = $loc["title"] ? $loc["title"] : "Likedimion";
//$snap = file_get_contents(ROOT."/public/likedimion.svg");
$lifePercent = $player["char_params"][0] / $player["char_params"][1] * 100;
$manaPercent = $player["char_params"][2] / $player["char_params"][3] * 100;
$expirPercent = $player["experience"] / $playerHelper->getNeedExp($player["level"]+1) * 100;
$exp = $player["experience"];
$needExp = $playerHelper->getNeedExp($player["level"]+1);
$regen = $playerHelper->getRegen(4)[1]*1000;
if($playerHelper->getCountNewMsg() > 0){
    $msgTitle = $playerHelper->getCountNewMsg() . " " .
        View::getNumEnding($playerHelper->getCountNewMsg(), ["новое", "новых", "новых"]) . " " .
        View::getNumEnding($playerHelper->getCountNewMsg(), ["сообщение", "сообщения", "сообщений"]);
    $page .= "<a href='/?game=msg'>".$msgTitle."</a><div class='hr'></div><a href='/?game=msg&action=readAll'>прочитать позже</a>";
}
$page .= <<<PAGE
<div class="progerss__bar">
    <div class="progress">
        <div id="life_bar" class="fill life" style="width: {$lifePercent}%"></div>
        <div id="life_bar_text" class="text strong">
        <span class="game_ui_icon icon_heart"></span>
        <span class="title strong">жизнь</span>
        <span id="data">{$player["char_params"][0]} / {$player["char_params"][1]}</span>
        </div>
    </div>
    <div class="progress">
        <div class="fill mana" style="width: {$manaPercent}%"></div>
        <div class="text strong">
        <span class="game_ui_icon icon_light"></span>
        <span class="title strong">мана</span>
        <span id="data">{$player["char_params"][2]} / {$player["char_params"][3]}</span>
        </div>
    </div>
    <div class="progress">
        <div class="fill expir" style="width: {$expirPercent}%"></div>
        <div class="text strong">
        <span class="game_ui_icon icon_star"></span>
        <span class="title strong">опыт</span>
        <span id="data">{$exp} / {$needExp}</span>
        </div>
    </div>
</div>
PAGE;

//БАФФЫ
    if ($loc["messages"]) {
        while (list($i, $msg) = each($loc["messages"])) {
            $playerHelper->addJournal($msg);
        }
    }
    if ($loc) {
            $locHelper = new \Likedimion\Helper\LocationHelper($loc);
            $journalAll = $playerHelper->getJournal();
            $size = count($journalAll);
            for ($i = $size; $i >= 0; $i--) {
                for ($j = 0; $j <= ($i - 1); $j++)
                    if ($journalAll[$j]["time"] > $journalAll[$j + 1]["time"]) {
                        $k = $journalAll[$j]["time"];
                        $journalAll[$j]["time"] = $journalAll[$j + 1]["time"];
                        $journalAll[$j + 1]["time"] = $k;
                    }
            }
            //ЖУРНАЛ
            if (count($journalAll) > 0) {
                $page .= '<div id="journalContainer"><div id="journal">';
                while (list($key, $journalMsg) = each($journalAll)) {
                    if ($journalMsg["no_player_1"] != $player["_id"] and $journalMsg["no_player_2"] != $player["_id"]) {
                        $page .= "<div>" . $journalMsg["msg"] . "</div>";
                    }
                    //next($journalAll);
                }
                $page .= "</div><div class='hr'></div><a onclick='$(\"#journalContainer\").hide();' href='#'>дальше</a></div>";
            }
            //npc
            $page .= "<ul class='list-group'>";
            foreach ($loc["loc"] as $oid => $obj) {
                if (substr($oid, 0, 4) == "npc_") {
                    $skillsButtons = "<ul class='pagination pagination-sm'>";
                    for ($i = 1; $i <= 5; $i++) {
                        $skillsButtons .= "<li><a href='/?game=travel&a=use&section=skill&cell=" . ($i - 1) . "&to=" . $oid . "'>" . $i . "</a></li>";
                    }
                    $skillsButtons .= "</ul>";
                    $iItems = "<ul class='pagination pagination-sm'>";
                    for ($i = 1; $i <= 5; $i++) {
                        $iItems .= "<li><a href='/?game=travel&a=use&section=item&cell=" . ($i - 1) . "&to=" . $oid . "'>" . $i . "</a></li>";
                    }
                    $iItems .= "</ul>";
                    $nid = preg_split("/[_\.]/", $oid);
                    $speakLink = "";
                    if (\Likedimion\Dialog\Dialog::exists($nid[1])) {
                        $speakLink = "<a href=\"/?game=dialog&dId=" . $oid . "\">говорить</a><div class='hr'></div>";
                    }
                    $page .= "<li class='list-group-item little_block_center strong'>";
                    $npcTitle = View::compileNpcTitle($obj, $player);
                    $page .= <<<END_NPC
    <div class="ui_player" id="ui_player{$oid}" onclick="menu('npc{$oid}_menu');">
    <span>{$npcTitle}</span>
    </div>
    <div id="npc{$oid}_menu" class="menu" style="display: none;">
        {$speakLink}
        <a href="/?game=travel&section=attack&to={$oid}">атаковать</a><br/>
        использовать навык
        {$skillsButtons}
        <div class="hr"></div>
        использовать предмет
        {$iItems}
        <div class="hr"></div>
        <a href="/?game=look&type=player&pid={$oid}">инфо</a><br/>
    </div>
END_NPC;

                    $page .= "</li>";
                }

                if (substr($oid, 0, 5) == "item_") {
                    $page .= "<li class='list-group-item little_block_center strong'>";
                    $itemTitle = $obj["titles"]["nom"];
                    if ($obj["count"] > 0) {
                        $itemTitle = $obj["titles"]["plural"] . " <span class='label'>" . $obj["count"] . "</span>";
                    }
                    if (isset($obj["ai"]["on_use"])) {
                        $takeLink = "<a href=\"/?game=travel&section=use&id={$oid}&from=loc_" . $player["loc"] . "\">использовать</a><div class=\"hr\"></div>";
                    } elseif ($obj["type"] != \Likedimion\Helper\ItemHelper::ITEM_SET) {
                        $takeLink = "<a href=\"/?game=travel&section=take&id={$oid}&from=loc_" . $player["loc"] . "\">взять</a><div class=\"hr\"></div>";
                    } else {
                        $takeLink = "";
                    }
                    $page .= <<<END_NPC
    <div class="ui_player" id="ui_item{$oid}" onclick="menu('{$oid}_menu');">
    <span>{$itemTitle}</span>
    </div>
    <div id="{$oid}_menu" class="menu" style="display: none;">
        {$takeLink}
        <a href="/?game=look&type=item&iId={$oid}&from=loc_{$player["loc"]}">инфо</a><br/>
    </div>
END_NPC;

                    $page .= "</li>";
                }

                if (substr($oid, 0, 7) == "player_") {
                    $plId = substr($oid, 7);
                    if ($plId != $player["_id"]) {
                        $owner = $playerHelper->getCollection()->findOne(["_id" => new MongoId($plId)]);
                        $page .= "<li class='list-group-item little_block_center strong'>";
                        $skillsButtons = "<ul class='pagination pagination-sm'>";
                        for ($i = 1; $i <= 5; $i++) {
                            $skillsButtons .= "<li><a href='/?game=travel&a=use&section=skill&cell=" . ($i - 1) . "&to=" . $owner["_id"] . "'>" . $i . "</a></li>";
                        }
                        $skillsButtons .= "</ul>";
                        $iItems = "<ul class='pagination pagination-sm'>";
                        for ($i = 1; $i <= 5; $i++) {
                            $iItems .= "<li><a href='/?game=travel&a=use&section=item&cell=" . ($i - 1) . "&to=" . $owner["_id"] . "'>" . $i . "</a></li>";
                        }
                        $iItems .= "</ul>";
                        $r = $player["level"] - $owner["level"];
                        $add = "primary";
                        if ($r >= 10) {
                            $add = "success";
                        }
                        if ($r >= -5 and $r < 10) {
                            $add = "warning";
                        }
                        if ($r < -5) {
                            $add = "danger";
                        }
                        $ownerTitle = View::compilePlayerTitle($owner);
                        $oTitle = "<span class='label label-" . $add . "'>" . $owner["level"] . "</span> " . $ownerTitle;
                        switch ($owner["status"]) {
                            case \Likedimion\Helper\PlayerHelper::STATUS_GHOST:
                                $oTitle .= " <span class='label label-success'>[!]</span>";
                                break;
                            case \Likedimion\Helper\PlayerHelper::STATUS_CRIM;
                            case \Likedimion\Helper\PlayerHelper::STATUS_MARADEUR;
                                $oTitle .= " <span class='label label-danger'>[#]</span>";
                                break;
                        }
                        $page .= <<<END_PLAYER
    <div class="ui_player" id="ui_player{$owner["_id"]}" onclick="menu('player{$owner["_id"]}_menu');">
    <span class="game_ui_icon icon_{$owner["class"]}"></span>
    <span>{$oTitle}</span>
    </div>
    <div id="player{$owner["_id"]}_menu" class="menu" style="display: none;">
        <form id="speak{$owner["_id"]}" action="/?game=travel&section=speak&to={$owner["_id"]}" method="POST">
            <textarea rows="2" cols="22" name="speak_msg" placeholder="Сообщение..."></textarea>
            <div class="clear"></div>
            <input id="prvt" type="checkbox" name="private">
            <label for="prvt">Приватно</label>
            <div class="clear"></div>
            <a href="#" onclick="document.getElementById('speak{$owner["_id"]}').submit();">говорить</a>
        </form>
        <div class="hr"></div>
        <a href="/?game=travel&section=attack&to={$owner["_id"]}">атаковать</a><br/>
        использовать навык
        {$skillsButtons}
        <div class="hr"></div>
        использовать предмет
        {$iItems}
        <div class="hr"></div>
        <a href="/?game=look&type=player&pid={$owner["_id"]}">инфо</a><br/>
        <a href="/?game=msg&action=add&pid={$owner["_id"]}">в контакты</a>
    </div>
END_PLAYER;

                        $page .= "</li>";
                    }
                }
            }
            $page .= "</ul>";
            //выходы
            if ($loc["doors"]) {
                $locHelper->setCollection($ld->locations);
                $page .= "<div class='list-group'>";
                for ($i = 0; $i < count($loc["doors"]); $i++) {
                    $added = str_repeat("!", $locHelper->getCountNpc($loc["doors"][$i][1]));
                    $doorData = $locHelper->getCollection()->findOne(["lid" => $loc["doors"][$i][1]], ["terr"]);
                    if ($doorData["terr"] == \Likedimion\Helper\LocationHelper::TERRITORY_UNGUARD and $locHelper->getLoc()["terr"] == \Likedimion\Helper\LocationHelper::TERRITORY_GUARD) {
                        $guard = "<span class='label label-danger'>#</span>";
                    } elseif ($doorData["terr"] == \Likedimion\Helper\LocationHelper::TERRITORY_GUARD and $locHelper->getLoc()["terr"] == \Likedimion\Helper\LocationHelper::TERRITORY_UNGUARD) {
                        $guard = "<span class='label label-success'>!</span>";
                    } else {
                        $guard = "";
                    }
                    $page .= "<div class='list-group-item little_block_center'>" . $guard . "
<a id='center' class='strong' href='/?game=travel&go=" . $loc["doors"][$i][1] . "'>" . $loc["doors"][$i][0] . "</a> <span class='label label-warning'>" . substr($added, 0, 3) . "</span>
</div>";
                }
                $page .= "</div>";
            }
            //$locHelper->clearJournal();
            $playerHelper->clearJournal();
            $ld->locations->update(["_id" => new MongoId($loc["_id"])], $locHelper->getLoc());
    } else {
        $page .= "<div class='alert alert-warning'>Какая-то безжизненная пустыня</div>";
    }
//$playerHelper->addBaseStat(4, 40);
$page .= View::toMainButton('обновить')."<div class='hr'></div>";
if($player["role"] == \Likedimion\Game::ROLE_ADMIN or $player["role"] == \Likedimion\Game::ROLE_RAZRAB){
    $page .= View::link("/?admin=main", "админка")."<div class='hr'></div>";
}


$page .= <<<EOF
<script type='text/javascript'>
            function menu(id){
                close_all_menus(id)
                console.log($('#'+id).css('display'));
                if($('#'+id).css('display') == 'block'){
                        close_menu(id);
                } else {
                      open_menu(id);
                }
            }

            function close_all_menus(no_id){
                $('.menu').each(function(i, v){
                    if($(v).css('display') == 'block' && $(v).attr('id') != no_id){
                        //console.log($(v).css('display'));
                        $(v).hide();
                    }
                });
            }

            function open_menu(id){
            console.log("open//");
                $('#'+id).show();
            }

            function close_menu(id){
            console.log("close//");
                $('#'+id).hide();
            }
            $(document).ready(function(){
            if($("#journalContainer").height() >= 100){
                $("#journal").slimScroll({
                    color: '#333',
                    size: '10px',
                    height: '100px',
                    alwaysVisible: true
                });
               }
            });
    </script>

EOF;

View::display($page, $title, \Likedimion\Helper\View::CARD_MAIN);