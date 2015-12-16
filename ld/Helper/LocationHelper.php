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
}