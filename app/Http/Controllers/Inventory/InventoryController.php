<?php

namespace App\Http\Controllers\Inventory;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    public function showInventory($id)
    {
    	$inventory = Inventory::where('id',$id)->first();

    	return view('admin.model.inventory.index',compact('inventory'));
    }

}
