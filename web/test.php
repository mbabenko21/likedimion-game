<?php
/**
 * Простая функция для реализации поведения из PHP 5
 */
function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

$time_start = microtime_float();

// Спим некоторое время
usleep(500);

$time_end = microtime_float();
$time = $time_end - $time_start;
$tm = round($time, 3);
echo "Ничего не делал $tm секунд\n";
?>