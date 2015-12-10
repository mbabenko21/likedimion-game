<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 03.12.2015
 * Time: 4:57
 */
$account = $G->accounts->findOne(['email' => $_SESSION["email"]]);
if(isset($_SESSION["aid"])) {
    unset($_SESSION["aid"]);
}
$aid = $account["id"];
$players = $G->players->find(["account" => $aid->id]);
$page = "<a class=\"button button_info upper\" href=\"{route}SITE_NEWS{/route}\">новости</a><div class=\"hr\"></div>";
$page .= "<p class='upper strong al8'>Персонажи</p><div class='hr'></div><ul>";
if ($players->count() > 0) {
    while ($players->hasNext()) {
        $actor = $players->getNext();
        $actId = $actor["_id"];
        $class = msg("class_".$actor["class"]);
        $page .= <<<EOL
            <li>
                <table>
                <tr>
                    <td colspan="2"><p class="upper strong al8">{$actor["title"]}</p></td>
                </tr>
                <tr>
                    <td colspan="2"> {$class}, {$actor["level"]}ур.</td>
                </tr>
                <tr>
                    <td><a class="button button_info upper" href="{route}GAME_CONNECT{/route}&aid={$actId}">в игру</a></td>
                    <td><a class="button button_warn upper" href="{route}REMOVE_ACTOR{/route}&aid={$actId}">удалить</a></td>
                </tr>
                </table>
            </li>
EOL;
        $players->next();
    }
    $page.="</ul>";
} else {
    $page.="Нет ни одного персонажа";
}
$page .= <<<EOL
<div class="hr"></div>
<a class="button button_notice upper" href="{route}CREATE_ACTOR{/route}">новый персонаж</a><br/>
<a class="button button_notice upper" href="{route}SETTINGS{/route}">настройки</a><br/>
<a class="button button_notice upper" href="{route}SITE_ONLINE{/route}">кто онлайн?</a><br/>
<a class="button button_notice upper" href="{route}SITE_LIB{/route}">библиотека</a><br/>
<div class="hr"></div>
<a class="button button_warn upper" href="{route}MAIN_PAGE{/route}">выход</a>
EOL;

display($page, "Мой кабинет");