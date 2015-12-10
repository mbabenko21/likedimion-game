<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 11.12.2015
 * Time: 0:14
 */

namespace Likedimion\Helper;


class DateHelper
{
    public static function microtimeFloat($microtime){
        list($usec, $sec) = explode(" ", $microtime);
        return ((float)$usec + (float)$sec);
    }
}