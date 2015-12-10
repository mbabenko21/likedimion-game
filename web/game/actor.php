<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 09.12.2015
 * Time: 23:56
 */
if (!defined('ROOT')) {
    header("Location: /?");
}

$act = (isset($_GET["act"])) ? $_GET["act"] : "magic";

$header = [
    "params" => "параметры",
    "magic" => "магия",
    "skills" => "навыки"
];

$page = "<ul class=\"tabs tabs_mobile\">";
$active = "";
foreach($header as $link => $anchor){
    if($act == $link){
        $active = "tabs__link_active";
    }
    $page.=<<<EOF
    <li class="tabs_item inlb">
        <a class="tabs__link $active" href="/?game=actor&act={$link}">{$anchor}</a>
    </li>
EOF;
    $active = "";
}
$page.="</ul><div class='hr'></div>";


switch($act){
    case "magic":
        require ROOT."/game/actor/magic.php";
        break;
    case "params":
        require ROOT."/game/actor/params.php";
        break;
    default:
        require ROOT."/404.php";
        return;
        break;
}

\Likedimion\Helper\View::display($page, $title, \Likedimion\Helper\View::CARD_DEFAULT);