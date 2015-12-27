<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 27.12.2015
 * Time: 21:53
 */

namespace Likedimion\Helper;


use Likedimion\Ai\Vision;
use Likedimion\Game;

class NpcHelper
{
    const PROF_GID = 'gid',
    PROF_BANKIR = 'bankir',
    PROF_TRADER = 'trader'
    ;
    /**
     * @var array
     */
    protected $npc;
    /**
     * @var string
     */
    protected $npcId;
    /**
     * @var Vision
     */
    protected $vision;
    /**
     * @var LocationHelper
     */
    protected $locHelper;
    /**
     * @var array
     */
    protected $locHelpers = [];

    /**
     * NpcHelper constructor.
     * @param $npc
     */
    public function __construct($npcId, $npc)
    {
        $this->npc = $npc;
        $this->npcId = $npcId;
    }

    /**
     * @return Vision
     */
    public function getVision()
    {
        return $this->vision;
    }

    /**
     * @param Vision $vision
     * @return $this
     */
    public function setVision($vision)
    {
        $this->vision = $vision;
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
     * @param LocationHelper $locHelper
     * @return $this
     */
    public function setLocHelper($locHelper)
    {
        $this->locHelper = $locHelper;
        return $this;
    }

    public function go($fromLocId, $toLocId){
        if($this->moveNpc($fromLocId, $toLocId, true)){
            $doorName = $this->getCacheLocHelper($fromLocId)->getDoorName($toLocId);
            $msgTo = $this->npc["ai"]["move"]["data"][0]." ".$this->npc["title"]; //пришел
            $msgFrom = $this->npc["title"]." ".$this->npc["ai"]["move"]["data"][0]." ".$doorName;
            $this->getCacheLocHelper($fromLocId)->addJournal($msgFrom, $this->vision->getDb()->players)->update();
            $this->getCacheLocHelper($toLocId)->addJournal($msgTo, $this->vision->getDb()->players)->update();
        }
    }

    public function teleport($fromLocId, $toLocId){
        if($this->moveNpc($fromLocId, $toLocId)){
            //$doorName = $this->getCacheLocHelper($fromLocId)->getDoorName($toLocId);
            $teleportToMsgKey = array_rand($this->npc["ai"]["msg_data"]["teleport"][0]);
            $teleportFromMsgKey = array_rand($this->npc["ai"]["msg_data"]["teleport"][1]);
            $msgFrom = $this->npc["title"]. $this->npc["ai"]["msg_data"]["teleport"][1][$teleportFromMsgKey];
            $msgTo = $this->npc["ai"]["msg_data"]["teleport"][0][$teleportToMsgKey]." ".$this->npc["title"];
            $this->getCacheLocHelper($fromLocId)->addJournal($msgFrom, $this->vision->getDb()->players)->update();
            $this->getCacheLocHelper($toLocId)->addJournal($msgTo, $this->vision->getDb()->players)->update();
        }
    }

    /**
     * @return string
     */
    public function getNpcId()
    {
        return $this->npcId;
    }

    /**
     * @param string $npcId
     * @return $this
     */
    public function setNpcId($npcId)
    {
        $this->npcId = $npcId;
        return $this;
    }

    protected function moveNpc($fromLocId, $toLocId, $hasDoor = false){
        $fromLoc = $this->vision->getDb()->loctions->findOne(["lid" => $fromLocId]);
        $toLoc = $this->vision->getDb()->loctions->findOne(["lid" => $fromLocId]);
        if($fromLoc and $toLoc){
            $move = false;
            if($hasDoor){
                foreach($fromLoc["doors"] as $door){
                    if($door[1] == $toLocId){
                        $move = true;
                    }
                }
            } else {
                $move = true;
            }
            if($move) {
                $fromLocHelper = new LocationHelper($fromLoc);
                $fromLocHelper->setCollection($this->vision->getDb()->locations);
                $toLocHelper = new LocationHelper($toLoc);
                $toLocHelper->setCollection($this->vision->getDb()->locations);
                $toLocHelper->addNpc($this->npcId, $this->npc);
                $fromLocHelper->removeNpc($this->getNpcId());
                $fromLocHelper->update();
                $toLocHelper->update();
                $this->addLocHelper($fromLocId, $fromLocHelper)
                    ->addLocHelper($toLocId, $toLocHelper);
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    protected function addLocHelper($locId, LocationHelper $helper){
        $this->locHelpers[$locId] = $helper;
        return $this;
    }

    /**
     * @param $locId
     * @return bool|LocationHelper
     */
    protected function getCacheLocHelper($locId){
        if(isset($this->locHelpers[$locId])){
            return $this->locHelpers[$locId];
        }
        return false;
    }
}