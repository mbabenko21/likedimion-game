<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 09.12.2015
 * Time: 23:08
 */

namespace Likedimion;


class EventDispatcher
{
    protected $_listeners = [];

    public function addEventListener($event, $class, $method){
        $this->_listeners[$event][] = [
            "class" => $class,
            "method" => $method,
        ];
        return $this;
    }

    public function hasEventListener($event){
        return isset($this->_listeners[$event]);
    }

    public function dispatch(Event $event){
        if($this->hasEventListener($event)){
            $listeners = $this->_listeners[$event->getName()];
            foreach($listeners as $callable){
                $className = $callable["class"];
                $method = $callable["method"];
                $class = new $className();
                if(method_exists($class, $method)){
                    $class->{$method}($event);
                }
            }
        }
    }
}