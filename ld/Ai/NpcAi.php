<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 29.12.2015
 * Time: 19:19
 */

namespace Likedimion\Ai;


use Likedimion\EventDispatcher;
use Likedimion\Events\BattleEvent;
use Likedimion\Game;
use Likedimion\Helper\CalculateHelper;
use Likedimion\Helper\LocationHelper;
use Likedimion\Helper\NpcHelper;

class NpcAi implements AiInterface
{
    const STATE_DEFAULT = "default",
        STATE_SEARCH = "search",
        STATE_FOLLOW = "follow",
        STATE_AGRESSY = "agressy",
        STATE_STAND = "stand";
    /**
     * @var array
     */
    protected $npc = [];
    /**
     *
     * @var Supervision
     */
    protected $supervision;
    /**
     * @var LocationHelper
     */
    protected $locHelper;

    /**
     * @var NpcHelper
     */
    protected $npcHelper;

    public function __construct()
    {
    }

    /**
     * @param array $npc
     * @return NpcAi
     */
    public function setNpc($npc)
    {
        $this->npc = $npc;
        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function ai()
    {
        $npc = $this->getNpcHelper()->getNpc();
        $this->_addListeners($npc);
        $state = (isset($npc["state"])) ? $npc["state"] : self::STATE_STAND;
        //обработка в зависимости от текущего состояния
        switch ($state) {
            //обычное состояние
            case self::STATE_AGRESSY:
                $target = $this->getNpcHelper()->getTarget();
                //если агрессивный и нет таргета, то находим самую слабую цель
                if(false === $target){
                    $this->getLocHelper()->eachObjects("loc", function($objId, $obj){
                        if($objId != $this->getNpcHelper()->getNpcId()) {
                            $players = [];
                            if (substr($objId, 0, 7) == "player_") {
                                //считаем сумму параметров
                                $calcService = new CalculateHelper($this->getNpcHelper()->getNpc());
                                $statsSumm = $calcService->getStatSumm();
                                $playerHelper = Game::init()->getService('player.helper')->factory($objId);
                                $playerCalculateService = new CalculateHelper($playerHelper->getPlayer());
                                $playerStatsSumm = $playerCalculateService->getStatSumm();
                                $pr = $statsSumm / $playerStatsSumm * 100;
                                //$players[$objId] = ;
                                if($pr > 5){
                                    //если статы не меньше 1/2 то нападаем
                                    $this->getNpcHelper()->setTarget($objId);
                                    $battleEvent = new BattleEvent();
                                    $battleEvent->setLocHelper($this->getLocHelper());
                                    $battleEvent->setAttackType(BattleEvent::AUTO_ATTAK);
                                    $battleEvent->setToObjectId($objId);
                                    $battleEvent->setSelfObjectId($this->getNpcHelper()->getNpcId());
                                    Game::init()->getDispatcher()->dispatch("battle.attack", $battleEvent);
                                }
                            }
                        }
                    });
                }
                if ($this->getLocHelper()->objectExists($target)) {
                    //атакуем
                } else {
                    $this->supervision->eachLocations(
                        function ($locHelper) use ($target) {
                            if ($locHelper->objectExists($target)) {
                                //нашли объект, идем
                                $this->locHelper->moveLocObject($this->getNpcHelper()->getNpcId(), $this->getNpcHelper()->getNpcId());
                            }
                        });
                }
                break;
            //обычное состояние
            default:

                break;
        }
    }

    private function _addListeners($npc)
    {
        $events = $npc["ai"]["listeners"];
        /** @var EventDispatcher $dispatcher */
        $dispatcher = Game::init()->getDispatcher();
        $dispatcher->addInject("setNpcHelper", $this->getNpcHelper());
        $dispatcher->addInject("setLocHelper", $this->getLocHelper());
        foreach ($events as $eventId => $eventListener) {
            $newId = preg_split("/[\._:]/", $eventId);
            $method = "on";
            for ($i = 0; $i < count($newId); $i++) {
                $method .= ucfirst($newId[$i]);
            }
            $dispatcher->addEventListener($eventId, $eventListener, $method);
        }
    }

    /**
     * @param LocationHelper $locHelper
     * @return NpcAi
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
     * @param Supervision $supervision
     * @return NpcAi
     */
    public function setSupervision($supervision)
    {
        $this->supervision = $supervision;
        return $this;
    }

    /**
     * @param NpcHelper $npcHelper
     * @return NpcAi
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
}