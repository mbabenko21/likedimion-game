<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 30.12.2015
 * Time: 18:12
 */

$randomStartReplics = [
    "Привет.",
    "Я просто тут прогуливаюсь.",
    "Вы что-то хотели?"
];

$randomEndReplics = [
    "Еще увидимся",
    "До встречи",
    "Пока",
];

return [
    "title" => "Житель",
    "dialog" => [
        "init" => [
            "reply" => $randomStartReplics[array_rand($randomStartReplics)],
            "answers" => [
                "news" => "Что нового?",
                "end" => "Пока"
            ],
        ],
        "news" => [
            "reply" => "{php}
            \$lastNews = \\Likedimion\\Game::init()->getLastNews();
            if(\$lastNews->count()<1){
                return \"Пожалуй, пока никаких, жизнь идет свои чередом\";
            } else {
                \$news = \$lastNews->getNext();
                \$body = \"Вот, <b>\$news[author]</b>, говорят небольшое обновление под названием <b>\$news[title]</b> сделал. <div class='hr'></div>\$news[content]\";
                return \$body;
            }
            {/php}",
            "answers" => [
                "end" => "До встречи"
            ]
        ],
        "end" => [
            "reply" => $randomEndReplics[array_rand($randomEndReplics)],
            "answers" => []
        ]
    ]
];