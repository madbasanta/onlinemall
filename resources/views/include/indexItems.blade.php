<section id="indexItems">
	<hr class="bg-dark">
	<div class="container">
		<h3 class="h4 font-weight-bold">Electronis <i class="fas fa-laptop text-info mb-3"></i></h3>
		<div class="row">
			@foreach(range(0, 11) as $i)
			<div class="col-lg-2 col-md-3 col-sm-4 col-6 p-2">
				<div class="card border-0 mb-3 b-e-h">
					<div class="card-body text-center p-0">
						<img class="img-fluid" src="https://picsum.photos/350/{{ 345 + $i }}" alt="item pic">
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
	<hr class="bg-dark">
	<div class="container">
		<h3 class="h4 font-weight-bold">Cloths <i class="fas fa-user text-info mb-3"></i></h3>
		<div class="row">
			@foreach(range(0, 11) as $i)
			<div class="col-lg-2 col-md-3 col-sm-6 col-6 p-2">
				<div class="card border-0 mb-3 b-e-h">
					<div class="card-body text-center p-0">
						<img class="img-fluid" src="https://picsum.photos/350/{{ 351 + $i }}" alt="item pic">
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
</section>