<?php
if (!defined('ROOT')) {
    header("Location: /?");
}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 06.12.2015
 * Time: 20:35
 */
use Likedimion\Helper\View;

if (empty($_POST)) {
    $page = <<<PAGE
<div class="alert alert-info">
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
В имени только русские или только латинские буквы. Так же допустимы цифры и знаки - (дефиз), _(подчёркивание) и пробел.
</div>
<form id="createPlayer" action="/?cb=create" method="POST">
<input class="input" type="text" name="title" placeholder="Имя героя" />
<p class="strong text-uppercase">
Сторона героя<br/>
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
<span class="small">Сторона выбирается один раз и навсегда</span>
</p>
<select class="input" name="race">
    <option class="text-uppercase text-danger strong" value="1" selected>свет</option>
    <option class="strong text-uppercase" value="2">тьма</option>
</select>
<p class="strong text-uppercase">
Класс героя<br/>
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
<span class="small">По мере развития, вам будет предложена конкретная специализация</span>
</p>
<select class="input" name="class">
    <option class="text-uppercase text-danger strong" value="war" selected>воин</option>
    <option class="strong text-uppercase text-primary" value="mag">маг</option>
    <option class="strong text-uppercase text-success" value="ass">следопыт</option>
</select>
<p class="strong text-uppercase">
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
Пол героя
</p>
<select class="input" name="sex">
    <option class="strong text-uppercase" value="m" selected>муж.</option>
    <option class="strong text-uppercase" value="w">жен.</option>
</select>
<div class="hr"></div>
<a class="tabs__link bg-success button" onclick="document.getElementById('createPlayer').submit();">создать</a>
</form>
PAGE;

} else {
    //'/^[а-яА-ЯёЁa-zA-Z0-9]+$/u'
    $title = htmlspecialchars($_POST["title"]);
    $actor = $ld->players->findOne(["title" => strtolower($title)]);
    $acc = $ld->accounts->findOne(["_id" => $_SESSION["aid"]]);
    if (is_null($actor)) {
        if (preg_match('/(^[а-яА-ЯёЁa-zA-Z0-9\-_ ]{3,15}$)/u', $title)) {
            switch ($_POST["class"]) {
                case \Likedimion\Game::CLASS_WAR:
                    $baseStats = [2, 1, 1, 2, 2, 1];
                    break;
                case \Likedimion\Game::CLASS_MAG:
                    $baseStats = [1, 2, 2, 1, 1, 2];
                    break;
                case \Likedimion\Game::CLASS_ASS:
                    $baseStats = [1, 2, 1, 1, 2, 1];
                    break;
                default:
                    $baseStats = [1, 1, 1, 1, 1, 1];
                    break;
            }

            $actor = [
                "aid" => $_SESSION["aid"],
                "title" => $_POST["title"],
                "role" => ($acc["email"] == $admin) ? \Likedimion\Game::ROLE_ADMIN : \Likedimion\Game::ROLE_USER,
                "class" => $_POST["class"],
                "sex" => $_POST["sex"],
                "race" => $_POST["race"],
                "create" => time(),
                "loc" => "ld.790.1370",
                "level" => 1,
                "game_status" => "alive",
                "base_stats" => $baseStats,
                "base_stats_add" => [0, 0, 0, 0, 0, 0],
                "war_p_skills" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                "war_p_skills_add" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                "war_stats" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,],
                "experience" => 0,
                "inventory" => [],
                "equip" => [
                    "rhand" => [],
                    "lhand" => [],
                    "head" => [],
                    "bodyarm" => [],
                    "cloack" => [],
                    "hand" => [],
                    "gloves"=> [],
                    "leg" => [],
                    "shoes" => [],
                ],
                "journal" => [],
                "msg" => [],
                "friends" => [],
                "config" => [],
            ];
            try {
                $playerHelper = new \Likedimion\Helper\PlayerHelper($actor);
                $itemHelper = new \Likedimion\Helper\ItemHelper($ld->items);
                $playerHelper->addMagic("base.punch", 1, $magic);
                switch($actor["class"]){
                    case \Likedimion\Game::CLASS_WAR:
                        $playerHelper->equip('rhand', $itemHelper->getItem('i.w.snov'));
                        break;
                    case \Likedimion\Game::CLASS_MAG:
                        $playerHelper->equip('rhand', $itemHelper->getItem('i.w.booknov'));
                        break;
                    case \Likedimion\Game::CLASS_ASS:
                        $playerHelper->equip('rhand', $itemHelper->getItem('i.w.pairnov'));
                        break;
                }
                $playerHelper->equip(\Likedimion\Helper\ItemHelper::ITEM_BODYARM, $itemHelper->getItem('i.a.bnov'))
                    ->equip(\Likedimion\Helper\ItemHelper::ITEM_LEGS, $itemHelper->getItem('i.a.lnov'))
                    ->equip(\Likedimion\Helper\ItemHelper::ITEM_SHOES, $itemHelper->getItem('i.a.snov'));
                $playerHelper->calcParams();
                $ld->players->insert($playerHelper->getPlayer());


                header("Location: /?");
            } catch (MongoException $e) {
                $page = <<<IBASE_PRP_PAGE_BUFFERS
<div class="alert alert-warning">
Ошибка подключения к базе данных.<br/>
{$e->getMessage()}
</div>
IBASE_PRP_PAGE_BUFFERS;
            }
        } else {
            $page = <<<IBASE_PRP_PAGE_BUFFERS
<div class="alert alert-warning">
Неверное имя персонажа. В имени только русские или только латинские буквы. Так же допустимы цифры и знаки - (дефиз), _(подчёркивание) и пробел. Имя должно быть не короче 3 и не длиннее 15 символов.
</div>
IBASE_PRP_PAGE_BUFFERS;
        }
    } else {
        $page = <<<IBASE_PRP_PAGE_BUFFERS
<div class="alert alert-warning">
Персонаж с таким именем существует, выберите другое имя
</div>
IBASE_PRP_PAGE_BUFFERS;

    }
}
$page .= View::backButton();
View::display($page, "Новый герой");