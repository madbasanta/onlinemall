<?php
$pasals = \App\Models\Pasal::find(json_decode($component->data, true));
?>

<div id="shopCarousel" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		@foreach($pasals as $i => $p)
		<li data-target="#shopCarousel" data-slide-to="{{ $i }}" @if($i === 0) class="active" @endif></li>
		@endforeach
	</ol>
	<div class="carousel-inner">
		@foreach($pasals as $pasal)
		<div class="carousel-item @if($loop->index === 0) active @endif">
			<img class="d-block w-100" src="https://picsum.photos/320/220" alt="First slide">
			<div class="carousel-caption d-none d-md-block">
			    <h5>{{ $pasal->name }}</h5>
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