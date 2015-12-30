<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 29.12.2015
 * Time: 2:45
 */

namespace Likedimion\Wagon;


class AbstractWagon
{
    protected $wData = [];

    public function __construct(array $wData)
    {
        $this->wData = $wData;
    }
}