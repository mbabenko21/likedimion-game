<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 29.12.2015
 * Time: 19:31
 */

namespace Likedimion\Ai;


use Likedimion\Helper\LocationHelper;

class Supervision
{
    /**
     * @var LocationHelper
     */
    protected $locHelper;
    /**
     * @var \ArrayIterator
     */
    protected $locations;

    public function __construct()
    {
        $this->locations = new \ArrayIterator();
    }

    /**
     * @param $locId
     * @return $this
     */
    public function addLocation($locId){
        if(!is_null($this->locHelper)){
            if(!$this->locations->offsetExists($locId)) {
                try {
                    $this->locations->offsetSet($locId, $this->getLocHelper()->factory($locId));
                } catch(\Exception $e){
                    return $this;
                }
            }
        }
        return $this;
    }

    /**
     * @param LocationHelper $locHelper
     * @return $this
     */
    public function addLocHelper(LocationHelper $locHelper){
        $this->locations->offsetSet($locHelper->getLoc()["lid"], $locHelper);
            return $this;
    }

    /**
     * @return array
     */
    public function getLocations(){
        return $this->locations->getArrayCopy();
    }

    /**
     * @param callable $callable
     */
    public function eachLocations(callable $callable){
        foreach($this->locations as $locHelper){
            $callable($locHelper);
            $this->addLocHelper($locHelper);
        }
    }

    /**
     * @param $locId
     * @return LocationHelper
     * @throws \Exception
     */
    public function getLocation($locId){
        if($this->locations->offsetExists($locId)){
            return $this->locations->offsetGet($locId);
        } else {
            return $this->locHelper->factory($locId);
        }
    }
    /**
     * @param LocationHelper $locHelper
     * @return Supervision
     */
    public function setLocHelper($locHelper)
    {
        $this->locHelper = $locHelper;
        return $this;
    }

    /**
     * @return LocationHelper
     */
    public function getLocHelper()
    {
        return $this->locHelper;
    }
}