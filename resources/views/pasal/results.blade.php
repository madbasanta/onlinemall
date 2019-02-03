@forelse($products as $i => $product)
<div class="col-lg-3 col-md-3 col-sm-6 col-6 px-2">
	<a href="{{ url("product/{$product->id}") }}" style="color: unset;" class="card-link">
	<div class="card border-0 mb-3 b-e-h">
		<div class="card-body text-center p-0">
			<div class="b-e-h-c" style="height: 150px;text-align: center;">
				<img class="img-fluid" src="{{ $product->files->first()?'/inventoryImage/'.$product->files->first()->id:'/notfound.png' }}" alt="{{ $product->product->name??'' }}" style="max-height: 150px;">
			</div>
			<div class="text-left px-1">
				<p style="line-height: 2rem;height: 32px;overflow: hidden;" class=" mt-3">
					{{ $product->product->name??'' }}
				</p>
				<p style="line-height: 1rem;" class="text-danger font-weight-bold">
					{{ $product->currency->code??'Rs' }}.&nbsp;{{ $product->getCurrenctPrice() }} &nbsp;
					@if($product->discount)
					<del class="text-muted">{{ $product->currency->code??'Rs' }}.&nbsp;{{ $product->price }}</del>
					@endif
				</p>
			</div>
		</div>
	</div>
	</a>
</div>
@empty
<div class="col-12">
	<div class="card p-3">No result match.</div>
</div>
@endforelse