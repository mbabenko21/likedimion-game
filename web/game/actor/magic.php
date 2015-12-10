<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 09.12.2015
 * Time: 23:59
 */
if (!defined('ROOT')) {
    header("Location: /?");
}
$playerMagic = $player["magic"];

$page .= "";

if($playerMagic and count($playerMagic) > 0){
    $page .= "<ul class='list-group'>";
    foreach($playerMagic as $key => $m){
        $page .= "<li class='list-group-item'><a class='text-uppercase strong' href='/?game=look&type=magic&m=".$key."'>".$m["title"]."</a> <span class='strong'>[уровень ".$m["level"]."]</span></li>";
    }
    $page .= "</ul>";
} else {
    $page .= "<div class='alert alert-warning'>Вы еще ничему не обучились, найдите человека, который обучит вас каким-нибудь приемам, или магии</div>";
}

