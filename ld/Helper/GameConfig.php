<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 24.12.2015
 * Time: 17:52
 */

namespace Likedimion\Helper;


class GameConfig
{
    protected $config = [];

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param $id
     * @param $value
     * @return $this
     */
    public function addConfig($id, $value){
        $this->config[$id] = $value;
        return $this;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function getValue($id){
        return ($this->config[$id]) ? $this->config[$id] : false;
    }

    /**
     * @return array
     */
    public function export()
    {
        return $this->config;
    }
}