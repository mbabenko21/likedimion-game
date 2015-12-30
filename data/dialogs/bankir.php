<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 30.12.2015
 * Time: 18:59
 */
$randomStart = [
    "Приветствую Вас, {%title%}. Я работник банка. Здесь ты можешь оставить свои вещи на хранение.",
    "{%title%}, что привело тебя ко мне?",
    "Я вижу что ты {php}\$player = \\Likedimion\\Game::init()->getPlayer(); return (\$player[sex] == 'm') ? 'пришел' : 'пришла';{/php} не с пустыми руками."
];
return [
    "title" => "Банкир",
    "dialog" => [
        "init" => [
            "reply" => $randomStart[array_rand($randomStart)],
            "answers" => [
                "news" => "Какие новости?"
            ]
        ],
        "news" => "mixin.news.news",
        "end" => [
            "reply" => "Я всегда буду здесь, если понадоблюсь.",
            "answers" => []
        ]
    ]
];