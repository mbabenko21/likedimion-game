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

$page .= "<div class='panel panel-default'><div class='panel-heading text-uppercase strong text-muted'>атака</div>";
$page .= '<ul class="list-group text-left">';
    $page .= '<li class="list-group-item little_block">
        <span class="badge bg-danger">'.$warStats[1].'-'.$warStats[2].'</span>
        <h6 class="list-group-item-heading strong text-uppercase"><a href="#" onclick="info(\'stat_1\');">'.$lang["war_stats"][1].'</a></h6>
        <p id="stat_1" class="list-group-item-text hidden">'.str_replace("\n", "<br/>", $lang["info"]["war_stats"][1]).'</p>
    </li>';
    $page .= '<li class="list-group-item little_block">
        <span class="badge bg-danger">'.$warStats[0].'%</span>
        <h6 class="list-group-item-heading strong text-uppercase"><a href="#" onclick="info(\'stat_0\');">'.$lang["war_stats"][0].'</a></h6>
        <p id="stat_0" class="list-group-item-text hidden">'.str_replace("\n", "<br/>", $lang["info"]["war_stats"][0]).'</p>
    </li>';
    if($player["equip"]["rhand"]["type"] == \Likedimion\Helper\ItemHelper::ITEM_BOOK){
        $page .= '<li class="list-group-item little_block">
        <span class="badge bg-danger">'.$warStats[5].'%</span>
        <h6 class="list-group-item-heading strong text-uppercase"><a href="#" onclick="info(\'stat_4\');">'.$lang["war_stats"][4].'</a></h6>
        <p id="stat_4" class="list-group-item-text hidden">'.str_replace("\n", "<br/>", $lang["info"]["war_stats"][4]).'</p>
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

