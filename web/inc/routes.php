<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 03.12.2015
 * Time: 3:58
 */

class Routes {

    protected static $routes = [
        "DEFAULT"           => "/?",
        "MAIN_PAGE"         => "/?site=main",
        "LOGIN_PAGE"        => "/?site=main",
        "REG_PAGE"          => "/?site=reg",
        "CONNECT"           => "/?site=connect",
        "CABINET"           => "/?site=cabinet",
        "CREATE_ACTOR"      => "/?site=create.actor",
        "GAME_CONNECT"      => "/?site=connect.game",
        "REMOVE_ACTOR"      => "/?site=rm.actor",
        "GAME_MAIN"         => "/?game=main",
        "ACTOR_INVENTORY"   => "/?game=inventory",
        "GAME_MENU"         => "/?game=menu",
        "ACTOR"             => "/?game=player"
    ];

    public static function getRoute($routeName){
        return (isset(self::$routes[$routeName])) ? self::$routes[$routeName] : self::$routes["DEFAULT"];
    }

}