<section id="pasalGrid">
	<div class="mt-5"></div>
	<div>
		<section>
			<div class="container">
				<h1 class="h4 text-brown font-weight-bold text-center">Connected with us <i class="fa fa-handshake text-info mb-3"></i></h1>
			</div>
			<div id="pasalGridCarousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					@foreach(range(1, ceil($connectedShops->count() / 8)) as $j)
					<div class="carousel-item @if($loop->iteration === 1) active @endif">
						<div class="container xs">	
							<div class="row">
								@foreach($connectedShops->forPage($j, 8) as $i => $shop)
								<?php
									$cover = $shop->files->firstWhere('type', 'cover');
									$profile = $shop->files->firstWhere('type', 'profile');
								?>
								<div class="col-lg-3 col-md-3 col-sm-6 col-6 px-2">
									<a href="{{ url("pasal/{$shop->id}/" . str_slug($shop->name)) }}" class="card-link" style="color: unset;">
									<div class="card border-0 mb-3 b-e-h">
										<div class="card-body text-center p-0">
											<div class="b-e-h-c">
												<img class="img-fluid" src="{{ $profile?url("shopImage/{$profile->id}"):'/notfound.png' }}" alt="{{ $shop->name }}" style="max-height: 170px;">
											</div>
											<div>
												<p class="text-left m-2" style="line-height: 1.3em;height: 2.6em;overflow: hidden;">{{ $shop->name }}</p>
											</div>
										</div>
									</div>
									</a>
								</div>
								@endforeach
							</div>
						</div>
					</div>	
					@endforeach
				</div>
				<a class="carousel-control-prev" href="#pasalGridCarousel" role="button" data-slide="prev">
					<span class="fa fa-chevron-left text-info fa-lg" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#pasalGridCarousel" role="button" data-slide="next">
					<span class="fa fa-chevron-right text-info fa-lg" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</section>
	</div>
</section>