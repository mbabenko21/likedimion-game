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
     * @var \MongoCollection
     */
    protected $_players;
    /**
     * @var \MongoId
     */
    protected $_player1;

    /**
     * @var \MongoId
     */
    protected $player2;
    /**
     * @var string
     */
    protected $_locId;


    public function __construct($msg)
    {
        $this->_msg = $msg;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'journal';
    }

    /**
     * @return string
     */
    public function getMsg()
    {
        return $this->_msg;
    }

    /**
     * @param \MongoCollection $players
     * @return JournalEvent
     */
    public function setPlayers($players)
    {
        $this->_players = $players;
        return $this;
    }

    /**
     * @param \MongoId $noPlayer1
     * @return JournalEvent
     */
    public function setPlayer1($noPlayer1)
    {
        $this->_player1 = $noPlayer1;
        return $this;
    }

    /**
     * @param \MongoId $noPlayer2
     * @return JournalEvent
     */
    public function setPlayer2($noPlayer2)
    {
        $this->player2 = $noPlayer2;
        return $this;
    }

    /**
     * @return \MongoCollection
     */
    public function getPlayers()
    {
        return $this->_players;
    }

    /**
     * @return \MongoId
     */
    public function getPlayer1()
    {
        return $this->_player1;
    }

    /**
     * @return \MongoId
     */
    public function getPlayer2()
    {
        return $this->player2;
    }

    /**
     * @param string $locId
     * @return JournalEvent
     */
    public function setLocId($locId)
    {
        $this->_locId = $locId;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocId()
    {
        return $this->_locId;
    }


}