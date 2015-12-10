<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 09.12.2015
 * Time: 23:10
 */

namespace Likedimion;


abstract class Event
{
   const LVL_UP = "lvl_up",
         ADD_MAGIC = "magic_add",
         ADD_EXP = "add_exp"

   ;
    /**
     * @return string
     */
   abstract  public function getName();


}