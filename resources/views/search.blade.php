@extends('layouts.master')

@section('title', 'Search results for '. $query)

@section('content')
<section>
	<div class="container">
		&nbsp;
		<div class="row">
			@forelse($shops as $shop)
			<?php
			$image = $shop->files->firstWhere('type', 'profile');
			?>
			<div class="col-md-3 mb-3">
				<a href="{{ url("pasal/{$shop->id}/". str_slug($shop->name) ."?". $query) }}" class="card-link" style="color: unset;">
				<div class="card">
					<div class="card-img text-center">
						<img src="{{ $image?url("shopImage/$image->id"):url('notfound.png') }}" alt="Image of {{ $shop->name }}" class="img-fluid" style="height: 220px;">
					</div>
					<div class="card-body">
						<p style="line-height: 1rem;height: 2rem;overflow: hidden;margin-bottom: 0;">
						<strong>{{ $shop->name }}</strong>
						</p>
					</div>
				</div>
				</a>
			</div>
			@empty
			<div class="col-md-12 mb-4">
				<div class="card p-3">Sorry, no match found.</div>
			</div>
			@endforelse
		</div>
	</div>
</section>
@endsection