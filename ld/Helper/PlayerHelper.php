<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 06.12.2015
 * Time: 22:28
 */

namespace Likedimion\Helper;


use Likedimion\EventDispatcher;
use Likedimion\Events\JournalEvent;

class PlayerHelper
{
    private $_player = [];
    /**
     * @var EventDispatcher
     */
    protected $dispatcher;

    public function __construct(array $player)
    {
        $this->_player = $player;
    }

    /**
     * @return array
     */
    public function getPlayer()
    {
        return $this->_player;
    }

    public function addMagic($mid, $level, $magic)
    {
        //global $magic;
        $mid = preg_split("/[\._-]/", $mid);
        if (isset($magic[$mid[0]][$mid[1]])) {
            $this->_player["magic"][implode("_", $mid)] = $magic[$mid[0]][$mid[1]];
            $this->_player["magic"][implode("_", $mid)]["level"] = $level;
        } else {
            throw new \Exception(sprintf("Magic %s not exists", implode(".", $mid)));
        }
        return $this;
    }

    public function removeMagic($mid)
    {
        if (isset($this->_player["magic"][str_replace(".", "_", $mid)])) {
            unset($this->_player["magic"][str_replace(".", "_", $mid)]);
        }
        return $this;
    }

    /**
     * @return void
     */
    public function calcParams()
    {
        $player = $this->_player;
        $baseStats = $this->getStats($player, 'base_stats');
        $warSkills = $this->getStats($player, 'war_skills');
        $charParams = $player["char_params"];

        $charParams[1] = 10 * $baseStats[3] + 5 * $baseStats[4] + 10;
        if (!$charParams[0]) {
            $charParams[0] = $charParams[1];
        }

        $charParams[3] = 10 * $baseStats[2] + 5 *$baseStats[5] + 10;
        if (!$charParams[2]) {
            $charParams[2] = $charParams[3];
        }

        $player["char_params"] = $charParams;
        $this->_player = $player;
    }

    private function getStats($player, $statsKey)
    {
        $stats = (isset($player[$statsKey])) ? $player[$statsKey] : [];
        $statsAdd = (isset($player[$statsKey . "_add"])) ? $player[$statsKey . "_add"] : [];
        $buffs = is_array($player[$statsKey . "_buffs"]) ? $player[$statsKey . "_buffs"] : [];
        $effects = is_array($player[$statsKey . "_effects"]) ? $player[$statsKey . "_effects"] : [];
        $buffsAdd = [];
        $effectsAdd = [];
        if (is_array($buffs)) {
            for ($i = 0; $i < count($stats); $i++) {
                if (isset($buffs[$i]) and $buffs[$i][1] > time()) {
                    $buffsAdd[$i] = $buffs[$i][0];
                } else {
                    $buffsAdd[$i] = 0;
                }
            }
        }
        if (is_array($effects)) {
            for ($i = 0; $i < count($stats); $i++) {
                if (isset($effects[$i]) and $effects[$i][1] > time()) {
                    $effectsAdd[$i] = $effects[$i][0];
                } else {
                    $effectsAdd[$i] = 0;
                }
            }
        }
        return $this->array_add($stats, $statsAdd, $buffsAdd, $effects);
    }

    private function array_add(array $a1, array $a2)
    {  // ...
        // adds the values at identical keys together
        $aRes = $a1;
        foreach (array_slice(func_get_args(), 1) as $aRay) {
            foreach (array_intersect_key($aRay, $aRes) as $key => $val) $aRes[$key] += $val;
            $aRes += $aRay;
        }
        return $aRes;
    }

    /**
     * @param $level
     * @return int
     */
    public function getNeedExp($level)
    {
        return 50 * (1.1) ^ $level;
    }

    public function addExp($expCount)
    {
        if ($this->_player["experience"] + $expCount < $this->getNeedExp($this->_player["level"] + 1)) {
            $this->_player["experience"] += $expCount;
            $ost = $this->getNeedExp($this->_player["level"] + 1) - $this->_player["experience"];
            $this->_player["experience"] += $ost;
            $this->_player["level"]++;
            $journalMsg = "Вы достигли нового уровня!";
            $journalEvent = new JournalEvent($journalMsg, JournalEvent::JOURNAL_ME);
            $this->getDispatcher()->dispatch($journalEvent);
            $this->addExp($ost);
        } else{
            $this->_player["experience"] += $expCount;
        }
        $journalMsg = "Вы получили %d опыта";
        $journalEvent = new JournalEvent(sprintf($journalMsg, $expCount), JournalEvent::JOURNAL_ME);
        $this->getDispatcher()->dispatch($journalEvent);
    }

    /**
     * @return EventDispatcher
     */
    public function getDispatcher()
    {
        return $this->dispatcher;
    }

    /**
     * @param EventDispatcher $dispatcher
     */
    public function setDispatcher($dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }
}