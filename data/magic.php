<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 09.12.2015
 * Time: 18:55
 */

$magic = [];
$magic["base"] = [];
$magic["swords"] = []; //мечи
$magic["bows"] = []; //луки
$magic["axes"] = []; //топоры
$magic["maces"] = []; //дробящее
$magic["spears"] = []; //древковое
$magic["knifes"] = []; //кинжалы
$magic["fire"] = []; //
$magic["water"] = []; //
$magic["air"] = []; //
$magic["earth"] = []; //
$magic["magic"] = []; //
$magic["energy"] = []; //энергообмен

$magic["base"]["punch"] = [
    "title" => "Удар кулаком",
    "info" => "Наносит небольшой урон противнику.",
    "effect" => "урон кулаками +[1,2,3,4,5]%",
    "need" => [
        "any" => [
            "у вас в руках не должно быть оружия",
            "ваша сила должна быть не более 10"
        ]
    ],
    "cash" => [0, 0, 0, 0, 0],
    "cost" => [1, 1, 1, 1, 1],
    "cooldown" => [2, 2, 2, 2, 2]
];

$magic["swords"]["hitstrike"] = [
    "title" => "Точный удар",
    "info" => "Наносит урон противнику с повышеной точностью.",
    "effect" => "точность удара +[10,20,40,80,100]%",
    "need" => [
        "class" => "war",
        "spl" => "war_sword_shield",
        "war_skills" => [0, 1],
        "magic" => [
            ["swords.hitstrike", 0],
            ["swords.hitstrike", 1],
            ["swords.hitstrike", 2],
            ["swords.hitstrike", 3],
            ["swords.hitstrike", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11]
];
$magic["swords"]["vortex"] = [
    "title" => "Вихрь клинков",
    "info" => "Атакует противника с повышенной силой.",
    "effect" => "сила удара +[10,20,30,40,50]%",
    "need" => [
        "class" => "war",
        "spl" => "war_sword_shield",
        "war_skills" => [1, 5],
        "magic" => false, //["swords.hit_strike", 2, "swords.vortex", 3],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [150, 250, 350, 450, 550],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11]
];

return $magic;