<?php

namespace App\Http\Controllers\Discount;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
{
    public function showDiscount($id)
    {
    	$discount = Discount::where('id',$id)->first();

    	return view('admin.model.discount.index',compact('discount'));
    }
}
