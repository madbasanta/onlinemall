<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendShopController extends Controller
{
    public function index(Request $request)
    {
    	return view('pasal.index');
    }
}
