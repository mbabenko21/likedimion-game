<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 28.12.2015
 * Time: 22:29
 */

namespace Likedimion\Quest;


use Likedimion\Dialog\Reply;

class QuestState extends AbstractQuest
{
    /**
     * @return Reply
     */
    public function getInfo()
    {
        return new Reply($this->getOption('info', ''));
    }

    /**
     * @return array
     */
    public function getActions(){
        return $this->getOption('actions', []);
    }
}