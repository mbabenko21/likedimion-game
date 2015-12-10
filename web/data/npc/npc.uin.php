<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 04.12.2015
 * Time: 22:32
 */

$npc = [];
$npc["title"] = "Уин";
$npc["ai"] = [
    "move" => [1, 100, 150], //1 раз в 100-150 сек
    "emotions" => [
        "use" => [[1,2], [30,60]], //использование эмоций
        "set" => ["to_wave"],
    ],
    "replics" => [
        "Чтобы перемещаться, нажимайте на название выхода в нижней части экрана",
        "Приветствую тебя, путник"
    ],
];

$npc["stats_base"] = [1,1,1,1,1,1];
$npc["respawn"] = [];

$npc["dialog"] = [];

return $npc;
