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
    $page .= '<li class="list-group-item">
    <h6 class="list-group-item-heading strong text-uppercase">'.$lang["base_params"][$i].'</h6>
    <p class="list-group-item-text">'.$lang["info"]["base_params"][$i].'</p>
</li>';
}
$page .= '</ul></div> ';