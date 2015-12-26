<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 05.12.2015
 * Time: 22:28
 */

namespace Likedimion\Helper;


class View
{
    const CARD_MAIN = "main";
    const CARD_DEFAULT = "default";

    public static function display($page, $title, $displayCard = false)
    {
        if (strtok(getenv("HTTP_USER_AGENT"), "/") == "Mozilla") {
            header("Content-type: text/html; charset=utf-8");
        } //Иначе если Опера или любой мобильный браузер то страница определяется как XHTML приложение (страница)
        else {
            header("Content-type:application/xhtml+xml; charset=utf-8");
        }
        //блок любого возможного кеша страниц в браузер

        Header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); //Дата в прошлом
        Header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
        Header("Pragma: no-cache"); // HTTP/1.1
        Header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
        $headerBlock = <<<EOF
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/underscore-min.js"></script>
    <script src="js/backbone-min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <title>{$title}</title>
</head>
<body><div class="cntr">
EOF;
        /*if($displayCard !== false){
            $headerBlock .= "".self::mainCard($displayCard)."<div class='hr'></div>";
        }*/
        $headerBlock .= <<<HB
<div class="page">
<div id="header"><p class="strong text-uppercase">{$title}</p></div><div class="card">
HB;
        $footBlock = <<<EOFF
        </div></div></div>
        </body></html>
EOFF;
        $page = $headerBlock . $page;
        $page = self::utfBadStrip($page);
        $stmp = preg_replace('/<a(.*)?href="(\.?\/)?\?(.*)">/i', '<a$1href="$2?$3&r=' . self::generateRandomString(rand(2, 9)) . '">', $page);
        //$page = self::compressOutputGzip($page);
        if ($displayCard !== false) {
            $card = self::mainCard($displayCard);
        } else {
            $card = "";
        }
        $card = preg_replace('/<a(.*)?href="(\.?\/)?\?(.*)">/i', '<a$1href="$2?$3&r=' . self::generateRandomString(rand(2, 9)) . '">', $card);
        $stmp = $stmp . $card . "</div>" . self::footerBlock() . $footBlock;
        echo $stmp;
    }

    protected static function utfBadStrip($str)
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

    public static function navPage(
        $count,    // Общее кол-во страниц
        $num_page, // Номер текущей страницы
        $url       // Какой URL для ссылки на страницу (к нему добавляется номер страницы)
    )
    {
        $page = '<ul class="pagination pagination-sm">';
        $page_nav = 3; // сколько страниц выводить одновременно в навигации
        //$page .= "<br/>Стр. ($count):";
        if ($num_page > $count or $num_page < 1) {
            $num_page = 1;
        } // Проверка на корректность номера текущей страницы. Если страница больше чем всего есть страниц или страница меньше 1, что невозможно, то принудительно определим страницу №1 в гостевой
        if ($num_page > 1 && ($num_page - $page_nav) > 1) // Если текущая страница больше 1 и текущая страница больше чем на установленное выше значение $page_nav ушла вперед, то есть например текущая страница №7 оперерирует навигацией по 7-3 = 4 и 7+3 = 10, между 4 и 10й страницей то добавляем ссылку на первую страницу
        {
            $page .= "<li><a href='" . $url . "1'>&laquo;</a></li>"; //вот она
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
                    $page .= '<li class="active"><a href="'.$url.$i.'">'.$i.'</a></li>';
                else $page .= "<li><a href='".$url.$i."'>".$i."</a></li>"; //А на все остальные страницы выводим ссылку
            }
        } // закрываем цикл вывода страниц
        if ($num_page != $count && ($num_page + $page_nav) < $count) // Если текущая страница не = максимально возможной $count и меньше чем на количество страниц определянный ограничителем $page_nav = 3; (то есть не показана в цикле выше), мы добавляем ссылку на последнюю страницу $count
        {
            $page .= "<li><a href='" . $url . $count. "'>&raquo;</a></li>"; //вот она
        }
        $page .= "</ul>";
        return $page;
    } // nav_page()

    public static function generateRandomString($length = "")
    {
        if (empty($length)) {
            $length = mt_rand(10, 12);
        }
        $salt = str_split('aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ0123456789');

        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= $salt[array_rand($salt)];
        }
        return $str;
    }

    // ------------------ Функция шифрования по ключу --------------------//
    public static function encodeString($string, $key)
    {
        $result = "";
        for ($i = 1; $i <= strlen($string); $i++) {
            $char = substr($string, $i - 1, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));
            $result .= $char;
        }
        return self::safeEncode($result);
    }

// ------------------ Функция расшифровки по ключу --------------------//
    public static function decodeString($string, $key)
    {
        $string = self::safeDecode($string);
        $result = "";
        for ($i = 1; $i <= strlen($string); $i++) {
            $char = substr($string, $i - 1, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result .= $char;
        }
        return $result;
    }

    public static function footerBlock()
    {
        $currentTime = DateHelper::microtimeFloat(microtime());
        $tmn = $currentTime - START_TIME;
        $page = <<<EOT
    <div id="footer">
        <p class="strong">&copy; Created by babenoff, 2015</p>
        <p class="text-muted strong">%01.4f сек.</p>
    </div>
EOT;
        return sprintf($page, $tmn);
    }

    public static function compressOutputGzip($output)
    {
        return gzencode($output, 5);
    }

    public static function compressOutputDeflate($output)
    {
        return gzdeflate($output, 5);
    }

    private static function safeEncode($string)
    {
        $data = base64_encode($string);
        $data = str_replace(array('+', '/', '='), array('_', '-', ''), $data);
        return $data;
    }

    private static function safeDecode($string)
    {
        $string = str_replace(array('_', '-'), array('+', '/'), $string);
        $data = base64_decode($string);
        return $data;
    }

    public static function backButton()
    {
        return <<<BB
<div class="hr"></div>
<a class="tabs__link bg-info button" onclick="history.back();">назад</a>
BB;
    }

    public static function toMainButton($anchor = "main page")
    {
        return <<<BB
<div class="hr"></div>
<a class="tabs__link bg-notice button" href="/?">{$anchor}</a>
BB;
    }

    public static function button($href, $anchor, $type = "info")
    {
        return <<<BTN
<a class="tabs__link bg-{$type} button" href="{$href}">{$anchor}</a>
BTN;

    }

    public static function link($href, $anchor)
    {
        return <<<BTN
<a class="tabs__link" href="{$href}">{$anchor}</a>
BTN;
    }

    public static function mainCard($type = "main")
    {
        switch ($type) {
            case "main":
                $card = <<<CARD
                <div class="nav">
<ul class="tabs tabs_mobile list-inline">
    <li class="tabs_item">
        <a class="tabs__link" href="./?game=inv">инвентарь</a>
    </li>
    <li class="tabs_item">
        <a class="tabs__link" href="./?game=actor">персонаж</a>
    </li>
    <li class="tabs_item">
        <a class="tabs__link" href="./?game=msg">сообщения</a>
    </li>
    <li class="tabs_item">
        <a class="tabs__link" href="./?game=map">карта</a>
    </li>
    <li class="tabs_item">
        <a class="tabs__link" href="./?game=logout">выйти</a>
    </li>
</ul>
<form id="speakForm" action="/?game=travel&section=speak" method="POST">
    <textarea rows="2" cols="22" name="speak_msg" placeholder="Сказать в локации..."></textarea>
    <div class="clear"></div>
    <a class="strong" href="#" onclick="document.getElementById('speakForm').submit();">сказать</a>
</form>
</div>
CARD;
                break;
            default:
                $card = <<<CARD
<ul class="tabs tabs_mobile list-inline">
    <li class="tabs_item">
        <a class="tabs__link" href="./?">в игру</a>
    </li>
    <li class="tabs_item">
        <a class="tabs__link" onclick="history.back()">назад</a>
    </li>
</ul>
CARD;
                break;
        }
        return $card;
    }

    /**
     * @param int $number
     * @param array $endingArray  Массив слов или окончаний для чисел (1, 4, 5),
     *          апример array('яблоко', 'яблока', 'яблок')
     * @return string
     */
    public static function getNumEnding($number, $endingArray)
    {
        $number = $number % 100;
        if ($number >= 11 && $number <= 19) {
            $ending=$endingArray[2];
        } else {
            $i = $number % 10;
            switch ($i){
                case (1): $ending = $endingArray[0]; break;
                case (2):
                case (3):
                case (4): $ending = $endingArray[1]; break;
                default: $ending=$endingArray[2]; break;
            }
        }
        return $ending;
    }

    /**
     * @param $n
     * @return bool|string
     */
    public static function numberFormat($n){
        if(!is_numeric($n)) return false;
        if($n>1000000000000) return round(($n/1000000000000),2).' Т';
        else if($n>1000000000) return round(($n/1000000000),2).' М';
        else if($n>1000000) return round(($n/1000000),2).' КК';
        else if($n>1000) return round(($n/1000),2).' К';
    }
}