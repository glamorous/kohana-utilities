<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Extend on Text helper class. Provides simple methods for working with text.
 *
 * @package    Kohana
 * @category   Helpers
 * @author     Kohana Team
 * @copyright  (c) 2007-2008 Kohana Team
 * @license    http://kohanaphp.com/license
 */
class Text extends Kohana_Text
{
	/**
	 * @var  array  default tags and their setting
	 */
	public static $tags = array(
		'<strong>' => TRUE,
		'<a>' => TRUE,
		'<em>' => TRUE,
		'<h1>' => FALSE,
		'<h2>' => TRUE,
		'<h3>' => TRUE,
		'<h4>' => TRUE,
		'<h5>' => TRUE,
		'<h6>' => TRUE,
		'<ul>' => TRUE,
		'<ol>' => TRUE,
		'<li>' => TRUE,
		'<dl>' => TRUE,
		'<dd>' => TRUE,
		'<dt>' => TRUE,
		'<img>' => TRUE,
		'<table>' => TRUE,
		'<thead>' => TRUE,
		'<tfoot>' => TRUE,
		'<th>' => TRUE,
		'<td>' => TRUE,
		'<tr>' => TRUE,
		'<script>' => FALSE,
		'<object>' => FALSE,
		'<iframe>' => FALSE,
		'<style>' => FALSE,
		'<div>' => FALSE,
		'<span>' => FALSE,
		'<br>' => FALSE,
		'<p>' => FALSE,
		'<embed>' => FALSE,
		'<form>' => FALSE,
		'<hr>' => FALSE,
	);

	/**
	 * Formats a text and can take an extract of the first words (specify amount) and
	 * auto-links youtube movies, urls and emails.
	 * Automatically applies "p" and "br" markup to and widow words tot text.
	 *
	 * 		$text = Text::format($text);
	 *
	 * @param	string	text to format
	 * @param	mixed	amount of words to show or FALSE for not cutting the text
	 * @param	mixed	array with tags and their status (to use or not) or FALSE for not allowing tags
	 * @uses	Text::auto_p
	 * @uses	Text::auto_link
	 * @uses	Text::widont
	 * @uses	Text::limit_words
	 * @uses	HTML::chars
	 * @uses	Arr::merge
	 * @return	string
	 */
	public static function format($text, $limit_words = FALSE, $tags = array())
	{
		$allowed_tags = '';
		$text_to_return = $text;

		// Check if $tags need to be used or not
		if (is_array($tags))
		{
			// Merge $tags and Text::$tags
			$tags = Arr::merge(Text::$tags, $tags);

			// Makes string from all allowed tags
			foreach($tags as $tag => $allowed)
			{
				$allowed_tags .= ($allowed === TRUE) ? $tag : '';
			}
		}
		// If $tags isn't an array and not FALSE, there something wrong
		else if($tags !== FALSE)
		{
			throw Kohana_Text_Exception('$tags need to be an array or FALSE');
		}

		// Strip tags if necessary
		if($tags !== FALSE)
		{
			$text_to_return = strip_tags($text_to_return, $allowed_tags);
		}
		else
		{
			$text_to_return = HTML::chars($text_to_return);
		}

		// Limit words if necessary
		if($limit_words !== FALSE)
		{
			$text_to_return = Text::limit_words($text,$limit_words);
		}

		// Widont, auto_link and auto_p the text
		return Text::auto_p(Text::auto_link(Text::widont($text_to_return)));
	}
} // End Text
?>