<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 29.12.2015
 * Time: 16:36
 */

namespace Likedimion\Listener;


use Likedimion\Events\MoveEvent;
use Likedimion\Events\UseEvent;
use Likedimion\Helper\LocationHelper;

class MoveListener
{
    /**
     * Когда используем повозку
     * @param UseEvent $event
     */
    public function onWagonMove(UseEvent $event)
    {
        $dataIterator = $event->getPluginData();
        $wagon = $dataIterator->offsetGet('use');
        $toLocId = $wagon["ai"]["on_use"]["run"];
        try {
            $toLocHelper = $event->getLocHelper()->factory($toLocId);
            if ($event->getLocHelper()->moveLocObject($wagon["iid"], $toLocId) and
                $toLocHelper->addPlayer($event->getPlayerHelper()->getPlayerId())
            ) {
                $respTime = rand($wagon["ai"]["respawn"]["time"][0], $wagon["ai"]["respawn"]["time"][1]);
                $respMessage = $wagon["ai"]["respawn"]["messages"][1];
                $event->getLocHelper()->addRespawn($wagon["iid"], $wagon, $respTime, $respMessage);
                $event->getPlayerHelper()->move($toLocId);
                $toLocHelper->addDelTimer($wagon["iid"], $respTime, $wagon["ai"]["respawn"]["messages"][0]);

                //Журнал
                $fromMsg = sprintf($wagon["ai"]["on_use"]["message"][0], $event->getPlayerHelper()->getPlayer()["title"]);
                $toMsg = sprintf($wagon["ai"]["on_use"]["message"][1], $event->getPlayerHelper()->getPlayer()["title"]);
                $event->getLocHelper()->addJournal($fromMsg, $event->getPlayerHelper()->getCollection(), $event->getPlayerHelper()->getPlayerId(false));
                $toLocHelper->addJournal($toMsg, $event->getPlayerHelper()->getCollection(), $event->getPlayerHelper()->getPlayerId(false));

                $toLocHelper->update();
                $event->getLocHelper()->update();
                $event->getPlayerHelper()->update();
            } else {
                $event->getPlayerHelper()->addJournal("Никакого эффекта.")->update();
            }
        } catch(\Exception $e){
            $event->getPlayerHelper()->addJournal("Никакого эффекта.")->update();
        }
    }
}