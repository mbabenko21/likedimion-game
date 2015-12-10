<?php

namespace Likedimion\Plugin;

use Likedimion\AbstractPlugin as AbstractPlugin;

/**
 * summary
 */
class MongoDB extends AbstractPlugin
{
    protected $db;

    /**
     * summary
     */
    public function __construct($addr, $database)
    {
        $this->setData("addr", $addr)
            ->setData("db", $database);
    }

    public function run()
    {
        $db = new \MongoClient($this->getData('addr'));
        $database = $this->getData('db');
        $this->db = $db->$database;
    }

    /**
     * @return \MongoCollection
     */
    public function getDB()
    {
        return $this->db;
    }
}