<?php
if(!defined('ROOT')){header("Location: /?");}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 07.12.2015
 * Time: 0:43
 */

use Likedimion\Helper\View;
if($_GET["go"]){
    require "go.php";
}
$page = "";
//$snap = file_get_contents(ROOT."/public/likedimion.svg");
$lifePercent = $player["char_params"][0] / $player["char_params"][1] * 100;
$manaPercent = $player["char_params"][2] / $player["char_params"][3] * 100;
$expirPercent = $player["experience"] / $playerHelper->getNeedExp($player["level"]+1) * 100;
$exp = $player["experience"];
$needExp = $playerHelper->getNeedExp($player["level"]+1);
$regen = $playerHelper->getRegen(4)[1]*1000;
$loc = $ld->locations->findOne(["lid" => $playerHelper->getPlayer()["loc"]]);
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
        <div id="life_bar_text" class="text strong">{$player["char_params"][0]} / {$player["char_params"][1]}</div>
    </div>
    <div class="progress">
        <div class="fill mana" style="width: {$manaPercent}%"></div>
        <div class="text strong">{$player["char_params"][2]} / {$player["char_params"][3]}</div>
    </div>
    <div class="progress">
        <div class="fill expir" style="width: {$expirPercent}%"></div>
        <div class="text strong">{$exp} / {$needExp}</div>
    </div>
</div>
PAGE;
//БАФФЫ

if($loc){
    $locHelper = new \Likedimion\Helper\LocationHelper($loc);
    $journalAll = array_merge($playerHelper->getJournal(), $locHelper->getJournal());
    $size = count($journalAll)-1;
    for ($i = $size; $i>=0; $i--) {
        for ($j = 0; $j<=($i-1); $j++)
            if ($journalAll[$j]["time"]>$journalAll[$j+1]["time"]) {
                $k = $journalAll[$j]["time"];
                $journalAll[$j]["time"] = $journalAll[$j+1]["time"];
                $journalAll[$j+1]["time"] = $k;
            }
    }
    //ЖУРНАЛ
    if(count($journalAll) > 0) {
        $page .= '<div id="journal">';
        while (list($key, $journalMsg) = each($journalAll)) {
            if($journalMsg["no_player_1"] != $player["_id"] and $journalMsg["no_player_2"] != $player["_id"]){
                $page .= "<div>".$journalMsg["msg"]."</div>";
            }
            next($journalAll);
        }
        $page .= "<div class='hr'></div><a onclick='$(\"#journal\").html(\"\");' href='#'>дальше</a></div>";
    }
    //npc
    $page .= "<ul class='list-group'>";
    foreach($loc["loc"] as $oid => $obj){
        if(substr($oid, 0, 4) == "npc_"){
            $page .= "<li class='list-group-item strong'>
<a href='#' onclick='menu(\"menu_".str_replace(".", "_",$oid)."\")'>".$obj["title"]."</a>
</li>
<li id='menu_".str_replace(".", "_",$oid)."' class='list-group-item menu hidden'>
<ul class=\"tabs tabs_mobile list-inline\">
    <li class=\"tabs_item list-inline\">
        <a class='tabs__link' href='/?game=dialog&dId=$oid'>говорить</a>
    </li>
    <li class=\"tabs_item list-inline\">
        <a class='tabs__link' href='/?game=look&type=npc&nId=$oid'>инфо</a>
    </li>
</ul>

</li>
";
        }
    }
    $page .= "</ul>";
    //выходы
    if($loc["doors"]){
        $page .= "<ul class='list-group'>";
        for($i = 0; $i < count($loc["doors"]); $i++){
            $page .= "<li class='list-group-item strong'>
<a href='/?game=travel&go=".$loc["doors"][$i][1]."'>".$loc["doors"][$i][0]."</a>
</li>";
        }
        $page .= "</ul>";
    }
    $locHelper->clearJournal();
    $playerHelper->clearJournal();
    $ld->locations->update(["_id" => new MongoId($loc["_id"])], $locHelper->getLoc());
} else {
    $page.="<div class='alert alert-warning'>Какая-то безжизненная пустыня</div>";
}

//$playerHelper->addBaseStat(4, 40);
$page .= View::toMainButton('обновить')."<div class='hr'></div>";
if($player["role"] == \Likedimion\Game::ROLE_ADMIN){
    $page .= View::link("/?admin=main", "админка")."<div class='hr'></div>";
}

$page .= <<<EOF
<script type='text/javascript'>
            function menu(id){
            $(".menu").each(function(){
                if(!$(this).hasClass('hidden')){
                    $(this).removeClass('open').addClass('hidden');
                }
            });
            id = "#"+id;
                if($(id).hasClass('hidden')){
                    $(id).removeClass('hidden').addClass('open');
                } else {
                    $(id).addClass('hidden').removeClass('open');
                }
            }
    </script>

EOF;
View::display($page, "Likedimion", \Likedimion\Helper\View::CARD_MAIN);