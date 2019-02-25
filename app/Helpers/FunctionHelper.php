<?php

function ss($key, $default = null)
{
	$target = \App\Models\Setting::where('code', $key)->first();
	if(!$target) return $default;
	return $target->value;
}

function sss($key, $default = array())
{
	$target = \App\Models\Setting::where('code', $key)->get();
	if ($target->count() === 0) return $default;
	return $target;
}