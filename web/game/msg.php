<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 24.12.2015
 * Time: 17:22
 */
$title = "Сообщения";
$action = (!empty($_GET["action"])) ? $_GET["action"] : "main";
$page = <<<MSG_PAGE
        <ul class="tabs tabs_mobile list-inline">
        <li class="tabs_item">
                <a class="tabs__link" href="./?game=msg&action=main">сообщения</a>
            </li>
            <li class="tabs_item">
                <a class="tabs__link" href="./?game=msg&action=contacts">контакты</a>
            </li>
        </ul>
MSG_PAGE;
switch ($action) {
    case "main":
        $playerHelper->markAllMsgIsRead();
        $msgs = $playerHelper->getMsg();
        $friendsList = $playerHelper->getFriendList();
        $itemsPerPage = ($playerHelper->getGameConfig()->getValue('items_per_page') !== false) ? $playerHelper->getGameConfig()->getValue('items_per_page') : $config["items_per_page"];
        if (count($msgs) > 0) {
            $numPage = (!empty($_GET["page"])) ? $_GET["page"] : 1;
            $countMsg = count($msgs);
            $countPages = floor($countMsg / $itemsPerPage);
            $page .= "<div class='list-group'>";
            $k = 1;
            $iteration = $numPage * $itemsPerPage;
            $mmm = array_chunk($msgs, $itemsPerPage);
            while (list($id, $msg) = each($mmm[$numPage - 1])) {
                $addClass = ($msg["is_read"] === false) ? "list-group-item-warning" : "";
                $page .= "<div class='list-group-item " . $addClass . "'>
                    <h4 class='list-group-item-heading'>" . $msg["title"] . "</h4>
                    <p class='list-group-item-text'>" . $msg["msg"] . "</p>
                    <p class='list-group-item-text'>
                        <a href='/?game=msg&action=remove&mid=" . $id . "'>удалить</a>
                    </p>
                    </div>";
            }
            $page .= "</div>";
            $page .= \Likedimion\Helper\View::navPage($countPages, $numPage, '/?game=msg&page=');
            $page .= <<<EOL
<ul class="tabs tabs_mobile list-inline">
            <li class="tabs_item">
                <a class="tabs__link" href="./?game=msg&action=clear">очистить</a>
            </li>
</ul>
EOL;

        } else {
            $page .= "<p>У вас нет сообщений</p>";
        }

        break;
    case "clear":
        $playerHelper->clearMsg();
        $page .= "<div class='alert alert-info'>Все сообщения удалены</div>";
        break;
    case "remove":
        if (isset($_GET["mid"])) {
            $playerHelper->removeMsg($_GET["mid"]);
            $page .= "<div class='alert alert-info'>Сообщение удалено.</div>";
        } else {
            $page .= "<div class='alert alert-info'>Не указан идентификатор сообщения.</div>";
        }
        break;
    case "readAll":
        $playerHelper->markAllMsgIsRead();
        $page .= "<div class='alert alert-info'>Все сообщения отмечены как прочитанные</div>";
        break;
    case "write":
        if (!empty($_GET["fid"])) {
            $friend = $ld->players->findOne(["_id" => new MongoId($_GET["fid"])], ["_id", "title", "msg", "friends"]);
            $friendHelper = new \Likedimion\Helper\PlayerHelper($friend);
            if ($playerHelper->isFriend($friend) and $friendHelper->isFriend($playerHelper->getPlayer())) {
                if (empty($_POST)) {
                    $page .= <<< WRITE_MSG_PAGE
                <form id="newMsgForm" action="/?game=msg&action=write&fid={$_GET["fid"]}" method="POST">
                    <textarea  rows="3" cols="30" name="msg" placeholder="Сообщение для {$friend["title"]}"></textarea>
                    <div class="hr"></div>
                    <a class="tabs__link" href="#" onclick="document.getElementById('newMsgForm').submit();">написать</a>
                </form>
WRITE_MSG_PAGE;

                } else {
                    $friendHelper->addMsg($playerHelper->getPlayer(), $_POST["msg"]);
                    if ($ld->players->update(
                        ["_id" => $friend["_id"]],
                        ['$set' => ["msg" => $friendHelper->getMsg()]],
                        ["upsert" => true]
                    )
                    ) {
                        $page .= "<div class='alert alert-info'>Сообщение для " . $friend["title"] . " отправлено.</div>";
                    } else {
                        $page .= "<div class='alert alert-info'>Сообщение для " . $friend["title"] . " не отправлено ошибка подключения к базе данных.</div>";
                    }
                }
            } else {
                $page .= "<div class='alert alert-info'>Вы и " . $friend["title"] . " не друзья.</div>";
            }
        } else {
            $page .= "<div class='alert alert-info'>Не указан адрессат.</div>";
        }
        break;
    case "contacts":
        $title .= "->Контакты";
        $friendsList = $playerHelper->getFriendList();
        $itemsPerPage = ($playerHelper->getGameConfig()->getValue('items_per_page') !== false) ? $playerHelper->getGameConfig()->getValue('items_per_page') : $config["items_per_page"];
        if (count($friendsList) > 0) {
            $numPage = (!empty($_GET["page"])) ? $_GET["page"] : 1;
            $countFrnd = count($friendsList);
            $countPages = floor($countFrnd / $itemsPerPage);
            $page .= "<div class='list-group'>";
            $k = 1;
            $iteration = $numPage * $itemsPerPage;
            $mmm = array_chunk($friendsList, $itemsPerPage);
            while (list($id, $fid) = each($mmm[$numPage - 1])) {
                //$addClass = ($msg["is_read"] === false) ? "list-group-item-warning" : "";
                $myFriend = $ld->players->findOne(["_id" => $fid], ["title"]);
                if ($myFriend) {
                    $page .= "<div class='list-group-item'><a href='/?game=msg&action=write&fid=" . $fid . "'>" . $myFriend["title"] . "</a> | <a class='text-uppercase' href='/?game=msg&action=removeFriend&fid=" . $fid . "'>удалить</a></div>";
                }
            }
            $page .= "</div>";
            $page .= \Likedimion\Helper\View::navPage($countPages, $numPage, '/?game=msg&page=');
        } else {
            $page .= "<p>Список контактов пуст</p>";
        }
        break;
    case "add":
        if($_GET["pid"]) {
            $friend = $ld->players->findOne(["_id" => new MongoId($_GET["pid"])]);
            if($friend) {
                if (!$playerHelper->isFriend($friend)) {
                    $playerHelper->addFriend($friend);
                    $playerHelper->update();
                    $page = "<div class='alert alert-info'>Вы добавили " . $friend["title"] . " в список своих контактов.</div>";
                } else {
                    $page = "<div class='alert alert-info'>" . $friend["title"] . " уже есть в списве ваших контактов.</div>";
                }
            } else {
                $page = "<div class='alert alert-info'>Такого игрока не существует.</div>";
            }
        } else {
            $page = "<div class='alert alert-info'>Нет такого игрока.</div>";
        }
        break;
    default:
        $page = "<div class='alert alert-info'>Нет такого раздела.</div>";
        break;
}

\Likedimion\Helper\View::display($page, $title, \Likedimion\Helper\View::CARD_DEFAULT);