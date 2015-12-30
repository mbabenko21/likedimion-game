<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 30.12.2015
 * Time: 22:02
 */

return [
    "title" => "Дино",
    "dialog" => [
        "init" => [
            "reply" => "Оооо, да это же {%title%}. Присаживайся, {php}\$player = \\Likedimion\\Game::init()->getPlayer(); return (\$player[sex] == 'm') ? 'дорогой друг' : 'моя прекрасная подруга';{/php}. Чего изволите?",
            "answers" => [
                "news" => "Расскажи, что новенького творится в этом мире?",
                "bones" => "Сыграем в кости?",
                "end" => "Да я это... Местом {php}\$player = \\Likedimion\\Game::init()->getPlayer(); return (\$player[sex] == 'm') ? 'ошибся' : 'ошиблась';{/php}"
            ]
        ],
        "bones" => "mixin.games.bones",
        "news" => "mixin.news.news",
        "end" => [
            "reply" => "Наша таверна всегда рада принять тебя",
            "answers" => []
        ]
    ]
];