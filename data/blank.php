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

$locations = [
    [
        "lid" => "likedimion.3030.1520",
        "loc" => [
            "npc.lukas" => addNpc("lukas"),
            "npc.uin" => addNpc("uin")
        ],
    ]
];




