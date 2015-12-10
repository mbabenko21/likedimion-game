<?php
if (!defined('ROOT')) {
    header("Location: /?");
}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 07.12.2015
 * Time: 12:12
 */

use Likedimion\Helper\View;

$page = <<<ADMIN

ADMIN;
$page .= View::button("/?admin=locations&l=new", "новая локация")."<br/>";

$page .= "<div class='hr'></div>";
View::display($page, "Админ-панель", "default");