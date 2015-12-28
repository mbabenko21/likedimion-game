<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 28.12.2015
 * Time: 22:29
 */

namespace Likedimion\Quest;


class AbstractQuest
{
    /**
     * @var array
     */
    protected $qData = [];

    public function __construct(array $q)
    {
        $this->qData = $q;
    }

    /**
     * @param $option
     * @param $default
     * @return mixed
     */
    public function getOption($option, $default){
        return (isset($this->qData[$option])) ? $this->qData[$option] : $default;
    }
}