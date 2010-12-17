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
