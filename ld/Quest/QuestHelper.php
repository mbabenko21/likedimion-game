<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 28.12.2015
 * Time: 22:26
 */

namespace Likedimion\Quest;


class QuestHelper
{
    /**
     * @var \MongoCollection
     */
    protected $collection;

    public function __construct(\MongoCollection $collection)
    {
        $this->collection = $collection;
    }

    public function getQuest($questId){
        $quest = $this->collection->findOne(["qid" => $questId]);
        if($quest){
            return new Quest($quest);
        } else {
            throw new \Exception("Quest ".$questId." not loaded");
        }
    }

    /**
     * @param $questId
     * @return bool
     */
    public function questExists($questId){
        $q = $this->collection->findOne(["qid" => $questId]);
        return (!is_null($q)) ? true : false;
    }
}