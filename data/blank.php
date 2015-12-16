<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 03.12.2015
 * Time: 20:21
 */


function addNpc($nId){
    if(file_exists(ROOT."/../data/npc/".$nId.".php")){
        $npc = require ROOT."/../data/npc/".$nId.".php"; 
    } else {
        throw new Exception("Npc $nId not found");
    }
    return $npc;
}

function addItem($iId){
    global $ld;
    $itemCollection = $ld->items;
    if($item = $itemCollection->findOne(["iid" => $iId])){
        return $item;
    }
    throw new Exception("Npc $iId not found");
}

$locations = [
    [
        "lid" => "ld.790.1380",
        "doors" => [
            ["на север по долине", \Likedimion\Helper\LocationHelper::DOOR_N],
            ["на юг по долине", \Likedimion\Helper\LocationHelper::DOOR_S],
            ["на запад по долине", \Likedimion\Helper\LocationHelper::DOOR_W],
            ["на восток по долине", \Likedimion\Helper\LocationHelper::DOOR_E]
        ],
        "gate" => [
            "title" => "Ворота деревни Фаиль",
            "move" => "fail.gate"
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [
            "npc_lukas" => addNpc("lukas"),
            "npc_uin" => addNpc("uin"),
            "item_news" => addItem("i.s.news")
        ],
    ]
];




