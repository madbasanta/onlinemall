<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\{ModelHandler, PageHandler};
use App\Models\{PageComponent, Pasal, Product, Inventory, Order};
use App\User;

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
        return view('index', array(
            'banner' => PageHandler::getComponent('banner'),
            'pasals' => PageHandler::getComponent('pasals'),
            'topShops' => $this->getTopShops(),
            'offerProducts' => $this->getOfferProducts(),
            'connectedShops' => Pasal::with('files', 'address')->get()
        ));
    }

    /*
    top shops at home page
    */
    public function getTopShops($limit = 4) {
        $pasals = Pasal::leftjoin('inventories as inv', 'inv.pasal_id', 'pasals.id')
                    ->selectRaw('count(inv.pasal_id) as inv, pasal_id')
                    ->orderByDesc('inv')
                    ->groupBy('inv.pasal_id')
                    ->limit($limit)->get()->pluck('pasal_id')->toArray();
        return Pasal::with('files')->find($pasals);   
    }
    /*
    offer proucts at home page
    */
    public function getOfferProducts() {
        return Inventory::select('*', 'inventories.id as id')
            ->join('discounts', function($join) {
                $join->on('discounts.id', 'inventories.discount_id');
            })->with('product', 'files')->orderByDesc('amount', 'percent')->limit(4)->get();
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

    public function dashboardContent()
    {
        return array(
            'sales' => Order::getSales(),
            'users' => User::whereDate('created_at', '>', date('Y-m-d', strtotime('first day of this month')))->count(),
            'orders' => Order::where('shipped', 0)->count(),
            'inventories' => Inventory::sum('quantity')
        );
    }

    public function dashboard() {
        return view('admin.dashboard');
    }
}
