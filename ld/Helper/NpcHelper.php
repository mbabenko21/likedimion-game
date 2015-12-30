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
    PROF_TRADER = 'trader',
    PROF_HEALER = 'healer',
    PROF_DEFAULT = 'def',
    PROF_TEACHER = 'teach',
    PROF_HOUSE_MAN = "hman"
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
     * NpcHelper constructor.
     * @param $npc
     */
    public function __construct($npc)
    {
        $this->npc = $npc;
    }

    /**
     * @param $state
     * @return $this
     */
    public function setState($state){
        $this->npc["state"] = $state;
        return $this;
    }

    public function setTarget($objectId){
        $this->npc["target"] = $objectId;
        return $this;
    }

    /**
     * @return bool|string
     */
    public function getTarget(){
        $target = false;
        if(isset($this->npc["target"])){
            $target = $this->npc["target"];
        }
        return $target;
    }


    /**
     * @param array $npc
     * @return NpcHelper
     */
    public function setNpc($npc)
    {
        $this->npc = $npc;
        return $this;
    }

    /**
     * @return array
     */
    public function getNpc()
    {
        return $this->npc;
    }

    /**
     * @param string $npcId
     * @return NpcHelper
     */
    public function setNpcId($npcId)
    {
        $this->npcId = $npcId;
        return $this;
    }

    /**
     * @return string
     */
    public function getNpcId()
    {
        return $this->npcId;
    }


}