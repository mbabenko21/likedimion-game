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
use Likedimion\Game;

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

    public function getRegen($stats = 4)
    {
        $baseStats = $this->getStats($this->_player, 'base_stats');
        $endur = $baseStats[$stats];
        $lifeInSecond = round($endur / 60, 2);
        $oneLifeTime = round(1 / $lifeInSecond, 2);
        return [$lifeInSecond, $oneLifeTime];
    }

    /**
     * @return void
     */
    public function calcParams()
    {
        $player = $this->_player;
        $baseStats = $this->getStats($player, 'base_stats');
        $warSkills = $this->getStats($player, 'war_p_skills');
        $charParams = $player["char_params"];

        $charParams[1] = 10 * $baseStats[3] + round($baseStats[4] / 2) + round($baseStats[0] / 2) + 10;
        if (!$charParams[0]) {
            $charParams[0] = $charParams[1];
        }
        if ($charParams[1] < $charParams[0]) {
            $charParams[0] = $charParams[1];
        }

        $charParams[3] = 10 * $baseStats[2] + 5 * $baseStats[5] + 10;
        if (!$charParams[2]) {
            $charParams[2] = $charParams[3];
        }
        if ($charParams[3] < $charParams[2]) {
            $charParams[2] = $charParams[3];
        }
        $warStats = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,];
        //$warSkills = $player["war_p_skills"];
        ##########
        # РАСЧЕТ БОЕВЫХ ПАРАМЕТРОВ
        #########
        $warStats[4] = 2; //базовый отдых после атаки
        //АТАКА
        $warStats[2] = 0;
        $warStats[3] = 1;
        $warStats[1] = $baseStats[2] * 2;
        if ($player["equip"]["rhand"]) {
            //точность
            switch ($player["equip"]["rhand"]["type"]) {
                case ItemHelper::ITEM_SWORD;
                case ItemHelper::ITEM_DUAL_SWORD;
                    $warStats[0] = $warSkills[1] * 10 + $baseStats[1] * 5;
                    break;
                case ItemHelper::ITEM_PAIR_SWORDS;
                case ItemHelper::ITEM_PAIR_KNIFES;
                    $warStats[0] = $warSkills[4] * 10 + $baseStats[1] * 8;
                    break;
                case ItemHelper::ITEM_BOW:
                    $warStats[0] = $warSkills[2] * 12 + $baseStats[1] * 8;
                    break;
                case ItemHelper::ITEM_AXE;
                case ItemHelper::ITEM_DUAL_AXE;
                    $warStats[0] = $warSkills[6] * 10 + $baseStats[1] * 2;
                    break;
                case ItemHelper::ITEM_SPEAR:
                    $warStats[0] = $warSkills[4] * 10 + $baseStats[1] * 4;
                    break;
                case ItemHelper::ITEM_MACE;
                case ItemHelper::ITEM_DUAL_MACE;
                    $warStats[0] = $warSkills[5] * 10 + $baseStats[1] * 3;
                    break;
                case ItemHelper::ITEM_BOOK:
                    $warStats[0] = $warSkills[7] * 10 + $baseStats[1] * 3;
                    break;
                default:
                    $warStats[0] = $warSkills[0] * 10 + $baseStats[1] * 5;
            }
        }
        if ($player["equip"]["rhand"]["type"] != ItemHelper::ITEM_BOOK) {
            $warStats[2] += $baseStats[0];
            $warStats[3] += $baseStats[0];
        } else {
            $warStats[2] += $baseStats[2];
            $warStats[3] += $baseStats[2];
        }
        //Ф. УКЛОН
        $pbVals = [];
        $pbVals[] = ($baseStats[1] <= 5) ? $baseStats[1] * 2 : 10; //по 2% за уклон, но не более 5 единиц
        $pbVals[] = -$baseStats[3] * 0.5; //отнимается по 0.5% за каждую единицу конституции
        $pbVals[] = $warSkills[2];
        $pbVals[] = $warSkills[12] * 5;
        $warStats[7] = array_sum($pbVals);
        //М. Уклон
        $mbVals = [];
        $mbVals[] = $warSkills[7] * 0.2;
        $mbVals[] = $warSkills[11] * 0.2;
        $mbVals[] = $warSkills[14] * 5;
        $mbVals[] = ($baseStats[2] <= 5) ? $baseStats[2] * 2 : 10;
        $warStats[8] = array_sum($mbVals);
        //Парирование (9, 10)
        $ppVals = [];
        $ppVals[] = $baseStats[0] * 2;
        $ppVals[] = $warSkills[9] * 5;
        $ppVals[] = $warSkills[1] + $warSkills[5] + $warSkills[6];
        $warStats[9] = array_sum($ppVals);

        $mpVals = [];
        $mpVals[] = $baseStats[2] * 2;
        $mpVals[] = $warSkills[15] * 5;
        $mpVals[] = $warSkills[9] * 0.2;
        $warStats[10] = array_sum($mpVals);

        $warStats[11] = $warSkills[16] * 2;
        //ф. крит
        $warStats[12] = $baseStats[1];
        if ($player["class"] == Game::CLASS_ASS) {
            $warStats[12] += $baseStats[1];
        }
        $warStats[13] = $baseStats[1];

        foreach ($player["equip"] as $slot => $item) {
            if (is_array($item["item"]["war_stats"])) {
                for ($i = 0; $i < count($item["item"]["war_stats"]); $i++) {
                    $warStats[$i] += $item["item"]["war_stats"][$i];
                }
            }
        }


        $player["war_stats"] = $warStats;
        $player["char_params"] = $charParams;
        $this->_player = $this->regeneration($player);
    }

    private function regeneration($player)
    {
        $charParams = $player["char_params"];
        if (!isset($player["timers"])) {
            $player["timers"] = [];
        }
        $regenLife = $this->getRegen(4);

        $lastRegen = isset($player["timers"]["regen_life"]) ? $player["timers"]["regen_life"] : DateHelper::microtimeFloat(microtime());
        $curr = DateHelper::microtimeFloat(microtime());
        if ($lastRegen < $curr and $charParams[0] < $charParams[1]) {
            $minus = $curr - $lastRegen; //10
            $regenVal = floor($minus / $regenLife[1]) + 1;
            $player["timers"]["regen_life"] = $curr + $regenLife[1];
            $charParams[0] += $regenVal;
        }

        $player["char_params"] = $charParams;
        return $player;
    }

    private function getStats($player, $statsKey)
    {
        $stats = (isset($player[$statsKey])) ? $player[$statsKey] : [];
        $statsAdd = (isset($player[$statsKey . "_add"])) ? $player[$statsKey . "_add"] : [];
        $buffs = is_array($player[$statsKey . "_buffs"]) ? $player[$statsKey . "_buffs"] : [];
        $effects = is_array($player[$statsKey . "_effects"]) ? $player[$statsKey . "_effects"] : [];
        $itemsAdd = [];
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
        foreach ($player["equip"] as $slot) {
            if (isset($slot["item"][$statsKey . "_add"])) {
                $itemsAdd = $this->array_add($itemsAdd, $slot["item"][$statsKey . "_add"]);
            }
        }
        return $this->array_add($stats, $statsAdd, $buffsAdd, $effects, $itemsAdd);
    }

    /**
     * @param array $a1
     * @param array $a2
     * @return array
     */
    public function array_add(array $a1, array $a2)
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
        return floor(50 * pow(1.1, $level + 1));
    }

    public function addExp($expCount)
    {
        if ($this->_player["experience"] + $expCount >= $this->getNeedExp($this->_player["level"])) {
            $this->_player["experience"] += $expCount;
            $ost = $this->_player["experience"] - $this->getNeedExp($this->_player["level"]);
            $this->_player["experience"] = $ost;
            $this->_player["level"]++;
            $journalMsg = "Вы достигли нового уровня!";
            $journalEvent = new JournalEvent($journalMsg, JournalEvent::JOURNAL_ME);
            $this->getDispatcher()->dispatch($journalEvent);
            $this->_player["base_stats_points"]++;
            $this->_player["war_skills_points"]++;
            $this->addExp($ost);
        } else {
            $this->_player["experience"] += $expCount;
        }
        $journalMsg = "Вы получили %d опыта";
        $journalEvent = new JournalEvent(sprintf($journalMsg, $expCount), JournalEvent::JOURNAL_ME);
        $this->getDispatcher()->dispatch($journalEvent);
    }

    public function addBaseStat($statId, $countAdd)
    {
        $this->_player["base_stats"][$statId] += $countAdd;
        return $this;
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

    /**
     * @param $slot
     * @param $item
     * @return $this
     */
    public function equip($slot, $item)
    {
        $player = $this->_player;
        if (!empty($player["equip"][$slot])) {
            $player["inventory"][$player["equip"][$slot]["iid"]] += 1;
            $player["equip"][$slot] = [];
        }
        $player["equip"][$slot] = $item;
        $this->_player = $player;
        return $this;
    }
}