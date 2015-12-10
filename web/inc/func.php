<?php
if (!defined("ROOT_DIR")) {
    die("Go away!!!");
}

function display($page, $title = "", $SID = NULL)
{
    $style = 'standart';
    //if ($title = "") {$title = "Unnamed title";}
    if (strtok(getenv("HTTP_USER_AGENT"), "/") == "Mozilla") {
        header("Content-type: text/html; charset=utf-8");
    } else {
        header("Content-type:application/xhtml+xml; charset=utf-8");
    }


    Header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    Header("Cache-Control: no-cache, must-revalidate");
    Header("Pragma: no-cache");
    Header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");


    $header_block = '<?xml version="1.0" encoding="utf-8"?>
		<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
		<head>
		<title>' . $title . '</title>
		<link rel="stylesheet" media="all" type="text/css" href="./css/' . $style . '.css" />
		</head>
		<body>' . "<div class='main'><div class='cntr'><h1>" . $title . "</h1><div class='hr'></div>";
    $foot_block = '</div></div></body></html>';
    $rnd = rand(1, 100);
    $t = "";
    for ($i = 0; $i < strlen($page); $i++) {
        if ($page[$i] . $page[$i + 1] . $page[$i + 2] . $page[$i + 3] == "href") {

            for ($k = $i; $k < strlen($page); $k++) {
                if ($page[$k - 1] . $page[$k] . $page[$k + 1] == "/'>") {
                    $t .= "?r$rnd=" . rand(1, 10000) . "'>";
                    $k++;
                    break;
                } elseif ($page[$k] . $page[$k + 1] == "'>") {
                    $t .= "&r$rnd=" . rand(1, 10000) . "'>";
                    $k++;
                    break;
                } else {
                    $t .= $page[$k];
                }
            }
            $i = $k;
        } else {
            $t .= $page[$i];
        }
    }
    $tmp = $header_block . $t . $foot_block;
    $tmp = utf_badstrip($tmp);
    $tmp = preg_replace_callback("/{(route)}(.*){\/(route)}/", 'replaceTAGS', $tmp);
    echo $tmp;

}

function utf_badstrip($str)
{
    $ret = '';
    for ($i = 0; $i < strlen($str);) {
        $tmp = $str{$i++};
        $ch = ord($tmp);
        if ($ch > 0x7F) {
            if ($ch < 0xC0) continue;
            elseif ($ch < 0xE0) $di = 1;
            elseif ($ch < 0xF0) $di = 2;
            elseif ($ch < 0xF8) $di = 3;
            elseif ($ch < 0xFC) $di = 4;
            elseif ($ch < 0xFE) $di = 5;
            else continue;

            for ($j = 0; $j < $di; $j++) {
                $tmp .= $ch = $str{$i + $j};
                $ch = ord($ch);
                if ($ch < 0x80 || $ch > 0xBF) continue 2;
            }
            $i += $di;
        }
        $ret .= $tmp;

    }
    return $ret;
}

function require_dir($dirname)
{
    if (file_exists($dirname)) {
        $files = [];
        if ($handle = opendir($dirname)) {
            while (FALSE !== ($filename = readdir($handle))) {
                if ($filename != "." and $filename != "..") {
                    require_once $dirname . DIRECTORY_SEPARATOR . $filename;
                }
            }
        } else {
            throw new Exception(sprintf("Dir %s not opened", $dirname));
        }
    } else {
        throw new Exception(sprintf("Dir %s not exists", $dirname));
    }
}

function LDErrorHandler($errno, $errstr, $errfile, $errline)
{
    $page = sprintf("Ошибка %d: %s\r\n в файле %s (строка %d)", $errno, $errstr, $errfile, $errline);
    display($page, "Ошибка");
}

function strip($data)
{
    $lit = array("\\t", "\\n", "\\n\\r", "\\r\\n", "  ");
    $sp = array('', '', '', '', '');
    return str_replace($lit, $sp, $data);
}

function nav_page(
    $count,    // Общее кол-во страниц
    $num_page, // Номер текущей страницы
    $url       // Какой URL для ссылки на страницу (к нему добавляется номер страницы)
)
{
    $page = ' ';
    $page_nav = 3; // сколько страниц выводить одновременно в навигации
    $page .= "<br/>Стр. ($count):";
    if ($num_page > $count or $num_page < 1) {
        $num_page = 1;
    } // Проверка на корректность номера текущей страницы. Если страница больше чем всего есть страниц или страница меньше 1, что невозможно, то принудительно определим страницу №1 в гостевой
    if ($num_page > 1 && ($num_page - $page_nav) > 1) // Если текущая страница больше 1 и текущая страница больше чем на установленное выше значение $page_nav ушла вперед, то есть например текущая страница №7 оперерирует навигацией по 7-3 = 4 и 7+3 = 10, между 4 и 10й страницей то добавляем ссылку на первую страницу
    {
        $page .= " <a href='" . $url . "1'>&lt;&lt;</a>"; //вот она
    }
    $start_i = ($num_page - $page_nav); //определяем начальную страницу в цикле вывода, как пример 7-3 = 4
    if ($start_i <= 1) {
        $start_i = 1;
    } //если начальное значение меньше или равно 1 то нам не нужно выводить в цикле несуществующие страницы как 0,-1, -2 ... А потому ограничиваем начальное значение цикла = 1
    $end_i = ($num_page + $page_nav); // Такая же процедура с конечным значением в цикле только как указано в нашем примере будет 7+3 = 10
    if ($end_i >= $count) {
        $start_i = ($num_page - $page_nav);
        $end_i = $count;
    } //И такое же ограничение конечного значения в цикле, где ограничитель определяется общим количеством страниц $count. И если конечное значение в цикле больше или равно этому значению, то ограничиваем его максимально возможным количеством страниц
    for ($i = $start_i; $i <= $end_i; $i++) //Определив начальное и конечное значения цикла выводим сам цикл
    {
        if ($i > 0) {
            if ($i == $num_page) //если страница в цикле = текущей то нам не нужно на нее указывать ссылку, а просто выводим текстом
                $page .= " <b>$i</b>";
            else $page .= " <a href='$url$i'>$i</a>"; //А на все остальные страницы выводим ссылку
        }
    } // закрываем цикл вывода страниц
    if ($num_page != $count && ($num_page + $page_nav) < $count) // Если текущая страница не = максимально возможной $count и меньше чем на количество страниц определянный ограничителем $page_nav = 3; (то есть не показана в цикле выше), мы добавляем ссылку на последнюю страницу $count
    {
        $page .= " <a href='" . $url . "$count'>&gt;&gt;</a>"; //вот она
    }
    $page .= "<br/>";
    return $page;
}

/**
 * @param array $text
 */
function replaceTAGS($text)
{

    return Routes::getRoute($text[2]);
}

function safe_encode($string)
{
    $data = base64_encode($string);
    $data = str_replace(array('+', '/', '='), array('_', '-', ''), $data);
    return $data;
}

function safe_decode($string)
{
    $string = str_replace(array('_', '-'), array('+', '/'), $string);
    $data = base64_decode($string);
    return $data;
}

function xoft_encode($string, $key)
{
    $result = "";
    for ($i = 1; $i <= strlen($string); $i++) {
        $char = substr($string, $i - 1, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) + ord($keychar));
        $result .= $char;
    }
    return safe_encode($result);
}

function xoft_decode($string, $key)
{
    $string = safe_decode($string);
    $result = "";
    for ($i = 1; $i <= strlen($string); $i++) {
        $char = substr($string, $i - 1, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) - ord($keychar));
        $result .= $char;
    }
    return $result;
}

function generate_password($length = "")
{
    if (empty($length)) {
        $length = mt_rand(10, 12);
    }
    $salt = str_split('aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ0123456789');

    $makepass = "";
    for ($i = 0; $i < $length; $i++) {
        $makepass .= $salt[array_rand($salt)];
    }
    return $makepass;
}

//заменяет данные на слова
function msg($string, $lang = "ru")
{
    global $msgData;
    return (isset($msgData[$lang][$string])) ? $msgData[$lang][$string] : $string;
}

/**
 * @param array $actor
 * @param string $newLoc
 * @param MongoCollection $game
 */
function moveActor($actor, $newLoc, $game, $locations)
{
    if ($newLoc != $actor["loc"] and array_key_exists($newLoc, $locations)) {
        $oldLoc = $actor["loc"];
        $actor["loc"] = $newLoc;
    }
}

function createLocation()
{
    return [
        "players" => [],
        "dialogs" => [],
        "objects" => [],
        "animals" => [],
        "monsters" => []
    ];
}

function write_files($filename, $text, $clear = 0, $chmod = "") {
    $fp = fopen($filename, "a+");
    flock ($fp, LOCK_EX);
    if ($clear == 1) {
        ftruncate($fp, 0);
    }
    fputs ($fp, $text);
    fflush($fp);
    flock ($fp, LOCK_UN);
    fclose($fp);
    if ($chmod != "") {
        @chmod($filename, $chmod);
    }
}

function clear_files($files) {
    if (file_exists($files)) {
        $file = file($files);
        $fp = fopen($files, "a+");
        flock ($fp, LOCK_EX);
        ftruncate ($fp, 0);
        fflush($fp);
        flock ($fp, LOCK_UN);
        fclose($fp);
    }
}

