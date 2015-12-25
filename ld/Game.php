<?php

namespace Likedimion;
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

    const   NPC_ROLE_NONE = 1,
            NPC_ROLE_GID = 2
        ;


    const NPC_RACE_MANS = "mans";
    //Классы
    const CLASS_WAR = "war";
    const CLASS_MAG = "mag";
    const CLASS_ASS = "ass";

    const SEX_MAN = "m";
    const SEX_WMAN = "w";

    //Рассы

    protected static $game = null;
    /**
     * @var \MongoDb
     */
    protected $db;
    /**
     * @var array
     */
    protected $player;


    public function ai(){
        $plr = $this->getDb()->players->findOne(["_id" => $this->player]);
        $this->setPlayer($plr);
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
        return $this->player;
    }

    /**
     * @param array $player
     */
    public function setPlayer($player)
    {
        $this->player = $player;
    }
}