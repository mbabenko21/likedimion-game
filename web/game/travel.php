<?php
if(!defined('ROOT')){header("Location: /?");}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 07.12.2015
 * Time: 0:43
 */

use Likedimion\Helper\View;

$page = "";
//$snap = file_get_contents(ROOT."/public/likedimion.svg");
$lifePercent = $player["char_params"][0] / $player["char_params"][1] * 100;
$manaPercent = $player["char_params"][2] / $player["char_params"][3] * 100;
$expirPercent = $player["experience"] / $playerHelper->getNeedExp($player["level"]+1) * 100;
$exp = View::numberFormat($player["experience"]);
$needExp = View::numberFormat($playerHelper->getNeedExp($player["level"]+1));
$regen = $playerHelper->getRegen(4)[1]*1000;
$loc = $ld->locations->findOne(["lid" => $playerHelper->getPlayer()["loc"]]);
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
<script type="text/javascript">
    $(document).ready(function(){
        var curr = {$player["char_params"][0]};
        var max = {$player["char_params"][1]};
        function barInit(currVal, maxVal, id){
            id = "#"+id;
            var percent = currVal/maxVal*100;
            $(id).css({width: percent+"%"});
            $(id+"_text").text(curr+" / "+max);
        }

            setInterval(function(){
                curr++;
                if(curr < max){
                    barInit(curr, max, 'life_bar');
                } else {
                    return false;
                }
            }, {$regen});
    });
</script>
PAGE;
//БАФФЫ

if($loc){
    //npc
    $page .= "<ul class='list-group'>";
    foreach($loc["loc"] as $oid => $obj){
        if(substr($oid, 0, 4) == "npc."){
            $page .= "<li class='list-group-item strong'>
<a href='/?game=dialog&dId=".$oid."'>".$obj["title"]."</a>
</li>";
        }
    }
    $page .= "</ul>";
    //выходы
    if($loc["doors"]){
        $page .= "<ul class='list-group'>";
        for($i = 0; $i < count($loc["doors"]); $i++){
            $page .= "<li class='list-group-item strong'>
<a href='/?game=go&move=".$loc["doors"][$i][1]."'>".$loc["doors"][$i][0]."</a>
</li>";
        }
        $page .= "</ul>";
    }
} else {
    $page.="<div class='alert alert-warning'>Какая-то безжизненная пустыня</div>";
}

//$playerHelper->addBaseStat(4, 40);
$page .= View::toMainButton('обновить')."<div class='hr'></div>";
if($player["role"] == \Likedimion\Game::ROLE_ADMIN){
    $page .= View::link("/?admin=main", "админка")."<div class='hr'></div>";
}
View::display($page, "Likedimion", \Likedimion\Helper\View::CARD_MAIN);