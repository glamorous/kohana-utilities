# Text Utilities

This overloaded Text helper class is being used to do general things that aren't possible with the default methods in the Kohana core or they needed a wrapper to not repeat yourself.

## Using the format method

The format method is nothing else than a wrapper for many used classes to "transform" your text to something more user and HTML friendly. This method uses HTML::chars or [strip_tags](http://php.net/manual/en/function.strip-tags.php), [Text::limit_words], [Text::widont], [Text::auto_link], [Text::auto_p].

	    <?php echo Text::format($text, $limit_words, $tags); >">
	    
`$text`
: the text from your database to format

`$limit_words`
: default `FALSE` so the text isn't truncated. When a number is provided, the text will truncated to that number of words.

`$tags`
: an associative array with HTML tags as key, and a boolean as value. These tags are merged with the tags inside the class. If `$tags` is set as `FALSE` then [HTML::chars] is being used instead of strip_tags](http://php.net/manual/en/function.strip-tags.php)