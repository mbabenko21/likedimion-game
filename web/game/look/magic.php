<?php
if (!defined('ROOT')) {
    header("Location: /?");
}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 09.12.2015
 * Time: 19:14
 */


if ($_GET["m"]) {
    $id = preg_split("/[\._]/u", $_GET["m"]);
    if (isset($magic[$id[0]][$id[1]])) {
        if (!isset($player["magic"][$_GET["m"]])) {
            $m = $player["magic"][$_GET["m"]];
        } else {
            $m = $magic[$id[0]][$id[1]];
        }
        if (isset($player["magic"][$id[0] . "_" . $id[1]])) {
            $level = $player["magic"][$id[0] . "_" . $id[1]]["level"];
        } else {
            $level = 0;
        }
        $page = "<div class='alert alert-danger upper strong'>" . $m["title"] . ", уровень " . $level . "</div>";
        $page .= "<span class='text-muted strong'>" . $m["info"] . "</span><div class='hr'></div>";
        if ($m["effect"]) {
            $currEff = preg_replace_callback('/\[(.*)\]/', function ($matches) use ($level) {
                $effectsBase = explode(",", $matches[1]);
                return isset($effectsBase[$level - 1]) ? $effectsBase[$level - 1] : 0;
            }, $m["effect"]);
            $nextEff = preg_replace_callback('/\[(.*)\]/', function ($matches) use ($level) {
                $effectsBase = explode(",", $matches[1]);
                return isset($effectsBase[$level]) ? $effectsBase[$level] : $effectsBase[count($effectsBase) - 1];
            }, $m["effect"]);
            $page .= "Текущий уровень <span class='strong'>" . strtolower($currEff) . "</span> <br/>";
            if ($level < $config["magic"]["max_level"]) {
                $page .= "Следующий уровень <span class='strong'>" . strtolower($nextEff) . "</span><br/>";
            }
        }
        $page .= "<span class='glyphicon glyphicon-fire'></span> <span class='strong upper'>Требует маны</span><br/>";
        $manaCostMin = (isset($m["cost"][$level - 1])) ? $m["cost"][$level - 1] : $m["cost"][0];
        $manaCostMax = (isset($m["cost"][$level])) ? $m["cost"][$level] : $m["cost"][count($m["cost"]) - 1];
        $page .= "Текущий уровень <span class='strong'>" . $manaCostMin . "</span> <br/>";
        if ($level < $config["magic"]["max_level"]) {
            $page .= "Следующий уровень <span class='strong'>" . $manaCostMax . "</span><br/>";
        }
        $page .= "<span class='glyphicon glyphicon-hourglass'></span> <span class='strong upper'>Перезарядка</span><br/>";
        $minCD = (isset($m["cooldown"][$level - 1])) ? $m["cooldown"][$level - 1] : $m["cooldown"][0];
        $maxCD = (isset($m["cooldown"][$level])) ? $m["cooldown"][$level] : $m["cooldown"][count($m["cooldown"]) - 1];
        $page .= "Текущий уровень <span class='strong'>" . $maxCD . " сек.</span> <br/>";
        if ($level < $config["magic"]["max_level"]) {
            $page .= "Следующий уровень <span class='strong'>" . $maxCD . " сек.</span><br/>";
        }
        //
        $page .= "<div class='hr'></div><span class='strong text-uppercase'>Требования</span>";
        $needs = $m["need"];
        if ($needs["spl"]) {
            $page .= "<span class='strong text-muted'>" . $lang["spl"][$needs["spl"]] . "</span>";
        } else {
            $page .= "<span class='strong text-muted'>" . $lang["class"][$needs["class"]] . "</span>";
        }
        if ($needs["level"] and $level < $config["magic"]["max_level"]) {
            $page .= "<span class='strong text-muted text-uppercase'>, " . $needs["level"][$level] . " уровень</span><br/>";
        }
        if ($needs["war_skills"]) {
            $stmp = "";
            for ($i = 0; $i < count($needs["war_skills"]); $i += 2) {
                if ($stmp == "") {
                    $stmp .= "<span class='strong text-muted'>" . $lang["war_skills"][$needs["war_skills"][$i]] . " " . $needs["war_skills"][$i + 1] . "</span>";
                } else {
                    $stmp .= ", <span class='strong text-muted'>" . $lang["war_skills"][$needs["war_skills"][$i]] . " " . $needs["war_skills"][$i + 1] . "</span>";
                }
            }
            $page .= $stmp;
            unset($stmp);
        }

        if ($needs["magic"] and $level < $config["magic"]["max_level"]) {
            $page .= "<br/>";
            $stmp = "";
            $i = 0;
            while ($i < count($needs["magic"][$level])) {
                if ($mid = $needs["magic"][$level][$i]){
                    $mid = explode(".", $mid);
                    if (isset($m[$mid[0]][$mid[1]])) {
                        if ($stmp == "") {
                            $stmp .= "<span class='text-muted strong'>" . $m[$mid[0]][$mid[1]]["title"] . " " . $needs["magic"][$level][$i + 1] . "ур</span>";
                        } else {
                            $stmp .= ", <span class='text-muted strong'>" . $m[$mid[0]][$mid[1]]["title"] . " " . $needs["magic"][$level][$i + 1] . "ур</span>";
                        }
                    }
                    $i += 2;
                }
            }
            $page .= mb_strtolower($stmp);
            unset($stmp);
        }

        if($needs["any"]){
            $page.="<br/><span class='glyphicon glyphicon-asterisk'></span>";
            $stmp = "";
            for($i = 0; $i < count($needs["any"]); $i++){
                if($stmp == ""){
                    $stmp .= "<span class='text-danger'>".$needs["any"][$i]."</span>";
                } else {
                    $stmp .= ", <span class='text-danger'>".$needs["any"][$i]."</span>";
                }
            }
            $page .= $stmp;
        }
        //
        if ($level < $config["magic"]["max_level"]) {
            $costMoney = (isset($m["cash"][$level])) ? $m["cash"][$level] : $m["cash"][count($m["cash"]) - 1];
            $page .= "<div class='hr'></div><div class='alert alert-warning text-muted strong upper small'>стоимость изучения до уровня " . ($level + 1) . " составит " . $costMoney . " серебра</div>";
        }
    } else {
        $page = "<div class=\"alert alert-danger\">Нет такого приема\\заклинания</div>";
    }
} else {
    $page = "<div class=\"alert alert-danger\">Нет такого приема\\заклинания</div>";
}