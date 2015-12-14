<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 14.12.2015
 * Time: 15:00
 */

require ROOT."/../data/items.php";

try {
    $ld->items->remove();
} catch (MongoException $e){
    $page = <<<EOF
<div class="alert alert-danger>Ошибка подключения к базе данных<br/>{$e->getMessage()}</div>"
EOF;
}

$itm = $ld->items;
$itm->createIndex(["iid" => 1], ["unique" => true]);

try {
    $itm->batchInsert($items);
    $page = <<<PAGE
<div class="alert alert-success">Предметы успешно обновлены</div>
PAGE;
} catch(MongoException $e){
    $page = <<<PAGE
<div class="alert alert-danger">Не удалось обновить предметы, возникла ошибка<br/>{$e->getMessage()}</div>
PAGE;
}

\Likedimion\Helper\View::display($page, "Обновление мира", \Likedimion\Helper\View::CARD_DEFAULT);