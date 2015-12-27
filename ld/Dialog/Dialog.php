<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 27.12.2015
 * Time: 23:51
 */

namespace Likedimion\Dialog;


class Dialog
{
    const MIXIN = 'mixin';
    const PLUGIN = 'plugin';
    protected $dialog;

    public function __construct($dialogId)
    {
        $file = ROOT . "/../data/dialogs/".$dialogId.".php";
        if(file_exists($file)){
            $this->dialog = require $file;
        }
    }

    /**
     * @param $sectionId
     * @return DialogSection
     * @throws \Exception
     */
    public function getSection($sectionId){
        if(isset($this->dialog["dialog"][$sectionId])){
            if(!is_array($this->dialog["dialog"][$sectionId])){
                $sect = preg_split("/[_\.:]/", $this->dialog["dialog"][$sectionId]);
                switch($sect[0]){
                    case self::MIXIN:
                        $newDialog = new Dialog($sect[1]);
                        return $newDialog->getSection($sect[2]);
                        break;
                    case self::PLUGIN:

                        break;
                }
            } else {
                return new DialogSection($this->dialog["dialog"][$sectionId]);
            }
        } else {
            throw new \Exception("Section $sectionId not found");
        }
    }

    /**
     * @param $optionId
     * @param $default
     * @return string
     */
    public function getOption($optionId, $default = ""){
        return (isset($this->dialog[$optionId])) ? $this->dialog[$optionId] : $default;
    }

    /**
     * @param $dialogId
     * @return bool
     */
    public static function exists($dialogId){
        $file = ROOT . "/../data/dialogs/".$dialogId.".php";
        return file_exists($file);
    }
}