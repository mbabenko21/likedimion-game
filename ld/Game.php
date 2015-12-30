<?php

namespace Likedimion;

use Likedimion\Ai\NpcAi;
use Likedimion\Ai\Supervision;
use Likedimion\Ai\Vision;
use Likedimion\Events\JournalEvent;
use Likedimion\Helper\CalculateHelper;
use Likedimion\Helper\ItemHelper;
use Likedimion\Helper\LocationHelper;
use Likedimion\Helper\NpcHelper;
use Likedimion\Helper\PlayerHelper;
use Likedimion\Plugin\MongoDB;

/**
 * summary
 */
class Game
{
    //Роли
    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;
    const ROLE_MODER = 3;
    const ROLE_QUEST = 4;
    const ROLE_RAZRAB = 5;

    const   NPC_ROLE_NONE = 1,
        NPC_ROLE_GID = 2;


    const NPC_RACE_MANS = "mans";
    //Классы
    const CLASS_WAR = "war";
    const CLASS_MAG = "mag";
    const CLASS_ASS = "ass";

    const CITIZEN_IMPERY = 'impery';
    const CITIZEN_ARCHER = 'archer';

    const SEX_MAN = "m";
    const SEX_WMAN = "w";

    //Рассы
    const RACE_MAN = "mans",
        RACE_ELF = "elf",
        RACE_ORK = "ork",
        RACE_GNOME = "gnome",
        RACE_UNDEAD = "undead",
        RACE_MONSTER = "monster",
        RACE_ANIMAL = "animal";

    protected static $game = null;
    /**
     * @var \MongoDb
     */
    protected $db;
    /**
     * @var array
     */
    protected $player;
    /**
     * @var EventDispatcher
     */
    protected $dispatcher;
    /**
     * @var array
     */
    protected $container = [];


    public function __construct()
    {

    }

    public function ai()
    {
        if ($this->player instanceof \MongoId) {
            $plr = $this->getDb()->players->findOne(["_id" => $this->player]);
            $this->setPlayer($plr);
        } else {
            $plr = $this->player;
        }

        $locId = $this->player["loc"];
        if ($location = $this->getDb()->locations->findOne(["lid" => $locId])) {
            $locationHelper = new LocationHelper($location);
            $locationHelper->setCollection($this->getDb()->locations);
            $players = $locationHelper->getPlayers();
            for ($i = 0; $i < count($players); $i++) {
                if ($player = $this->getDb()->players->findOne(["_id" => new \MongoId($players[$i])])) {
                    $playerHelper = new PlayerHelper($player);
                    if ($playerHelper->isTimed("online")) { //оффлайн
                        $pid = $playerHelper->getPlayer()["_id"];
                        $locationHelper->removePlayer($pid);
                        $msg = $player["title"] . " " . (($player["sex"] == "m") ? "исчез" : "исчезла");
                        $locationHelper->addJournal($msg, $this->getDb()->players);
                    }
                }
            }
            $locationHelper->update();
            $this->getService('supervision')->setLocHelper($this->getService("loc.helper"));
            $this->getService('supervision')->addLocation($locId);

            $loc = $this->getService('supervision')->getLocation($locId)->getLoc();
            $doors = $loc["doors"];
            for ($i = 0; $i < count($doors); $i++) {
                $this->getService('supervision')->addLocation($doors[$i][1]);
                /*try {
                    $locI = $this->getService('supervision')->getLocation($doors[$i][1])->getLoc();
                    for ($j = 0; $j < count($locI["doors"]); $j++) {
                        $this->getService('supervision')->addLocation($locI["doors"][$j][1]);
                    }
                } catch(\Exception $e){
                    continue;
                }*/
            }

            $this->getService('supervision')->eachLocations(function ($locHelper) {
                $this->doai($locHelper);
            });
            $this->getService('supervision')->eachLocations(function ($locHelper) {
                $locHelper->update();
            });
            return;
        } else {
            return;
        }
    }


    /**
     * @param LocationHelper $locHelper
     * @return bool
     */
    protected function doai($locHelper)
    {
        try {
            $locHelper = $this->_respawns($locHelper);
            $locHelper =$this->_deletes($locHelper);
            $locHelper = $this->_locAi($locHelper);
            $locHelper->update();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param LocationHelper $locHelper
     * @return LocationHelper
     */
    private function _respawns($locHelper)
    {
        if (isset($locHelper->getLoc()["respawn"])) {
            $locHelper->eachObjects("respawn", function ($objId, $obj) use ($locHelper) {
                if ($locHelper->isRespawned($objId)) {
                    $locHelper->addObject($objId, $obj["obj"]);
                    $locHelper->removeRespawn($objId);
                    $locHelper->addJournal($obj["msg_on_respawn"], $this->getService('player.helper')->getCollection());
                }
            });
        }
        return $locHelper;
    }

    /**
     * @param LocationHelper $locHelper
     * @return LocationHelper
     */
    private function _deletes($locHelper)
    {
        if (isset($locHelper->getLoc()["delete"]) and is_array($locHelper->getLoc()["delete"])) {
            $locHelper->eachObjects("delete", function ($objId, $obj) use ($locHelper) {
                $deleteTime = $obj["time"];
                $deleteMsg = $obj["msg_on_del"];
                if ($locHelper->isTimeOut($deleteTime)) {
                    $locHelper->removeObject($objId);
                    $locHelper->removeDelTimer($objId);
                    $locHelper->addJournal($deleteMsg, $this->getService('player.helper')->getCollection());
                }
            });
        }
        return $locHelper;
    }

    /**
     * @param LocationHelper $locHelper
     * @return LocationHelper
     */
    private function _locAi($locHelper)
    {
        if (isset($locHelper->getLoc()["loc"]) and is_array($locHelper->getLoc()["loc"])) {
            $locHelper->eachObjects("loc", function ($objId, $obj) use ($locHelper) {
                //запускаем ии НПС
                if (substr($objId, 0, 4) == "npc_") {
                    $caclHelper = new CalculateHelper($obj);
                    $caclHelper->calcParams();
                    $obj = $caclHelper->getObject();
                    if (!isset($obj["move"])) {
                        $obj = $this->_moveAi($obj, $locHelper);
                        if($obj["ai"]["move"]["status"][0] == "in_move" and count($obj["ai"]["move"]["list"]) > 0){
                            //$locHelper->addObject($objId, $obj);
                            $locId = array_pop($obj["ai"]["move"]["list"]);
                            $outMsg = $obj["title"]." ".$obj["ai"]["move"]["data"]["move"][1]." ".$locHelper->getDoorName($locId);
                            $inMsg = $obj["ai"]["move"]["data"]["move"][0]." ".$obj["title"];
                            $jEvent1 = new JournalEvent($outMsg);
                            $jEvent1->setLocId($locHelper->getLoc()["lid"])
                                ->setPlayers($this->getDb()->players);
                            $jEvent2 = new JournalEvent($inMsg);
                            $jEvent2->setLocId($locId)
                                ->setPlayers($this->getDb()->players);
                            $this->getService("supervision")->getLocation($locId)->addObject($objId, $obj);
                            $locHelper->removeObject($objId);
                            $this->getDispatcher()->dispatch("addjournal.all", $jEvent1);
                            $this->getDispatcher()->dispatch("addjournal.all", $jEvent2);
                            //$locHelper->addJournal($outMsg, $this->getDb()->players);
                            //$locHelper->factory($locId)->addJournal($inMsg, $this->getDb()->players);
                        } else {
                            $locHelper->addObject($objId, $obj);
                        }
                    }
                }
            });
        }
        return $locHelper;
    }

    /**
     * @param $obj
     * @param LocationHelper $locHelper
     */
    private function _moveAi($obj, $locHelper)
    {
        $move = $obj["ai"]["move"];
        if (!isset($move["status"])) {
            $move["status"][0] = "stand"; //если нет статуса, то стоит
        }
        $nextMove = (isset($move["next_move"])) ? $move["next_move"] : time();
        $moveList = (isset($move["list"])) ? $move["list"] : []; //какие локации посетил
        $countLocs = (isset($move["num"])) ? rand($move["num"][0], $move["num"][1]) : 1; //сколько локаций ходит

        if (time() >= $nextMove) { //подошло время идти
            if ($move["status"][0] == "stand") {
                $move["status"][0] = "in_move";
                $move["status"][1] = $countLocs;
            } //если стояли - то идем
        }
        if ($move["status"][0] == "in_move" and count($move["list"]) < $move["status"][1] and $move["status"][1] > 0) {
            $blackTerr = isset($move["black_terr"]) ? $move["black_terr"] : [];
            $door = $locHelper->getRandomDoorId($moveList, $blackTerr);
            $move = $this->_startMove($move, $door);
        } else {
            $move = $this->_stopMove($move);
        }
        $obj["ai"]["move"] = $move;
        return $obj;
    }

    /**
     * @param $move
     * @param $locId
     * @return mixed
     */
    private function _startMove($move, $locId){
        $move["list"][] = $locId; //добавляем ход
        //$move["next_move"] = time() + rand($move["time"][0], $move["time"][1]);
        $move["status"][1]--;
        return $move;
    }
    /**
     * @param $move
     * @return mixed
     */
    private function _stopMove($move){
        $move["list"] = [];
        $move["status"][0] = "stand";
        $move["status"][1] = 0;
        if($move["next_move"] < time()) {
            $move["next_move"] = time() + rand($move["time"][0], $move["time"][1]);
        }
        return $move;
    }

    public static function init()
    {
        if (is_null(self::$game)) {
            self::$game = new self();
        }
        return self::$game;
    }

    /**
     * @return \MongoDb
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param \MongoDb $db
     * @return $this
     */
    public function setDb($db)
    {
        $this->db = $db;
        return $this;
    }

    /**
     * @return array
     */
    public function getPlayer()
    {
        if (!is_array($this->player)) {
            $player = $this->getDb()->players->findOne(["_id" => $this->player]);
            return $player;
        }
        return $this->player;
    }

    public function getLoc()
    {

    }

    /**
     * @return \MongoCursor
     */
    public function getLastNews()
    {
        $collection = $this->getDb()->news;
        return $collection->find()->limit(1)->sort(["create" => -1]);
    }

    /**
     * @param array $player
     */
    public function setPlayer($player)
    {
        if (is_array($player) and !is_null($this->getService('player.helper'))) {
            $this->getService('player.helper')->setPlayer($player);
        }
        $this->player = $player;
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
     * @param $serviceId
     * @param $service
     * @return $this
     */
    public function addService($serviceId, $service)
    {
        $this->container[$serviceId] = $service;
        return $this;
    }

    /**
     * @param $serviceId
     * @return object|null
     */
    public function getService($serviceId)
    {
        return (isset($this->container[$serviceId])) ? $this->container[$serviceId] : NULL;
    }
}