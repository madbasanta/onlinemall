<?php
namespace App\Lib;

use App\Models\PageComponent;

class PageHandler {
	/*
	get the database object of the component
	@param $component (component name)
	@return PageComponent
	*/
	public static function getObject($component)
	{
		return PageComponent::where('name', $component)->first();
	}
	/*
	load components
	@parem $component
	@param bool $isAdmin
	*/
	public static function getComponent($component, $isAdmin = false)
	{
		if(gettype($component) === 'string') 
			$component = PageComponent::where('name', $component)->first();
		if($isAdmin) return static::getAdminComponent($component);
		return view('components.' . $component->name, compact('component'));
	}

	public static function getAdminComponent(PageComponent $component)
	{
		return view('components.admin.' . $component->name, compact('component'));
	}

	public static function setComponent($component, $data)
	{
		$component = static::getObject($component);
		$storage = json_decode($component->data, true);
		$storage = array_merge($storage, $data);
		$component->data = json_encode($storage);
		$component->save();
	}
}