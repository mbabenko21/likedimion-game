<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 27.12.2015
 * Time: 19:18
 */

$npc_lib = [
    "uin" => [
        "title" => "Привратник Уин",
        "info" => "",
        "race" => \Likedimion\Game::RACE_MAN,
        "sex" => \Likedimion\Game::SEX_MAN,
        "base_stats" => [10, 10, 10, 60, 60, 60],
        "war_p_skills" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        "ai" => [
            "move" => [
                "num" => [1, 1],
                "time_move" => [120, 220],
                "onlyguard" => true,
                "next_move" => time() + rand(120, 220),
                "moved_loc" => [],
                "msg_data" => [
                    "move" => ["пришел", "ушел"],
                    "teleport" => [
                        ["пространство сжимется и образуется черная воронка, оттуда выходит", "появляются клубы черного дыма, из которых выходит", "из ниоткуда появился"],
                        ["исчезает в клубах серого дыма", "растворяется в воздухе"]
                    ]
                ]
            ],
            "respawn" => [
                "loc" => ["fail.centr1"],
                "time" => [30, 60]
            ],
            "target" => false,
            "on_speak" => "",
            "emotions" => [
                "bank" => [],
                "use" => []
            ]
        ],
        "prof" => \Likedimion\Helper\NpcHelper::PROF_GID
    ]
];