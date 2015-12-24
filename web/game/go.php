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
    $newLoc = $ld->locations->findOne(["lid" => $_GET["go"]]);
    if($newLoc){
        $newLocHelper = new \Likedimion\Helper\LocationHelper($newLoc);
        $oldLocHelper->removePlayer($player["_id"]->id);
        $newLocHelper->addPlayer($player["_id"]->id);
        $outmsg = $player["title"] . ($player["sex"] == "m") ? " ушел " : " ушла " . $oldLocHelper->getDoorName($_GET["go"]);
        $inmsg = ($player["sex"] == "m") ? " пришел " : " пришла " . $player["title"];
        $oldLocHelper->addJournal($outmsg, $ld->players, $player["_id"]);
        $newLocHelper->addJournal($inmsg, $ld->players);
        $playerHelper->move($_GET["go"]);
    } else {
        $playerHelper->addJournal("Некуда идти.");
    }
}
