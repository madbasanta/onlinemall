<?php
$arr = json_decode($component->data, true);
$keys = array_keys($arr);
?>
<div id="productCarousel" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		@foreach($keys as $i)
		<li data-target="#productCarousel" data-slide-to="{{ $i }}" @if($i === 0) class="active" @endif></li>
		@endforeach
	</ol>
	<div class="carousel-inner">
		@foreach($arr as $src)
		<div class="carousel-item @if($loop->index === 0) active @endif">
			<img class="d-block w-100" src="{{ asset(str_replace('public/', 'storage/', $src)) }}" alt="First slide" height="300">
		</div>
		@endforeach
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