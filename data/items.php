<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 14.12.2015
 * Time: 14:58
 */

$items = [
    [
        "iid" => "i.m.money",
        "type" => \Likedimion\Helper\ItemHelper::ITEM_MISC,
        "titles" => [
            "nom" => "серебро",
            "gen" => "серебра",
            "dat" => "серебру",
            "acc" => "серебро",
            "inst" => "серебром",
            "prep" => "о серебре",
            "plural" => "серебра"
        ],
        "info" => "Серебрянные монеты, за них можно что-нибудь купить у торговцев"
    ],

    [
        "iid" => "i.a.bnov",
        "type"  => \Likedimion\Helper\ItemHelper::ITEM_BODYARM,
        "titles" => [
            "nom" => "рубуха новобранца",
            "gen" => "рубаху новобранца",
            "dat" => "рубахе новобранца",
            "acc" => "рубаху новобраца",
            "inst" => "рубахой новобранца",
            "prep" => "о рубахе новобранца",
            "plural" => "рубахи новобранца"
        ],
        "info" => "Немного потрепаная рубашка, но все равно имеет довольно приличный вид.",
        "item" => [
            "cost" => 10,
            "armor" => 1,
            "war_p_skills_add" => [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
            "base_stats_add" => [0, 0, 0, 0, 0, 0],
            "slots" => []
        ]
    ],

    [
        "iid" => "i.a.lnov",
        "type" => \Likedimion\Helper\ItemHelper::ITEM_LEGS,
        "titles" => [
            "nom" => "штаны новобранца",
            "gen" => "штанов новобранца",
            "dat" => "штанам новобранца",
            "acc" => "штаны новобраца",
            "inst" => "штанами новобранца",
            "prep" => "о штанах новобранца",
            "plural" => "штаны новобранца"
        ],
        "info" => "Немного потрепаные штаны, но все равно имеет довольно приличный вид.",
        "item" => [
            "cost" => 10,
            "armor" => 1,
            "war_p_skills_add" => [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
            "base_stats_add" => [0, 0, 0, 0, 0, 0],
            "slots" => []
        ]
    ],

    [
        "iid" => "i.a.snov",
        "type" => \Likedimion\Helper\ItemHelper::ITEM_SHOES,
        "titles" => [
            "nom" => "сапоги новобранца",
            "gen" => "сапогов новобранца",
            "dat" => "сапогам новобранца",
            "acc" => "сапоги новобраца",
            "inst" => "сапогами новобранца",
            "prep" => "о сапогах новобранца",
            "plural" => "сапоги новобранца"
        ],
        "info" => "Немного потрепаная рубашка, но все равно имеет довольно приличный вид.",
        "item" => [
            "cost" => 10,
            "armor" => 1,
            "war_p_skills_add" => [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
            "base_stats_add" => [0, 0, 0, 0, 0, 0],
            "slots" => []
        ]
    ],
    [
        "iid" => "i.w.snov",
        "type" => \Likedimion\Helper\ItemHelper::ITEM_SWORD,
        "titles" => [
            "nom" => "меч новобранца",
            "gen" => "меча новобранца",
            "dat" => "мечу новобранца",
            "acc" => "меч новобраца",
            "inst" => "мечом новобранца",
            "prep" => "о мече новобранца",
            "plural" => "мечи новобранца"
        ],
        "info" => "Немного потрепаная рубашка, но все равно имеет довольно приличный вид.",
        "item" => [
            "cost" => 10,
            "armor" => 1,
            "war_p_skills_add" => [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
            "base_stats_add" => [0, 0, 0, 0, 0, 0],
            "slots" => [],
            "war_stats" => [0, 2, 3],
        ]
    ],
    [
        "iid" => "i.s.news",
        "type" => \Likedimion\Helper\ItemHelper::ITEM_PLUGIN,
        "titles" => [
            "nom" => "доска объявлений",
            "gen" => "доски объявлений",
            "dat" => "доске объявлений",
            "acc" => "доску объявлений",
            "inst" => "доской объявлений",
            "prep" => "о доске объявлений",
            "plural" => "доски объявлений"
        ],
        "plugin" => "ad",
        "info" => "Большая доска объявлений, на ней наклеено много различных объявлений. Здесь вы можете продать или купить б/у вещи.",
    ]
];