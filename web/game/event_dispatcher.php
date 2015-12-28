<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 28.12.2015
 * Time: 22:45
 */

$dispatcher = new \Likedimion\EventDispatcher();

$dispatcher->addEventListener('quest.start', 'Likedimion\\Listener\\QuestListener', 'onQuestStart')
    ->addEventListener('quest.change', 'Likedimion\\Listener\\QuestListener', 'onQuestChange')

;

return $dispatcher;