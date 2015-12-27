<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 18.12.2015
 * Time: 12:34
 */
if (!isset($_POST["news"]["content"])) {
    $page = <<<EOT
    <form id="addNewsForm" action="/?admin=add_news" method="post">
        <input class="input" type="text" name="news[title]" placeholder="Название" />
        <div class="hr"></div>
        <textarea class="input" rows="2" cols="22" style="width: 98%; height: auto;" name="news[content]" placeholder="Текст новости"></textarea>
        <div class="hr"></div>
        <a id="addDoor" class="tabs__link" href="#" onclick="document.getElementById('addNewsForm').submit();">добавить</a>
    </form>
EOT;

} else {
    $news = [
        "create" => new MongoDate(),
        "title" =>  $_POST["news"]["title"],
        "content" => $_POST["news"]["content"],
        "author" => $playerHelper->getPlayer()["title"]
    ];
    try {
        $ld->news->insert($news);
        $page = "<div class='alert alert-success'>Новость добавлена</div>";
    } catch (MongoException $e) {
        $page = "<div class='alert alert-danger'>Не удалось добавить новость, ошибка " . $e->getMessage() . "</div>";
    }
}

\Likedimion\Helper\View::display($page, "Добавление новости", \Likedimion\Helper\View::CARD_DEFAULT);