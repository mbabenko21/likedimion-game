<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 29.12.2015
 * Time: 16:36
 */

namespace Likedimion\Events;


use Likedimion\Event;
use Likedimion\Helper\LocationHelper;
use Likedimion\Helper\PlayerHelper;

class MoveEvent extends Event
{
    /**
     * @var LocationHelper
     */
    protected $locHelper;
    /**
     * @var PlayerHelper
     */
    protected $playerHelper;
    /**
     * @var string
     */
    protected $fromLocId, $toLocId;
    /**
     * @var \ArrayIterator
     */
    protected $objects;
    /**
     * @return string
     */
    public function getName()
    {
        return "move";
    }

    public function __construct()
    {
        $this->objects = new \ArrayIterator();
    }


    /**
     * @param LocationHelper $locHelper
     * @return MoveEvent
     */
    public function setLocHelper($locHelper)
    {
        $this->locHelper = $locHelper;
        return $this;
    }

    /**
     * @param PlayerHelper $playerHelper
     * @return MoveEvent
     */
    public function setPlayerHelper($playerHelper)
    {
        $this->playerHelper = $playerHelper;
        return $this;
    }

    /**
     * @param string $fromLocId
     * @return MoveEvent
     */
    public function setFromLocId($fromLocId)
    {
        $this->fromLocId = $fromLocId;
        return $this;
    }

    /**
     * @param string $toLocId
     * @return MoveEvent
     */
    public function setToLocId($toLocId)
    {
        $this->toLocId = $toLocId;
        return $this;
    }

    /**
     * @return LocationHelper
     */
    public function getLocHelper()
    {
        return $this->locHelper;
    }

    /**
     * @return PlayerHelper
     */
    public function getPlayerHelper()
    {
        return $this->playerHelper;
    }

    /**
     * @return string
     */
    public function getFromLocId()
    {
        return $this->fromLocId;
    }

    /**
     * @return string
     */
    public function getToLocId()
    {
        return $this->toLocId;
    }

    /**
     * @param array $objects
     * @return MoveEvent
     */
    public function setObjects($objects)
    {
        $this->objects = new \ArrayIterator($objects);
        return $this;
    }

    /**
     * @return \ArrayIterator
     */
    public function getObjects()
    {
        return $this->objects;
    }

    public function addObject($objId, $object){
        $this->objects->offsetSet($objId, $object);
    }
}