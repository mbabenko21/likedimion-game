<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 24.12.2015
 * Time: 16:09
 */

namespace Likedimion\Helper;


class AbstractListHelper
{
    protected $data;

    public static function articleNum($massive, $in, $get)
    {
        // Основной блок, содержащий дополнительные блоки (по сути двумерный массив)
        $mainBlock = array();

        $massi = array_chunk($massive, $in);
        $inBlock = 0;

        // Смещаю отсчет массива с 0 на ед-цу
        for ($k = 0; $k < count($massi); $k++)
        {
            $y[$k+1] = $massi[$k];
        }

        // Цикл по внешнему массиву (по количеству внеутренних массивов)
        for ($j = 1; $j <= count($y); $j++)
        {
            $inBlock = count($y[$j]);

            // Создаем разделитель-блоков (т.е., начиная с которого, отсчитывается очередной внутренний блок (= массив))
            $from = $inBlock * ($get - 1);

            // Цикл по внутреннему массиву (по количеству элементов внеутренних массивов)
            for ($i = $from; $i < $from + $inBlock; $i++)
            {
                // !!! Добавление собачки @ - вынужденная мера! Без нее выскакивает замечание (Notice) (при включенном error_reporting(E_ALL);),
                // --   Notice: Undefined offset: 54 in Z:\home\site\www\libs\pages.php on line 61
                // из-за того, что $inBlock может меняться в течении выполнения ф-ии
                @$mainBlock[$j][] = $massive[$i];
            }

        }

        // Возвращаем основной Блок
        return $mainBlock;
    }
}