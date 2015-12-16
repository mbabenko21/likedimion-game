<?php
if (!defined('ROOT')) {
    header("Location: /?");
}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 11.12.2015
 * Time: 0:53
 */
$title = "Навыки";
$player = $playerHelper->getPlayer();
$baseParams = $player["base_stats"];
$baseParamsAdd = $player["base_stats_add"];
$warSkills = $player["war_p_skills"];
$warSkillsAdd = $player["war_p_skills_add"];

foreach ($player["equip"] as $slot) {

    if($slot["item"]["base_stats_add"]){
        $baseParamsAdd = $playerHelper->array_add($baseParamsAdd, $slot["item"]["base_stats_add"]);
    }
    if($slot["item"]["war_p_skills_add"]){
        $warSkillsAdd = $playerHelper->array_add($warSkillsAdd, $slot["item"]["war_p_skills_add"]);
    }
}

if($player["base_stats_points"]){
    $stmp = '<span class="badge bg-danger"><span id="or">'.$player["base_stats_points"].'</span> '.\Likedimion\Helper\View::getNumEnding($player["base_stats_points"], ["очко", "очка", "очков"]).' развития</span>';
}
$page .= "<div class='panel panel-default'><div class='panel-heading text-uppercase strong text-muted'>базовые навыки ".$stmp."</div>";
$page .= '<ul class="list-group text-left">';
for($i = 0; $i < count($lang["base_params"]); $i++){
    if($baseParamsAdd[$i] > 0){
        $stmp = " <span class='strong'>+".$baseParamsAdd[$i]."</span>";
    } else {
        $stmp = "";
    }
    $page .= '<li class="list-group-item little_block">
    <span class="badge">'.$baseParams[$i].$stmp.'</span>
    <h6 class="list-group-item-heading strong text-uppercase"><a href="#" onclick="info(\'info_'.$i.'\');">'.$lang["base_params"][$i].'</a></h6>
    <p id="info_'.$i.'" class="list-group-item-text hidden">'.$lang["info"]["base_params"][$i].'<br/></p>
</li>';
    //unset($stmp);
}
$page .= '</ul></div> ';
if($player["war_skills_points"]){
    $stmp = '<span class="badge bg-danger"><span id="or">'.$player["base_stats_points"].'</span> '.\Likedimion\Helper\View::getNumEnding($player["base_stats_points"], ["очко", "очка", "очков"]).' развития</span>';
}
$page .= "<div class='panel panel-default'><div class='panel-heading text-uppercase strong text-muted'>боевые навыки ".$stmp."</div>";
$page .= '<ul class="list-group text-left">';
for($i = 0; $i < count($lang["war_skills"]); $i++){
    if($warSkillsAdd[$i] > 0){
        $stmp = " <span class='strong'>+".$warSkillsAdd[$i]."</span>";
    } else {
        $stmp = "";
    }
    $page .= '<li class="list-group-item little_block">
    <span class="badge bg-danger">'.$warSkills[$i].$stmp.'</span>
    <h6 class="list-group-item-heading strong text-uppercase"><a href="#" onclick="info(\'skl_'.$i.'\');">'.$lang["war_skills"][$i].'</a></h6>
    <p id="skl_'.$i.'" class="list-group-item-text hidden">'.str_replace("\n", "<br/>", $lang["info"]["war_skills"][$i]).'</p>
</li>';
}
$page .= '</ul></div> ';
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
