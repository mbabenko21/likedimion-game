<?php
if (!defined('ROOT')) {
    header("Location: /?");
}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 07.12.2015
 * Time: 11:54
 */

use Likedimion\Helper\View;

$page = <<<ADMIN

ADMIN;
$page .= View::button("/?admin=add_news", "добавить новость")."<div class='hr'></div>";
$page .= View::button("/?admin=players", "игроки")."<br/>";
$page .= View::button("/?admin=locations", "локации")."<br/>";
$page .= View::button("/?admin=items", "предметы")."<br/>";
$page .= View::button("/?admin=upgrade", "обновить мир")."<br/>";
$page .= View::button("/?admin=upgrade_items", "обновить предметы")."<br/>";

$page .= "<div class='hr'></div>";
View::display($page, "Админ-панель", "default");
