<?php

namespace Likedimion;
use Likedimion\Helper\PlayerHelper;

/**
 * summary
 */
class Game
{
    //Роли
    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;
    const ROLE_MODER = 3;
    const ROLE_QUEST = 4;

    const   NPC_ROLE_NONE = 1,
            NPC_ROLE_GID = 2
        ;


    const NPC_RACE_MANS = "mans";
    //Классы
    const CLASS_WAR = "war";
    const CLASS_MAG = "mag";
    const CLASS_ASS = "ass";

    const SEX_MAN = "m";
    const SEX_WMAN = "w";

    //Рассы

    public static function AI($player){
        $playerHelper = new PlayerHelper($player);
    }
}