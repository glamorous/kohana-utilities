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
	 * @uses    URL::site
	 */
	public static function canonical($uri = NULL, array $attributes = NULL)
	{
		$uri = ($uri !== NULL) ? URL::site($uri) : URL::site(Request::detect_uri());

		// Set the canonical link
		$attributes['href'] = $uri;

		// Set the canonical rel
		$attributes['rel'] = 'canonical';

		return '<link'.HTML::attributes($attributes).' />';
	}
	/**
	 * Creates a rss alternate link.
	 *
	 *     echo HTML::rss('rss');
	 *
	 * @param   string   uri or url to link
	 * @param   array    default attributes
	 * @param   boolean  include the index page
	 * @return  string
	 * @uses    URL::base
	 * @uses    HTML::attributes
	 */
	public static function rss($uri, array $attributes = NULL)
	{
		if (strpos($uri, '://') === FALSE)
		{
			// Add the base URL
			$uri = URL::base(TRUE).$uri;
		}

		// Set the rss link
		$attributes['href'] = $uri;

		// Set the rss rel
		$attributes['rel'] = 'alternate';

		// Set the rss type
		$attributes['type'] = 'application/rss+xml';

		return '<link'.HTML::attributes($attributes).' />';
	}

	/**
	 * Get a HTML list output from flashmessages
	 *
	 *     echo HTML::flashmessages('cms');
	 *
	 * @param   string  scope of the flash messages
	 * @param   array   default values to return
	 * @return  string
	 */
	public static function flashmessages($scope = NULL, $default = array())
	{
		$list = ($key == NULL) ? '<ul class="flashmessages">' : '<ul id="'.$key.'" class="flashmessages">'."\n";

		$messages = Session::instance()->get_flash($scope, $default);

		foreach($messages as $message)
		{
			$list .= '<li class="'.$message['type'].'">'.$message['value'].'</li>'."\n";
		}

		$list .= '</ul>'."\n";
		return $list;
	}
	/**
	 * Get all bodyclasses for the current page
	 *
	 *     echo HTML::bodyclass('cms');
	 *
	 * @param   mixed  string or array with classes
	 * @param   bool   only use the provided classes
	 * @return  string
	 */
	public static function bodyclass($classes = '', $strict = FALSE)
	{
		$current = Request::detect_uri();
		$css_classes = explode('/', $current);
		// Adding the current locale, language and country
		$css_classes[] = I18n::lang();
		$css_classes[] = substr(I18n::lang(), 2);
		$css_classes[] = substr(I18n::lang(), -2);

		$classes = (Arr::is_array($classes)) ? $classes : array($classes);

		if($strict === FALSE)
		{
			$css_classes = Arr::merge($css_classes, $classes);
		}
		else
		{
			$css_classes = $classes;
		}

		return implode(' ', $css_classes);
	}
} // End Html
?>