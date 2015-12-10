<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 05.12.2015
 * Time: 0:12
 */

define("ROOT_DIR", __DIR__."/..");
require_once __DIR__."/../inc/const.php";
require_once __DIR__."/../inc/func.php";
$dirname = ROOT_DIR . "/data/npc";
$mongoClient = new MongoClient("mongodb://localhost:27017");
$G = $mongoClient->likedimion;
$G->npc->remove();
$G->npc->createIndex(["iid" => 1], ["unique" => true]);
if (file_exists($dirname)) {
    $files = [];
    if ($handle = opendir($dirname)) {
        while (FALSE !== ($filename = readdir($handle))) {
            if ($filename != "." and $filename != "..") {
                $npc = require_once $dirname . DIRECTORY_SEPARATOR . $filename;
                $G->npc->insert($npc);
            }
        }
    } else {
        throw new Exception(sprintf("Dir %s not opened", $dirname));
    }
} else {
    throw new Exception(sprintf("Dir %s not exists", $dirname));
}