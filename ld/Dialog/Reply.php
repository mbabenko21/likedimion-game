<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 28.12.2015
 * Time: 0:04
 */

namespace Likedimion\Dialog;


use Likedimion\Game;

class Reply
{
    protected $text = "";

    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText()
    {
        $text = trim($this->text);
        $text = preg_replace("/[\t\n\r]/", "", $text);
        $match = preg_match("/{php}(.*){\/php}/i", $text);
        $text = preg_replace_callback("/{php}(.*){\/php}/", array($this, 'replacePHP'), $text);
        $text = preg_replace_callback("/{html}(.*){\/html}/", array($this, 'replaceHTML'), $text);
        $text = preg_replace_callback("/{%([^(%})]+)%}/", array($this, 'replaceCharField'), $text);
        $text = str_replace('{#br#}', '<br/>', $text);
        return $text;
    }

    private function replacePHP($text)
    {
        $text = eval($text[1]);
        return $text;
    }

    private function replaceCharField($text)
    {
        $player = Game::init()->getPlayer();
        $field = "";
        if($player){
            if(isset($player[$text[1]])){
                $field = $player[$text[1]];
            }
        }
        return $field;
    }

    private function replaceHTML($text){
        $text = str_replace(["[", "]"], ["<",">"], $text);
        return $text;
    }
}