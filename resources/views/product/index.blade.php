@extends('layouts.master')
@section('title', $product->name)
@section('description', 'Buy ' . $product->name)
@section('keywords', str_replace(' ', ',', $product->name))
@section('content')
<section>
	<div class="container">
		<div class="row my-3">
			<div class="col-12">
				<div class="row bg-white">
					<div class="col-sm-4 col-12">
						<div class="my-3">
							<?php $image = $inv->files->first(); ?>
							<img class="img-fluid magnify-image" src="{{ is_null($image) ? asset('notfound.png') : url("inventoryImage/{$image->id}") }}" alt="{{ $product->name }}" style="max-height: 280px;">
						</div>
					</div>
					<div class="col-sm-4 col-12">
						<div class="my-3">
							<h1 class="h5">{{ $product->name }}</h1>
							<hr class="bg-light">
							<h1 class="h4 text-danger">
								{{ $inv->currency->code ?? 'Rs' }}. {{ $inv->getCurrenctPrice() }}
								@if($inv->discount)
								<del class="text-muted small">&nbsp;{{ $inv->currency->code ?? 'Rs' }}. {{ $inv->price }}</del>
								@endif
							</h1>
							<div class="action-buttons clearfix">
								<a data-item="{{ $inv->id }}" href="javascript:void(0)" 
								class="btn btn-info text-white px-5 mt-3 float-lg-left putInCartByNow">Buy Now</a>
								<a href="javascript:void(0)" data-item="{{ $inv->id }}" 
								class="btn bg-orange text-white putInCart px-xl-5 px-4 mt-3 float-lg-right">Add to Cart</a>
							</div>
							@if($inv->quantity > 0)
							<div class="product-stock text-success mt-2">
								(In Stock)
							</div>
							@else
							<div class="product-stock text-danger mt-2">
								(Out of Stock)
							</div>
							@endif
								<h5>&nbsp;</h5>
							<div>
								<h1 class="h5 bg-success text-white p-2 text-center" 
								style="position: absolute;bottom: 10px;left: 1rem;right: 1rem;">
									<i class="fa fa-phone fa-xs"></i>
									Direct Call
									9806565456
								</h1>
							</div>
						</div>
					</div>
					<div class="col-sm-4 bg-light">
						<div class="px-3 pt-2">
							<h1 class="h5 clearfix text-muted">Delivery Options <i class="fa fa-info-circle float-right fa-xs"></i></h1>
							<p><i class="fa text-muted fa-map-marker-alt fa-lg" style="width: 30px;"></i> Bagmati, Kathmandu, Ringroad</p>
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
	<div class="container p-0">
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
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="p-2">
						<h1 class="h5 mt-3">{{ $product->name }}</h1>
						<hr class="m-0">
					</div>
					<div class="product-desc-con p-2 clearfix">
						{!! $product->desc !!}
					</div>
				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="p-2">
						@if($shop = $inv->pasal)
						<h1 class="h5 mt-3">{{ $shop->name }}</h1>
						<hr class="m-0">
						<div>
							@if($address = $shop->address->first())
								{!! $address->full_address() !!}
							@else
							No Address Information.
							@endif
						</div>
						@else
						No Information 	
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="related-products">
	<div class="container">
		<hr class="bg-dark">
		@if($shop = $inv->pasal)
		<h3 class="h4">Other products from <a href="{{ url("pasal/{$shop->id}") }}">{{ $shop->name }}</a> <i class="fa fa-heart text-danger mb-3"></i></h3>
		@endif
		<section id="recommendedItemsCon"></section>
	</div>
</section>
<div class="modal" id="popOutImagePreview">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center" style="padding: 0;">
            <button type="button" class="close text-white" style="position: absolute;right: -20px;" data-dismiss="modal">&times;</button>
                <div id="myImageCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    @foreach($inv->files as $key => $image)
                    <li data-target="#myImageCarousel" data-slide-to="{{ $key }}" @if($loop->index == 0) class="active" @endif></li>
                    @endforeach
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    @forelse($inv->files as $key => $image)
                    <div class="item {{ $loop->index == 0 ? 'active' : '' }}">
                      <img src="{{ url("inventoryImage/{$image->id}") }}" alt="{{ $inv->product->name }}" style="margin:0 auto;">
                    </div>
                    @empty
                    <div class="item active">
                      <img src="{{ asset("notfound.png") }}" alt="{{ $inv->product->name }}" style="margin:0 auto;">
                    </div>
                    @endforelse
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
	$(function() {
		$("#myImageCarousel").carousel({interval:false});
		$('.magnify-image').on('click', function(e) {
			$('#popOutImagePreview').modal('show');
		});
		$(window).ready(e => {
			setTimeout(function() {
				@if($shop)
				$.get('/fetch/shop/recommendedItems?shop={{ $shop->id }}').then(response => $('#recommendedItemsCon').html(response));
				@else
				$.get('/fetch/recommendedItems').then(response => $('#recommendedItemsCon').html(response));
				@endif
			}, 300);
		});
	});
</script>
@endsection