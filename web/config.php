<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 09.12.2015
 * Time: 21:31
 */

$config = [
    "env" => "production",
    "game" => [
        "mongodb" => [
            "development" => "mongodb://localhost:27017",
            "production" => "mongodb://lduser:bZM9bdR19e@ds027385.mongolab.com:27385/likedimion"
        ]
    ],
    "magic" => [
        "max_level" => 5
    ],
    "skills" => [
        "max_level" => 5
    ],
    "base_stats" => [
        "max_level" => 6,
        "summ" => [
            [[0,2], 12],
            [[3,5], 20]
        ]
    ]
];