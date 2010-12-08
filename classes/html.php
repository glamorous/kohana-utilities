<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Extend on HTML helper class. Provides simple methods for working with html.
 *
 * @package    Kohana
 * @category   Helpers
 * @author     Kohana Team
 * @copyright  (c) 2007-2008 Kohana Team
 * @license    http://kohanaphp.com/license
 */
class HTML extends Kohana_HTML
{
	/**
	 * Creates a canonical link.
	 *
	 *     echo HTML::canonical('this/is/a/canonical-url');
	 *
	 * @param   string   uri or url to link
	 * @param   array    default attributes
	 * @param   boolean  include the index page
	 * @return  string
	 * @uses    URL::base
	 * @uses    HTML::attributes
	 */
	public static function canonical($uri, array $attributes = NULL, $index = FALSE)
	{
		if (strpos($uri, '://') === FALSE)
		{
			// Add the base URL
			$uri = URL::base($index).$uri;
		}

		// Set the canonical link
		$attributes['href'] = $uri;

		// Set the canonical rel
		$attributes['rel'] = 'canonical';

		return '<link'.HTML::attributes($attributes).' />';
	}
} // End Html
?>