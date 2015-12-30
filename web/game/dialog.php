<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 28.12.2015
 * Time: 0:11
 */
$locHelper = \Likedimion\Game::init()->getService("loc.helper");
if ($locHelper->objectExists($_GET["dId"])) {
    if($playerHelper->getStatus() != \Likedimion\Helper\PlayerHelper::STATUS_GHOST) {
        $nId = $_GET["dId"];
        $obj = $locHelper->getObject($nId);
        if($locHelper->objectExists($nId)) {
            $dId = preg_split("/[_\.]/", $_GET["dId"]);
            if (\Likedimion\Dialog\Dialog::exists($dId[1])) {
                $dialog = new \Likedimion\Dialog\Dialog($dId[1]);
                $sectionId = ($_GET["sId"]) ? $_GET["sId"] : "init";
                try {
                    $section = $dialog->getSection($sectionId);
                    $title = $dialog->getOption("title", "Диалог");
                    $text = $section->getReply()->getText();
                    $page = "<div class='alert alert-info'>" . $text . "</div>";

                    $answers = $section->getAnswersIterator();
                    $page .= "<div class='list-group'>";
                    if($obj["prof"] == \Likedimion\Helper\NpcHelper::PROF_BANKIR){
                        $page .= "<div class='list-group-item little_block_center strong'><a href='?game=bank&section=to'>Я хочу сдать вещи на хранение</a></div>";
                        $page .= "<div class='list-group-item little_block_center strong'><a href='?game=bank&section=from'>Я хочу забрать вещи</a></div>";
                    }
                    if($obj["prof"] == \Likedimion\Helper\NpcHelper::PROF_TRADER){
                        $page .= "<div class='list-group-item little_block_center strong'><a href='?game=trade&trader=".$nId."&section=buy'>Покажи свои товары</a></div>";
                        $page .= "<div class='list-group-item little_block_center strong'><a href='?game=trade&trader=".$nId."&section=sell'>Я хочу кое-что продать</a></div>";
                    }
                    while ($answers->valid()) {
                        /** @var \Likedimion\Dialog\DialogAnswer $answer */
                        $answer = $answers->current();
                        $page .= "<div class='list-group-item little_block_center strong'><a href='/?game=dialog&dId=" . $_GET["dId"] . "&sId=" . $answer->getSectionId() . "'>" . $answer->getReply()->getText() . "</a></div>";
                        $answers->next();
                    }
                    $page .= "<div class='list-group-item little_block_center hr'></div>";
                    $page .= "<div class='list-group-item little_block_center strong'><a href='/?'>конец диалога</a></div>";
                    $page .= "</div>";
                    \Likedimion\Helper\View::display($page, $title, false);
                } catch (Exception $e) {
                    $page = "<div class='alert alert-dismissable'>{$e->getMessage()}</div>";
                    \Likedimion\Helper\View::display($page, "Ошибка", \Likedimion\Helper\View::CARD_DEFAULT);
                }
            } else {
                $playerHelper->addJournal("Не с кем говорить");
                header("Location: /?");
            }
        } else {
            $playerHelper->addJournal("Не с кем говорить");
            header("Location: /?");
        }
    } else {
        $playerHelper->addJournal("Вы призрак, поэтому не можете говорить с людьми.");
        header("Location: /?");
    }
} else {
    $playerHelper->addJournal("Не с кем говорить");
    header("Location: /?");
}