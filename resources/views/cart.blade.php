@extends('layouts.master')

@section('title', config('app.name').' | Cart')

@section('content')

<section id="shopping-cart" class="mt-3">
	<div class="container">
		@if(session('success'))
		<div class="alert alert-success">
			<span class="alert-success">{{ session('success') }}</span>
		</div>
		@endif
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
				<tbody class="text-muted cartBody">
					
				</tbody>
				<tfoot>
					<tr>
						<td colspan="3"></td>
						<td>Discount</td>
						<td id="totalDiscount">Rs 0</td>
					</tr>
					<tr>
						<td colspan="3"></td>
						<td>Grand Total</td>
						<td id="totalAmount">Rs 0</td>
					</tr>
				</tfoot>
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

@section('script')
<script>
	function trData(data) {
		return `<tr>
					<td>${data.sn}</td>
					<td>${data.name}</td>
					<td class="text-center">
						<input type="text" class="form-control form-control-sm text-center cartItemQty" data-item="${data.id}" style="width: 40px" value="${data.qty}">
					</td>
					<td>${data.currency_code}.&nbsp;${data.price}</td>
					<td>${data.currency_code}.&nbsp;${data.total}</td>
					<td>
						<span class="btn btn-sm removeCartItem" data-item="${data.id}" title="Remove this item from cart"><i class="fa fa-times"></i></span>
					</td>
				</tr>`
	}
	$(window).ready(e => {
		if($('.alert.alert-success').length > 0) {
			localStorage.removeItem('cart');
			localStorage.removeItem('quantities');
		}
		loadCartItemsOnCart();
	});
	$(document).off('click', '.removeItemConfirmed').on('click', '.removeItemConfirmed', function(e) {
		e.preventDefault();
		let cart = localStorage.getItem('cart') || '[]';
		let item = this.dataset.id;
		cart = JSON.parse(cart).filter(curr => curr != item);
		localStorage.setItem('cart', JSON.stringify(cart));
		$('#master_modal').modal('hide');
		loadcartInfo();
		loadCartItemsOnCart();
	});
	$(document).off('click', '.removeCartItem').on('click', '.removeCartItem', function(e) {
		e.preventDefault();
		let id = this.dataset.item;
		$('#master_modal').modalSetting({
			classes: { 'modal-dialog': 'modal-md', 'modal-header': 'bg-danger', 'modal-footer': 'p-10 justify-content-between' },
			html: { 'modal-title h3': 'ITEM - REMOVE', 'modal-body': 'Are you sure you want to remove this item?' },
			buttons: [
				{ text: 'Yes ! Remove', class: 'btn-danger removeItemConfirmed" data-id="' + id},
				{ text: 'Cancel', class: 'btn-default" data-dismiss="modal' }
			]
		}).modal('show');
	});
	function loadCartItemsOnCart() {
		let cart = localStorage.getItem('cart') || '[]';
		let quantities = JSON.parse(localStorage.getItem('quantities') || '{}');
		$.get('/cart/items', { cart }).then(response => {
			let container = $('.cartBody').empty();
			let totalDiscount = 0;
			let totalAmount = 0;
			response.forEach(function(element, index) {
				element.qty = quantities[element.id] || 1;
				if(element.discount) {
					let amount = element.discount.is_amount ? parseFloat(element.discount.amount) : ((element.discount.percent * element.price) / 100);
					totalDiscount += element.qty * amount;
				} 
				totalAmount += element.price * element.qty;
				element.name = element.product.name;
				element.total = element.price * element.qty;
				element.sn = index + 1;
				element.currency_code = element.currency ? element.currency.code : 'Rs';
				container.append(trData(element));
			});
			$('#totalDiscount').text('Rs. '+ totalDiscount);
			$('#totalAmount').text('Rs. '+ (totalAmount - totalDiscount));
			if(response.length === 0) {
				$('#shopping-cart .container').html(`
					<div style="min-height:400px;display:flex;">
						<span style="margin:auto;">
						No items in cart. &nbsp; <a href="{{ url('/') }}">Keep Shopping.</a>
						</span>
					</div>
				`);
			}
		});
	}
	$(document).off('blur', '.cartItemQty').on('blur', '.cartItemQty', function(e) {
		let quantities = JSON.parse(localStorage.getItem('quantities') || '{}');
		quantities[this.dataset.item] = Math.round(Math.abs(this.value));
		localStorage.setItem('quantities', JSON.stringify(quantities));
		loadCartItemsOnCart();
	});
</script>
@endsection