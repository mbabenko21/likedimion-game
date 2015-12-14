<?php

//
$npc = [];
$npc["iid"] = "npc_lukas";
$npc["title"] = "Лукас";
$npc["info"] = "";
$npc["role"] = NPC_ROLE_BANKIR; //используются константы NPC_ROLE_*
$npc["race"] = NPC_RACE_MANS;  //используются константы NPC_RACE_*
$npc["agression"] = 0; //уровень агрессии %
$npc["stats_base"] = [10,10,10,1,1,1]; //сила, ловкость, интеллект, регенерация, медитация, конституция
$npc["war_passive_skills"] = [10,10,1,1,1,1,1,1,1,1,1,1]; //
$npc["respawn"] = [10,20]; //min, max
$npc["ai"] = [];
$npc["ai"]["move"] = [0, 0, 0]; //количество локаций, мин. время отдыха, макс. время отдыха
$npc["ai"]["magic"] = []; //магия
$npc["ai"]["receptions"] = []; //приемы
$npc["ai"]["emtions"] = [];
$npc["ai"]["emtions"]["set"] = [[1, 2],  [300, 600]]; //сколько действий, период использования
$npc["ai"]["emtions"]["bank"] = ["to_wave"]; //набор эмоций
$npc["ai"]["replics"]["set"] = [[0, 0], [300, 600]]; //аналогично эмоциям
$npc["ai"]["replics"]["bank"] = [];

$npc["dialog"] = []; //

$npc["dialog"]["construct"] = [];

$npc["dialog"]["construct"]["r"] = "Приветствую тебя %to.title%, меня зовут %self.title%, я местный \"банкир\" и \"заведующий складом\". У меня ты можешь оставить на хранение свои деньги и вещи.Так что ты хотел узнать?";
$npc["dialog"]["construct"]["a"][] = [
    "plugin.to_bank",
    "Я хочу положить деньги на свой счет"];
$npc["dialog"]["construct"]["a"][] = [
    "plugin.from_bank",
    "Я хочу забрать деньги со своего счета"];
$npc["dialog"]["construct"]["a"][] = [
    "plugin.to_sklad",
    "Я хочу положить свои вещи на склад"];
$npc["dialog"]["construct"]["a"][] = [
    "plugin.from_sklad",
    "Я хочу забрать свои вещи со склада"
];

$npc["dialog"]["destruct"]["r"] = "Я думаю, что мы скоро увидимся.";
$npc["dialog"]["destruct"]["a"][] = [
    "dialog.end",
    "Пренепременно! Бывай!"
];

return $npc;
