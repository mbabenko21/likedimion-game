<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 28.12.2015
 * Time: 22:47
 */

namespace Likedimion\Listener;


use Likedimion\Events\QuestEvent;

class QuestListener
{
    public function onQuestStart(QuestEvent $e){
        $quest = $e->getQuestHelper()->getQuest($e->getQuestId());

        $start = $quest->getState('start');
        $actions = $start->getActions();
        $this->actions($actions, $e);
        $msg = "Начат квест ".$quest->getOption('title', 'unknown quest');
        $e->getPlayerHelper()->addJournal($msg)->addJournal($e->getPlayerHelper()->getPlayer()["title"].": ".$start->getInfo())->update();
    }

    public function onQuestChange(QuestEvent $e){
        $pHelper = $e->getPlayerHelper();
        $qHelper = $e->getQuestHelper();
        $player = $pHelper->getPlayer();
        try{
            $quest = $qHelper->getQuest($e->getQuestId());
            $state = $quest->getState($e->getState());
            $this->actions($state->getActions(), $e);
            $pHelper->addJournal($player["title"].": ".$state->getInfo());
        } catch(\Exception $ex){
            $pHelper->addJournal("Неполадки с квестом ".$e->getQuestId().", нужно обратиться к разработчикам");
        }
        $pHelper->update();
    }

    protected function actions(array $actions, QuestEvent $e){
        for($i = 0; $i < count($actions); $i++){
            $method = $actions[$i][0];
            $argument = $actions[$i][1];
            if(method_exists($e->getPlayerHelper(), $method)){
                if(!is_null($argument)) {
                    $e->getPlayerHelper()->$method($argument);
                } else {
                    $e->getPlayerHelper()->$method();
                }
            }
        }
    }
}