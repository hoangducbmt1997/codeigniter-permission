<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

if (!function_exists('dd')) {
	function dd($var)
	{
		if (class_exists('Symfony\Component\VarDumper\VarDumper')) {
			\Symfony\Component\VarDumper\VarDumper::dump($var);
		} else {
			var_dump($var);
		}
		die;
	}
}


if (!function_exists('ddd')) {
	function ddd($var)
	{
		var_dump($var);
		die;
	}
}
