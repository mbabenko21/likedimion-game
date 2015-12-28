<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 27.12.2015
 * Time: 23:50
 */


return [
    "title" => "Привратник Уин",
    "dialog" => [
        "init" => [
            "reply" => "Приветствую тебя, {%title%}. \nМеня зовут Уин и я помогу тебе сделать первые шаги в этом мире. Кроме того, у меня ты всегда можешь узнать последние новости или спросить о чем-нибудь, если забудешь.",
            "answers" => [
                "news" => "Какие новости?",
                "do" => "Расскажи мне о...",
                "find" => "Как мне найти...",
                "end" => "До свидания."
            ]
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
                "init" => "У меня есть еще вопросы",
                "end" => "До встречи"
            ]
        ],
        "find" => "mixin.find.find",
        "do" => "mixin.help.do",
        "end" => [
            "reply" => "Хорошо, я всегда буду здесь, если что-то понадобится, приходи в любое время.",
            "answers" => [],
        ]
    ]
];