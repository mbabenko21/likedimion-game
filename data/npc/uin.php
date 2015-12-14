<?php

//
$npc = [];
$npc["title"] = "Уин";
$npc["info"] = "";
$npc["role"] = \Likedimion\Game::NPC_ROLE_GID; //используются константы NPC_ROLE_*
$npc["race"] = \Likedimion\Game::NPC_RACE_MANS;  //используются константы NPC_RACE_*
$npc["agression"] = 0; //уровень агрессии %
$npc["base_stats"] = [5,5,2,1,1,1]; //сила, ловкость, интеллект, регенерация, медитация, конституция
$npc["war_p_skills"] = [1,1,1,1,1,1,1,1,1,1,1,1]; //
$npc["respawn"] = [10,20]; //min, max
$npc["ai"] = [];
$npc["ai"]["move"] = [0, 0, 0]; //количество локаций, мин. время отдыха, макс. время отдыха
$npc["ai"]["magic"] = []; //магия
$npc["ai"]["receptions"] = []; //приемы
$npc["ai"]["emtions"] = [];
$npc["ai"]["emtions"]["set"] = [[1, 1],  [300, 600]]; //сколько действий, период использования
$npc["ai"]["emtions"]["bank"] = []; //набор эмоций
$npc["ai"]["replics"]["set"] = [[0, 0], [300, 600]]; //аналогично эмоциям
$npc["ai"]["replics"]["bank"] = [];

$npc["dialog"] = [
    "init" => [
        "npc" => "Приветствую тебя [to.title], меня зовут [self.title]",
        "answers" => [
            "Отлично."
        ]
    ],

    "destruct" => [
        "npc" => "Счастливо оставаться!"
    ]
]; //

return $npc;
