<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 27.12.2015
 * Time: 19:18
 */

$npc_lib = [
    //люди
    "uin" => [
        "title" => "Привратник Уин",
        "info" => "",
        "race" => \Likedimion\Game::RACE_MAN,
        "sex" => \Likedimion\Game::SEX_MAN,
        "state" => \Likedimion\Ai\NpcAi::STATE_STAND,
        "base_stats" => [10, 10, 8, 9, 8, 3],
        "war_p_skills" => [10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        "ai" => [
            "move" => [
                "num" => [0, 0],
                "time" => [120, 220],
                "onlyguard" => true,
                "list" => [],
                "data" => [
                    "move" => ["пришел", "ушел"],
                    "teleport" => [
                        ["пространство сжимется и образуется черная воронка, оттуда выходит", "появляются клубы черного дыма, из которых выходит", "из ниоткуда появился"],
                        ["исчезает в клубах серого дыма", "растворяется в воздухе"]
                    ]
                ]
            ],
            "respawn" => [
                "time" => [30, 60]
            ],
            "on_speak" => "",
            "listeners" => [
                //"come_player" => "\\Likedimion\\Ai\\Listeners\\UinListener",
            ]
        ],
        "prof" => \Likedimion\Helper\NpcHelper::PROF_GID
    ],
    "djon" => [
        "title" => "малыш Джон",
        "info" => "",
        "race" => \Likedimion\Game::RACE_MAN,
        "sex" => \Likedimion\Game::SEX_MAN,
        "state" => \Likedimion\Ai\NpcAi::STATE_STAND,
        "base_stats" => [10, 10, 10, 60, 60, 60],
        "war_p_skills" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        "ai" => [
            "move" => [
                "num" => [0, 0],
                "time" => [120, 220],
                "onlyguard" => true,
                "list" => [],
                "data" => [
                    "move" => ["пришел", "ушел"],
                    "teleport" => [
                        ["пространство сжимется и образуется черная воронка, оттуда выходит", "появляются клубы черного дыма, из которых выходит", "из ниоткуда появился"],
                        ["исчезает в клубах серого дыма", "растворяется в воздухе"]
                    ]
                ]
            ],
            "respawn" => [
                "time" => [30, 60]
            ],
            "on_speak" => "",
            "listeners" => [
                //"come_player" => "\\Likedimion\\Ai\\Listeners\\UinListener",
            ]
        ],
        "prof" => \Likedimion\Helper\NpcHelper::PROF_DEFAULT
    ],
    "jozeph" => [
        "title" => "Джозеф",
        "info" => "",
        "race" => \Likedimion\Game::RACE_MAN,
        "sex" => \Likedimion\Game::SEX_MAN,
        "state" => \Likedimion\Ai\NpcAi::STATE_STAND,
        "base_stats" => [10, 10, 10, 60, 60, 60],
        "war_p_skills" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        "ai" => [
            "move" => [
                "num" => [0, 0],
                "time" => [120, 220],
                "onlyguard" => true,
                "list" => [],
                "data" => [
                    "move" => ["пришел", "ушел"],
                    "teleport" => [
                        ["пространство сжимется и образуется черная воронка, оттуда выходит", "появляются клубы черного дыма, из которых выходит", "из ниоткуда появился"],
                        ["исчезает в клубах серого дыма", "растворяется в воздухе"]
                    ]
                ]
            ],
            "respawn" => [
                "time" => [30, 60]
            ],
            "on_speak" => "",
            "listeners" => [
                //"come_player" => "\\Likedimion\\Ai\\Listeners\\UinListener",
            ]
        ],
        "prof" => \Likedimion\Helper\NpcHelper::PROF_HEALER
    ],
    "bankir" => [
        "title" => "random",
        "info" => "",
        "race" => \Likedimion\Game::RACE_MAN,
        "sex" => \Likedimion\Game::SEX_MAN,
        "state" => \Likedimion\Ai\NpcAi::STATE_STAND,
        "base_stats" => 10,
        "war_p_skills" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        "ai" => [
            "move" => [
                "num" => [0, 0],
                "time" => [120, 220],
                "onlyguard" => true,
                "list" => [],
                "data" => [
                    "move" => ["пришел", "ушел"],
                    "teleport" => [
                        ["пространство сжимется и образуется черная воронка, оттуда выходит", "появляются клубы черного дыма, из которых выходит", "из ниоткуда появился"],
                        ["исчезает в клубах серого дыма", "растворяется в воздухе"]
                    ]
                ]
            ],
            "respawn" => [
                "time" => [30, 60]
            ],
            "on_speak" => "",
            "listeners" => [
                //"come_player" => "\\Likedimion\\Ai\\Listeners\\UinListener",
            ]
        ],
        "prof" => \Likedimion\Helper\NpcHelper::PROF_BANKIR
    ],
    "hman" => [
        "title" => "random",
        "info" => "",
        "race" => \Likedimion\Game::RACE_MAN,
        "sex" => \Likedimion\Game::SEX_MAN,
        "state" => \Likedimion\Ai\NpcAi::STATE_STAND,
        "base_stats" => 15,
        "war_p_skills" => 5,
        "ai" => [
            "move" => [
                "num" => [0, 0],
                "time" => [120, 220],
                "onlyguard" => true,
                "list" => [],
                "black_terr" => ["build", "unguard"],
                "data" => [
                    "move" => ["пришел", "ушел"],
                    "teleport" => [
                        ["пространство сжимется и образуется черная воронка, оттуда выходит", "появляются клубы черного дыма, из которых выходит", "из ниоткуда появился"],
                        ["исчезает в клубах серого дыма", "растворяется в воздухе"]
                    ]
                ]
            ],
            "respawn" => [
                "time" => [30, 60]
            ],
            "on_speak" => "",
            "listeners" => [
                //"come_player" => "\\Likedimion\\Ai\\Listeners\\UinListener",
            ]
        ],
        "prof" => \Likedimion\Helper\NpcHelper::PROF_HOUSE_MAN
    ],
    "lman" => [
        "title" => "random",
        "info" => "",
        "race" => \Likedimion\Game::RACE_MAN,
        "sex" => \Likedimion\Game::SEX_MAN,
        "state" => \Likedimion\Ai\NpcAi::STATE_STAND,
        "base_stats" => 2,
        "war_p_skills" => 0,
        "ai" => [
            "move" => [
                "num" => [0, 1],
                "time" => [120, 220],
                "onlyguard" => true,
                "list" => [],
                "black_terr" => ["build", "unguard"],
                "data" => [
                    "move" => ["пришел", "ушел"],
                    "teleport" => [
                        ["пространство сжимется и образуется черная воронка, оттуда выходит", "появляются клубы черного дыма, из которых выходит", "из ниоткуда появился"],
                        ["исчезает в клубах серого дыма", "растворяется в воздухе"]
                    ]
                ]
            ],
            "respawn" => [
                "time" => [30, 60]
            ],
            "on_speak" => "",
            "listeners" => [
                //"come_player" => "\\Likedimion\\Ai\\Listeners\\UinListener",
            ]
        ],
        "prof" => \Likedimion\Helper\NpcHelper::PROF_DEFAULT
    ],
    "lwman" => [
        "title" => "random",
        "info" => "",
        "race" => \Likedimion\Game::RACE_MAN,
        "sex" => \Likedimion\Game::SEX_WMAN,
        "state" => \Likedimion\Ai\NpcAi::STATE_STAND,
        "base_stats" => 2,
        "war_p_skills" => 0,
        "ai" => [
            "move" => [
                "num" => [0, 1],
                "time" => [120, 220],
                "onlyguard" => true,
                "list" => [],
                "black_terr" => ["build", "unguard"],
                "data" => [
                    "move" => ["пришла", "ушла"],
                    "teleport" => [
                        ["пространство сжимется и образуется черная воронка, оттуда выходит", "появляются клубы черного дыма, из которых выходит", "из ниоткуда появился"],
                        ["исчезает в клубах серого дыма", "растворяется в воздухе"]
                    ]
                ]
            ],
            "respawn" => [
                "time" => [30, 60]
            ],
            "on_speak" => "",
            "listeners" => [
                //"come_player" => "\\Likedimion\\Ai\\Listeners\\UinListener",
            ]
        ],
        "prof" => \Likedimion\Helper\NpcHelper::PROF_DEFAULT
    ],
    "man" => [
        "title" => "random",
        "info" => "",
        "race" => \Likedimion\Game::RACE_MAN,
        "sex" => \Likedimion\Game::SEX_MAN,
        "state" => \Likedimion\Ai\NpcAi::STATE_DEFAULT,
        "base_stats" => 6,
        "war_p_skills" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        "ai" => [
            "move" => [
                "num" => [0, 1],
                "time" => [120, 220],
                "onlyguard" => true,
                "list" => [],
                "black_terr" => ["build", "unguard"],
                "data" => [
                    "move" => ["пришел", "ушел"],
                    "teleport" => [
                        ["пространство сжимется и образуется черная воронка, оттуда выходит", "появляются клубы черного дыма, из которых выходит", "из ниоткуда появился"],
                        ["исчезает в клубах серого дыма", "растворяется в воздухе"]
                    ]
                ]
            ],
            "respawn" => [
                "time" => [30, 60]
            ],
            "on_speak" => "",
            "listeners" => [
                //"come_player" => "\\Likedimion\\Ai\\Listeners\\UinListener",
            ]
        ],
        "prof" => \Likedimion\Helper\NpcHelper::PROF_DEFAULT
    ],
    "woman" => [
        "title" => "random",
        "info" => "",
        "race" => \Likedimion\Game::RACE_MAN,
        "sex" => \Likedimion\Game::SEX_WMAN,
        "state" => \Likedimion\Ai\NpcAi::STATE_DEFAULT,
        "base_stats" => [5, 5, 2, 1, 1, 1],
        "war_p_skills" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        "ai" => [
            "move" => [
                "num" => [0, 1],
                "time" => [120, 220],
                "onlyguard" => true,
                "list" => [],
                "black_terr" => ["build", "unguard"],
                "data" => [
                    "move" => ["пришла", "ушла"],
                    "teleport" => [
                        ["пространство сжимется и образуется черная воронка, оттуда выходит", "появляются клубы черного дыма, из которых выходит", "из ниоткуда появился"],
                        ["исчезает в клубах серого дыма", "растворяется в воздухе"]
                    ]
                ]
            ],
            "respawn" => [
                "time" => [30, 60]
            ],
            "on_speak" => "",
            "listeners" => [
                //"come_player" => "\\Likedimion\\Ai\\Listeners\\UinListener",
            ]
        ],
        "prof" => \Likedimion\Helper\NpcHelper::PROF_DEFAULT
    ],
    "dino" => [
        "title" => "Дино",
        "info" => "",
        "race" => \Likedimion\Game::RACE_MAN,
        "sex" => \Likedimion\Game::SEX_MAN,
        "state" => \Likedimion\Ai\NpcAi::STATE_STAND,
        "base_stats" => [10, 10, 10, 60, 60, 60],
        "war_p_skills" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        "ai" => [
            "move" => [
                "num" => [0, 0],
                "time" => [120, 220],
                "onlyguard" => true,
                "list" => [],
                "data" => [
                    "move" => ["пришел", "ушел"],
                    "teleport" => [
                        ["пространство сжимется и образуется черная воронка, оттуда выходит", "появляются клубы черного дыма, из которых выходит", "из ниоткуда появился"],
                        ["исчезает в клубах серого дыма", "растворяется в воздухе"]
                    ]
                ]
            ],
            "respawn" => [
                "time" => [30, 60]
            ],
            "on_speak" => "",
            "listeners" => [
                //"come_player" => "\\Likedimion\\Ai\\Listeners\\UinListener",
            ]
        ],
        "prof" => \Likedimion\Helper\NpcHelper::PROF_TRADER,
        "trade" => [
            "showcase" => [],
            "buy_types" => []
        ]
    ],

    //монстры
    "rat" => [
        "title" => "крыса",
        "info" => "",
        "race" => \Likedimion\Game::RACE_ANIMAL,
        "sex" => \Likedimion\Game::SEX_WMAN,
        "state" => \Likedimion\Ai\NpcAi::STATE_AGRESSY,
        "base_stats" => [2, 3, 1, 1, 1, 1],
        "war_p_skills" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        "ai" => [
            "move" => [
                "num" => [1, 1],
                "time_move" => [120, 220],
                "onlyguard" => true,
                "next_move" => time() + rand(120, 220),
                "moved_loc" => [],
                "black_terr" => ["guard"],
                "msg_data" => [
                    "move" => ["пришел", "ушел"],
                    "teleport" => [
                        ["пространство сжимется и образуется черная воронка, оттуда выходит", "появляются клубы черного дыма, из которых выходит", "из ниоткуда появился"],
                        ["исчезает в клубах серого дыма", "растворяется в воздухе"]
                    ]
                ]
            ],
            "respawn" => [
                "loc" => ["ld.790.1370"],
                "time" => [30, 60]
            ],
            "on_speak" => "",
            "listeners" => [
                //"come_player" => "\\Likedimion\\Ai\\Listeners\\UinListener",
            ]
        ],
    ],
];