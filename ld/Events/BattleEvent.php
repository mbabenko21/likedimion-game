<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 29.12.2015
 * Time: 23:39
 */

namespace Likedimion\Events;


use Likedimion\Event;
use Likedimion\Helper\LocationHelper;

class BattleEvent extends Event
{
    const AUTO_ATTAK = "auto";

    /**
     * @var string
     */
    protected $toObjectId, $selfObjectId;
    /**
     * @var string
     */
    protected $attackType;
    /**
     * @var LocationHelper
     */
    protected $locHelper;
    /**
     * @return string
     */
    public function getName()
    {
        return 'battle';
    }

    /**
     * @param string $attackType
     * @return BattleEvent
     */
    public function setAttackType($attackType)
    {
        $this->attackType = $attackType;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttackType()
    {
        return $this->attackType;
    }

    /**
     * @param LocationHelper $locHelper
     * @return BattleEvent
     */
    public function setLocHelper($locHelper)
    {
        $this->locHelper = $locHelper;
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
     * @param string $toObjectId
     * @return BattleEvent
     */
    public function setToObjectId($toObjectId)
    {
        $this->toObjectId = $toObjectId;
        return $this;
    }

    /**
     * @param string $selfObjectId
     * @return BattleEvent
     */
    public function setSelfObjectId($selfObjectId)
    {
        $this->selfObjectId = $selfObjectId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSelfObjectId()
    {
        return $this->selfObjectId;
    }

    /**
     * @return string
     */
    public function getToObjectId()
    {
        return $this->toObjectId;
    }
}