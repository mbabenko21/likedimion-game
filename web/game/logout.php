<?php
if(!defined('ROOT')){header("Location: /?");}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 07.12.2015
 * Time: 0:31
 */

if(!isset($_GET["ok"])){
    $page =<<<OK
<p class="alert alert-success">
{$player["title"]}, вы действительно хотите выйти? Ваш персонаж будет некоторое время оставаться в игре.
</p>
<ul class="tabs tabs_mobile list-inline">
    <li class="tabs_item ">
        <a class="tabs__link button bg-danger" href="/?game=logout&ok=1">выйти</a>
    </li>
    <li class="tabs_item ">
        <a class="tabs__link button bg-info" onclick="history.back();">отмена</a>
    </li>
</ul>
OK;
\Likedimion\Helper\View::display($page, "Выход");
} else {
    if($_SESSION["pid"]){
        unset($_SESSION["pid"]);
    }

    header("Location: /?");
}

