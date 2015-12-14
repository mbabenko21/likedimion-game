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
        $this->_loc["loc"]["player.".$pid] = new \MongoId($pid);
        return $this;
    }

    /**
     * @param $pid
     * @return $this
     */
    public function removePlayer($pid){
        if(isset($this->_loc["loc"]["player.".$pid])){
            unset($this->_loc["loc"]["player.".$pid]);
        }
        return $this;
    }
}