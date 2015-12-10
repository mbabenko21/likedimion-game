<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 10.12.2015
 * Time: 1:17
 */
use Likedimion\Event;

if (!defined('ROOT')) {
    header("Location: /?");
}

$eventDispatcher = new \Likedimion\EventDispatcher();

$eventDispatcher->addEventListener(Event::LVL_UP, 'Likedimion\Listener\PlayerListener', 'onLvlUp')
->addEventListener(Event::ADD_EXP, 'Likedimion\Listener\PlayerListener', 'onAddExp')
;
