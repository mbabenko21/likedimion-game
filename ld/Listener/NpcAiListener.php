<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 29.12.2015
 * Time: 21:30
 */

namespace Likedimion\Listener;


use Likedimion\Events\MoveEvent;
use Likedimion\Helper\LocationHelper;
use Likedimion\Helper\NpcHelper;

class NpcListener
{
    /**
     * @var NpcHelper
     */
    protected $npcHelper;
    /**
     * @var LocationHelper
     */
    protected $locHelper;

    public function onComePlayer(MoveEvent $event){
        $npc = $this->getNpcHelper()->getNpc();
        foreach($event->getObjects() as $objId => $object){

        }
    }

    /**
     * @param NpcHelper $npcHelper
     * @return NpcListener
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
     * @return NpcListener
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