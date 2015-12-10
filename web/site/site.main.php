<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 03.12.2015
 * Time: 2:49
 */
setcookie("LD", "", time()-100000, "/", "", 0);
//session_destroy();
$news = $G->news->find()->limit(3);
$page = "";
if($news->count() > 0){
    $page.="<p>";
    while($news->hasNext()){
        $new = $news->getNext();
        $page.="<b>".$new['date']."</b><br/>";
        $page.="<b>".$new['title']."</b><br/>";
        $page.="<b>".$new['content']."</b>";
        unset($new);
    }
    $page.="</p>";
} else {
    $page.="<p>Новостей еще не было</p>";
}
$routes = new Routes();
$page.="<div class='hr'></div>";
$page .=<<<EOL
    <form action="{route}CONNECT{/route}" method="post">
    <input class="input input_major" type="email" name="email" placeholder="Email"/><br/>
    <input class="input input_major" type="password" name="password" placeholder="Пароль"/>
    <div class="hr"></div>
    <input name="remember" type="checkbox" checked/>Запомнить меня
    <div class="hr"></div>
    <input class="button button_major" type="submit" value="Вход">
</form>
<a class="button button_money" href="{route}REG_PAGE{/route}">Регистрация</a>
EOL;
display($page, "Likedimion");