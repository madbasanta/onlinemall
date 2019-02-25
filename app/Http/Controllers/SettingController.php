<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
	protected $layout = 'admin.settings';

    public function index()
    {
    	return view($this->layout . '.index', array(
    		'settings' => Setting::paginate(10)
    	));
    } 

    public function editForm(Setting $setting) {
    	return view($this->layout . '.edit', compact('setting'));
    }

    public function store(Request $request) {
    	$request->validate(array('code' => 'required', 'value' => 'required'));
    	$setting = new Setting();
    	$this->saveUpdate($setting, $request->only('code', 'value'));
    	return $this->index();
    }

    public function update(Request $request, Setting $setting) {
    	$request->validate(array('code' => 'required', 'value' => 'required'));
    	$this->saveUpdate($setting, $request->only('code', 'value'));
    	return $this->index();
    }

    public function delete(Setting $setting)
    {
    	$setting->delete();
    	return $this->index();
    }

    private function saveUpdate($target, $data) {
    	foreach ($data as $key => $value):
    		$target->$key = $value;
    	endforeach;
    	$target->save();
    	return $target;
    }
}