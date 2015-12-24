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
            $this->_collection->update(["lid" => $this->_loc["lid"]], $this->getLoc());
        }
    }

    /**
     * @param $npc
     * @return $this
     */
    public function addNpc($npc){
        $this->_loc["loc"][$npc["nid"]."_".View::generateRandomString(rand(5,7))] = $npc;
        return $this;
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
        $plrs = $players->find(["loc" => $this->_loc["lid"]]);
        foreach($plrs as $plr){
            if($plr["_id"] != $noPlayer1 and $plr["_id"] != $noPlayer2){
                $plrHelper = new PlayerHelper($plr);
                $plrHelper->addJournal($msg);
                $players->update(["_id" => $plr["_id"]], ['$set' => ["journal"=>$plrHelper->getJournal()]]);
            }
        }
        return $this;
    }

    public function doAi(){

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