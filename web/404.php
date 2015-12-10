<?php
if(!defined('ROOT')){header("Location: /?");}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 06.12.2015
 * Time: 0:59
 */
$page = <<<EOT
<p class="tabs__link tabs__link_active">Запрашиваемая страница не найдена.</p>
<div class="hr"></div>
<a class="tabs__link" onclick="history.back();">назад</a>
EOT;
;

\Likedimion\Helper\View::display($page, "Ошибка 404.");