<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Extension of the URL helper class.
 *
 * @package    Kohana
 * @category   Helpers
 * @author     Kohana Team
 * @copyright  (c) 2007-2010 Kohana Team
 * @license    http://kohanaframework.org/license
 */
class URL extends Kohana_URL
{
	/**
	 * Checks if a current url is the same as provided.
	 *
	 *     echo URL::isActive('is-this-the-current-url');
	 *
	 * @param   string  site URI to check
	 * @param   bool    check strict or not, default FALSE
	 * @return  string
	 * @uses    URL::base
	 */
	public static function isActive($uri, $strict = FALSE)
	{
		$current = Request::detect_uri();

		if($strict === FALSE)
		{
			$current_parts = explode('/', $current);

			return in_array($uri, $current_parts);
		}
		else
		{
			if($current === $uri)
			{
				return TRUE;
			}
		}

		// Default return FALSE
		return FALSE;
	}
} // End url