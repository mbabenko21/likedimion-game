<?php
if(!defined("ROOT_DIR")){die("Go away!!!");}

if(file_exists(ROOT_DIR."/f_debug")){
	define("FLAG_DEBUG", true);
} 

if(file_exists(ROOT_DIR."/f_update")){
	define("FLAG_UPDATE", true);
} 

define("STYLE_STANDART", "standart");
define("GAME_FILE", ROOT_DIR."/data/gdata");
define("OFFLINE_FILE", ROOT_DIR."/data/odata");

/**
* NPC CONSTANTES
*/
define("NPC_ROLE_NONE", 		0);
define("NPC_ROLE_CITIZEN", 		1); 			// житель
define("NPC_ROLE_TRADER",		2); 			//торговец
define("NPC_ROLE_BANKIR",		3); 			//банкир
define("NPC_ROLE_GID",			4); 			//гид
define("NPC_ROLE_BUKMEKER",		5); 			//букмекер
define("NPC_ROLE_TREASURER",	6); 			//казначей

define("NPC_RACE_MANS",			"mans"); 		//люди
define("NPC_RACE_ELON",			"elon"); 		//элонцы
define("NPC_RACE_ANIMAL",		"animal"); 		//животные
define("NPC_RACE_ORKS",			"orks");		//орки
define("NPC_RACE_TROLLS",		"troll");		//тролли
define("NPC_RACE_DRAGONS",		"dragon");		//драконы
define("NPC_RACE_GNOMES",		"gnom");		//гномы
define("NPC_RACE_UNDEADS",		"undead");		//бессмертные
define("NPC_RACE_BALAURS",		"balaur");		//балауры
define("NPC_RACE_KOBOLDS",		"kobold");		//кобольды
define("NPC_RACE_MURLOCS",		"murloc");		//мурлоки
define("NPC_RACE_GOBLINS",		"goblin");		//гоблиины
