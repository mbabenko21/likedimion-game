<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 29.12.2015
 * Time: 1:21
 */

if($_GET["from"]){
    $from = preg_split("/[_]/", $_GET["from"]);
    switch($from[0]){
        case "loc":
            /** @var \Likedimion\Helper\LocationHelper $locHelper */
            $locHelper = \Likedimion\Game::init()->getService('loc.helper');
            $loc = $locHelper->getCollection()->findOne(["lid" => $from[1]]);
            if(isset($loc) and isset($loc["loc"][$_GET["id"]])){
                $use = $loc["loc"][$_GET["id"]];
            }
            break;
    }
    if($use){
        if(isset($use["ai"]["on_use"])){
            switch($use["ai"]["on_use"]["type"]){
                case "event":
                    $iterator = new ArrayIterator();
                    $iterator->offsetSet("use", $use);
                    $event = new \Likedimion\Events\UseEvent();
                    $event->setPluginData($iterator)
                        ->setLocHelper(\Likedimion\Game::init()->getService('loc.helper'))
                        ->setPlayerHelper(\Likedimion\Game::init()->getService('player.helper'));
                    \Likedimion\Game::init()->getDispatcher()->dispatch($use["ai"]["on_use"]["id"], $event);
                    break;
            }
        } else {
            \Likedimion\Game::init()->getService('player.helper')
                ->addJournal('Нельзя использовать')
                ->update();
        }
    } else {
        \Likedimion\Game::init()->getService('player.helper')
            ->addJournal('Нечего использовать')
            ->update();
    }
} else {
    \Likedimion\Game::init()->getService('player.helper')
        ->addJournal('Нечего использовать')
        ->update();
}