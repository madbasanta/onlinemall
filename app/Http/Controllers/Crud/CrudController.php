<?php

namespace App\Http\Controllers\Crud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\ModelHandler;
use App\Forms\PostForm;

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
    	$mod = $request->mod;
        $model = ModelHandler::getObject($mod);
        $relations = $model->hasRelation() ? $model->getRelations() : null;
        $selectables = $relations === null ? '*' : "${mod}.*, " . $this->getSelectables($relations);
        $data = $model->when($relations, function($query) use($relations, $mod) {
            foreach ($relations as $table => $data):
                $t = strpos($data['foreign_key'], '.') === false ? $mod . '.' : 'alias_';
                $alias = 'alias_'. $table;
                $query->leftjoin($table .' as '. $alias, "{$alias}.{$data['primary_key']}", "{$t}{$data['foreign_key']}");
            endforeach;
        })->selectRaw($selectables)->orderByDesc("{$mod}.created_at")->get();
    	return ['data' => $data];
    }

    /*
    finds selectable columns and concact table name
    */
    public function getSelectables($relations)
    {
        $selectables = '';
        $break = '';
        foreach($relations as $table => $data):
            $model = ModelHandler::getObject($table);
            foreach($model->fields as $key => $val):
                $alias = 'alias_' . $table;
                $selectables .= $break . 'COALESCE(' . $alias . '.' . $key . ', "-") as ' . $table . '_' . $key;
                $break = ', ';
            endforeach;
        endforeach;
        return $selectables;
    }

    /*
    return form for requested model
    */
    public function addForm($mod)
    {
        $model = ModelHandler::getObject($mod);
        $fieldArray = $model->fields;
        return view('admin.blueprint.form', compact('fieldArray', 'model'));
    }

    /*
    store form data into database for given model
    */
    public function postForm(Request $request, $mod)
    {
        $model = ModelHandler::getObject($mod);
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
        if(isset($model->fields['is_active'])) $model->is_active = isset($datas['is_active']) ? $datas['is_active'] : 0;
        $model->save();
        return $model;
    }

    /*
    delete the data from database of given table ($mod)
    */
    public function destroy($mod, $id)
    {
        $model = ModelHandler::getObject($mod);
        $model = $model->find($id);
        if($model) $model->delete();
        return ['message' => ucfirst(str_singular($mod)) . ' deleted successfully.', 'error' => 0];
    }

    /*
    find one row of given table and return edit form
    */
    public function editOne($mod, $id)
    {
        $model = ModelHandler::getObject($mod);
        $model = $model->find($id);
        $fieldArray = $this->loadFieldArray($model->fields, $model);
        $body = view('admin.blueprint.form', compact('fieldArray', 'model'))->render();
        return ['title' => title_case(str_singular($mod)) . ' #' . $model->id, 'body' => $body];
    }

    /*
    load array of fields with data
    */
    public function loadFieldArray($fields, $object)
    {
        foreach($fields as $key => $data):
            if(!isset($data['select2']) || !$object->$key) continue;
            $options = $data['select2'];
            $model = ModelHandler::getObject($options['table']);
            $model = $model->find($object->$key);
            if(!$model) continue;
            if(strpos($text = $options['text'], '.') !== false):
                $text = explode('.', $text);
                $relationship = $model->getRelationship($table = array_shift($text));
                if($relationship):
                    $text = array_pop($text);
                    $model->$text = $this->rel($relationship, $table, $model, $text);
                endif;
            elseif(strpos($text, ',') !== false):
                $cols = explode(',', $text);
                $cols = array_filter($cols, function($arr) {
                    return strpos($arr, '(') !== false ?: strpos($arr, ')') !== false;
                });
                $cols = array_map(function($arr) {
                    if(strpos($arr, '(') !== false)
                        return explode('(', $arr)[1];
                    if(strpos($arr, ')') !== false)
                        return explode(')', $arr)[0];
                }, $cols);
                $text = implode('_', $cols);
                $model->$text = '';
                foreach($cols as $index):
                    $model->$text .= $model->$index . ' ';
                endforeach;
            endif;
            if(gettype($text) === 'array')
                $text = array_pop($text);
            $fields[$key]['options'] = [$model->id => $model->$text];
        endforeach;
        return $fields;
    }

    public function rel($data, $table, $query, $text)
    {
        $t = strpos($data['foreign_key'], '.') === false ? $query->getTable() . '.' : '';
        $data = $query->join($table, "{$table}.{$data['primary_key']}", "{$t}{$data['foreign_key']}")
            ->select($table . '.' . $text)->where("{$t}id", $query->id)->first();
        return $data->$text;
    }

    /*
    retrieves select2 options from table
    */
    public function loadOptions(Request $request, $mod)
    {
        $model = ModelHandler::getObject($mod);
        $relations = $model->hasRelation() ? $model->getRelations() : null;
        $data = $model->when($request->query, function($query) use($request) {
            $cols = explode(',', $request->text);
            $cols = explode('(', $cols[0]);
            $query->where(array_pop($cols), 'like', $request->term . '%');
        })->when($relations, function($query) use($relations, $mod) {
            foreach ($relations as $table => $data):
                if($mod === $table) return;
                $t = strpos($data['foreign_key'], '.') === false ? $mod . '.' : '';
                $query->leftjoin($table, "{$table}.{$data['primary_key']}", "{$t}{$data['foreign_key']}");
            endforeach;
        })->selectRaw("${mod}.{$request->id} as id, {$request->text} as text")
        ->get();
        return $data;
    }

    /*
    update given data to database
    */
    public function updateOne(Request $request, $mod, $id)
    {
        $model = ModelHandler::getObject($mod);
        $this->validateRequest($request, $model);
        $model = $model->find($id);
        return $this->saveUpdate($model, $request->all());
    }

    /*
    show details of given row from database
    */
    public function showOne($mod, $id)
    {
        $model = ModelHandler::getObject($mod);
        $model = $model->find($id);
        if(!$model) return response(['error' => 1], 500);
        $fakeModel = ModelHandler::getObject($mod);
        $fakeModel->fill($model->toArray());
        // $relations = $model->hasRelation() ? $this->callRelations($model) : [];
        $relations = [];
        $fieldArray = $this->loadFieldArray($model->fields, $model);
        $view = view('admin.model.details', [
            'model' => $fakeModel, 'relations' => $relations, 'fieldArray' => $fieldArray
        ])->render();
        return ['title' => title_case(str_singular($mod)) . " #{$id}", 'body' => $view];
    }

    /*
    appeend data table to model with relations
    */
    public function callRelations($model)
    {
        $rels = $model->getRelations();
        foreach($rels as $table => $options):
            $fKey = $options['foreign_key'];
            $relatedModel = ModelHandler::getObject($table);
            $relatedModel = $relatedModel->find($model->$fKey);
            // dd($relatedModel, $model->$fkey);
            if(is_null($model->$fKey)) continue;
        endforeach;
        return [];
    }

    /*
    load sub add form
    */
    public function loadSubForm($mod)
    {
        $form = $this->addForm($mod);
        return view('admin.model.sub-add-form', compact('form', 'mod'));
    }
}
