<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 29.12.2015
 * Time: 16:48
 */

namespace Likedimion\Events;


use Likedimion\Event;
use Likedimion\Helper\LocationHelper;
use Likedimion\Helper\PlayerHelper;

abstract  class PluginEvent extends Event
{
    /**
     * @var PlayerHelper
     */
    protected $playerHelper;
    /**
     * @var LocationHelper
     */
    protected $locHelper;
    /**
     * @var \ArrayIterator
     */
    protected $pluginData;

    /**
     * @param PlayerHelper $playerHelper
     * @return PluginEvent
     */
    public function setPlayerHelper($playerHelper)
    {
        $this->playerHelper = $playerHelper;
        return $this;
    }

    /**
     * @param LocationHelper $locHelper
     * @return PluginEvent
     */
    public function setLocHelper($locHelper)
    {
        $this->locHelper = $locHelper;
        return $this;
    }

    /**
     * @return PlayerHelper
     */
    public function getPlayerHelper()
    {
        return $this->playerHelper;
    }

    /**
     * @return LocationHelper
     */
    public function getLocHelper()
    {
        return $this->locHelper;
    }

    /**
     * @param \ArrayIterator $pluginData
     * @return PluginEvent
     */
    public function setPluginData($pluginData)
    {
        $this->pluginData = $pluginData;
        return $this;
    }

    /**
     * @return \ArrayIterator
     */
    public function getPluginData()
    {
        return $this->pluginData;
    }
}