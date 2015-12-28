<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require ROOT . "/../data/blank.php";
require ROOT . "/../data/npc.php";
require ROOT . "/../data/quests.php";
require ROOT . "/../data/items.php";

try {
    $ld->locations->remove();
    $ld->quests->remove();
    $ld->items->remove();
} catch (MongoException $e) {
    return;
}

/* @var MongoCollection $loc_i type */
$loc_i = $ld->locations;
$q = $ld->quests;
$it = $ld->items;
$loc_i->createIndex(["lid" => 1], ["unique" => true]);
$q->createIndex(["qid" => 1], ["unique" => true]);
$it->createIndex(["iid" => 1], ["unique" => true]);

foreach ($locations as $key => $location) {
    $locHelper = new \Likedimion\Helper\LocationHelper($location);
    //$locHelper->setCollection($ld->locations);
    foreach($npc_lib as $npcId => $npc){
        if(in_array($location["lid"], $npc["ai"]["respawn"]["loc"])){
            $nId = "npc_".$npcId."_".\Likedimion\Helper\View::generateRandomString(3);
            $locHelper->addObject($nId, $npc);
        }
    }
    while(list($itemkey, $item) = each($items)){
        if(isset($item["ai"]["respawn"]) and in_array($location["lid"], $item["ai"]["respawn"]["loc"])){
            $item["iid"] = preg_replace("/[\.:]/", "_", $item["iid"]);
            $itemId = "item_".$item["iid"]."_".\Likedimion\Helper\View::generateRandomString(rand(3,5));
            $item["iid"] = $itemId;
            $locHelper->addObject($itemId, $item);
        }
    }
    $locations[$key] = $locHelper->getLoc();
}

try {
    $loc_i->batchInsert($locations);
    $page = <<<PAGE
<div class="alert alert-success">Локациии успешно обновлены</div>
PAGE;
} catch (MongoException $e) {
    $page = <<<PAGE
<div class="alert alert-danger">Не удалось обновить мир, возникла ошибка<br/>{$e->getMessage()}</div>
PAGE;
}

//квесты
while(list($qId, $quest) = each($questBank)){
    $quest["qid"] = $qId;
    $questBank[$qId] = $quest;
}

try {
    $q->batchInsert($questBank);
    $page .= <<<PAGE
<div class="alert alert-success">Квесты успешно обновлены</div>
PAGE;
} catch (MongoException $e) {
    $page .= <<<PAGE
<div class="alert alert-danger">Не удалось обновить квесты, возникла ошибка<br/>{$e->getMessage()}</div>
PAGE;
}

\Likedimion\Helper\View::display($page, "Обновление мира", \Likedimion\Helper\View::CARD_DEFAULT);


