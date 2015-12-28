<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 27.12.2015
 * Time: 23:52
 */

namespace Likedimion\Dialog;


class DialogSection
{
    protected $section = [];

    public function __construct($section)
    {
        $this->section = $section;
    }

    /**
     * @return Reply
     */
    public function getReply(){
        return new Reply($this->section["reply"]);
    }

    public function getAnswersIterator(){
        $answers = $this->section["answers"];
        $iterator = new \ArrayIterator();
        while(list($sectionId, $reply) = each($answers)){
            $iterator->append(new DialogAnswer($sectionId, $reply));
        }
        return $iterator;
    }

    /**
     * @param $option
     * @param $default
     * @return string
     */
    public function getOption($option, $default = ""){
        $section = $this->section;
        if(isset($section[$option])){
            return $section[$option];
        } else {
            return $default;
        }
    }
}