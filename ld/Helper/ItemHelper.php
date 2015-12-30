<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 11.12.2015
 * Time: 19:27
 */

namespace Likedimion\Helper;


class ItemHelper
{
    const   ITEM_SWORD          = "sword",
            ITEM_DUAL_SWORD     = "dual_sword",
            ITEM_PAIR_KNIFES    = "pair_knife",
            ITEM_PAIR_SWORDS    = "pair_swords",
            ITEM_BOW            = "bow",
            ITEM_AXE            = "axe",
            ITEM_DUAL_AXE       = "dual_axe",
            ITEM_SPEAR          = "spear",
            ITEM_MACE           = "mace",
            ITEM_DUAL_MACE      = "dual_mace",
            ITEM_BOOK           = "book",
            ITEM_BODYARM        = "bodyarm",
            ITEM_HELMET         = "helmet",
            ITEM_HAND           = "hand",
            ITEM_LEGS           = "leg",
            ITEM_ROBE           = "robe",
            ITEM_RING           = "ring",
            ITEM_BRACE          = "brace",
            ITEM_AMULET         = "amulet",
            ITEM_SHOES          = "shoes",
            ITEM_GLOVES         = "gloves",
            ITEM_CLOAK          = "cloak",
            ITEM_SET            = "set",
            ITEM_MISC           = "misc",
            ITEM_QUEST          = "quest",
            ITEM_PLUGIN         = "plugin",
            ITEM_BOTTLE         = "bottle",
            ITEM_GEM            = "gem",
            ITEM_BELT           = "belt",
            ITEM_WAGON          = 'wagon'
    ;
    /**
     * @var \MongoCollection
     */
    private $_collection;

    public function __construct(\MongoCollection $collection){
        $this->_collection = $collection;
    }
    /**
     * @return array
     */
    public static function getWeaponTypes(){
        return [
            self::ITEM_SWORD,
            self::ITEM_DUAL_SWORD,
            self::ITEM_PAIR_KNIFES,
            self::ITEM_PAIR_SWORDS,
            self::ITEM_BOW,
            self::ITEM_AXE,
            self::ITEM_DUAL_AXE,
            self::ITEM_SPEAR,
            self::ITEM_MACE,
            self::ITEM_DUAL_MACE,
            self::ITEM_BOOK
        ];
    }

    /**
     * @return array
     */
    public static function getArmorTypes(){
        return [
            self::ITEM_BODYARM,
            self::ITEM_HELMET,
            self::ITEM_HAND,
            self::ITEM_LEGS,
            self::ITEM_ROBE,
            self::ITEM_SHOES,
            self::ITEM_GLOVES,
        ];
    }

    public static function getBijouterieTypes() {
        return [
            self::ITEM_RING,
            self::ITEM_BRACE,
            self::ITEM_AMULET,
            self::ITEM_CLOAK,
            self::ITEM_BELT,
        ];
    }

    /**
     * @param string $iid
     * @return array|null
     */
    public function getItem($iid){
        return $this->_collection->findOne(["iid" => $iid]);
    }
}