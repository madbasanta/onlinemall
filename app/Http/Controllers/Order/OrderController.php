<?php

namespace App\Http\Controllers\Order;

use App\Models\{Order, Inventory, Product, Address};
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
	use \App\Traits\Controller\OrderController;

	private $layout = 'admin.model.order';


    public function showOrder($id) {
		$order = Order::find($id);
		$order->inventories;  
    	return view($this->layout . '.index', compact('order'));
    }

    public function addForm(Inventory $inventory) {
    	$users = User::all();
    	return view($this->layout . '.orderInventoryAdd', compact('inventory', 'users'));
    }

    public function getProductOptions(Request $request) {
    	return Product::select('name as text', 'inventories.id as id')
    			->leftjoin('inventories', 'inventories.product_id', 'products.id')
    			->when($request->term, function($query) use($request){
    				$query->where('name', 'like', $request->term . '%');
    			})->get();
    }

    public function createOrder(Request $request) {
    	$this->validateRequest($request);
    	try {
    		\DB::beginTransaction();
	    	$order = $this->saveOrder($request);
	    	$address = $this->saveAddress($request);
	    	$order->address()->attach($address->id, [
	    		'created_at' => date('Y-m-d H:i:s'),
	    		'is_active' => 1
	    	]);
	    	$this->setInventories($order, $request->only('inventory_id', 'qty'));
	    	\DB::commit();
	    	return response(['message' => 'Successfull'], 200);
    	} catch (\Exception $e) {
    		\DB::rollback();
    		response(['message' => $e->getMessage()], 500);
    	}
    }

    public function getData(Inventory $inventory) {
    	return ['data' => $inventory->orders()->with('inventories')->get()];
    }

    public function editOrder(Order $order) {
    	$inventories = $order->inventories()->with('product')->withPivot('quantity')->get();
    	$users = User::all();
    	$address = $order->address->first();
    	return view($this->layout . '.orderEdit', compact('order', 'inventories', 'users', 'address'));
    }

    public function updateOrder(Request $request, Order $order) {
    	try {
    		\DB::beginTransaction();
    		$order = $this->saveOrder($request, $order);
    		$address = $this->saveAddress($request, $order->address->first());
    		$this->setInventories($order, $request->only('inventory_id', 'qty'));
    		\DB::commit();
    		return response(['message' => 'Successfull'], 200);
    	} catch (\Exception $e) {
    		\DB::rollback();
    		return response(['message' => $e->getMessage()]);
    	}
    }

    public function removeOrder(Order $order) {
    	$order->address()->detach();
    	$order->inventories()->detach();
    	$order->delete();
	}
	
	public function removeInv(Order $order, $inv_id) {
		$order->inventories()->detach($inv_id);
		return $inv_id;
	}

	public function markShipped(Request $request, Order $order) {
		$order->shipped = $request->shipped;
		$inventories = $order->inventories()->withPivot('quantity')->get();
		foreach($inventories as $inv):
			if($order->shipped):
				$inv->quantity = $inv->quantity - $inv->pivot->quantity;
				$inv->quantity = $inv->quantity < 0 ? 0 : $inv->quantity;
			else:
				$inv->quantity = $inv->quantity + $inv->pivot->quantity;
			endif;
			$inv->save();
		endforeach;
		$order->save();
		return $order;
	}

    public function latestOrders()
    {
        return Order::with('inventories')->limit(10)->get();
    }
}