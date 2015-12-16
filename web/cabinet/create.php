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
    $actor = $ld->players->findOne(["title" => $title]);
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
                "loc" => "ld.790.1380",
                "level" => 1,
                "base_stats" => $baseStats,
                "base_stats_add" => [0, 0, 0, 0, 0, 0],
                "war_p_skills" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                "war_p_skills_add" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                "experience" => 0,
                "inventory" => [],
                "equip" => [
                    "rhand" => [
                        "iid" => "i.w.snov",
                        "type" => \Likedimion\Helper\ItemHelper::ITEM_SWORD,
                        "titles" => [
                            "nom" => "меч новобранца",
                            "gen" => "меча новобранца",
                            "dat" => "мечу новобранца",
                            "acc" => "меч новобраца",
                            "inst" => "мечом новобранца",
                            "prep" => "о мече новобранца",
                            "plural" => "мечи новобранца"
                        ],
                        "info" => "Немного потрепаная рубашка, но все равно имеет довольно приличный вид.",
                        "item" => [
                            "cost" => 10,
                            "armor" => 1,
                            "war_p_skills_add" => [0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                            "base_stats_add" => [0, 0, 0, 0, 0, 0],
                            "slots" => [],
                            "war_stats" => [8, 2, 3],
                        ]
                    ],

                    "head" => [],
                    "bodyarm" => [
                        "iid" => "i.a.bnov",
                        "type" => \Likedimion\Helper\ItemHelper::ITEM_BODYARM,
                        "titles" => [
                            "nom" => "рубуха новобранца",
                            "gen" => "рубаху новобранца",
                            "dat" => "рубахе новобранца",
                            "acc" => "рубаху новобраца",
                            "inst" => "рубахой новобранца",
                            "prep" => "о рубахе новобранца",
                            "plural" => "рубахи новобранца"
                        ],
                        "info" => "Немного потрепаная рубашка, но все равно имеет довольно приличный вид.",
                        "item" => [
                            "cost" => 10,
                            "armor" => 1,
                            "war_p_skills_add" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                            "base_stats_add" => [0, 1, 0, 0, 1, 0],
                            "slots" => []
                        ]
                    ],
                    "legs" => [
                        "iid" => "i.a.lnov",
                        "type" => \Likedimion\Helper\ItemHelper::ITEM_LEGS,
                        "titles" => [
                            "nom" => "штаны новобранца",
                            "gen" => "штанов новобранца",
                            "dat" => "штанам новобранца",
                            "acc" => "штаны новобраца",
                            "inst" => "штанами новобранца",
                            "prep" => "о штанах новобранца",
                            "plural" => "штаны новобранца"
                        ],
                        "info" => "Немного потрепаные штаны, но все равно имеет довольно приличный вид.",
                        "item" => [
                            "cost" => 10,
                            "armor" => 1,
                            "war_p_skills_add" => [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                            "base_stats_add" => [0, 1, 0, 0, 1, 0],
                            "slots" => []
                        ]
                    ],
                    "shoes" => [
                        "iid" => "i.a.snov",
                        "type" => \Likedimion\Helper\ItemHelper::ITEM_SHOES,
                        "titles" => [
                            "nom" => "сапоги новобранца",
                            "gen" => "сапогов новобранца",
                            "dat" => "сапогам новобранца",
                            "acc" => "сапоги новобраца",
                            "inst" => "сапогами новобранца",
                            "prep" => "о сапогах новобранца",
                            "plural" => "сапоги новобранца"
                        ],
                        "info" => "Немного потрепаная рубашка, но все равно имеет довольно приличный вид.",
                        "item" => [
                            "cost" => 10,
                            "armor" => 1,
                            "war_p_skills_add" => [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                            "base_stats_add" => [0, 1, 0, 0, 1, 0],
                            "slots" => []
                        ]
                    ]
                ],
            ];
            try {
                $playerHelper = new \Likedimion\Helper\PlayerHelper($actor);
                $playerHelper->addMagic("base.punch", 1, $magic);
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