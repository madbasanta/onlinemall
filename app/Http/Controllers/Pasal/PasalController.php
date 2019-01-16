<?php

namespace App\Http\Controllers\Pasal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PasalController extends Controller
{
    public function showPasal($id)
    {
  		$pasal = Order::where('id',$id)->first();
    	return view('admin.model.pasal.index',compact('pasal'));
    }
}
