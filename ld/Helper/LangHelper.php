<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 24.12.2015
 * Time: 21:38
 */

namespace Likedimion\Helper;


class LangHelper
{
    public static function getMsgs($lang, $msgsId){
        $args = func_get_args();
        preg_replace_callback("/\[(\d)(:{(.*)}?)?\/\]/", function($matches) use($args){
            return $matches;
        }, $lang["msgs"][$msgsId]);
        return;
    }
}