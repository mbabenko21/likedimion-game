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

$magic["swords"]["swords1"] = [
    "title" => "Точный удар",
    "info" => "Наносит урон противнику с повышеной точностью.",
    "effect" => "точность удара +[10,20,40,80,100]%",
    "need" => [
        "class" => "war",
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
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_sword12"
];
$magic["swords"]["swords2"] = [
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
$magic["swords"]["swords3"] = [
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
$magic["swords"]["swords4"] = [
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
$magic["swords"]["swords5"] = [
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
$magic["swords"]["swords6"] = [
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
$magic["swords"]["swords7"] = [
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
$magic["swords"]["swords8"] = [
    "title" => "Точный удар",
    "info" => "Наносит урон противнику с повышеной точностью.",
    "effect" => "точность удара +[10,20,40,80,100]%",
    "need" => [
        "class" => "war",
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
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_sword12"
];
$magic["swords"]["swords9"] = [
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
$magic["swords"]["swords10"] = [
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
$magic["swords"]["swords11"] = [
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
$magic["swords"]["swords12"] = [
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
$magic["swords"]["swords13"] = [
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
$magic["swords"]["swords14"] = [
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
$magic["swords"]["swords15"] = [
    "title" => "Точный удар",
    "info" => "Наносит урон противнику с повышеной точностью.",
    "effect" => "точность удара +[10,20,40,80,100]%",
    "need" => [
        "class" => "war",
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
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_sword12"
];
$magic["swords"]["swords16"] = [
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
$magic["swords"]["swords17"] = [
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
$magic["swords"]["swords18"] = [
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
$magic["swords"]["swords19"] = [
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
$magic["swords"]["swords20"] = [
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
$magic["swords"]["swords21"] = [
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
$magic["swords"]["swords22"] = [
    "title" => "Точный удар",
    "info" => "Наносит урон противнику с повышеной точностью.",
    "effect" => "точность удара +[10,20,40,80,100]%",
    "need" => [
        "class" => "war",
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
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_sword12"
];
$magic["swords"]["swords23"] = [
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
$magic["swords"]["swords24"] = [
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
$magic["swords"]["swords25"] = [
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
$magic["swords"]["swords26"] = [
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

$magic["bows"]["bows1"] = [
    "title" => "Точный удар",
    "info" => "Наносит урон противнику с повышеной точностью.",
    "effect" => "точность удара +[10,20,40,80,100]%",
    "need" => [
        "class" => "war",
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
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_sword12"
];
$magic["bows"]["bows2"] = [
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
$magic["bows"]["bows3"] = [
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
$magic["bows"]["bows4"] = [
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
$magic["bows"]["bows5"] = [
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
$magic["bows"]["bows6"] = [
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
$magic["bows"]["bows7"] = [
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
$magic["bows"]["bows8"] = [
    "title" => "Точный удар",
    "info" => "Наносит урон противнику с повышеной точностью.",
    "effect" => "точность удара +[10,20,40,80,100]%",
    "need" => [
        "class" => "war",
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
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_sword12"
];
$magic["bows"]["bows9"] = [
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
$magic["bows"]["bows10"] = [
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
$magic["bows"]["bows11"] = [
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
$magic["bows"]["bows12"] = [
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
$magic["bows"]["bows13"] = [
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
$magic["bows"]["bows14"] = [
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

$magic["fire"]["fire1"] = [
    "title" => "Огненный шар",
    "words" =>"Globus Ignis",
    "info" => "Запускает в противника огненный шар.",
    "effect" => "Наносит [5,7,9,11,15] урона магией. ",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["fire.fire1", 0],
            ["fire.fire1", 1],
            ["fire.fire1", 2],
            ["fire.fire1", 3],
            ["fire.fire1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_fire3"
];
$magic["fire"]["fire2"] = [
    "title" => "Огненный шар",
    "words" =>"Globus Ignis",
    "info" => "Запускает в противника огненный шар.",
    "effect" => "Наносит [5,7,9,11,15] урона магией. ",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["fire.fire1", 0],
            ["fire.fire1", 1],
            ["fire.fire1", 2],
            ["fire.fire1", 3],
            ["fire.fire1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_fire3"
];
$magic["fire"]["fire3"] = [
    "title" => "Огненный шар",
    "words" =>"Globus Ignis",
    "info" => "Запускает в противника огненный шар.",
    "effect" => "Наносит [5,7,9,11,15] урона магией. ",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["fire.fire1", 0],
            ["fire.fire1", 1],
            ["fire.fire1", 2],
            ["fire.fire1", 3],
            ["fire.fire1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_fire3"
];
$magic["fire"]["fire4"] = [
    "title" => "Огненный шар",
    "words" =>"Globus Ignis",
    "info" => "Запускает в противника огненный шар.",
    "effect" => "Наносит [5,7,9,11,15] урона магией. ",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["fire.fire1", 0],
            ["fire.fire1", 1],
            ["fire.fire1", 2],
            ["fire.fire1", 3],
            ["fire.fire1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_fire3"
];
$magic["fire"]["fire5"] = [
    "title" => "Огненный шар",
    "words" =>"Globus Ignis",
    "info" => "Запускает в противника огненный шар.",
    "effect" => "Наносит [5,7,9,11,15] урона магией. ",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["fire.fire1", 0],
            ["fire.fire1", 1],
            ["fire.fire1", 2],
            ["fire.fire1", 3],
            ["fire.fire1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_fire3"
];
$magic["fire"]["fire6"] = [
    "title" => "Огненный шар",
    "words" =>"Globus Ignis",
    "info" => "Запускает в противника огненный шар.",
    "effect" => "Наносит [5,7,9,11,15] урона магией. ",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["fire.fire1", 0],
            ["fire.fire1", 1],
            ["fire.fire1", 2],
            ["fire.fire1", 3],
            ["fire.fire1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_fire3"
];
$magic["fire"]["fire7"] = [
    "title" => "Огненный шар",
    "words" =>"Globus Ignis",
    "info" => "Запускает в противника огненный шар.",
    "effect" => "Наносит [5,7,9,11,15] урона магией. ",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["fire.fire1", 0],
            ["fire.fire1", 1],
            ["fire.fire1", 2],
            ["fire.fire1", 3],
            ["fire.fire1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_fire3"
];

$magic["earth"]["earth1"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["earth"]["earth2"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["earth"]["earth3"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["earth"]["earth4"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["earth"]["earth5"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["earth"]["earth6"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["earth"]["earth7"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];

$magic["water"]["water1"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["water"]["water2"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["water"]["water3"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["water"]["water4"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["water"]["water5"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["water"]["water6"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["water"]["water7"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["water"]["cold1"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["water"]["cold2"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["water"]["cold3"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["water"]["cold4"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["water"]["cold5"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["water"]["cold6"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["water"]["cold7"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];

$magic["magic"]["light1"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["magic"]["light2"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["magic"]["light3"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["magic"]["light4"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["magic"]["light5"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["magic"]["light6"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["magic"]["light7"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["magic"]["heal1"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["magic"]["heal2"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["magic"]["heal3"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["magic"]["heal4"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["magic"]["heal5"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["magic"]["heal6"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["magic"]["heal7"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];

$magic["energy"]["energy1"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["energy"]["energy2"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["energy"]["energy3"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["energy"]["energy4"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["energy"]["energy5"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["energy"]["energy6"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["energy"]["energy7"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["energy"]["energy8"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["energy"]["energy9"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["energy"]["energy10"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["energy"]["energy11"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["energy"]["energy12"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["energy"]["energy13"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["energy"]["energy14"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];

$magic["air"]["air1"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["air"]["air2"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["air"]["air3"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["air"]["air4"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["air"]["air5"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["air"]["air6"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["air"]["air7"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["air"]["death1"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["air"]["death2"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["air"]["death3"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["air"]["death4"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["air"]["death5"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["air"]["death6"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];
$magic["air"]["death7"] = [
    "title" => "Столп земли",
    "words" => "Сolumnas Terrae",
    "info" => "Подымает из земли стол.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth1", 0],
            ["earth.earth1", 1],
            ["earth.earth1", 2],
            ["earth.earth1", 3],
            ["earth.earth1", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth1"
];


$magic["earth"]["earth3"] = [
    "title" => "Глыба земли",
    "words" => "Scandalum De Terra",
    "info" => "Запускает в противника земляную глыбу.",
    "effect" => "Наносит [5,7,9,11,15] урона магией.",
    "need" => [
        "class" => "mag",
        "war_skills" => [8, 0],
        "magic" => [
            ["earth.earth3", 0],
            ["earth.earth3", 1],
            ["earth.earth3", 2],
            ["earth.earth3", 3],
            ["earth.earth3", 4]
        ],
        "level" => [1, 5, 10, 15, 20]
    ],
    "cash" => [100, 200, 300, 400, 500],
    "cost" => [5, 7, 9, 11, 13],
    "cooldown" => [3, 5, 7, 9, 11],
    "icon" => "is1 sk_earth3"
];
return $magic;