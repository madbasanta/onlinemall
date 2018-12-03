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
		<div class="bg-white my-3">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item w-50">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Full Description</a>
				</li>
				<li class="nav-item w-50">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Shope Information</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="p-2">
						<h1 class="h5 mt-3">{{ $product->name }}</h1>
						<hr class="m-0">
					</div>
					<div class="product-desc-con p-2 clearfix">
						{!! $product->description !!}
					</div>
				</div>
				<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="p-2">
						<h1 class="h5 mt-3">Falano Shop Lorem ipsum dolor sit amet.</h1>
						<hr class="m-0">
						<div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod exercitationem ab, ipsam placeat nam neque beatae unde aperiam eos recusandae aspernatur vero quasi labore tempora.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="related-products">
	<div class="container">
		<hr class="bg-dark">
		<h3 class="h4">Related products from <a href="javascript:void(0)">Falano Shop</a> <i class="fa fa-heart text-danger mb-3"></i></h3>
		<div class="row">
			@foreach(range(0, 5) as $i)
			<div class="col-lg-2 d-lg-block col-md-3 d-md-block col-sm-4 col-6 {{ $i > 3 ? 'd-none' : '' }} px-2">
				<div class="card border-0 mb-3 b-e-h">
					<div class="card-body text-center p-0">
						<div class="b-e-h-c">
							<img class="img-fluid" src="https://picsum.photos/350/{{ 345 + $i }}" alt="item pic">
						</div>
						<div class="text-left px-1">
							<p style="line-height: 1rem;" class="clamp mt-3" data-lines=2>Product name Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, quis.</p>
							<p style="line-height: 1rem;" class="text-danger font-weight-bold">Rs.&nbsp;{{ rand(100, 999) }}</p>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection