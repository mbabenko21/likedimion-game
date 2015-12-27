<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 14.12.2015
 * Time: 15:22
 */

namespace Likedimion\Helper;


class LocationHelper
{
    const DOOR_N = "n", //север обычный шаг
        DOOR_W = "w", //запад обычный шаг
        DOOR_E = "e", //восток обычный шаг
        DOOR_S = "s", //юг обычный шаг
        DOOR_NW = "nw", //северо-запад обычный шаг
        DOOR_NE = "ne", //северо-восток
        DOOR_SE = "se", //юго-восток
        DOOR_SW = "sw", //юго-запад

        TERRITORY_GUARD = "guard",
        TERRITORY_UNGUARD = "unguard"
        ;
    /**
     * @var \MongoCollection
     */
    protected $_collection;
    /**
     * @var array
     */
    private $_loc;
    public function __construct(array $loc)
    {
        $this->_loc = $loc;
    }

    /**
     * @return array
     */
    public function getLoc()
    {
        return $this->_loc;
    }

    /**
     * @param $doorId
     * @return bool
     */
    public function doorExists($doorId){
        $doors = $this->_loc["doors"];
        foreach($doors as $door){
            if($door[1] == $doorId){
                return true;
            }
        }
        return false;
    }

    /**
     * @param $doorId
     * @return bool
     */
    public function getDoorName($doorId){
        $doors = $this->_loc["doors"];
        foreach($doors as $door){
            if($door[1] == $doorId){
                return $door[0];
            }
        }
        return false;
    }

    /**
     * @param $pid
     * @return $this
     */
    public function addPlayer($pid){
        $this->_loc["loc"]["player_".$pid] = time();
        return $this;
    }

    /**
     * @param $pid
     * @return $this
     */
    public function removePlayer($pid){
        if(isset($this->_loc["loc"]["player_".$pid])){
            unset($this->_loc["loc"]["player_".$pid]);
        }
        return $this;
    }

    public function update(){
        if($this->_collection){
            if(is_array($this->_collection->findOne(["lid" => $this->_loc["lid"]]))) {
                $this->_collection->update(["lid" => $this->_loc["lid"]], $this->getLoc());
            } else {
                $this->_collection->insert($this->getLoc());
            }
        }
    }

    /**
     * @param $npc
     * @return $this
     */
    public function addNpc($npcId, $npc){
        $this->_loc["loc"][$npcId] = $npc;
        return $this;
    }

    public function removeNpc($npcId){
        if(isset($this->_loc["loc"][$npcId])){
            unset($this->_loc["loc"][$npcId]);
        }
    }

    /**
     * @param $objectId
     * @param $toLocId
     * @return bool
     */
    public function moveLocObject($objectId, $toLocId){

        if(isset($this->_loc["loc"][$objectId])){
            $toLoc = $this->getCollection()->findOne(["lid" => $toLocId]);
            if($toLoc){
                $toLocHelper = new static($toLoc);
                $toLocHelper->setCollection($this->getCollection());
                $toLocHelper->addObject($objectId, $this->_loc["loc"][$objectId]);
                if($toLocHelper->update()) {
                    unset($this->_loc["loc"][$objectId]);
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function addObject($objectId, $object){
        $this->_loc["loc"][$objectId] = $object;
        return $this;
    }

    /**
     * @param $objectId
     * @return bool
     */
    public function objectExists($objectId){
        $isset = isset($this->_loc["loc"][$objectId]);
        return $isset;
    }

    /**
     * @param array $item
     * @param int $count
     * @return $this
     */
    public function addItem($item, $count){
        $this->_loc["loc"][$item["iid"]] = $item;
        if($count >0){
            $this->_loc["loc"][$item["iid"]]["count"] += $count;
        } elseif($count <= 0 and $this->_loc["loc"][$item["iid"]]["count"] - $count > 0) {
            $this->_loc["loc"][$item["iid"]]["count"] -= $count;
        } else {
            unset($this->_loc["loc"][$item["iid"]]);
        }
        return $this;
    }

    /**
     * @param $msg
     * @param bool|\MongoId $noPlayer1
     * @param bool|\MongoId$noPlayer2
     * @return $this
     */
    public function addJournal($msg, \MongoCollection $players, $noPlayer1 = false, $noPlayer2 = false){
        $locPlayers = $this->getPlayers();
        for($i = 0; $i < count($locPlayers); $i++){
            $plr = $players->findOne(["_id" => new \MongoId($locPlayers[$i])]);
            if($plr["loc"] == $this->_loc["lid"] and $plr["_id"] != $noPlayer1 and $plr["_id"] != $noPlayer2){
                $plrHelper = new PlayerHelper($plr);
                $plrHelper->addJournal($msg)->setCollection($players);
                $plrHelper->update();
                unset($plrHelper);
            }
        }
        return $this;
    }

    public function doAi(){

    }

    /**
     * @return array
     */
    public function getPlayers(){
        $loc = $this->_loc["loc"];
        $players = [];
        while(list($oid, $data) = each($loc)){
            if(substr($oid, 0, 7) == "player_"){
                $players[] = substr($oid, 7);
            }
        }
        return $players;
    }

    /**
     * @param $lid
     * @return int
     */
    public function getCountNpc($lid){
        $location = $this->getCollection()->findOne(["lid" => $lid]);
        $count = 0;
        if($location) {
            while (list($key, $val) = each($location["loc"])) {
                if (preg_match("/(npc[_\.]|player[_\.])/i", $key)) {
                    $count++;
                }
            }
        }
        return $count;
    }

    /**
     * @return \MongoCollection
     */
    public function getCollection()
    {
        return $this->_collection;
    }

    /**
     * @param \MongoCollection $collection
     */
    public function setCollection($collection)
    {
        $this->_collection = $collection;
    }
}