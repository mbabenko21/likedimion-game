<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 06.12.2015
 * Time: 15:48
 */

namespace Likedimion\Helper;


class GameHelper
{
    public static function logout()
    {
        if (isset($_SESSION["aid"])) {
            unset($_SESSION["aid"]);
            session_destroy();
        }
    }

    /**
     * @param \MongoId $aid
     * @return string
     */
    public static function auth($aid)
    {
        $sid = session_id();
        $_SESSION["aid"] = $aid;
        return $sid;
    }

    /**
     * @param string $pid
     * @param \MongoCollection $db
     */
    public static function gameConnect($pid, $db)
    {
        if (self::isAuth()) {
            $player = $db->players->findOne(["_id" => $pid]);
            if (!is_null($player) and $player["aid"] == $_SESSION["aid"]) {
                $_SESSION["pid"] = $player["_id"]->id;
            }
        }
    }

    public static function regAcc($login, $pass)
    {

    }

    public static function isAuth()
    {
        return isset($_SESSION["aid"]);
    }
}