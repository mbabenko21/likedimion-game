<?php
if(!defined('ROOT')){header("Location: /?");}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 06.12.2015
 * Time: 19:37
 */

$players = $ld->players->find(["aid" => $_SESSION["aid"]]);
$account = $ld->accounts->findOne(["_id" => $_SESSION["aid"]]);
if(isset($account["name"])){
    $name = $account["name"];
} else {
    $name = $account["email"];
}
$page = <<<PAGE
<p class="text-muted">
    Приветствуем тебя, {$name}<br/>
    Пришло время для приключений!
</p>
<p class="text-muted strong upper">Выбери героя, чтобы войти в игру.</p>
<div class="hr"></div>
PAGE;
if($players->count() < 1){
    $page .= <<<PAGE
<p class="text-muted strong text-uppercase">У вас еще нет персонажей.</p>
PAGE;
} else {
    $page .= "<ul>";
    while($players->hasNext()){
        $players->next();
        $player = $players->current();
        $page .=<<<PLAYER
        <li>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-info">
    <div class="panel-heading" role="tab" id="heading_{$player["_id"]}">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{$player["_id"]}" aria-expanded="false" aria-controls="collapse_{$player["_id"]}">
          <span class="strong text-uppercase">{$player["title"]}</span><br/>
        </a>
      </h4>
    </div>
    <div id="collapse_{$player["_id"]}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_{$player["_id"]}">
      <div class="panel-body">
        <a class="tabs__link bg-success button" href="/?cb=connect&pid={$player["_id"]}">в игру</a>
        <a class="tabs__link bg-danger button" href="/?cb=remove&pid={$player["_id"]}">удалить</a>
      </div>
    </div>
  </div>
        </li>
PLAYER;
        //unset($player);
    }
    $page.="</ul>";
}

$page.=<<<BTN
<a class="tabs__link bg-info button" href="/?cb=create">новый персонаж</a>
<div class="hr"></div>
<a class="tabs__link bg-danger button" href="/?cb=logout">выход</a>
BTN;

\Likedimion\Helper\View::display($page, "Кабинет");
