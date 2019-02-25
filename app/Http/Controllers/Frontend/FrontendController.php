<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Category, Inventory};

class FrontendController extends Controller
{
	use \App\Traits\Controller\OrderController;

    public function getCategories() {
    	$parents =  Category::where(['is_active' => 1, 'parent_id' => null])
					->with(['children' => function($query) {
						$query->where('is_active', 1)
						->with(['children' => function($query) {
							$query->where('is_active', 1)
							->with(['children' => function($query) {
								$query->where('is_active', 1)
								->with(['children' => function($query) {
									$query->where('is_active', 1)
									->with(['children' => function($query) {
										$query->where('is_active', 1)
										->with(['children' => function($query) {
											$query->where('is_active', 1)
											->with(['children' => function($query) {
												$query->where('is_active', 1)
												->with(['children' => function($query) {
													$query->where('is_active', 1)
													->with(['children' => function($query) {
														$query->where('is_active', 1);
													}]);
												}]);
											}]);
										}]);
									}]);
								}]);
							}]);
						}]);
					}])->get();
    	return $parents;
    }

    public function cart() {
    	return view('cart');
    }

    public function checkout() {
    	return view('checkout');
    }

    public function cartItems(Request $request) {
    	$inv_ids = $request->has('cart') ? json_decode($request->cart) : [];
    	return Inventory::whereIn('id', $inv_ids)->with('product', 'discount', 'currency')->get();
    }

    public function makeOrder(Request $request)
    {
	    $this->validateData($request);
    	try {
    		if (!$request->inventory_id || sizeof($request->inventory_id) === 0) {
    			throw new \Exception("Error Processing Request. No inventory found.");
    		}
    		\DB::beginTransaction();
    		$order = $this->saveOrder($request);
    		$address = $this->saveAddress($request);
    		$order->address()->attach($address->id, [
	    		'created_at' => date('Y-m-d H:i:s'),
	    		'is_active' => 1
	    	]);
	    	$hold = $this->setInventories($order, $request->only('inventory_id', 'qty'));
	    	\DB::commit();
	    	return redirect('cart')->with('success', 'Order has been registered.');
    	} catch (\Exception $e) {
    		\DB::rollback();
    		return back()->with('warning', $e->getMessage());
    	}
    }

    public function validateData($request)
    {
    	$request->validate([
    		'first_name' => 'required',
    		'last_name' => 'required',
            'email' => 'required|email',
    		'phone' => 'required|numeric',
    		'add1' => 'required',
    		'add2' => 'nullable',
    		'city' => 'required',
    		'country' => 'required',
    		'state' => 'nullable',
    		'zip' => 'nullable'
    	]);
    }
}
