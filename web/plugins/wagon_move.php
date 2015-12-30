<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 29.12.2015
 * Time: 1:22
 */

/**
 * @var \Likedimion\Helper\LocationHelper $locHelper
 * @var \Likedimion\Helper\PlayerHelper $playerHelper
 * @var MongoId $pid
 */
$locHelper = \Likedimion\Game::init()->getService('loc.helper');
$playerHelper = \Likedimion\Game::init()->getService('player.helper');
$player = $playerHelper->getPlayer();
$pid = $player["_id"];

