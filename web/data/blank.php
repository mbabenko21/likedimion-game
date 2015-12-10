<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 03.12.2015
 * Time: 20:21
 */
try {
    $G->locations->remove();
} catch (MongoException $e){
    return;
}

$loc_i = $G->locations;

$l_i = [];
$l_i["loc_bank"]["npcs"][] = "lukas";

//$loc_i->createIndex(["loc_id" => 1], ["unique" => true]);