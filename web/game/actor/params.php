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
$baseParams = $player["base_stats"];
$page .= "<div class='panel panel-default'><div class='panel-heading text-uppercase strong text-muted'>базовые параметры</div>";
$page .= '<ul class="list-group text-left">';
for($i = 0; $i < count($lang["base_params"]); $i++){
    $page .= '<li class="list-group-item little_block">
    <span class="badge bg-danger">'.$baseParams[$i].'</span>
    <h6 class="list-group-item-heading strong text-uppercase"><a href="#" onclick="info(\'info_'.$i.'\');">'.$lang["base_params"][$i].'</a></h6>
    <p id="info_'.$i.'" class="list-group-item-text hidden">'.$lang["info"]["base_params"][$i].'<br/></p>
</li>';
}
$page .= '</ul></div> ';
$page .= "<div class='panel panel-default'><div class='panel-heading text-uppercase strong text-muted'>регенерация</div>";
$regenLife = $playerHelper->getRegen(4);
$regenMana = $playerHelper->getRegen(5);
$page .= "<span class='major strong text-uppercase'>жизнь</span> ".$regenLife[0]." ед./сек (1 единица в ".$regenLife[1]." сек)<br/>";
$page .= "<span class='admin strong text-uppercase'>мана</span> ".$regenMana[0]." ед./сек (1 единица в ".$regenMana[1]." сек)<br/>";
$page .= "</div>";
$page.=<<<SCRIPT
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
SCRIPT;
