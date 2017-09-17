<?php 

/*
	when I first created these helpers, it's didn't load. So load it first with:
	$ composer dump-autoload
*/

if(!function_exists('create'))
{
	function create($class, $attributes = [])
	{
		return factory($class)->create($attributes);
	}
}

if(!function_exists('make'))
{
	function make($class, $attributes = [])
	{
		return factory($class)->make($attributes);
	}
}


 ?>