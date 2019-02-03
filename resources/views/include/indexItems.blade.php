<section id="indexItems">
	<div class="mt-5"></div>
	<div class="container">
		<div class="row">
			{{-- {{ dd($products, $categories) }} --}}
			@foreach($products as $key => $cats)
			<?php $category = $categories->firstWhere('id', $key); ?>
			<div class="col-sm-6 pr-4">
				<h3 class="h4 font-weight-bold text-brown text-center">{{ $category->name }} <i class="fas fa-laptop text-info mb-3"></i></h3>
				<div class="row">
					@foreach($cats as $i => $product)
					<?php 
						$inventory = $product->inventories->sortByDesc('quantity')->first(); 
						$image = $inventory->files->first();
					?>
					<div class="col-lg-6 col-md-6 col-sm-6 col-6 p-2">
						<a href="{{ url("product/{$inventory->id}") }}" style="color: unset;">
						<div class="card border-0 mb-3 b-e-h">
							<div class="card-body text-center p-0">
								<div class="b-e-h-c" style="height: 220px;">
									<img class="img-fluid" src="{{ is_null($image)?asset('notfound.png'):url("inventoryImage/{$image->id}") }}" alt="{{ $product->name }}">
								</div>
								<div class="text-left px-1">
									<p style="line-height: 1.25em;height: 2.5em;overflow: hidden;" class="mt-3">
										{{ $product->name }}
									</p>
									<p style="line-height: 2em;" class="text-danger px-2 clearfix font-weight-bold">
										{{ $inventory->currency->code??'Rs' }}.&nbsp;{{ $inventory->getCurrenctPrice() }}
										@if($dis = $inventory->discount)
										<del class="text-muted">
											{{ $inventory->currency->code??'Rs' }}.&nbsp;{{ $inventory->price }}
										</del>
										@endif
										<a data-item="{{ $inventory->id }}" href="javascript:void(0)" 
										class="btn btn-sm btn-outline-secondary putInCart px-3 float-right">
											Add to cart
										</a>
									</p>
								</div>
							</div>
						</div>
						</a>
					</div>
					@endforeach
				</div>
			</div>
			@endforeach
			{{-- <div class="col-sm-6 pl-4">
				<h3 class="h4 font-weight-bold text-brown text-center">Cloths <i class="fas fa-user text-info mb-3"></i></h3>
				<div class="row">
					@foreach(range(0, 3) as $i)
					<div class="col-lg-6 col-md-6 col-sm-6 col-6 p-2">
						<div class="card border-0 mb-3 b-e-h">
							<div class="card-body text-center p-0">
								<div class="b-e-h-c" style="height: 220px;">
									<img class="img-fluid" src="https://picsum.photos/400/350" alt="item pic">
								</div>
								<div class="text-left px-1">
									<p style="line-height: 1.25em;height: 2.5em;overflow: hidden;" class="mt-3">Product name Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, quis.</p>
									<p style="line-height: 2em;" class="text-danger px-2 font-weight-bold clearfix">
										Rs.&nbsp;{{ rand(100, 999) }}
										<button class="btn btn-sm btn-outline-secondary float-right px-3">
											Buy
										</button>
									</p>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div> --}}
		</div>
	</div>
</section>
