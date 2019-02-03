<?php

namespace App\Http\Controllers\Discount;
use App\Models\{Discount, Inventory};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Inventory\InventoryController;

class DiscountController extends Controller
{
	private $path = 'admin.model.discount';

	public function discounts(Request $request) {
		return Discount::select('title as text', 'id', 'amount', 'percent', 'is_amount')
					->when($request->term, function($query) use($request){
						$query->where('title', 'like', $request->term . '%');
					})->get();
	}

    public function showDiscount($id)
    {
    	$discount = Discount::where('id',$id)->first();
    	return view($this->path .'.index',compact('discount'));
    }

    public function addInvDiscount(Inventory $inventory) {
    	$inventory->product;
    	$inventory->currency;
    	return view($this->path .'.addInvDiscount', compact('inventory'));
    }

    public function storeInvDiscount(Request $request, Inventory $inventory) {
    	$this->validateReq($request);
        $assign = (int) $request->discount_name === 0;
        if($assign) $discount = new Discount();
        else $discount = Discount::find($request->discount_name);
    	return $assign ? $this->saveUpdate($discount, $inventory, $request) : $this->saveUpdateInv($inventory, $discount);
    }

    public function editInvDiscount(Inventory $inventory, Discount $discount) {
    	return view($this->path .'.editInvDiscount', compact('inventory', 'discount'));
    }

    public function updateInvDiscount(Request $request, Inventory $inventory, Discount $discount) {
    	$this->validateReq($request);
        if((int) $request->discount_name !== 0) $discount = Discount::find($request->discount_name);
    	return $this->saveUpdateInv($inventory, $discount);
    }

    public function removeDis(Inventory $inv, InventoryController $controller) {
        $inv->discount_id = null;
        $inv->save();
        return $controller->showInventory($inv);
    }

    private function saveUpdate($discount, $inventory, $request) {
    	$discount->title = $discount->title ?: $request->discount_name;
    	$discount->amount = $request->discount_type ? $request->discount_value : null;
    	$discount->percent = $request->discount_type ? null : $request->discount_value;
    	$discount->is_amount = $request->discount_type;
    	$discount->is_active = 1;
    	$discount->save();
        $this->saveUpdateInv($inventory, $discount);
    	return $discount;
    }

    private function saveUpdateInv($inventory, $discount) {
        $inventory->discount_id = $discount->id;
        $inventory->save();
        return $discount;
    }

    private function validateReq($request) {
    	$request->validate(['discount_name' => 'required', 'discount_type' => 'required', 'discount_value' => 'required|numeric|min:0']);
    }
}
