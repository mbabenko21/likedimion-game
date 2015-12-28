<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 28.12.2015
 * Time: 17:50
 */

$dId = $_GET["dId"];

if (\Likedimion\Dialog\Dialog::exists($dId)) {
    $dialog = new \Likedimion\Dialog\Dialog($dId);
    $sectionId = (isset($_GET["sId"])) ? $_GET["sId"] : "start";
    $playerHelper->getPlayer()["event"]["sId"] = $sectionId;
    $playerHelper->update();
    try {
        $section = $dialog->getSection($sectionId);
        $title = $section->getOption("title", "Диалог");
        $text = $section->getReply()->getText();
        $page = "<div class='alert alert-info'>" . $text . "</div>";

        $answers = $section->getAnswersIterator();
        $page .= "<div class='list-group'>";
        if($answers->count() < 1){
            $playerHelper->setEvent([]);
            $playerHelper->update();
            $page .= "<div class='list-group-item little_block_center strong'><a href='/?'>конец </a></div>";
        }
        while ($answers->valid()) {
            /** @var \Likedimion\Dialog\DialogAnswer $answer */
            $answer = $answers->current();
            $page .= "<div class='list-group-item little_block_center strong'><a href='/?game=roller&dId=" . $_GET["dId"] . "&sId=" . $answer->getSectionId() . "'>" . $answer->getReply()->getText() . "</a></div>";
            $answers->next();
        }
        $page .= "</div>";
        \Likedimion\Helper\View::display($page, $title);
    } catch (Exception $e) {
        $page = "<div class='alert alert-dismissable'>{$e->getMessage()}</div>";
        \Likedimion\Helper\View::display($page, "Ошибка", \Likedimion\Helper\View::CARD_DEFAULT);
    }
} else {
    $page = "<div class='alert alert-dismissable'>Ошибка в загрузке диалога, обратитесь к администрации</div>";
    \Likedimion\Helper\View::display($page, "Ошибка");
}