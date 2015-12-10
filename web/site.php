<?php
if(!defined('ROOT')){header("Location: /?");}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 05.12.2015
 * Time: 23:51
 */
\Likedimion\Helper\GameHelper::logout();
if(empty($_GET["do"])) {
    $aboutRand = [
        "ролевая игра в жанре фэнтези",
        "огромная территория",
        "большое количество навыков",
        "большое количество предметов",
        "cпециальные рассы и классы",
        "большое количество приемов и заклинаний",
        "уникальная система развития персонажа",
    ];
    $about = array_rand($aboutRand);
    $page = <<<EOT
    <p class="text-muted upper strong">Likedimion - это {$aboutRand[$about]}</p>
<ul class="tabs tabs_mobile">
    <li class="tabs_item ">
        <a class="tabs__link" href="">Новости</a>
    </li>
</ul>
<div class="hr"></div>
<form id="loginForm" action="/?do=connect" method="post">
    <input class="input" type="text" name="email" placeholder="Email" /><br/>
    <input class="input" type="password" name="password" placeholder="Пароль"/><br/>
    <div class="hr"></div>
    <ul class="tabs tabs_mobile">
        <li class="tabs__item">
            <a class="tabs__link bg-success button" href="#" onclick="document.getElementById('loginForm').submit();">вход</a>
        </li>
        <li class="tabs__item">
            <a class="tabs__link bg-info button" href="/?do=reg">регистрация</a>
        </li>
    </ul>
</form>
EOT;


    \Likedimion\Helper\View::display($page, "Likedimion. Возрождение.");
} elseif(file_exists("./site/".$_GET["do"].".php")){
    require "./site/".$_GET["do"].".php";
} else {
    require "./404.php";
}