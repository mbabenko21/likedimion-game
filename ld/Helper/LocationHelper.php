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
        TERRITORY_UNGUARD = "unguard",
        TERRITORY_BUILD = "build" //это дверь в здание, чтоб НПЦ не могла заходить, например в банк, является охраняемой территорией
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
        $pid = (substr($pid, 0, 7) != "player_") ? "player_".$pid : $pid;
        $this->_loc["loc"][$pid] = time();
        return $this;
    }

    /**
     * @param $pid
     * @return $this
     */
    public function removePlayer($pid){
        $pid = (substr($pid, 0, 7) != "player_") ? "player_".$pid : $pid;
        if(isset($this->_loc["loc"][$pid])){
            unset($this->_loc["loc"][$pid]);
        }
        return $this;
    }

    public function update(){
        if($this->_collection){
            if(is_array($this->_collection->findOne(["lid" => $this->_loc["lid"]]))) {
                return $this->_collection->update(["lid" => $this->_loc["lid"]], $this->getLoc());
            } else {
                return $this->_collection->insert($this->getLoc());
            }
        } else {
            return false;
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
                $toLocHelper = $this->factory($toLoc["lid"]);
                $delTimer = $this->getDelTimer($objectId);
                if(false !== $delTimer){
                    $this->removeDelTimer($objectId);
                    $toLocHelper->addDelTimer($objectId, $delTimer["time"], $delTimer["msg_on_del"]);
                }
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
     * Удаление предмета
     * @param $objId
     */
    public function removeObject($objId){
        if($this->objectExists($objId)){
            unset($this->_loc["loc"][$objId]);
        }
    }


    public function objectExists($objectId){
        return isset($this->_loc["loc"][$objectId]);
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
        if($noPlayer1 instanceof \MongoId === false and $noPlayer1 !== false){
            $noPlayer1 = new \MongoId(substr($noPlayer1, 7));
        }
        if($noPlayer2 instanceof \MongoId === false and $noPlayer2 !== false){
            $noPlayer2 = new \MongoId(substr($noPlayer2, 7));
        }
        $players->update([
            "loc" => $this->getLoc()["lid"],
            "_id" => [
                '$ne' => [$noPlayer1, $noPlayer2]
            ]
        ], [
            '$push' => [
                "journal" => [
                    "time" => time(),
                    "msg" => $msg
                ]
            ]
        ]);
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

    public function playerExists($pid){
        if($pid instanceof \MongoId){
            $pid = "player_".$pid;
        }
        return $this->objectExists($pid);
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

    /**
     * Добавить респавн
     * @param $objectId
     * @param $object
     * @param $respawnTime
     */
    public function addRespawn($objectId, $object, $respawnTime, $respMessage = ""){
        if(is_array($respawnTime)){
            $respawnTime = rand($respawnTime[0], $respawnTime[1]);
        }
        $respTime = time() + $respawnTime;
        $this->_loc["respawn"][$objectId] = [
            "time" => $respTime,
            "obj" => $object,
            "msg_on_resp" => $respMessage
        ];
    }

    /**
     * Есть ли такой респавн
     * @param $objectId
     * @return bool
     */
    public function respawnIsset($objectId){
        return isset($this->_loc["respawn"][$objectId]);
    }

    /**
     * @param $objectId
     * @return bool
     */
    public function isRespawned($objectId){
        if($this->respawnIsset($objectId)){
            return time() > $this->_loc["respawn"][$objectId]["time"];
        }
        return false;
    }

    /**
     * @param $objectId
     * @return array
     */
    public function removeRespawn($objectId){
        $object = [];
        if($this->respawnIsset($objectId)){
            $object = $this->_loc["respawn"][$objectId]["obj"];
            unset($this->_loc["respawn"][$objectId]);
        }
        return $object;
    }

    /**
     * @param $objectId
     * @return array
     */
    public function getRespawn($objectId){
        $object = [];
        if($this->respawnIsset($objectId)){
            $object = $this->_loc["respawn"][$objectId];
        }
        return $object;
    }

    /**
     * Обход объектов
     * @param $field
     * @param callable $function
     */
    public function eachObjects($field, callable $function){
        if(isset($this->_loc[$field]) and is_array($this->_loc[$field]))
        while(list($objId, $obj) = each($this->_loc[$field])){
            $function($objId, $obj);
        }
    }

    /**
     * @param string $objId
     * @param int $time
     * @param string $msgOnDel
     * @return $this
     */
    public function addDelTimer($objId, $time, $msgOnDel = ""){
        if(time() < $time){
            $t = $time;
        } else {
            $t = time() + $time;
        }
        $this->_loc["delete"][$objId] = [
            "time" => $t,
            "msg_on_del" => $msgOnDel
        ];
        return $this;
    }

    /**
     * @param $objId
     * @return bool
     */
    public function delTimerIsset($objId){
        return isset($this->_loc["delete"][$objId]);
    }

    /**
     * @param $objId
     * @return bool|int
     */
    public function getDelTimer($objId){
        if($this->delTimerIsset($objId)){
            return $this->_loc["delete"][$objId];
        } else {
            return false;
        }
    }

    /**
     * @param $time
     * @return bool
     */
    public function isTimeOut($time){
        return time() > $time;
    }

    /**
     * @param $objId
     * @return $this
     */
    public function removeDelTimer($objId){
        if($this->delTimerIsset($objId)){
            unset($this->_loc["delete"][$objId]);
        }
        return $this;
    }

    /**
     * @param $locId
     * @return LocationHelper
     * @throws \Exception
     */
    public function factory($locId){
        $loc = $this->getCollection()->findOne(["lid" => $locId]);
        if($loc){
            $helper = new LocationHelper($loc);
            $helper->setCollection($this->getCollection());
            return $helper;
        } else {
            throw new \Exception("Loc ".$locId." not found");
        }
    }

    /**
     * @param array $blackList
     * @return string
     */
    public function getRandomDoorId($blackList = [], $blackTerritory = []){
        $doors = $this->_loc["doors"];
        //удаляем локации из blackTerritory
        for($i = 0; $i < count($doors); $i++){
            $helper = $this->factory($doors[$i][1]);
            $terr = $helper->getLoc()["terr"];
            if(in_array($terr, $blackTerritory)){
                unset($doors[$i]);
            }
        }
        //если больше одной локации осталось, то смотрим на balckList
        if(count($doors) > 1){
            for($i = 0; $i < count($doors); $i++){
                if(in_array($doors[$i][1], $blackList)){
                    unset($doors[$i]);
                }
            }
        }
        //выбираем случайную дверь из оставшихся
        $key = array_rand($doors);
        return $doors[$key][1];
    }

    /**
     * @param $objId
     * @return array|bool
     */
    public function getObject($objId){
        if($this->objectExists($objId)){
            return $this->_loc["loc"][$objId];
        } else {
            return false;
        }
    }
}