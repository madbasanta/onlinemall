@extends('layouts.master')

@section('title', $title)
@section('description', $desc)
@section('keywords', implode(',', explode(' ', $desc)))

@section('content')
@if($shop->id)
<?php
	$cover = $shop->files->firstWhere('type', 'cover');
	$image = $cover ? 'style="background: url('.url("shopImage/{$cover->id}").') no-repeat bottom;background-size: 100% auto;"':null;
	$profile = $shop->files->firstWhere('type', 'profile');
?>
<section>
	<div class="container">
		<div class="row" {!! $image?:'' !!}>
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<div class="pasal-cover-parent">
					<div class="pasal-cover clearfix">
						<div class="pasal-image-cover">
							{{-- image/pasal_image/b65c44ca08ecb0d6f25edee8deb0b02c.jpeg --}}
							<img src="{{ $profile?url("shopImage/{$profile->id}"):asset('notfound.png') }}" alt="{{ $shop->name }}" class="img-fluid">
						</div>
						<div class="pasal-detail-cover">
							<h1 class="h5 text-uppercase">
								{{ $shop->name }} 
								@if($shop->verified_at)
								&nbsp; &nbsp;
								<span class="small text-capitalize">
									<i class="fa fa-check-circle text-success"></i>
									Verified
								</span>
								@endif
							</h1>
							<div>
								<i class="fa fa-map-marker-alt text-info" style="width: 20px"></i>
								{!! $shop->getAddress() !!}
							</div>
							{{-- <div>
								<i class="fa fa-mobile-alt text-info" style="width: 20px;"></i>
								4654654, 5646464
							</div> --}}
							<div>
								&nbsp; &nbsp; &nbsp;
								@foreach(range(1, 5) as $i)
									<i class="fa fa-star text-orange"></i>
								@endforeach
								{{-- ({{ random_int(5, 35) }} votes) --}}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-2"></div>
		</div>
	</div>
</section>
@endif
<section class="pasal-category my-3">
	<div class="container">
		<div class="row">
			@foreach($shop->categories as $cat)
			<div class="col-sm-3 mb-3">
				<div class="bg-white text-center rounded py-3">
					<div><i class="fa fa-box"></i></div>
					{{ $cat->name }}
				</div>
			</div>
			@endforeach
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
						<form action="{{ url('search') }}">
							<div class="form-group">
								<input type="search" name="keyword" placeholder="Search Product..." class="form-control form-control-sm outline-none">
							</div>
							<div class="form-group">
								@foreach($shop->cats as $i => $cat)
									<div class="custom-control custom-checkbox mr-sm-2">
							        	<input name="categories[]" type="checkbox" class="custom-control-input" id="pasal-cat{{ $i }}" value="{{ $cat->id }}">
							        	<label class="custom-control-label" for="pasal-cat{{ $i }}">
							        		{{ $cat->name }}
							        	</label>
							        </div>
								@endforeach
							</div>
							<div class="form-group">
								Price
								<div class="row">
									<div class="col-5">
										<div class="form-group">
											<input type="number" step="100" min="0" class="form-control form-control-sm outline-none" name="min" 
											placeholder="Min">
										</div>
									</div>
									<div class="col-2"><div class="text-center">-</div></div>
									<div class="col-5">
										<div class="form-group">
											<input type="number" step="100" min="0" class="form-control form-control-sm outline-none" name="max" 
											placeholder="Max">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="div">
											<input type="hidden" name="shop" value="{{ $shop->id }}">
											<button class="btn btn-block btn-outline-success">Search</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="row" id="searchResults">
					
				</div>
			</div>
		</div>
	</div>
</section>

<section id="related-products">
	<div class="container">
		<hr class="bg-dark">
		<h3 class="h4">Other products from <a href="{{ url("pasal/{$shop->id}") }}">{{ $shop->name }}</a> <i class="fa fa-heart text-danger mb-3"></i></h3>
		<section id="recommendedItemsCon"></section>
	</div>
</section>
@endsection

@section('script')
<script>
	
	$(window).ready(e => {
		let url = location.href.split('?');
		if(1 in url) {
			$.post('{{ url('search') }}?'+url[1], {_token: '{{ csrf_token() }}'}).then(resp => $('#searchResults').html(resp));
		} else {
			$.post('{{ url('search') }}?shop={{ $shop->id }}', {_token: '{{ csrf_token() }}'}).then(resp => $('#searchResults').html(resp));
		}

		setTimeout(function() {
			$.get('/fetch/shop/recommendedItems?shop={{ $shop->id }}').then(response => $('#recommendedItemsCon').html(response));
		}, 300);
	});

</script>
@endsection