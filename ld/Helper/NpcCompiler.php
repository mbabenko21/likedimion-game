<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 30.12.2015
 * Time: 17:28
 */

namespace Likedimion\Helper;


use Likedimion\Game;

class NpcCompiler
{
    protected $manNames = [];

    protected $womanNames = [];

    protected $npc = [];
    public function __construct()
    {
    }

    public function compile(){
        $npc = $this->npc;
        $sex = $npc["sex"];
        $npc["title"] = preg_replace_callback("/random/", array($this, '_getRandomTitle'), $npc["title"]);
        if(!is_array($npc["base_stats"])){
            $npc["base_stats"] = $this->_getRandomStats(6, $npc["base_stats"]);
        }
        if(!is_array($npc["war_p_skills"])){
            $npc["war_p_skills"] = $this->_getRandomStats(5, $npc["war_p_skills"]);
        }
        $this->npc = $npc;
    }

    private function _getRandomTitle(){
        $sex = $this->npc["sex"];
        if($sex == Game::SEX_MAN){
            $names = $this->manNames;
        } else {
            $names = $this->womanNames;
        }

        $key = array_rand($names);
        return $names[$key];
    }

    /**
     * @param $count
     * @param int $maxValue
     * @return array
     */
    private function _getRandomStats($count, $maxValue = 5){
        $stats = [];
        for($i = 0; $i < $count; $i++){
            $stats[] = rand(1, $maxValue);
        }
        return $stats;
    }

    /**
     * @param array $manNames
     * @return NpcCompiler
     */
    public function setManNames($manNames)
    {
        $this->manNames = $manNames;
        return $this;
    }

    /**
     * @param array $womanNames
     * @return NpcCompiler
     */
    public function setWomanNames($womanNames)
    {
        $this->womanNames = $womanNames;
        return $this;
    }

    /**
     * @param array $npc
     * @return NpcCompiler
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
}