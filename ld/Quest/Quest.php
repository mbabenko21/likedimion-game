<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 28.12.2015
 * Time: 22:27
 */

namespace Likedimion\Quest;


class Quest extends AbstractQuest
{
    public function getStateCollection(){
        $collection = $this->getOption('states', []);
        $iterator = [];
        while(list($state, $data) = each($collection)){
            $iterator[$state] = new QuestState($data);
        }
        return new \ArrayIterator($iterator);
    }

    /**
     * @param $state
     * @return QuestState
     * @throws \Exception
     */
    public function getState($state){
        $collection = $this->getStateCollection();
        if($collection->offsetExists($state)){
            return $collection->offsetGet($state);
        } else {
            throw new \Exception("State ".$state." not found");
        }
    }
}