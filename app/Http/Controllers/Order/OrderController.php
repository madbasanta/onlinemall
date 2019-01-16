<?php

namespace App\Http\Controllers\Order;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function showOrder($id){

  		$order = Order::where('id',$id)->first();
    	return view('admin.model.order.index',compact('order'));
    }
}
