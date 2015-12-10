<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 03.12.2015
 * Time: 18:52
 */
define("IMPASSABLE_TILE", "");
define("ROOT_DIR", __DIR__."/..");
require_once __DIR__."/../inc/func.php";
$map_file = __DIR__."/../data/map.dat";

$map = file($map_file);
unset($map[count($map)-1]);
unset($map[0]);
$mapData = [];
for($i = 1; $i < count($map); $i++){
    $mapData[$i] = explode("\t", $map[$i]);
}
unset($i);
$locations = [];
$doors = [];
for($i = 0; $i < count($mapData); $i++){
    for($j = 0; $j < count($mapData[$i]); $j++){
        $locId = "x".$i."x".$j;
        if($mapData[$i][$j] == IMPASSABLE_TILE){
            continue;
        } else {
            if(isset($mapData[$i][$j-1]) and $mapData[$i][$j-1] != IMPASSABLE_TILE){
                $doors["west"] = "x".$i."x".($j-1);
            }
            if(isset($mapData[$i][$j+1]) and $mapData[$i][$j+1] != IMPASSABLE_TILE){
                $doors["east"] = "x".$i."x".($j+1);
            }
            if(isset($mapData[$i+1][$j]) and $mapData[$i+1][$j] != IMPASSABLE_TILE){
                $doors["south"] = "x".($i+1)."x".$j;
            }
            if(isset($mapData[$i-1][$j]) and $mapData[$i-1][$j] != IMPASSABLE_TILE){
                $doors["nord"] = "x".($i-1)."x".$j;
            }
        }
        if(count($doors)>0){$locations[$locId]["doors"] = $doors;}
        unset($locId);
    }
}
$locTexts = [];
$locText = "";
$msgData = require_once ROOT_DIR . "/data/msg.php";
foreach($locations as $doorId => $doors){
    $doors = $doors["doors"];
    $doodText = "";
    foreach($doors as $key => $val){
        $doorName = $msgData["ru"]["door_".$key];
        $doodText.=sprintf("%s|%s|", $doorName, $val);
    }
    $locText .= sprintf("%s:%s\r\n", $doorId, $doodText);
}
clear_files(ROOT_DIR."/data/locations.dat");
write_files(ROOT_DIR."/data/locations.dat", $locText);
die(var_dump($mapData));