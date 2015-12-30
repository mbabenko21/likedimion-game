<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 31.12.2015
 * Time: 0:40
 */

namespace Likedimion\Listener;


use Likedimion\Events\JournalEvent;
use Likedimion\Game;

class JournalListener
{
    public function onAddJournalAll(JournalEvent $event){
        $criteria = [
            '$and' => [
                ["loc" => $event->getLocId()],
                ["_id" => ['$ne' => $event->getPlayer1()]],
                ["_id" => ['$ne' => $event->getPlayer2()]]
            ]
        ];

        $push = [
            '$push' => [
                "journal" => [
                    "time" => time(),
                    "msg" => $event->getMsg()
                ]
            ]
        ];

        $pid = Game::init()->getPlayer();
        if($pid["_id"] != $event->getPlayer1() and $pid["_id"] != $event->getPlayer2() and $event->getLocId() == $pid["loc"]) {
            Game::init()->getService("player.helper")->addJournal($event->getMsg());
        }
        //Game::init()->getService("player.helper")->addJournal($event->getMsg());
        $event->getPlayers()->update($criteria, $push);
    }

    public function onAddJournal(JournalEvent $event){
        $criteria = [
            "_id" => $event->getPlayer1()
        ];
        $push = [
            '$push' => [
                "journal" => [
                    "time" => time(),
                    "msg" => $event->getMsg()
                ]
            ]
        ];
        $event->getPlayers()->update($criteria, $push, ["upsert" => true]);
    }
}