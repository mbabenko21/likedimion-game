<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 05.12.2015
 * Time: 22:25
 */

namespace Likedimion\Plugin;


use Likedimion\AbstractPlugin;

class Actor extends AbstractPlugin
{
    protected $_actor;

    public function run()
    {
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActor()
    {
        return $this->_actor;
    }

    /**
     * @param mixed $actor
     */
    public function setActor($actor)
    {
        $this->_actor = $actor;
    }
}