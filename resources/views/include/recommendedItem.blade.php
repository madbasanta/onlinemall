@if(!request()->has('shop'))
<section id="recommendedItems">
	<div class="mt-5"></div>
	<div class="container">
		<h3 class="h6 text-center text-muted">We understand your choices !</h3>
		<h3 class="h4 text-brown text-center">Recommended For Your <i class="fa fa-heart text-danger mb-3"></i></h3>
@endif
		<div class="row">
			@foreach($products as $i => $product)
			<div class="col-lg-2 col-md-3 d-md-block col-sm-4 col-6 {{ $i > 3 ? 'd-none' : '' }} px-2">
				<a href="{{ url("product/{$product->id}") }}" style="color: unset;" class="card-link">
				<div class="card border-0 mb-3 b-e-h">
					<div class="card-body text-center p-0">
						<div class="b-e-h-c" style="height: 150px;text-align: center;">
							<?php $image = $product->files->first(); ?>
							<img class="img-fluid" src="{{ $image?"/inventoryImage/{$image->id}":'/notfound.png'  }}" alt="{{ $product->product->name??'product image' }}" style="max-height: 150px;">
						</div>
						<div class="text-left px-1">
							<p style="line-height: 1rem;height: 2rem;overflow: hidden;" class="mb-2 mt-1">
								{{ $product->product->name??'404 name not found' }}
							</p>
							<p style="line-height: 2em;" class="text-danger font-weight-bold clearfix px-2">
								{!! $product->currency->code.'.&nbsp;'.$product->getCurrenctPrice() !!}
								<button data-item="{{ $product->id }}" class="btn btn-sm btn-outline-secondary putInCart float-right" type="button">
									Add to cart
								</button>
							</p>
						</div>
					</div>
				</div>
				</a>
			</div>
			@endforeach
		</div>
@if(!request()->has('shop'))
	</div>
</section>
@endif