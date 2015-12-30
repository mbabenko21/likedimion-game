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
require ROOT . "/../data/respawns.php";
require ROOT . "/../data/names.php";

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
    foreach($respawns as $locId => $respawn){
        if($locId == $location["lid"]){
            for($i = 0; $i <count($respawn); $i++){
                $id = preg_split("/[_\.]/", $respawn[$i]);
                switch($id[0]){
                    case "npc":
                        if(isset($npc_lib[$id[1]])){
                            $npcCompiler = new \Likedimion\Helper\NpcCompiler();
                            $npc = $npc_lib[$id[1]];
                            $manNames = str_replace(",", "", $manNames);
                            $mNames = preg_split("/(\r\n)/", $manNames);
                            $wNames = preg_split("/(\r\n)/",$womanNames);
                            $npcCompiler->setNpc($npc)
                            ->setManNames($mNames)
                            ->setWomanNames($wNames);
                            $npcCompiler->compile();
                            $npc = $npcCompiler->getNpc();
                            $npc["ai"]["respawn"]["loc"] = $locId;
                            $npcId = "npc_".$id[1]."_".\Likedimion\Helper\View::generateRandomString(rand(3,5));
                            $locHelper->addObject($npcId, $npc);
                        }
                        break;
                    case "item":
                        if(isset($items[$id[1]])){
                            $iid = $id;
                            unset($iid[0]);
                            $iid = implode("_", $iid);
                            $item = $items[$iid];
                            $item["ai"]["respawn"]["loc"] = $locId;
                            $itemId = "item_".$id[1]."_".\Likedimion\Helper\View::generateRandomString(rand(3,5));
                            $locHelper->addObject($itemId, $item);
                        }
                        break;
                }
            }
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


