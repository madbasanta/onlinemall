<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Product, Category, Inventory};
use App\Http\Controllers\Frontend\FrontendShopController;

class ProductShowController extends Controller
{
    public function showProduct(Inventory $inv)
    {
    	$product = $inv->product;
    	return $this->view('product.index', compact('product', 'inv'));
    }

    public function indexItems()
    {
        $categories = Category::select('id')->get()->toArray();
        $random_cat = array();
        array_push($random_cat, $categories[array_rand($categories)]);
        $rand_elem = $categories[array_rand($categories)];
        if(!in_array($rand_elem, $random_cat))
            array_push($random_cat, $rand_elem);
        else array_push($random_cat, $categories[array_rand($categories)]);
        $cats = Category::whereIn('id', $random_cat)->with('chilren')->get();
        // $cats = Category::whereIn('id', [5,8])->with('chilren')->get();
        $categories = clone $cats;
        $first_cat = $cats->shift();
        $random_cat_ids[$first_cat->id] = $this->randomizeCat([$first_cat]);
        if($cats->count()) $random_cat_ids[$cats[0]->id] = $this->randomizeCat([$cats->pop()]);
        $products = array_map(function($curr) {
            return Product::whereIn('category_id', $curr)
                ->with('inventories', 'inventories.discount', 'inventories.files', 'inventories.currency', 'inventories.size')
                ->limit(4)->get();
        }, $random_cat_ids);

        return view('include.indexItems', compact('products', 'categories'));
    }

    private function randomizeCat($categories) {
        $ids = array();
        foreach ($categories as $cat) {
            array_push($ids, $cat->id);
            if($cat->children->count() > 0)
                $ids = array_merge($ids, $this->randomizeCat($cat->children));
        }
        return $ids;
    }

    public function recommendedItems(Request $request, FrontendShopController $controller)
    {
        $products = $controller->searchProducts($request, 6);
        return view('include.recommendedItem', $products);
    }
}
