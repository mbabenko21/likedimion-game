<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 27.12.2015
 * Time: 23:57
 */

namespace Likedimion\Dialog;


class DialogAnswer
{
    protected $sectionId;

    protected $reply;

    public function __construct($sectionId, $reply)
    {
        $this->sectionId = $sectionId;
        $this->reply = $reply;
    }

    /**
     * @return string
     */
    public function getSectionId()
    {
        return $this->sectionId;
    }

    /**
     * @return Reply
     */
    public function getReply()
    {
        return new Reply($this->reply);
    }


}