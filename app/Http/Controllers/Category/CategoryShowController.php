<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Models\Category;

class CategoryShowController extends Controller
{
    public function index()
    {
    	$categories = Category::where('is_active',1)->get();
    	return view('admin.categories.index',compact('categories')); 
    }
}
