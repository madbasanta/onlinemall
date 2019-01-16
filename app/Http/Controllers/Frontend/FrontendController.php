<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class FrontendController extends Controller
{
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
}
