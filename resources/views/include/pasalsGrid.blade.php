<section id="pasalGrid">
	<hr class="bg-dark">
	<div class="container-fluid">
		<section>
			<div id="pasalGridCarousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					@foreach(range(0, 4) as $j)
					<div class="carousel-item @if($j === 0) active @endif">
						
						<div class="row">
							@foreach(range(0, 7) as $i)
							<div class="col-lg-3 col-md-4 col-sm-6 col-12">
								<div class="card border-0 mb-3">
									<div class="card-body text-center p-0">
										<img class="img-fluid" src="https://picsum.photos/320/{{ 200 + $i }}" alt="falano pasal image">
										<div><p style="line-height: 1rem;" class="clamp mt-3 p-1 text-left" data-lines="2">Pasal name Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, dicta.</p></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						
					</div>
					@endforeach
				</div>
				<!--a class="carousel-control-prev" href="#pasalGridCarousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#pasalGridCarousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a-->
			</div>
		</section>
	</div>
</section>