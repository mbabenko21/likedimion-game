<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 07.12.2015
 * Time: 0:55
 */
use Likedimion\Helper\View;

$player = $ld->players->findOne(["_id" => new MongoId($_GET["pid"])]);
if($player) {
    if (!isset($_GET["ok"])) {
        $page = <<<OK
<p class="alert alert-success">
Вы действительно хотите удалить героя <span class="strong">{$player["title"]}</span>? <br/>
<span class="text-danger strong">После удаления персонажа невозможно будет восстановить!</span>
</p>
<ul class="tabs tabs_mobile list-inline">
    <li class="tabs_item ">
        <a class="tabs__link button bg-danger" href="/?cb=remove&pid={$_GET["pid"]}&ok=1">удалить</a>
    </li>
    <li class="tabs_item ">
        <a class="tabs__link button bg-info" onclick="history.back();">отмена</a>
    </li>
</ul>
OK;
        \Likedimion\Helper\View::display($page, "Удаление ".$player["title"]);
    } else {
        $ld->players->remove(["_id" => new MongoId($_GET["pid"])]);
        header("Location: /?");
    }
} else {
    $page =<<<PAGE
<p class="alert alert-success">
Этот герой не найден в базе.
</p>
PAGE;
    $page .= View::backButton();
    View::display($page, "Ошибка");
}