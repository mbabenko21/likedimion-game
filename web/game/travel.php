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
$page .= <<<PAGE
<div class="progerss__bar">
    <div class="progress">
        <div class="fill life" style="width: {$lifePercent}%"></div>
        <div class="text strong">{$player["char_params"][0]} / {$player["char_params"][1]}</div>
    </div>
    <div class="progress">
        <div class="fill mana" style="width: {$manaPercent}%"></div>
        <div class="text strong">{$player["char_params"][2]} / {$player["char_params"][3]}</div>
    </div>
    <div class="progress">
        <div class="fill expir" style="width: {$expirPercent}%"></div>
        <div class="text strong">{$player["experience"]} / {$playerHelper->getNeedExp($player["level"]+1)}</div>
    </div>
</div>
PAGE;
//БАФФЫ
$page .= View::toMainButton('обновить')."<div class='hr'></div>";
if($player["role"] == \Likedimion\Game::ROLE_ADMIN){
    $page .= View::link("/?admin=main", "админка")."<div class='hr'></div>";
}
View::display($page, "Likedimion", \Likedimion\Helper\View::CARD_MAIN);