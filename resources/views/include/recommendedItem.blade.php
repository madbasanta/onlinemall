<section id="recommendedItems">
	<hr class="bg-dark">
	<div class="container-fluid">
		<h3 class="h4">Recommended For Your <i class="fa fa-heart text-danger mb-3"></i></h3>
		<div class="row">
			@foreach(range(0, 5) as $i)
			<div class="col-lg-2 d-lg-block col-md-3 d-md-block col-sm-4 col-6 {{ $i > 3 ? 'd-none' : '' }}">
				<div class="card border-0 mb-3">
					<div class="card-body text-center p-0">
						<img class="img-fluid" src="https://picsum.photos/350/{{ 211 + $i }}" alt="item pic">
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