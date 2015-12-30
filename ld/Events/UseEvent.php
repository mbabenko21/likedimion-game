<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 29.12.2015
 * Time: 16:46
 */

namespace Likedimion\Events;



class UseEvent extends PluginEvent
{
    protected $from;

    protected $to;
    /**
     * @var array
     */
    protected $object = [];
    /**
     * @return string
     */
    public function getName()
    {
        return 'use';
    }

    /**
     * @param mixed $from
     * @return UseEvent
     */
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @param mixed $to
     * @return UseEvent
     */
    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

}