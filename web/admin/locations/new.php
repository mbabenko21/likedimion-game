<?php
if (!defined('ROOT')) {
    header("Location: /?");
}
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 07.12.2015
 * Time: 12:16
 */
use Likedimion\Helper\View;
require ROOT."/resize_crop.php";
$page = "";
if(!isset($_POST["lid"])) {
    $page .= <<<SCRIPT
<script type="text/javascript">

$(document).ready(function(){
function addDoor(){
     var uniqId = Math.round(new Date().getTime() + (Math.random() * 100));
    \$uDiv = $("<div/>", {
        id: "loc_"+uniqId
    });
    \$inputID = $("<input/>", {
        class: "input",
        type: "text",
        style: "width: 40%",
        name: "loc["+uniqId+"][lid]",
        placeholder: "ID выхода"
    });
    \$inputTITLE = $("<input/>", {
        class: "input",
        type: "text",
        style: "width: 40%",
        name: "loc["+uniqId+"][title]",
        placeholder: "Название выхода"
    });
    \$aDel = $("<a/>", {
        class: "tabs__link button bg-danger",
        click: function(){
            $("#loc_"+uniqId).remove();
        },
        text: "X"
    });
    $("#doors").append(\$uDiv.append(\$inputID));
    $("#doors").append(\$uDiv.append(\$inputTITLE));
    $("#doors").append(\$uDiv.append(\$aDel));
}
    $("#addDoor").click(function(){
           addDoor();
    });
});
    </script>
SCRIPT;
    $page .= <<<ADMIN
    <form id="newLocForm" action="" method="post">
        <p class="strong text-uppercase">
Мир<br/>
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
<span class="small">Для какой карты создается локация</span>
</p>
<select class="input" name="lid[]">
    <option class="text-uppercase strong" value="likedimion" selected>likedimion</option>
</select>
        <input class="input" style="width: 60px;" name="lid[]" type="text" placeholder="X" />
        <input class="input" style="width: 60px;" name="lid[]" type="text" placeholder="Y" />
        <br/>
        <input class="input" name="title" type="text" placeholder="Название локации" /><br/>
        <textarea class="input" rows="2" cols="22" style="height: auto;" name="info" placeholder="Описание локации"></textarea>
        <p class="strong text-uppercase">
Тип территории<br/>
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
<span class="small">На неохраняемоц территории могут происходить бои между игроками</span>
</p>
<select class="input" name="territory">
    <option class="text-uppercase strong" value="guard" selected>охраняемая</option>
    <option class="strong text-uppercase" value="non_guard">неохраняемая</option>
</select>
<br/>
<div id="doors"></div>
<a id="addDoor" class="tabs__link" href="#">новый выход</a>
<div class="hr"></div>
<a id="addDoor" class="tabs__link" href="#" onclick="document.getElementById('newLocForm').submit();">создать</a>
    </form>
ADMIN;
} else {
    $locations = $ld->locations;
    $lid = implode(".",$_POST["lid"]);
    if(is_null($locations->findOne(["lid" => $lid]))) {
        $location = [
            "lid" => $lid,
            "title" => $_POST["title"],
            "info" => $_POST["info"]
        ];
        try{
            $locations->insert($location);
            header("Location: /?admin=locations");
        } catch(MongoException $e){
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
    Данная локация уже есть в базе данных. Вам необходимо просто изменить ее.
</div>
IBASE_PRP_PAGE_BUFFERS;
    }
}

$page .= "<div class='hr'></div>";



View::display($page, "Админ-панель", "default");