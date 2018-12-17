@extends('layouts.master')

@section('title', 'shop name')
@section('description', 'shop description')
@section('keywords', implode(',', explode(' ', 'shop description')))

@section('content')
<section>
	<div class="container">
		<div class="row" style="background: url(https://picsum.photos/1024/512) no-repeat;background-size: 100% auto;">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<div class="pasal-cover-parent">
					<div class="pasal-cover clearfix">
						<div class="pasal-image-cover">
							<img src="{{ asset('image/pasal_image/b65c44ca08ecb0d6f25edee8deb0b02c.jpeg') }}" alt="shop logo" class="img-fluid">
						</div>
						<div class="pasal-detail-cover">
							<h1 class="h5 text-uppercase">
								FANTECH NePAL &nbsp; &nbsp;
								<span class="small text-capitalize">
									<i class="fa fa-check-circle text-success"></i>
									Verified
								</span>
							</h1>
							<div>
								<i class="fa fa-map-marker-alt text-info" style="width: 20px"></i>
								kathmandu, bagmati
							</div>
							<div>
								<i class="fa fa-mobile-alt text-info" style="width: 20px;"></i>
								4654654, 5646464
							</div>
							<div>
								&nbsp; &nbsp; &nbsp;
								@foreach(range(1, random_int(1, 5)) as $i)
									<i class="fa fa-star text-orange"></i>
								@endforeach
								({{ random_int(5, 35) }} votes)
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-2"></div>
		</div>
	</div>
</section>
<section class="pasal-category my-3">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="bg-white text-center rounded py-3">
					<div><i class="fa fa-box"></i></div>
					Cloths
				</div>
			</div>
			<div class="col-sm-3">
				<div class="bg-white text-center rounded py-3">
					<div><i class="fa fa-box"></i></div>
					Electrical
				</div>
			</div>
			<div class="col-sm-3">
				<div class="bg-white text-center rounded py-3">
					<div><i class="fa fa-box"></i></div>
					Shoes
				</div>
			</div>
			<div class="col-sm-3">
				<div class="bg-white text-center rounded py-3">
					<div><i class="fa fa-box"></i></div>
					Sticker
				</div>
			</div>
		</div>
	</div>
</section>
<section class="pasal-products">
	<div class="container">
		<hr class="m-0 mb-3">
		<div class="row">
			<div class="col-sm-4">
				<div class="p-3 bg-white">
					<div>
						<h1 class="h5">FILTERS</h1>
						<form action="javascript:void(0)">
							<div class="form-group">
								<input type="search" placeholder="Search Product..." class="form-control form-control-sm outline-none">
							</div>
							<div class="form-group">
								@foreach(range(1, 4) as $i)
									<div class="custom-control custom-checkbox mr-sm-2">
							        	<input type="checkbox" class="custom-control-input" id="pasal-cat{{ $i }}">
							        	<label class="custom-control-label" for="pasal-cat{{ $i }}">Category {{ $i }}</label>
							        </div>
								@endforeach
							</div>
							<div class="form-group">
								Price
								<div class="row">
									<div class="col-5">
										<div>
											<input type="number" step="100" min="0" class="form-control form-control-sm outline-none" 
											placeholder="Min">
										</div>
									</div>
									<div class="col-2"><div class="text-center">-</div></div>
									<div class="col-5">
										<div>
											<input type="number" step="100" min="0" class="form-control form-control-sm outline-none"
											placeholder="Max">
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="row">
					@foreach(range(0, 7) as $i)
					<div class="col-lg-3 col-md-3 col-sm-6 col-6 px-2">
						<div class="card border-0 mb-3 b-e-h">
							<div class="card-body text-center p-0">
								<div class="b-e-h-c">
									<img class="img-fluid" src="https://picsum.photos/400/{{ 350 + $i }}" alt="item pic">
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
		</div>
	</div>
</section>
@include('include.recommendedItem')
@endsection