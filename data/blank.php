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
        "lid" => "likedimion.3030.1520",
        "doors" => [
            ["на север по долине", \Likedimion\Helper\LocationHelper::DOOR_N],
            ["на юг по долине", \Likedimion\Helper\LocationHelper::DOOR_S],
            ["на запад по долине", \Likedimion\Helper\LocationHelper::DOOR_W],
            ["на восток по долине", \Likedimion\Helper\LocationHelper::DOOR_E]
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [
            "npc.lukas" => addNpc("lukas"),
            "npc.uin" => addNpc("uin"),
            "item.news" => addItem("i.s.news")
        ],
    ]
];




