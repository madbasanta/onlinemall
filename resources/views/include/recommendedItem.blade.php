<section id="recommendedItems">
	<div class="mt-5"></div>
	<div class="container">
		<h3 class="h6 text-center text-muted">We understand your choices !</h3>
		<h3 class="h4 text-brown text-center">Recommended For Your <i class="fa fa-heart text-danger mb-3"></i></h3>
		<div class="row">
			@foreach(range(0, 5) as $i)
			<div class="col-lg-2 col-md-3 d-md-block col-sm-4 col-6 {{ $i > 3 ? 'd-none' : '' }} px-2">
				<div class="card border-0 mb-3 b-e-h">
					<div class="card-body text-center p-0">
						<div class="b-e-h-c">
							<img class="img-fluid" src="https://picsum.photos/350/{{ 345 + $i }}" alt="item pic">
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
</section>