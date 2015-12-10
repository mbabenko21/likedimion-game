<?php
namespace Likedimion\Events;
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 10.12.2015
 * Time: 1:10
 */
class LvlUpEvent extends \Likedimion\Event
{
    protected $level;

    public function __construct($level)
    {
        $this->level = $level;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return self::LVL_UP;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }
}