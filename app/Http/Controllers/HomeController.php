<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\{ModelHandler, PageHandler};
use App\Models\{PageComponent, Pasal, Product};

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
        $banner = PageHandler::getComponent('banner');
        $pasals = PageHandler::getComponent('pasals');
        $topShops = $this->getTopShops();
        $offerProducts = $this->getOfferProducts();
        return view('index', compact('banner', 'pasals', 'topShops', 'offerProducts'));
    }

    /*
    top shops at home page
    */
    public function getTopShops() {
        return Pasal::orderByDesc('name')->limit(4)->get();
    }
    /*
    offer proucts at home page
    */
    public function getOfferProducts() {
        return Product::orderByDesc('id')->limit(4)->get();
    }

    /*
    Shows the admin panel
    */
    public function adminPanel()
    {
        return view('admin.index', [
            'models' => $this->getModels(),
            'components' => $this->getComponents()
        ]);
    }

    /*
    Get crud models
    */
    public function getModels()
    {
        $models = array();
        foreach (ModelHandler::$models as $mod):
            array_push($models, new $mod);
        endforeach;
        return $models;
    }

    /*
    get page components
    */
    public function getComponents()
    {
        $components = array();
        foreach (PageComponent::all() as $component):
            array_push($components, $component->name);
        endforeach;
        return $components;
    }
}
