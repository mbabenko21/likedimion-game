<?php

namespace Likedimion;
use Likedimion\Ai\Vision;
use Likedimion\Helper\LocationHelper;
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
            NPC_ROLE_GID = 2
        ;


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
    RACE_ANIMAL = "animal"
    ;

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
     * @var Vision
     */
    protected $vision;
    /**
     * @var EventDispatcher
     */
    protected $dispatcher;
    /**
     * @var array
     */
    protected $container = [];



    public function ai(){
        if($this->player instanceof \MongoId) {
            $plr = $this->getDb()->players->findOne(["_id" => $this->player]);
            $this->setPlayer($plr);
        } else {
            $plr = $this->player;
        }
        $locId = $this->player["loc"];
        if($location = $this->getDb()->locations->findOne(["lid" => $locId])) {
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

            $this->doai($locId);
            $ok = [];
            $ok[] = $locId;
            while (list($i, $door) = each($location["doors"])) {
                $this->doai($door[1]);
                $ok[] = $door[1];
                if($location1 = $this->getDb()->locations->findOne(["lid" => $door[1]])){
                    while(list($j, $door1) = each($location1["doors"])){
                        if(!in_array($door1[1], $ok)){
                            $this->doai($door1[1]);
                            $ok[] = $door1[1];
                        }
                    }
                }
            }
            return;
        } else {
            return;
        }
    }

    protected function doai($locId){
        //таймеры локации
    }

    public static function init(){
        if(is_null(self::$game)){
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
        if(!is_array($this->player)) {
            $player = $this->getDb()->players->findOne(["_id" => $this->player]);
            return $player;
        }
        return $this->player;
    }

    public function getLoc(){

    }

    /**
     * @return \MongoCursor
     */
    public function getLastNews(){
        $collection = $this->getDb()->news;
        return $collection->find()->limit(1)->sort(["create"=>-1]);
    }

    /**
     * @param array $player
     */
    public function setPlayer($player)
    {
        $this->player = $player;
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
     */
    public function setVision($vision)
    {
        $this->vision = $vision;
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
    public function addService($serviceId, $service){
        $this->container[$serviceId] = $service;
        return $this;
    }

    /**
     * @param $serviceId
     * @return object|null
     */
    public function getService($serviceId){
        return (isset($this->container[$serviceId])) ? $this->container[$serviceId] : NULL;
    }
}