<?php
namespace Likedimion\Events;
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 10.12.2015
 * Time: 14:01
 */
class JournalEvent extends \Likedimion\Event
{
    const   JOURNAL_ALL = 'all',
            JOURNAL_ME = 'me';
    /**
     * @var string
     */
    protected $_msg;
    /**
     * @var string
     */
    protected $_journalType;
    /**
     * @var array
     */
    protected $_expulsions;

    public function __construct($msg, $journalType, $expulsions = [])
    {
        $this->_msg = $msg;
        $this->_journalType = $journalType;
        $this->_expulsions = $expulsions;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return self::ADD_EXP;
    }

    /**
     * @return string
     */
    public function getMsg()
    {
        return $this->_msg;
    }

    /**
     * @return string
     */
    public function getJournalType()
    {
        return $this->_journalType;
    }

    /**
     * @return array
     */
    public function getExpulsions()
    {
        return $this->_expulsions;
    }
}