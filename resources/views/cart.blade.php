@extends('layouts.master')

@section('title', config('app.name').' | Cart')

@section('content')

<section id="shopping-cart" class="mt-3">
	<div class="container">
		<h3 class="text-muted">Cart <i class="fa fa-shopping-cart"></i></h3>
		<div>
			<table class="table">
				<thead>
					<tr>
						<th>S.N.</th>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody class="text-muted">
					<tr>
						<td>1</td>
						<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, rerum.</td>
						<td class="text-center">
							<input type="text" class="form-control form-control-sm text-center" style="width: 40px" value="2">
						</td>
						<td>Rs 5,000</td>
						<td>Rs 10,000</td>
						<td>
							<span class="btn btn-sm" title="Remove this item from cart"><i class="fa fa-times"></i></span>
						</td>
					</tr>
					<tr><td colspan="6"></td></tr>
					<tr>
						<td colspan="3"></td>
						<td>Discount</td>
						<td>Rs 2,000</td>
					</tr>
					<tr>
						<td colspan="3"></td>
						<td>Grand Total</td>
						<td>Rs 8,000</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="mt-3 mb-5">
			<a href="/checkout" class="btn btn-block outline-none btn-outline-success">
				Check Out
			</a>
		</div>
	</div>
</section>

@endsection