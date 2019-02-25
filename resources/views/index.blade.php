@extends('layouts.master')
@section('title', 'Home')
@section('keywords', 'flash sale,nepal shopes,shopes,items,discount,offer,top shopes of nepal,top shopes nepal top shopes')
@section('content')
<section id="product-slider" style="position: relative;">
	{!! $banner !!}
	<section id="v-message">
		<div class="container md">
			<div class="offer-cloud moving" style="padding: 1rem;">
				<span class="fas fa-hand-paper fa-2x text-white">
					<span></span> <br>
				</span>
				<div style="width: 200px;display: none;">
					<img src="{{ asset('image/giphy.gif') }}" alt="giphy image" style="height: 50px;width: 100%;">
				</div>
			</div>
		</div>
	</section>
{{-- 	<section class="item-category" style="position: absolute; bottom: 10px;left: 0;width: 100%;">
		<div class="container" style="position: relative;">
			<div style="position: absolute;left: 0;bottom: 0px;">
				<button class="btn btn-sm bg-white px-4 cat-toggler ml-sm-0 ml-4">
					Categories &nbsp;<i class="fa fa-chevron-down fa-sm"></i>
				</button>
				<div style="position: fixed;z-index: 99;display: none;top: 120px;left: 10vw;width: 200px;font-size: 0.7875rem;
				box-shadow: 0 0 5px 2px #2a3056;" class="bg-white ic ccc">
					<div class="row">
						@foreach(range(0, 8) as $i)
						<div class="col-sm-12 pt-1 clearfix">
							<div class="ml-2 mb-2 category-tog" data-target="cat__{{ $i }}">Main Category {{ $i }}<i class="fa fa-chevron-right float-right mr-2 fa-sm mt-1"></i></div>
						</div>
						@endforeach
					</div>
					@foreach(range(0, 8) as $j)
					<div style="position: absolute;min-height:100%;left: 101%;top: 0;width: 50vw;display: none;
					box-shadow: 0 0 5px 2px #2a3056;" class="bg-white pr-2 cat-c cat__{{ $j }}">
						<h1 class="h5 mt-2 ml-2">Main Category {{ $j }}</h1>
						<hr class="m-0 mb-2">
						<div class="row">
							@foreach(range(0, $j) as $i)
							<div class="col-md-4 px-1">
								<div class="ml-3 mb-2 mr-2 pointer b-bot-p sub-cat">&nbsp; Sub Category {{ $i . ' - ' . $j }}</div>
							</div>
							@endforeach
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section> --}}
</section>
<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-3 col-lg-4 pr-md-1">
				<div class="p-2 mt-3" id="offered-products">
					<h3 class="h5 text-brown font-weight-bold">Offered Products</h3>
					<hr class="m-0 bg-brown">
					<div class="row">
						@foreach($offerProducts as $product)
						<div class="col-lg-12 col-md-6 col-sm-6 col-12">
							<a href="{{ url("product/{$product->id}/" . str_slug($product->product->name)) }}">
							<div class="card mt-3 offered-card border-0">
								<div class="card-body">
									<?php $image = $product->files->first(); ?>
									<div class="float-left"><img src="{{ is_null($image) ? asset('notfound.png') : url("inventoryImage/{$image->id}") }}" alt="picsum" class="img-fluid"></div>
									<div class="float-left pl-2">
										<h6 class="h6" style="line-height: 1em;height: 2em;overflow: hidden;">
											{{ $product->product->name }}
										</h6>
										<div style="color: rgb(255,87,51);">
											{{ $product->currency->code??'Rs' }}.&nbsp;{{ $product->getCurrenctPrice() }} &nbsp; 
											<del class="text-muted">{{ $product->currency->code??'Rs' }}. {{ $product->price }}</del>
										</div>
									</div>
								</div>
								<div class="offer">{{ ($product->price - $product->getCurrenctPrice()) * (100 / $product->price) }}%</div>
							</div>
							</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-4 px-md-1">
				<div class="p-2 mt-3">
					<section>
						{!! $pasals !!}
					</section>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 pl-md-1">
				<div class="p-2 mt-3" id="top-pasals">
					<h3 class="h5 text-brown font-weight-bold">Top Shops</h3>
					<hr class="m-0 bg-brown">
					<div class="row">
						@foreach($topShops as $shop)
						<?php $image = $shop->files->firstWhere('type', 'profile'); ?>
						<div class="col-lg-12 col-md-6 col-sm-6 col-12">
							<a href="{{ url("pasal/{$shop->id}/" . str_slug($shop->name)) }}">
							<div class="card mt-3 border-0">
								<div class="card-body">
									<div class="float-left"><img src="{{ $image?url("shopImage/{$image->id}"):url('notfound.png') }}" alt="{{ $shop->name }}" class="img-fluid"></div>
									<div class="float-left pl-2">
										<h6 class="h6" style="line-height: 1em;height: 2em;overflow: hidden;">
											{{ $shop->name }}
										</h6>
										<div>
											@foreach(range(0, 4) as $i)
											<i class="fa fa-star text-orange"></i>
											@endforeach
										</div>
									</div>
								</div>
							</div>
							</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@include('include.pasalsGrid')
<section id="indexItemsCon"></section>
<section id="recommendedItemsCon"></section>
{{-- @include('include.indexItems') --}}
{{-- @include('include.recommendedItem') --}}
@endsection
@section('script')
<script>
	$(window).ready(e => {
		setTimeout(function() {
			$.get('/fetch/indexItems').then(response => $('#indexItemsCon').html(response));
			$.get('/fetch/recommendedItems').then(response => $('#recommendedItemsCon').html(response));
		}, 300);
	});
</script>
@endsection