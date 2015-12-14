<?php
if(!defined('ROOT')){header("Location: /?");}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 06.12.2015
 * Time: 1:04
 */
if(empty($_POST)){
    $page = <<<EOT
<form id="regForm" action="/?do=reg" method="post">
    <input class="input" type="text" name="email" placeholder="Email" /><br/>
    <input class="input" type="password" name="password" placeholder="Пароль"/><br/>
    <input class="input" type="password" name="password_с" placeholder="Повторите пароль"/>
    <div class="hr"></div>
    <ul class="tabs tabs_mobile">
        <li class="tabs__item">
            <a class="tabs__link" onclick="document.getElementById('regForm').submit();">регистрация</a>
        </li>
        <li class="tabs__item">
            <a class="tabs__link major" onclick="history.back();">назад</a>
        </li>
    </ul>
</form>
EOT;

} else {
    if($_POST["password"] == $_POST["password_с"]){
        if(preg_match('/.+@.+\..+/i', $_POST["email"])){
            if($ld->accounts->find(["email"=>$_POST["email"]])->count() < 1) {
                $account = [
                    "email" => $_POST["email"],
                    "password" => Likedimion\Helper\View::encodeString($_POST["password"], $_POST["email"]),
                    "create_time" => time()
                ];
                try {
                    $ld->accounts->insert($account);
                    $page = <<<EOL
    <p class="major">
        Регистрация нового аккаунта завершена!
        <div class="hr"></div>
        Вы можете зайти в свой кабинет используя введенные данные.
        <div class="hr"></div>
    </p>
    <a class="tabs__link" href="/?">на главную</a>
EOL;
                } catch(MongoException $e){
                    $page = <<<EOL
    <p class="major">
        Произошли ошибка сохранения аккаунта: {$e->getMessage()}
        <div class="hr"></div>
    </p>
    <a class="tabs__link" onclick="history.back()">назад</a>
EOL;
                }
            } else {
                $page=<<<EOL
    <p class="major">
        Аккаунт с такий Email уже существует.
    </p>
    <a class="tabs__link" onclick="history.back()">назад</a>
EOL;
            }
        } else {
            $page=<<<EOL
    <p class="major">
        Это не похоже на Email
    </p>
    <a class="tabs__link" onclick="history.back()">назад</a>
EOL;
        }
    } else {
        $page=<<<EOL
    <p class="major">
        Введенные пароли не совпадают
    </p>
    <a class="tabs__link" onclick="history.back()">назад</a>
EOL;
    }
}

\Likedimion\Helper\View::display($page, "Регистрация нового пользователя.");