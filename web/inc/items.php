<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 03.12.2015
 * Time: 16:34
 */

class ItemsHelper {
    protected $_items = [];

    public function __construct($items)
    {
        $this->_items = $items;
    }

    /**
     * @param $item
     * @return bool
     */
    public static function isArmor(array $item){
        if(substr($item["iid"],0,4) == 'i.a.'){
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $item
     * @return bool
     */
    public static function isWeapon(array $item){
        if(substr($item["iid"],0,4) == 'i.w.'){
            return true;
        } else {
            return false;
        }
    }

    public function getTitle($iid, $case){

    }
}