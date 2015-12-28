<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 28.12.2015
 * Time: 21:50
 */

$questBank = [
    "rescue_facilnuir" => [
        "title" => "Спасение Фасилнуира",
        "states" => [
            "start" => [
                "info" => "Я должен отвести этого Арчера в безопасное место",
                "actions" => [
                    ["addFollower", "npc_facilnuir"],
                    ["addJournal", "Фасилнуир теперь слудует за вами. Вы должны отвести его в безопасное место."]
                ]
            ],
            "end" => [
                "info" => "Теперь Фасилнуир в безопасности.",
                "actions" => [
                    ["removeFollower", "npc_facilnuir"],
                    ["addExp", 20]
                ]
            ]
        ]
    ],


    "search_imperials" => [
        "title" => "Поиск имперцев",
        "states" => [
            "start" => [
                "title" => "Я убил этого арчера, теперь мне нужно найти лагерь имперцев, они отвезут меня в безопасное место",
                "ai" => [

                ]
            ]
        ]
    ]
];