<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require ROOT."/../data/blank.php";

try {
    $ld->locations->remove();
} catch (MongoException $e){
    return;
}

/* @var MongoCollection $loc_i type */
$loc_i = $ld->locations;
$loc_i->createIndex(["lid" => 1], ["unique" => true]);


 try {
    $loc_i->batchInsert($locations);
     $page = <<<PAGE
<div class="alert alert-success">Мир успешно обновлен</div>
PAGE;
} catch(MongoException $e){
     $page = <<<PAGE
<div class="alert alert-danger">Не удалось обновить мир, возникла ошибка<br/>{$e->getMessage()}</div>
PAGE;
 }

\Likedimion\Helper\View::display($page, "Обновление мира", \Likedimion\Helper\View::CARD_DEFAULT);


