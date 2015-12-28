<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 28.12.2015
 * Time: 22:39
 */

namespace Likedimion\Events;


use Likedimion\Event;
use Likedimion\Helper\PlayerHelper;
use Likedimion\Quest\QuestHelper;

class QuestEvent extends Event
{
    /**
     * @var PlayerHelper
     */
    protected $playerHelper;
    /**
     * @var QuestHelper
     */
    protected $questHelper;
    /**
     * @var string
     */
    protected $questId;
    /**
     * @var string
     */
    protected $state;

    /**
     * @return PlayerHelper
     */
    public function getPlayerHelper()
    {
        return $this->playerHelper;
    }

    /**
     * @param PlayerHelper $playerHelper
     */
    public function setPlayerHelper($playerHelper)
    {
        $this->playerHelper = $playerHelper;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'quest';
    }

    /**
     * @return QuestHelper
     */
    public function getQuestHelper()
    {
        return $this->questHelper;
    }

    /**
     * @param QuestHelper $questHelper
     */
    public function setQuestHelper($questHelper)
    {
        $this->questHelper = $questHelper;
    }

    /**
     * @return string
     */
    public function getQuestId()
    {
        return $this->questId;
    }

    /**
     * @param string $questId
     */
    public function setQuestId($questId)
    {
        $this->questId = $questId;
    }

    /**
     * @param string $state
     * @return QuestEvent
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }
}