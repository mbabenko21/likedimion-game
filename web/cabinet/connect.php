<?php
if(!defined('ROOT')){header("Location: /?");}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 06.12.2015
 * Time: 23:56
 */

if(isset($_GET["pid"])){
    $player = $ld->players->findOne(["_id" => new MongoId($_GET["pid"])]);
    if($player and $player["aid"] = $_SESSION["aid"]){
        $_SESSION["pid"] = $player["_id"];
        $loc = $ld->locations->findOne(["lid" => $player["loc"]]);
        $lHelper = new \Likedimion\Helper\LocationHelper($loc);
        $lHelper->addPlayer($player["_id"]);
        try {
            $ld->locations->update(["_id" =>  new MongoId($lHelper->getLoc()["_id"])], $lHelper->getLoc());
            header("Location: /?");
        } catch(MongoException $e){
            die($e->getMessage());
        }
    } else {
        require ROOT."/404.php";
    }
}