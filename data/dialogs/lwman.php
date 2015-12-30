<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 30.12.2015
 * Time: 19:30
 */
$rStart = [
    "{php}\$player = \\Likedimion\\Game::init()->getPlayer(); return (\$player[sex] == 'm') ? 'Дяденька' : 'Тетенька';{/php} вы слыхали, что на кладбище бродят живые мертвецы?",
    "Мама не разрешает ходить мне за ворота города",
    "Видел, какой у меня деревянным меч?",
    "{%title%} вы {php}\$player = \\Likedimion\\Game::init()->getPlayer(); return (\$player[sex] == 'm') ? 'очень храбрый' : 'очень храбрая';{/php}"
];
return [
    "title" => "Мальчик",
    "dialog" => [
        "init" => [
            "reply" => $rStart[array_rand($rStart)],
            "answers" => []
        ],
    ]
];