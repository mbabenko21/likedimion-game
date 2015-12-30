<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 29.12.2015
 * Time: 23:41
 */

namespace Likedimion\Listener;


use Likedimion\Events\BattleEvent;
use Likedimion\Game;

class BattleListener
{
    public function onAttack(BattleEvent $event){
        if($event->getLocHelper()->objectExists($event->getToObjectId())){
            $event->getLocHelper()->addJournal($event->getSelfObjectId()."->".$event->getToObjectId(), Game::init()->getService('player.helper')->getCollection());
            $event->getLocHelper()->update();
        }
    }
}