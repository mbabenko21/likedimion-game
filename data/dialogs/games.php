<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 30.12.2015
 * Time: 22:10
 */

return [
    "dialog" => [
        "bones" => [
            "reply" => "Хм.. Я вижу, ты {php}\$player = \\Likedimion\\Game::init()->getPlayer(); return (\$player[sex] == 'm') ? 'решил' : 'решила';{/php} обыграть старика? Ну что ж, какая твоя ставка?",
            //"reply" => "Сколько ставишь?",
            "answers" => [
                "k10" => "10 монет",
                "k20" => "20 монет",
                "k50" => "50 монет",
                "k100" => "100 монет",
                "k1000" => "1000 монет",
                "k10000" => "10000 монет",
                "init" => "Я еще кое-что хотел узнать",
                "end" => "Я передумал играть, пока."
            ]
        ],
    ]
];