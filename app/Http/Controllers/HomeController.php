<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\ModelHandler;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin')->only('adminPanel');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /*
    Shows the admin panel
    */
    public function adminPanel()
    {
        return view('admin.index', [
            'models' => $this->getModels(),
        ]);
    }

    /*
    Get crud models
    */
    public function getModels()
    {
        $models = array();
        foreach(ModelHandler::$models as $mod):
            array_push($models, new $mod);
        endforeach;
        // dd($models);
        return $models;
    }
}
