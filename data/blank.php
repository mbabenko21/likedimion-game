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
            ["на север по долине", "ld.790.1370"],
            ["на юг по долине", "ld.790.1390"],
            ["на запад по долине", "ld.800.1380"],
            ["на восток по долине", "ld.780.1380"],
            ["войти в деревню", "fail.gate"]
        ],
        "gate" => [
            "title" => "Ворота деревни Фаиль",
            "move" => "fail.gate"
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "ld.790.1370",
        "doors" => [
            ["на юг по долине", "ld.790.1380"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_UNGUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "ld.790.1390",
        "doors" => [
            ["на север по долине", "ld.790.1380"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_UNGUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ]
];




