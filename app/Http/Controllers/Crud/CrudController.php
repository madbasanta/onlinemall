<?php

namespace App\Http\Controllers\Crud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\ModelHandler;
use App\Forms\PostForm;
use Kris\LaravelFormBuilder\FormBuilder;

class CrudController extends Controller
{
    /*
	loads index page and table
    */
    public function loadTable($mod)
    {
    	$model = ModelHandler::getObject($mod);
    	if(!$model) return 'No Access';
    	return view('admin.model.index', compact('model'));
    }

    /*
	simply return json data for datatable
    */
    public function loadTableData(Request $request)
    {
    	$mod = ModelHandler::getObject($request->mod);
    	return ['data' => $mod->get()];
    }

    /*
    return form for requested model
    */
    public function addForm($mod, FormBuilder $formBuilder)
    {
        $model = ModelHandler::getObject($mod);
        $fieldArray = (new $model)->fields;
        return view('admin.blueprint.form', compact('fieldArray', 'mod'));
    }

    /*
    store form data into database for given model
    */
    public function postForm(Request $request, $mod)
    {
        $model = $this->getTheModelObject($mod);
        $this->validateRequest($request, $model);    
        return $this->saveUpdate($model, $request->all());
    }

    /*
    Validates request object
    */
    public function validateRequest(Request $request, $model)
    {
        $rules = $this->getRules($model);
        $attributes = $model->heads;
        $request->validate($rules, [], $attributes);
    }

    /*
    returns model object of given table
    */
    public function getTheModelObject($mod)
    {
        $model = ModelHandler::getObject($mod);
        return new $model();
    }

    /*
    return validations rules of given model object
    */
    public function getRules($model)
    {
        $results = array();
        foreach($model->fields as $key => $obj) 
            if(isset($obj['validation'])) 
                $results[$key] = $obj['validation'];
        return $results;
    }

    /*
    save data to databse to with given model object
    */
    public function saveUpdate($model, $datas = [])
    {
        foreach ($datas as $key => $val):
            if(isset($model->fields[$key]))
            $model->$key = $val;
        endforeach;
        $model->save();
        return $model;
    }
}
