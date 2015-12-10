<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 03.12.2015
 * Time: 4:53
 */

if(isset($_POST["email"])){
    $email = htmlspecialchars($_POST["email"]);
    $account = $G->accounts->findOne(["email" => $email]);
    $pwd = xoft_encode(htmlspecialchars($_POST["password"]), $account["email"]);
    if(!is_null($account) and $pwd == $account["password"]){
        /** @var MongoId $id */
        $id = $account["_id"];
        //$cookie = md5($id->id.".".$account["email"].",".$account["password"].",".md5(generate_password(6)));
        $experTime = (true===$_GET["remember"]) ? time()+31536000 : 0;

        session_start();
        $sid = session_id();
        $sid = substr($sid,0,8);
        session_id($sid);
        setcookie('LD', $sid, $experTime, "/", "", 0);
        $_SESSION["account"] = $id;
        $name = (!isset($account["name"])) ? $account["email"] : $account["name"];
        $page =<<<EOL
        <h1>Добро пожаловать, $name</h1>
        теперь просто перейдете в свой кабинет
        <div class="hr"></div>
        <a class="button button_major upper" href="{route}CABINET{/route}">мой кабинет</a><br/>
        <a class="button button_major upper" href="{route}MAIN_PAGE{/route}">на главную</a>
EOL;
        display($page, "Вход");
    } else {
        $page=<<<EOL
    <p class="major">
        Неверный логин или пароль
    </p>
    <a class="button button_major" href="{route}MAIN_PAGE{/route}">назад</a>
EOL;
        display($page, "Вход");
    }
} else {
    header("Location: /?".Routes::getRoute("MAIN_PAGE"));
}