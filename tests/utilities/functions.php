<?php 

/*
	when I first created these helpers, it's didn't load. So load it first with:
	$ composer dump-autoload
*/

if(!function_exists('create'))
{
	function create($class, $attributes = [], $times = null)
	{
		return factory($class, $times)->create($attributes);
	}
}

if(!function_exists('make'))
{
	function make($class, $attributes = [], $times = null)
	{
		return factory($class, $times)->make($attributes);
	}
}


 ?>