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

    protected $injects = [];

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

    public function dispatch($listenerId, Event $event){
        if($this->hasEventListener($listenerId)){
            $listeners = $this->_listeners[$listenerId];
            foreach($listeners as $callable){
                $className = $callable["class"];
                $method = $callable["method"];
                $class = new $className();
                foreach($this->injects as $methodName => $object){
                    if(method_exists($class, $methodName)){
                        $class->{$methodName}($object);
                    }
                }
                call_user_func_array([$class, $method], [$event]);
            }
        }
    }

    public function addInject($id, $object){
        $this->injects[$id] = $object;
        return $this;
    }
}