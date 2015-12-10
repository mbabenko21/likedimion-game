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

