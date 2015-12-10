<?php

/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 03.12.2015
 * Time: 16:36
 */
class ActorHelper
{
    /**
     * @param array $actor
     * @param array $item
     * @param int $count
     * @return array
     */
    public static function addItem(array $actor, array $item, $count = 0)
    {

        return $actor;
    }

    /**
     * @param array $actor
     * @param array $item
     * @return array
     */
    public static function equipItem(array $actor, array $item)
    {

        return $actor;
    }

    /**
     * @param array $actor
     * @param string $iid
     * @return array
     */
    public static function removeItem(array $actor, $iid)
    {

        return $actor;
    }

    public static function calcParams(array $actor)
    {
        $stats = self::getCompileField('stats_base', $actor);
        //Life
        if ($actor["char_params"][0] < 0) {
            $actor["char_params"][0] = 0;
        }
        $actor["char_params"][1] = $stats[0] * 10 + $stats[1] * 2 + 10;
        if(!isset($actor["char_params"][0])){
            $actor["char_params"][0] = $actor["char_params"][1];
        }
        //Mana
        if ($actor["char_params"][2] < 0) {
            $actor["char_params"][2] = 0;
        }
        $actor["char_params"][3] = $stats[2] * 10 + $stats[1] * 2 + 10;
        if(!isset($actor["char_params"][2])){
            $actor["char_params"][2] = $actor["char_params"][3];
        }
        ksort($actor["char_params"]);
        return $actor;
    }

    public static function getCompileField($field, array $actor)
    {
        if (isset($actor[$field])) {
            $compile = [];
            $baseField = $actor[$field];
            if (isset($actor[$field . "_add"])) {
                $addField = $actor[$field . "_add"];
                for ($i = 0; $i < count($baseField); $i++) {
                    if (isset($addField[$i])) {
                        $compile[$i] = $baseField[$i] + $addField[$i];
                    } else {
                        $compile[$i] = $baseField[$i];
                    }
                }
            } else {
                $compile = $baseField;
            }
            return $compile;
        } else {
            return [];
        }
    }
}