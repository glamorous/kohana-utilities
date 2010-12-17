<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Extend of session class.
 *
 * @package    Kohana
 * @category   Session
 * @author     Kohana Team
 * @copyright  (c) 2008-2010 Kohana Team
 * @license    http://kohanaframework.org/license
 */
abstract class Session extends Kohana_Session
{
	const FLASH_ERROR = 'error';
	const FLASH_WARNING = 'warning';
	const FLASH_OK = 'success';
	const FLASH_INFO = 'info';
	/**
	 * Get and delete a flash variable from the session array.
	 *
	 *     $bar = $session->get_flash('backend');
	 *
	 * @param   string  scope
	 * @param   mixed   default value to return
	 * @return  mixed
	 */
	public function get_flash($scope=NULL, $default=array())
	{
		return $this->get_once('flash'.$scope, $default);
	}

	/**
	 * Set a flash variable in the session array.
	 *
	 *     $session->set_flash('This is successfull', Session::FLASH_OK, 'backend');
	 *
	 * @param   mixed    value
	 * @param   const    type
	 * @param   string   scope
	 * @return  $this
	 */
	public function set_flash($value, $type = self::FLASH_INFO, $scope=NULL)
	{
		$messages = $this->get_flash($scope);
		$messages[] = array('type' => $type, 'value' => $value);
		$this->_data['flash'.$scope] = $messages;

		return $this;
	}
} // End Session
?>