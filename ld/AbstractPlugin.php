<?php
namespace Likedimion;

/**
 * summary
 */
abstract class AbstractPlugin
{
	protected $_data = [];
	/**
	 * [description here]
	 *
	 * @return [type] [description]
	 */
	public function getData($key) {
	    return isset($this->_data[$key]) ? $this->_data[$key] : NULL;
	}
	
	/**
	 * [Description]
	 *
	 * @param [type] $new[ Prop name ] [description]
	 */
	public function setData($key, $val) {
	    $this->_data[$key] = $val;
	
	    return $this;
	}
   

    abstract public function run();

}