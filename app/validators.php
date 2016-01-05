<?php namespace App;
use Illuminate\Validation\Validator;

\Validator::extend('alpha_spaces', function($attribute, $value)
{
	return preg_match('/^[a-zA-Z0-9\s]+$/u', $value);
});