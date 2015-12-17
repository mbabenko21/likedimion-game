<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 10.12.2015
 * Time: 16:00
 */
if (!defined('ROOT')) {
    header("Location: /?");
}
$title = "Параметры";

$page .= "<div class='panel panel-default'><div class='panel-heading text-uppercase strong text-muted'>регенерация</div>";
$regenLife = $playerHelper->getRegen(4);
$regenMana = $playerHelper->getRegen(5);
$page .= "<span class='major strong text-uppercase'>жизнь</span> ".$regenLife[0]." ед./сек (1 единица в ".$regenLife[1]." сек)<br/>";
$page .= "<span class='admin strong text-uppercase'>мана</span> ".$regenMana[0]." ед./сек (1 единица в ".$regenMana[1]." сек)<br/>";
$page .= "</div>";
$warStats = $player["war_stats"];

$page .= "<div class='panel panel-default'><div class='panel-heading text-uppercase strong text-muted'>параметры</div>";
$page .= '<ul class="list-group text-left">';
    if($player["equip"]["rhand"]){
        $att = $player["equip"]["rhand"]["titles"]["inst"];
    } else {
        $att = "кулаками";
    }
    $page .= '<li class="list-group-item little_block">
        <span class="badge bg-danger">'.$warStats[2].'-'.$warStats[3].'</span>
        <span class="strong">атака ('.$att.')</span>
    </li>';
    $page .= '<li class="list-group-item little_block">
        <span class="badge bg-danger">'.$warStats[0].'%</span>
        <span class="strong">'.$lang["war_stats"][0].'</span>
    </li>';
    $page .= '<li class="list-group-item little_block">
        <span class="badge bg-danger">'.$warStats[1].'%</span>
        <span class="strong">'.$lang["war_stats"][1].'</span>
    </li>';
    $page .= '<li class="list-group-item little_block">
        <span class="badge">'.$warStats[4].' сек</span>
        <span class="strong text-capitalise">'.$lang["war_stats"][4].'</span>
    </li>';
    $page .= '<li class="list-group-item little_block">
        <span class="badge bg-danger">'.$warStats[5].' / '.$warStats[6].'</span>
        <span class="strong text-capitalise">'.$lang["war_stats"][5].'/'.$lang["war_stats"][6].'</span>
    </li>';
    if($player["equip"]["rhand"]["type"] == \Likedimion\Helper\ItemHelper::ITEM_BOOK){
        $page .= '<li class="list-group-item little_block">
        <span class="badge bg-danger">'.$warStats[12].'%</span>
        <span class="strong">'.$lang["war_stats"][12].'</span>
        </li>';
    }
    $page .= '<li class="list-group-item little_block">
        <div class="hr"></div>
    </li>';
    for($i = 7; $i < count($lang["war_stats"]); $i++){
            $dob = "";
            $page .= '<li class="list-group-item little_block">
        <span class="badge bg-danger">'.$warStats[$i].'%</span>
        <span class="fw600">'.$lang["war_stats"][$i].'</span>
        </li>';
    }
$page .= "</ul></div>";

$page .= <<<EOF
<script type="text/javascript">
            function info(id){
            id = "#"+id;
                if($(id).hasClass('hidden')){
                    $(id).removeClass('hidden');
                } else {
                    $(id).addClass('hidden');
                }
            }

    </script>
EOF;

