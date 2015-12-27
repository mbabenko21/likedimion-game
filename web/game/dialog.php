<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 28.12.2015
 * Time: 0:11
 */
$loc = $ld->locations->findOne(["lid" => $playerHelper->getPlayer()["loc"]]);
$locHelper = new \Likedimion\Helper\LocationHelper($loc);
if ($locHelper->objectExists($_GET["dId"])) {
    $dId = preg_split("/[_\.]/", $_GET["dId"]);
    if (\Likedimion\Dialog\Dialog::exists($dId[1])) {
        $dialog = new \Likedimion\Dialog\Dialog($dId[1]);
        $sectionId = ($_GET["sId"]) ? $_GET["sId"] : "init";
        try {
            $section = $dialog->getSection($sectionId);
            $title = $dialog->getOption("title", "Диалог");
            $text = $section->getReply()->getText();
            $page = "<div class='alert alert-info'>".$text."</div>";

            $answers = $section->getAnswersIterator();
            $page .= "<div class='list-group'>";
            if($answers->count() < 1){
                $page .= "<div class='list-group-item little_block_center strong'><a href='/?'>конец диалога</a></div>";
            } else {
                while($answers->valid()){
                    /** @var \Likedimion\Dialog\DialogAnswer $answer */
                    $answer = $answers->current();
                    $page .= "<div class='list-group-item little_block_center strong'><a href='/?game=dialog&dId=".$_GET["dId"]."&sId=".$answer->getSectionId()."'>".$answer->getReply()->getText()."</a></div>";
                    $answers->next();
                }
            }
            $page .= "</div>";
            \Likedimion\Helper\View::display($page, $title);
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