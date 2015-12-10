<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 09.12.2015
 * Time: 19:19
 */

if(!isset($_GET["type"])){
    $page = '<div class="alert alert-danger">Странная вещь. Нет информации.</div>';
} else {
    if(file_exists(ROOT."/game/look/".$_GET["type"].".php")){
        require ROOT."/game/look/".$_GET["type"].".php";
    } else {
        $page = '<div class="alert alert-danger">Странная вещь. Нет информации.</div>';
    }
}
if(!$title){
    $title = "Информация";
}
\Likedimion\Helper\View::display($page, $title, "default");