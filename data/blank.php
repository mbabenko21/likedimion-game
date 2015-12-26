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
        "lid" => "ld.790.1370",
        "title" => "У северных ворот города Фаиль",
        "global" => "Долина Фаиль",
        "doors" => [
            ["на север по долине", "ld.790.1360"],
            ["войти в город", "fail.ngate"]
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_UNGUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.ngate",
        "title" => "Северные ворота",
        "global" => "Фаиль",
        "doors" => [
            ["выйти за ворота", "ld.790.1370"],
            ["к банку", "fail.bank2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.bank2",
        "title" => "У банка",
        "global" => "Фаиль",
        "doors" => [
            ["войти в банк", "fail.bank"],
            ["к северным воротам", "fail.ngate"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.bank",
        "title" => "Банк",
        "global" => "Фаиль",
        "doors" => [
            ["в восточную дверь", "fail.bank2"],
            ["в западную дверь", "fail.bank3"],
            ["в южную дверь", "fail.cpl"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.bank3",
        "title" => "Возле банка",
        "global" => "Фаиль",
        "doors" => [
            ["в банк", "fail.bank"],
            ["в конюшню", "fail.kon"],
            ["на центральный перекресток", "fail.per1"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.kon",
        "title" => "Конюшня",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.bank3"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [ ],
        "loc_t" => []
    ],
    [
        "lid" => "fail.per1",
        "title" => "Центральный перекресток",
        "global" => "Фаиль",
        "doors" => [
            ["к банку", "fail.bank3"],
            ["в академию", "fail.ak"],
            ["к дом лекаря", "fail.lek"],
            ["на центральную улицу","fail.centr1"],
            ["в жилой квартал", "fail.wgate1"]
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [ ],
        "loc_t" => []
    ],
    [
        "lid" => "fail.ak",
        "title" => "Академия магии",
        "global" => "Фаиль",
        "doors" => [
            ["ко входу", "fail.per1"],
            ["на второй этаж", "fail.ak2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [ ],
        "loc_t" => []
    ],
    [
        "lid" => "fail.ak2",
        "title" => "Академия магии",
        "global" => "Фаиль",
        "doors" => [
            ["на первый этаж", "fail.ak"],
            ["в библиотеку", "fail.bibl"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [ ],
        "loc_t" => []
    ],
    [
        "lid" => "fail.bibl",
        "title" => "Библиотека академии",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.ak2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [ ],
        "loc_t" => []
    ],
    [
        "lid" => "fail.lek",
        "title" => "Дом лекаря",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.per1"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [ ],
        "loc_t" => []
    ],
    [
        "lid" => "fail.wgate1",
        "title" => "Жилой квартал",
        "global" => "Фаиль",
        "doors" => [
            ["к перекрестку", "fail.per1"],
            ["к западным воротам", "fail.wgate"],
            ["на юго-восток, к складу", "fail.zkv1"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [ ],
        "loc_t" => []
    ],
    [
        "lid" => "fail.zkv1",
        "title" => "Жилой квартал",
        "global" => "Фаиль",
        "doors" => [
            ["к складу", "fail.sklad"],
            ["на северо-запад, к воротам", "fail.wgate1"],
            ["на запад по кварталу", "fail.zkv2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [ ],
        "loc_t" => []
    ],
    [
        "lid" => "fail.sklad",
        "title" => "Возле склада",
        "global" => "Фаиль",
        "doors" => [
            ["в склад", "fail.sklad2"],
            ["в жилой квартал, на север", "fail.zkv1"],
            ["к южным воротам", "fail.sgate"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [ ],
        "loc_t" => []
    ],
    [
        "lid" => "fail.sklad2",
        "title" => "Внутри склада",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.sklad2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_UNGUARD,
        "loc" => [],
        "loc_add" => [ ],
        "loc_t" => []
    ],
    [
        "lid" => "fail.zkv2",
        "title" => "Жилой квартал",
        "global" => "Фаиль",
        "doors" => [
            ["на восток", "fail.zkv1"],
            ["на запад", "fail.zkv3"],
            ["в дом на юге", "fail.zkv4"]
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [ ],
        "loc_t" => []
    ],
    [
        "lid" => "fail.zkv4",
        "title" => "Дом торговца",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.zkv2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [ ],
        "loc_t" => []
    ],
    [
        "lid" => "fail.zkv3",
        "title" => "Жилой квартал",
        "global" => "Фаиль",
        "doors" => [
            ["в дом на юге", "fail.zkv5"],
            ["на восток", "fail.zkv2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [ ],
        "loc_t" => []
    ],
    [
        "lid" => "fail.zkv5",
        "title" => "Жилой дом",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.zkv3"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [ ],
        "loc_t" => []
    ],
];




