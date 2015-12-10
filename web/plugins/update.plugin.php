<?php
if(!defined("ROOT_DIR")){die("Go away!!!");}

if(defined("FLAG_UPDATE")){

	$cfg = require ROOT_DIR."/data/config.php";
	$page = "<h1>Игра закрыта</h1><div class='hr'></div>";
	$page.="<p class='notify'>Мы тут трудимся над разными важными штуками, вам придетсяч немного подождать нас</p>";
	$page.="<div class='hr'></div><a class='button button_info' href='/?'>Обновить</a>";

	display($page, $cfg["game_title"], STYLE_STANDART);
	exit;
}