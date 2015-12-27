<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 27.12.2015
 * Time: 22:01
 */

namespace Likedimion\Ai;


use Likedimion\Helper\LocationHelper;

class Vision
{
    /**
     * @var string
     */
    protected $locId;
    /**
     * @var array
     */
    protected $loc;
    /**
     * @var LocationHelper
     */
    protected $locHelper;
    /**
     * @var \MongoDB
     */
    protected $db;
    public function __construct(){}

    protected static $init = null;
    /**
     * @return LocationHelper
     */
    public function getLocHelper()
    {
        return $this->locHelper;
    }

    /**
     * @param LocationHelper $locHelper
     */
    public function setLocHelper($locHelper)
    {
        $this->locHelper = $locHelper;
    }

    /**
     * @return \MongoDB
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param \MongoDB $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    /**
     * @return array
     */
    public function getPlayers(){
        $players = $this->locHelper->getPlayers();
        $newPlayers = [];
        for($i = 0; $i < count($players); $i++){
            $player = $this->getDb()->players->findOne(["_id" => new \MongoId($players[$i])]);
            if($player){
                $newPlayers[$players[$i]] = $player;
            }
        }
        return $newPlayers;
    }

    /**
     * @return array
     */
    public function getDoors(){
        $doors = $this->locHelper->getLoc()["doors"];
        return  $doors;
    }

    /**
     * @param array $blackList
     * @return string
     */
    public function getRandomDoor($blackList = []){
        $doors = $this->getDoors();
        $randomKey = array_rand($doors);
        if(!in_array($doors[$randomKey][1], $blackList)){
            return $doors[$randomKey][1];
        } else {
            return $this->getRandomDoor($blackList);
        }
    }

    public function loadLoc(){
        $this->locHelper->setCollection($this->db->locations);
        $loc = $this->locHelper->getCollection()->findOne(["lid" => $this->locId]);
        if($loc){
            $this->locHelper = new LocationHelper($loc);
            $this->locHelper->setCollection($this->getDb()->locations);
        } else {
            throw  new \Exception("Err load loc");
        }
    }
    /**
     * @return mixed
     */
    public function getLocId()
    {
        return $this->locId;
    }
    /**
     * @param mixed $locId
     */
    public function setLocId($locId)
    {
        $this->locId = $locId;
    }

    public static function init(){
        if(is_null(self::$init)){
            self::$init = new self();
        }
        return self::$init;
    }
}