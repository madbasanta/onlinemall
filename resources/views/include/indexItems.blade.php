<section id="indexItems">
	<div class="mt-5"></div>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 pr-4">
				<h3 class="h4 font-weight-bold text-brown text-center">Electronis <i class="fas fa-laptop text-info mb-3"></i></h3>
				<div class="row">
					@foreach(range(0, 3) as $i)
					<div class="col-lg-6 col-md-6 col-sm-6 col-6 p-2">
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
			<div class="col-sm-6 pl-4">
				<h3 class="h4 font-weight-bold text-brown text-center">Cloths <i class="fas fa-user text-info mb-3"></i></h3>
				<div class="row">
					@foreach(range(0, 3) as $i)
					<div class="col-lg-6 col-md-6 col-sm-6 col-6 p-2">
						<div class="card border-0 mb-3 b-e-h">
							<div class="card-body text-center p-0">
								<div class="b-e-h-c">
									<img class="img-fluid" src="https://picsum.photos/410/{{ 351 + $i }}" alt="item pic">
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