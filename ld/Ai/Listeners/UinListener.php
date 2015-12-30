<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 29.12.2015
 * Time: 22:08
 */

namespace Likedimion\Ai\Listeners;


use Likedimion\Events\MoveEvent;
use Likedimion\Game;
use Likedimion\Helper\LocationHelper;
use Likedimion\Helper\NpcHelper;
use Likedimion\Helper\PlayerHelper;

class UinListener
{
    /**
     * @var NpcHelper
     */
    protected $npcHelper;
    /**
     * @var LocationHelper
     */
    protected $locHelper;


    /**
     * @param NpcHelper $npcHelper
     * @return $this
     */
    public function setNpcHelper($npcHelper)
    {
        $this->npcHelper = $npcHelper;
        return $this;
    }

    /**
     * @return NpcHelper
     */
    public function getNpcHelper()
    {
        return $this->npcHelper;
    }

    /**
     * @param LocationHelper $locHelper
     * @return $this
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
}