@extends('layouts.master')

@section('title', $product->name)

@section('description', 'Buy ' . $product->name)

@section('keywords', implode(',', explode(' ', $product->name)))

@section('content')
<section>
	<div class="container">
		<div class="row my-3">
			<div class="col-12">
				<div class="row bg-white">
					<div class="col-sm-4 col-12">
						<div class="my-3">
							<img class="img-fluid" src="{{ asset('image/' . $product->image) }}" alt="{{ $product->name }}">
						</div>
					</div>
					<div class="col-sm-4 col-12">
						<div class="my-3">
							<h1 class="h5">{{ $product->name }}</h1>
							<hr class="bg-light">
							<h1 class="h4 text-danger">Rs. {{ $product->price }}</h1>
							<div class="action-buttons clearfix">
								<button class="btn btn-info text-white px-5 mt-3 float-lg-left">Buy Now</button>
								<button class="btn bg-orange text-white px-xl-5 px-4 mt-3 float-lg-right">Add to Cart</button>
							</div>
							<div class="product-stock text-success mt-2">
								(In Stock)
							</div>
						</div>
					</div>
					<div class="col-sm-4 bg-light">
						<div class="px-3 pt-3">
							<h1 class="h5 clearfix text-muted">Delivery Options <i class="fa fa-info-circle float-right fa-xs"></i></h1>
							<p><i class="fa text-muted fa-map-marker-alt fa-lg" style="width: 30px;"></i> Bagmati, Mechi, Koshi</p>
							<p><i class="fa text-muted fa-truck fa-lg" style="width: 30px;"></i> Home Delivery</p>
							<p><i class="fa text-muted fa-money-bill-alt fa-lg" style="width: 30px;"></i> Cash On Delivery</p>
						</div>
						<hr>
						<div class="px-3 pb-3">
							<h1 class="h5 clearfix text-muted">Return & Warranty <i class="fa fa-info-circle float-right fa-xs"></i></h1>
							<p><i class="fa text-muted fa-undo fa-lg seven-day-return" style="width: 30px;"></i> 7 Days Returns</p>
							<p><i class="fa text-muted fa-shield-alt fa-lg" style="width: 30px;"></i> 5 Year Warranty</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="product-description">
	<div class="container">
		<div class="row bg-white my-3">
			<div class="w-100">
				<h1 class="h5 p-2">{{ $product->name }}</h1>
				<hr class="m-0">
			</div>
			<div class="product-desc-con p-2 clearfix">
				{!! $product->description !!}
			</div>
		</div>
	</div>
</section>
@endsection