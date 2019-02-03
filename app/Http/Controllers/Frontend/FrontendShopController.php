<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Pasal, Category, Inventory};

class FrontendShopController extends Controller
{
    public function index(Request $request, Pasal $shop)
    {
    	$title = $shop->name;
    	$desc = $shop->desc;
        $shop->files;
        $shop->cats = $shop->categories()->get();
    	return view('pasal.index', compact('shop', 'title', 'desc'));
    }

    public function search(Request $request)
    {
        if($request->shop):
            $shop = Pasal::find($request->shop);
            if($shop) return $this->index($request, $shop);
        endif;
        $title = $request->keyword ?: 'Search Results';
        $desc = $request->keyword ?: 'Search Results';

        $shop = new Pasal();
        $shop->forceFill(array(
            'categories' => Category::limit(4)->get(),
            'cats' => Category::limit(8)->get(),
        ));
        // dd($shop);
        return view('pasal.index', compact('title', 'desc', 'shop'));
    }

    public function searchResults(Request $request)
    {
    	return view('pasal.results', $this->searchProducts($request));
    }

    public function searchProducts(Request $request, $limit = 100) {
        return array(
            'products' => Inventory::when($request->keyword, function($query) use($request) {
                $query->leftjoin('products as p', 'p.id', 'inventories.product_id');
                foreach(explode(' ', $request->keyword) as $i => $keyword):
                    if($i === 0) $query->where('p.name', 'like', "%{$keyword}%");
                    else $query->orWhere('p.name', 'like', "%{$keyword}%");
                endforeach;
            })->when($request->search, function($query) use($request) {
                $query->leftjoin('pasals as ps', 'ps.id', 'inventories.pasal_id')
                    ->where('ps.id', $request->search);
            })->when($request->shop, function($query) use($request) {
                $query->leftjoin('pasals as pas', 'pas.id', 'inventories.pasal_id')
                    ->where('pas.id', $request->shop);
            })->when($request->max, function($query) use($request) {
                $query->where('price', '<=', $request->max);
            })->when($request->min, function($query) use($request) {
                $query->where('price', '>=', $request->min);
            })->select('inventories.id as id', 'inventories.product_id as product_id', 'inventories.discount_id as discount_id', 'inventories.currency_id as currency_id', 'inventories.price as price')->with('product', 'files', 'discount', 'currency')->limit($limit)->get()
        );
    }
}
