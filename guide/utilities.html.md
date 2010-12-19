# HTML Utilities

This overloaded HTML helper class is being used to do general things that aren't possible with the default methods in the Kohana core or they needed a wrapper to not repeat yourself.

## Using the bodyclass method

A couple of designers love to css stuff on the page based on the bodyclass. So default all needed CSS-classes are being returned based on the active uri.

	    <body class="<?php echo HTML::bodyclass($classes, $strict); >">
	    

`$classes`
: the classes to return in a string or an array with strings

`$strict`
: use only the classes that are given to the method with the variable `$classes`

### Default included classes

If the current active url is for example `http://www.test.dev/page/subpage?page=1` and we call the class without passing any variables (and the `locale` is being set as `en_US`):

     <body class="page subpage en en-us us">



## Using the canonical method

Since Google annouced the use of the canonical link, many developers use them to prevent a penalty from google to have duplicated pages. You provide this code in your `<head>`

	    echo HTML::canonical($uri, $attributes);	    

`$uri`
: uri or url where the canonical link has te be linked to, default provided with the current uri

`$attributes`
: optional array of attributes to provided with the canonical link

The output of the code when the base url is `http://www.test.dev` and the current uri is `home`:

     <link href="http://www.test.dev/home" rel="canonical" />


## Using the rss method

Just like script and style links, you mostly has some rss-links too. This wrapper is you solution. You provide this code in your `<head>`

	    echo HTML::rss($uri, $attributes);	    

`$uri`
: uri or url where the rss link has te be linked to

`$attributes`
: optional array of attributes to provided with the rss link

The output of the code when the base url is `http://www.test.dev` and the uri give `rss/sitemap`:

     <link href="http://www.test.dev/rss/sitemap" rel="alternate" type="application/rss+xml" />


## Using the flashmessages method

Flash messages are messages that are stored in a session to only be readed once. Most of the time they are being used for notification-, error- and successmessages. This method returns an `ul`-list with all the available flash-messages with classes provided for every kind of message. This method uses some other custom methods from [Session](utilities.session).

	    echo HTML::flashmessages($scope, $default);

`$scope`
: Optionally you can choose to retreive only flash messages within a custom scope

`$default`
: The default array when no flashmessages are found
