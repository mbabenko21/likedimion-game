<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 30.12.2015
 * Time: 19:02
 */

return [
    "dialog" => [
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
    ]
];