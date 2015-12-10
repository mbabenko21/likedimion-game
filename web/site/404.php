<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 03.12.2015
 * Time: 15:15
 */

$page = <<<EOF
<p>Такой страницы не существует</p>
<div class="hr"></div>
<input value="назад" type="button" class="button button_notice upper" onclick="history.back()"/>
EOF;
;

display($page, "Ошибка");