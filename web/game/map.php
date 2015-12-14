<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 14.12.2015
 * Time: 12:50
 */

$page = <<<PAGE
    <img src="map.php?loc={$player["loc"]}">
    <div class="text-muted strong">Ваша позиция показана на карте красной точкой</div>
PAGE;

\Likedimion\Helper\View::display($page, "Крта", \Likedimion\Helper\View::CARD_DEFAULT);