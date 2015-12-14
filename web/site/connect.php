<?php
if(!defined('ROOT')){header("Location: /?");}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 06.12.2015
 * Time: 17:53
 */
use Likedimion\Helper\View;
use Likedimion\Helper\GameHelper;
if(!empty($_POST)){
    $acc = $ld->accounts->findOne(["email" => $_POST["email"]]);
    if(!is_null($acc) and View::encodeString($_POST["password"], $_POST["email"])) {
        $sid = GameHelper::auth($acc["_id"]);
        //session_id($sid);
        $page = <<<CONNECT
<p class="text-success strong upper">добро пожаловать в likedimion</p>
CONNECT;
        $page .= View::toMainButton("мой кабинет");
    } else {
        $page = <<<CONNECT
<p class="text-danger">Неправильный логин или пароль</p>
CONNECT;
        $page .= View::backButton();
    }
} else {
    $page = <<<CONNECT
    <p class="text-danger">Вы не ввели данные</p>
CONNECT;
$page .= View::backButton();
}

View::display($page, "Вход");