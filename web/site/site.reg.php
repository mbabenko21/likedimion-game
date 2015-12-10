<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 03.12.2015
 * Time: 3:54
 */

if(!isset($_POST["email"])) {
    $page = <<<EOL
    <form action="{route}REG_PAGE{/route}" method="POST">
        <input name="email" type="email" class="input input_major" placeholder="Email" /> <br/>
        <input name="password" type="password" class="input input_major" placeholder="Пароль" /> <br/>
        <input name="password_с" type="password" class="input input_major" placeholder="Подтвердите пароль" />
        <div class="hr"></div>
        <input class="button button_major" type="submit" value="Регистрация">
    </form>
        <div class="hr"></div>
        <a class="button button_info" href="{route}MAIN_PAGE{/route}">назад</a>
EOL;
} else {
    if($_POST["password"] == $_POST["password_с"]){
        if(preg_match('/.+@.+\..+/i', $_POST["email"])){
            if($G->accounts->find(["email"=>$_POST["email"]])->count() < 1) {
                $account = [
                    "email" => $_POST["email"],
                    "password" => xoft_encode($_POST["password"], $_POST["email"])
                ];
                $G->accounts->insert($account);
                $page = <<<EOL
    <p class="major">
        Регистрация нового аккаунта завершена!
        <div class="hr"></div>
        Вы можете зайти в свой кабинет используя введенные данные.
        <div class="hr"></div>
    </p>
    <a class="button button_major" href="{route}MAIN_PAGE{/route}">на главную</a>
EOL;
            } else {
                $page=<<<EOL
    <p class="major">
        Аккаунт с такий Email уже существует.
    </p>
    <a class="button button_major" href="{route}REG_PAGE{/route}">назад</a>
EOL;
            }
        } else {
            $page=<<<EOL
    <p class="major">
        Это не похоже на Email
    </p>
    <a class="button button_major" href="{route}REG_PAGE{/route}">назад</a>
EOL;
        }
    } else {
        $page=<<<EOL
    <p class="major">
        Введенные пароли не совпадают
    </p>
    <a class="button button_major" href="{route}REG_PAGE{/route}">назад</a>
EOL;
    }
}
display($page, "Регистрация");