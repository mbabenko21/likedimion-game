<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 25.12.2015
 * Time: 21:27
 */
if ($_POST["speak_msg"]) {
    $_POST["speak_msg"] = strip_tags($_POST["speak_msg"]);
    $_POST["speak_msg"] = \Likedimion\Censure\Censure::parse($_POST["speak_msg"], 3, "\xe2\x80\xa6", true, "[бип]");
    $loc = $ld->locations->findOne(["lid" => $player["loc"]]);
    if ($loc) {
        $locHelper = new \Likedimion\Helper\LocationHelper($loc);
        $locHelper->setCollection($ld->locations);
        if ($_GET["to"]) {
            $toPlayer = $playerHelper->getCollection()->findOne(["_id" => new MongoId($_GET["to"])]);
            if ($toPlayer) {
                //$msg = $player["title"] . " говорит <b>" . $toPlayer["title"] . "</b> ";
                $toPlayerHelper = new \Likedimion\Helper\PlayerHelper($toPlayer);
                $toPlayerHelper->setCollection($ld->players);
                if ($_POST["private"]) {
                    $msgTo = "<b>[П!]</b><span class='text-underline'>" . $player["title"] . "</span> шепчет <b>вам</b>: " . $_POST["speak_msg"];
                    $msgFrom = "Вы шепчете <span style='text-decoration: underline;'>" . $toPlayer["title"] . "</span> " . $_POST["speak_msg"];
                    $msgAll = "<span class='text-underline'>". $player["title"] . "</span> что-то шепчет <span class='text-underline'>". $toPlayer["title"] . "</span>";
                    $playerHelper->addJournal($msgFrom);
                    $toPlayerHelper->addJournal($msgTo);
                    $toPlayerHelper->update();
                    $locHelper->addJournal($msgAll, $ld->players, $player["_id"], $toPlayer["_id"]);
                    $locHelper->update();
                } else {
                    $msgTo = "<span class='text-underline'>". $player["title"] . "</span> говорит <b>вам</b>: " . $_POST["speak_msg"];
                    $msgFrom = "Вы говорите <span style='text-decoration: underline;'>" . $toPlayer["title"] . "</span> " . $_POST["speak_msg"];
                    $msgAll = $player["title"] . " говорит " . $toPlayer["title"] . ": " . $_POST["speak_msg"];
                    $playerHelper->addJournal($msgFrom)->update();
                    $toPlayerHelper->addJournal($msgTo)->update();
                    $locHelper->addJournal($msgAll, $ld->players, $player["_id"], $toPlayer["_id"])->update();
                }
            } else {
                $playerHelper->addJournal('Некому говорить.')->update();
            }
        } else {
            $msgAll = "<span class='text-underline'>". $player["title"] . "</span> говорит: " . $_POST["speak_msg"];
            $msgPlayer = "Вы говорите: " . $_POST["speak_msg"];
            $locHelper->addJournal($msgAll, $ld->players, $player["_id"])->update();
            $playerHelper->addJournal($msgPlayer)->update();
        }
    } else {
        $playerHelper->addJournal('Ошибка загрузки локации.')->update();
    }
} else {
    $playerHelper->addJournal('Нечего говорить.')->update();
}