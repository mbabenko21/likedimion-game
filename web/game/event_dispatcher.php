<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 28.12.2015
 * Time: 22:45
 */

$dispatcher = new \Likedimion\EventDispatcher();
/**
 * Добавление слушателей собыстий
 */
$dispatcher
    ->addEventListener('quest.start',   'Likedimion\\Listener\\QuestListener',  'onQuestStart')
    ->addEventListener('quest.change',  'Likedimion\\Listener\\QuestListener',  'onQuestChange')
    ->addEventListener('move.wagon',    'Likedimion\\Listener\\MoveListener',   'onWagonMove')
    ->addEventListener("battle.attack", 'Likedimion\\Listener\\BattleListener', 'onAttack')
;

return $dispatcher;