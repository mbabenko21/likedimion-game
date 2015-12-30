<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 24.12.2015
 * Time: 21:26
 */
$player = $playerHelper->getPlayer();
if($_GET["go"] and $_GET["go"] != $player["loc"]){
    $oldLoc = $ld->locations->findOne(["lid" => $player["loc"]]);
    $oldLocHelper = new \Likedimion\Helper\LocationHelper($oldLoc);
    $oldLocHelper->setCollection($ld->locations);
    $newLoc = $ld->locations->findOne(["lid" => $_GET["go"]]);
    if($newLoc){
        $newLocHelper = new \Likedimion\Helper\LocationHelper($newLoc);
        $oldLocHelper->removePlayer($player["_id"]);
        $newLocHelper->addPlayer($player["_id"]);
        $newLocHelper->setCollection($ld->locations);
        $playerHelper->move($_GET["go"]);
        $playerHelper->update();
        if($oldLoc["terr"] == \Likedimion\Helper\LocationHelper::TERRITORY_GUARD and $newLoc["terr"] == \Likedimion\Helper\LocationHelper::TERRITORY_UNGUARD){
            $playerHelper->addJournal("Вы покунули охраняемую территорию.");
        } elseif($oldLoc["terr"] == \Likedimion\Helper\LocationHelper::TERRITORY_UNGUARD and $newLoc["terr"] == \Likedimion\Helper\LocationHelper::TERRITORY_GUARD) {
            $playerHelper->addJournal("Вы на охраняемой территории.");
        }
        $outmsg = $player["title"] . (($player["sex"] == "m") ? " ушел " : " ушла ") . $oldLocHelper->getDoorName($_GET["go"]);
        $inmsg = (($player["sex"] == "m") ? " пришел " : " пришла ") . $player["title"];
        $oldLocHelper->addJournal($outmsg, $ld->players, $player["_id"]);
        $newLocHelper->addJournal($inmsg, $ld->players, $player["_id"]);
        $oldLocHelper->update();
        $newLocHelper->update();
        $comeEvent = new \Likedimion\Events\MoveEvent();
        $comeEvent->addObject($playerHelper->getPlayerId(), $player);
        $comeEvent->setLocHelper($newLocHelper);
        \Likedimion\Game::init()->getDispatcher()->dispatch('come_player', $comeEvent);
    } else {
        $playerHelper->addJournal("Некуда идти.");
    }
}
