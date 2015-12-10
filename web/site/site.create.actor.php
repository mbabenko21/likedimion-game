<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 03.12.2015
 * Time: 13:12
 */

if (!isset($_POST["title"])) {
    $page = <<<EOT
    <form action="{route}CREATE_ACTOR{/route}" method="POST">
        <input name="title" type="text" class="input input_notice" placeholder="Имя персонажа" /> <br/>
        <b>Пол персонажа</b><br/>
        <input id="sex1" type="radio" name="sex" value="man" checked/> <label for="sex1">Муж.</label><br/>
        <input id="sex2" type="radio" name="sex" value="woman" /> <label for="sex2">Жен.</label><br/>
        <div class="hr"></div>
        <b>Расса</b><br/>
        <input id="race1" type="radio" name="race" value="elon" checked/> <label for="race1"><span class="upper">Элонцы</span></label><br/>
        <!--<input id="race2" type="radio" name="race" value="raks" /> <span class="upper">Ракшасы</span><br/>
        <input id="race3" type="radio" name="race" value="elf" /> <span class="upper">Эльфы</span><br/>
        <input id="race4" type="radio" name="race" value="drow" /> <span class="upper">Дроурианцы</span><br/>-->
        <input id="race5" type="radio" name="race" value="mans" /> <label for="race5"> <span class="upper">Люди</span></label><br/>
        <!--<input id="race6" type="radio" name="race" value="gnome" /> <span class="upper">Гномы</span><br/>-->
        <div class="hr"></div>
        <b>Класс</b><br/>
        <input id="class1" type="radio" name="class" value="war" checked/> <label for="class1"><span class="upper">Воин</span></label><br/>
        <input id="class2" type="radio" name="class" value="mage"/> <label for="class2"><span class="upper">Маг</span></label><br/>
        <input id="class3" type="radio" name="class" value="assasin"/> <label for="class3"><span class="upper">Убийца</span></label><br/>
        <div class="hr"></div>
        <input class="button button_major" type="submit" value="Создать">
    </form>
    <div class="hr"></div>
    <a class="button button_notice upper" href="{route}CABINET{/route}">назад</a>
EOT;
} else {
    //extract($_POST);
    $title = htmlspecialchars($_POST["title"]);
    $actor = $G->players->findOne(["title" => $title]);
    if (is_null($actor)) {
        if (preg_match('/^[а-яА-ЯёЁa-zA-Z0-9]+$/u', $title)) {
            if (isset($_POST["sex"]) and isset($_POST["race"]) and isset($_POST["class"])) {
                switch ($_POST["class"]){
                    case "war":
                        $stats = [5,3,1,5,1,1];
                        break;
                    case "mag":
                        $stats = [1,3,5,1,5,1];
                        break;
                    case "assasin":
                        $stats = [3,5,1,3,3,1];
                        break;
                    default:
                        $stats = [1,1,1,1,1,1];
                        break;
                }
                $actor = [
                    "title" => $title,
                    "sex" => $_POST["sex"],
                    "race" => $_POST["race"],
                    "class" => $_POST["class"],
                    "level" => 1,
                    "loc"   => "loc.0",
                    "type"  => "user",
                    "stats_base"            => $stats,
                    "stats_base_add"        => [0,0,0,0,0,0],
                    "war_stats"             => [1,1,1,1,1,1,1,1,1,1,1,1],
                    "war_stats_add"         => [0,0,0,0,0,0,0,0,0,0,0,0],
                    "prof_stats"            => [],
                    "prof_stats_add"        => [],

                    "char_params"           => [],
                    "war_params"            => [],
                    "items"                 => [
                        "i_m_money" => [
                            "item" => [
                                "iid" => "i_m_money"
                            ],
                            "count" => 100
                        ]
                    ],
                    "equip"                 => [
                        "head"      => [], //голова
                        "body"      => [
                            "iid"   => "i_a_bnov",
                            "part"  => "body",
                            "params" => [
                                105 => 1
                            ]
                        ], //тело
                        "hand"      => [], //наручи
                        "legs"      => [
                            "iid"   => "i_a_lnov",
                            "part"  => "legs",
                            "params" => [
                                105 => 1
                            ]
                        ], //поножи
                        "boots"     => [
                            "iid"   => "i_a_snov",
                            "part"  => "boots",
                            "params" => [
                                105 => 1
                            ]
                        ], //сапоги
                        "l_ring"    => [], //кольцо1
                        "r_ring"    => [], //кольцо2
                        "belt"      => [], //пояс
                        "amulet"    => [], //амулет
                        "gloves"    => [], //перчатки
                        "l_hand"    => [], //левая рука
                        "r_hand"    => [], //правая рука
                    ]
                ];
                $actor = ActorHelper::calcParams($actor);
                try {
                    $G->players->insert($actor);
                    header("Location: ".Routes::getRoute('CABINET'));
                } catch(MongoException $e){
                    $page = <<<EOL
    <p class="major">
        Ошибка подключения к базе данных, не удалось создать персонажа.
    </p>
    <div class="hr"></div>
    <a class="button button_notice upper" href="{route}CREATE_ACTOR{/route}">назад</a>
EOL;
                }
            } else {
                $page = <<<EOL
    <p class="major">
        Вы не выбрали пол, класс или рассу
    </p>
    <div class="hr"></div>
    <a class="button button_notice upper" href="{route}CREATE_ACTOR{/route}">назад</a>
EOL;
            }
        } else {
            $page = <<<EOL
    <p class="major">
        Неверное имя персонажа, имя должно состоять только из букв и цифр
    </p>
    <div class="hr"></div>
    <a class="button button_notice upper" href="{route}CREATE_ACTOR{/route}">назад</a>
EOL;
        }
    } else {
        $page = <<<EOL
    <p class="major">
        Персонаж с таким именем уже существует, выберите другое имя
    </p>
    <div class="hr"></div>
    <a class="button button_notice upper" href="{route}CREATE_ACTOR{/route}">назад</a>
EOL;
    }
}
display($page, "Создание персонажа");