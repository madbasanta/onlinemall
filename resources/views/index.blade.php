@extends('layouts.master')
@section('title', 'Home')
@section('keywords', 'flash sale,nepal shopes,shopes,items,discount,offer,top shopes of nepal,top shopes nepal top shopes')
@section('content')
<section id="product-slider" style="position: relative;">
	<div id="productCarousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#productCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#productCarousel" data-slide-to="1"></li>
			<li data-target="#productCarousel" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="https://picsum.photos/1024/256" alt="First slide" height="300">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="https://picsum.photos/1024/256" alt="Second slide" height="300">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="https://picsum.photos/1024/256" alt="Third slide" height="300">
			</div>
		</div>
		<a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
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
	<section class="item-category" style="position: absolute; bottom: 10px;left: 0;width: 100%;">
		<div class="container" style="position: relative;">
			<div style="position: absolute;left: 0;bottom: 0px;">
				<button class="btn btn-sm bg-white px-4 cat-toggler">
					Categories &nbsp;<i class="fa fa-chevron-down fa-sm"></i>
				</button>
				<div style="position: absolute;z-index: 99;display: none;bottom: 0px;left: 101%;width: 200px;font-size: 0.7875rem;" class="bg-white ic">
					<div class="row">
						@foreach(range(0, 8) as $i)
						<div class="col-sm-12 pt-1 clearfix">
							<div class="ml-2 mb-2 category-tog" data-target="cat__{{ $i }}">Main Category {{ $i }}<i class="fa fa-chevron-right float-right mr-2 fa-sm mt-1"></i></div>
						</div>
						@endforeach
					</div>
					@foreach(range(0, 8) as $j)
					<div style="position: absolute;bottom: 0;left: 101%;top: 0;width: 450px;display: none;" class="bg-white pr-2 cat-c cat__{{ $j }}">
						<h1 class="h5 mt-2 ml-2">Main Category {{ $j }}</h1>
						<div class="row">
							@foreach(range(0, $j) as $i)
							<div class="col-md-4 px-1">
								<div class="ml-3 mb-2 mr-2 pointer">&nbsp; Sub Category {{ $i . ' - ' . $j }}</div>
							</div>
							@endforeach
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
</section>
<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<div class="p-2 mt-3" id="offered-products">
					<h3 class="h5 text-brown font-weight-bold">Offered Products</h3>
					<hr class="m-0 bg-brown">
					<div class="row">
						@foreach(range(0, 3) as $i)
						<div class="col-lg-12 col-md-12 col-sm-6 col-12">
							<div class="card mt-3 offered-card border-0">
								<div class="card-body">
									<div class="float-left"><img src="https://picsum.photos/256/256" alt="picsum" class="img-fluid"></div>
									<div class="float-left pl-2">
										<?php $offer = rand(5, 20); $price = rand(100, 9999); ?>
										<h6 class="h6 clamp" data-lines="2">Title of product goes here it could be this mush long</h6>
										<div style="color: rgb(255,87,51);">
											Rs.&nbsp;{{ $price * ((100 - $offer)/100) }} &nbsp; 
											<del class="text-muted d-lg-inline d-md-none">Rs. {{ $price }}</del>
										</div>
									</div>
								</div>
								<div class="offer">{{ $offer }}%</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="p-2 mt-3">
					<section>
						<div id="shopCarousel" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								@foreach(range(0, 15) as $i)
								<li data-target="#shopCarousel" data-slide-to="{{ $i }}" @if($i === 0) class="active" @endif></li>
								@endforeach
							</ol>
							<div class="carousel-inner">
								@foreach(range(0, 15) as $j)
								<div class="carousel-item @if($j === 0) active @endif">
									<img class="d-block w-100" src="https://picsum.photos/320/220" alt="First slide">
									<div class="carousel-caption d-none d-md-block">
									    <h5>Pasal name goes here with ratings</h5>
									    <p>
									    	@foreach(range(0, rand(0, 4)) as $i)
									    	<i class="fa fa-star text-orange"></i>
									    	@endforeach
									    </p>
									  </div>
								</div>
								@endforeach
							</div>
							<a class="carousel-control-prev" href="#shopCarousel" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#shopCarousel" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</section>
				</div>
			</div>
			<div class="col-md-3">
				<div class="p-2 mt-3" id="top-pasals">
					<h3 class="h5 text-brown font-weight-bold">Top Shops</h3>
					<hr class="m-0 bg-brown">
					<div class="row">
						@foreach(range(0, 3) as $i)
						<div class="col-lg-12 col-md-12 col-sm-6 col-12">
							<div class="card mt-3 border-0">
								<div class="card-body">
									<div class="float-left"><img src="https://picsum.photos/300/300" alt="picsum" class="img-fluid"></div>
									<div class="float-left pl-2">
										<h6 class="h6 m-0 clamp" data-lines="2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel deserunt quas necessitatibus obcaecati, veritatis quis.</h6>
										<div>
											@foreach(range(0, rand(0, 4)) as $i)
											<i class="fa fa-star text-orange"></i>
											@endforeach
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@include('include.pasalsGrid')
@include('include.indexItems')
@include('include.recommendedItem')
@endsection

@section('script')
<script>
	$(document).on('click', '.cat-toggler', function(e) {
		let that = $(this);
		let thatIcon = that.find('i.fa');
		that.siblings('div.ic').toggle(400, function(){
			if(thatIcon.hasClass('fa-chevron-down'))
				thatIcon.addClass('fa-chevron-up').removeClass('fa-chevron-down');
			else {
				thatIcon.addClass('fa-chevron-down').removeClass('fa-chevron-up');
				$('div.cat-c').hide();
				$('.category-tog').find('i.fa').addClass('fa-chevron-right').removeClass('fa-chevron-down');
			}
		});
	});
	$(document).ready(function() {
		$('.category-tog').off('hover').hover(function(e) {
			let that = $(this);
			let target = that.data('target');
			that.parent().siblings('.clearfix').find('div.category-tog i.fa').removeClass('fa-chevron-down').addClass('fa-chevron-right');
			that.find('i.fa').removeClass('fa-chevron-right').addClass('fa-chevron-down');
			$('.' + target).siblings('div.cat-c').hide().end().show();
		}, function(e) {
			let that = $(this);
			let target = that.data('target');
			$('.' + target).off('mouseleave').on('mouseleave', function(e) {
				$(this).hide();
			});
		});
	});
	$('div.ic').off('mouseleave').on('mouseleave', function() {
		that = $(this);
		that.find('div.cat-c').hide();
		$('.category-tog').find('i.fa').addClass('fa-chevron-right').removeClass('fa-chevron-down');
	});
</script>
@endsection