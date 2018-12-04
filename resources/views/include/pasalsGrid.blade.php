<section id="pasalGrid">
	<div class="mt-5"></div>
	<div>
		<section>
			<div class="container">
				<h1 class="h4 text-brown font-weight-bold text-center">Connected with us <i class="fa fa-handshake text-info mb-3"></i></h1>
			</div>
			<div id="pasalGridCarousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					@foreach(range(0, 0) as $j)
					<div class="carousel-item @if($j === 0) active @endif">
						<div class="container xs">	
							<div class="row">
								<div class="row">
								@foreach(range(0, 7) as $i)
								<div class="col-lg-3 col-md-3 col-sm-6 col-6 px-2">
									<div class="card border-0 mb-3 b-e-h">
										<div class="card-body text-center p-0">
											<div class="b-e-h-c">
												<img class="img-fluid" src="https://picsum.photos/320/{{ 200 + $i }}" alt="falano pasal image">
											</div>
											<div>
												<p class="p-2 clamp text-left m-0" data-lines="2" style="line-height: 1rem;">Pasal name Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, dicta.</p>
											</div>
										</div>
									</div>
								</div>
								@endforeach
								</div>
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