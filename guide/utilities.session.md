# Session Utilities

This overloaded Session helper class is being used to do general things that aren't possible with the default methods in the Kohana core or they needed a wrapper to not repeat yourself.

## Using the get_flash method

This method gets the Flashmessage from the [Session] with the [Session::get_once] method.

	    <?php echo Session::instance()->get_flash($scope, $default); ?>

`$scope`
: scope is an optional string to have the possibility to use flashmessages for other purposes.

`$default`
: this is an optional array what the result has to be if no flashmessage is found, default an empty array


## Using the set_flash method

This method sets a Flashmessage in the [Session] class with a type and a value. It uses the [Session::set] method.

	    <?php echo Session::instance()->set_flash($value, $type, $scope); ?>

`$value`
: This value is the text to set for your flashmessage

`$type`
: the default type is FLASH_INFO. Other possibilities: FLASH_ERROR, FLASH_WARNING and FLASH_OK.

`$scope`
: scope is an optional string to have the possibility to use flashmessages for other purposes.