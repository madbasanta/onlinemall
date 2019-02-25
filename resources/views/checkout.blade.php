@extends('layouts.master')

@section('title', config('app.name').' | Checkout')

@section('content')

<section id="checkout" class="my-4">
	<div class="container">
		<div>
			<div class="row">
				<div class="col-md-6">
					<div class="text-right">
						<img src="/favicon.png" alt="logo" width="100px" class="img-thumbnail">
					</div>
				</div>
				<div class="col-md-6">
					<h2 style="line-height: 2em;">{{ config('app.name') }}</h2>
				</div>
			</div>
			<p class="text-center">
				Thank you for being with us. Fill the form below with your details. We will contact you as soon as possible.
			</p>
		</div>
		<div>
			<div class="row">
		        <div class="col-md-5 order-md-2 mb-4">
		          <h4 class="d-flex justify-content-between align-items-center mb-3">
		            <span class="text-muted">Your cart</span>
		            <a class="badge badge-secondary badge-pill" href="{{ url('cart') }}">
		            	<i class="fa fa-shopping-cart"></i>
		            	<span class="cart-text">0</span>
		            </a>
		          </h4>
		          <ul class="list-group mb-3" id="cartItemList">
		           
		          </ul>

		          <form class="card p-2">
		            <div class="input-group">
		              <input type="text" class="form-control" disabled="" placeholder="Promo code">
		              <div class="input-group-append">
		                <button type="submit" class="btn btn-secondary" disabled="">Redeem</button>
		              </div>
		            </div>
		          </form>
		        </div>
		        <div class="col-md-7 order-md-1">
		          <h4 class="mb-3">Shipping Information</h4>
		          <?php
			          $name = explode(' ', Auth::user()->name);
			          $last_name = array_pop($name);
			          $first_name = sizeof($name) > 0 ? implode(' ', $name) : $last_name;
		          ?>
		          <form class="needs-validation" novalidate="" action="{{ url('checkout') }}" method="post">
		          	@csrf
		          	@if(session('warning'))
		          		<div class="alert alert-warning">
		          			<span class="text-danger">{{ session('warning') }}</span>
		          		</div>
		          	@endif
		            <div class="row">
		              <div class="col-md-6 mb-3">
		                <label for="firstName">First name</label>
		                <input name="first_name" type="text" class="{{ $errors->has('first_name')?'is-invalid':'is-valid' }} form-control" id="firstName" value="{{ $first_name }}" required="">
		                <div class="invalid-feedback">
		                  Valid first name is required.
		                </div>
		              </div>
		              <div class="col-md-6 mb-3">
		                <label for="lastName">Last name</label>
		                <input name="last_name" type="text" class="{{ $errors->has('last_name')?'is-invalid':'is-valid' }} form-control" id="lastName" value="{{ $last_name }}" required="">
		                <div class="invalid-feedback">
		                  Valid last name is required.
		                </div>
		              </div>
		            </div>

		            <div class="row">
		            	<div class="col-md-6">
		            		<div class="mb-3">
		            		  <label for="email">Email</label>
		            		  <input name="email" type="email" class="{{ $errors->has('email')?'is-invalid':'is-valid' }} form-control" id="email" value="{{ Auth::user()->email }}" required="">
		            		  <div class="invalid-feedback">
		            		    Please enter a valid email address for shipping updates.
		            		  </div>
		            		</div>
		            	</div>
		            	<div class="col-md-6">
		            		<div class="mb-3">
		            		  <label for="phone">Phone</label>
		            		  <input name="phone" type="number" class="{{ $errors->has('phone')?'is-invalid':'' }} form-control" id="phone" value="" required="">
		            		  <div class="invalid-feedback">
		            		    Please enter a valid phone number.
		            		  </div>
		            		</div>
		            	</div>
		            </div>

		            <div class="mb-3">
		              <label for="address">Address</label>
		              <input name="add1" type="text" class="{{ $errors->has('add1')?'is-invalid':'' }} form-control" id="address" placeholder="" required="">
		              <div class="invalid-feedback">
		                Please enter your shipping address.
		              </div>
		            </div>

		            <div class="mb-3">
		              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
		              <input name="add2" type="text" class="{{ $errors->has('add2')?'is-invalid':'' }} form-control" id="address2" placeholder="">
		            </div>

		            <div class="row">
		              <div class="col-md-6 mb-3">
		                <label for="city">City</label>
		                <input name="city" list="cityList" type="text" class="{{ $errors->has('city')?'is-invalid':'' }} form-control" id="city" placeholder="Choose...">
		                <div class="invalid-feedback">
		                  Please enter a valid city.
		                </div>
		              </div>
		              <datalist id="cityList">
		              	<option>Kathmandu</option>
		              	<option>Bhaktapur</option>
		              	<option>Lalitpur</option>
		              </datalist>
		              <div class="col-md-6 mb-3">
		                <label for="country">Country</label>
		                <input name="country" list="countryList" type="text" class="{{ $errors->has('country')?'is-invalid':'' }} form-control" id="country" placeholder="Choose...">
		                <div class="invalid-feedback">
		                  Please select a valid country.
		                </div>
		              </div>
		              <datalist id="countryList">
		              	<option>Nepal</option>
		              </datalist>
		              <div class="col-md-3 mb-3">
		                <label for="state">State</label>
		                <select name="state" class="custom-select d-block w-100" id="state">
		                  <option value="">Choose...</option>
		                  <option value="1">1</option>
		                  <option value="2">2</option>
		                  <option value="3">3</option>
		                  <option value="4">4</option>
		                  <option value="5">5</option>
		                  <option value="6">6</option>
		                </select>
		                <div class="invalid-feedback">
		                  Please provide a valid state.
		                </div>
		              </div>
		              <div class="col-md-3 mb-3">
		                <label for="zip">Zip</label>
		                <input name="zip" type="text" class="form-control " id="zip" list="zipList">
		                <div class="invalid-feedback">
		                  Zip code required.
		                </div>
		              </div>
		              <datalist id="zipList">
		              	<option>44600</option>
		              </datalist>
		              <!--div class="col-md-12">
		              	<div id="map" style="height: 400px;"></div>
		              </div-->
		            </div>
		            <hr class="mb-4">
		            <div class="custom-control custom-checkbox">
		              <input type="checkbox" class="{{ $errors->has('') }}custom-control-input" id="save-info">
		              <label class="custom-control-label" for="save-info">Save this information for next time</label>
		            </div>
		            <hr class="mb-4">
		            <div id="formInv"></div>
		            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
		          </form>
		        </div>
		    </div>
		</div>
		<hr class="stylish-hr mt-5 mb-5">
	</div>
</section>

@endsection

@section('script')
<script>
	function cartItem(item) {
		return `<li class="list-group-item d-flex justify-content-between lh-condensed">
	              <div>
	                <h6 class="my-0">${item.name}</h6>
	                <small class="text-muted">
						${item.currency_code}.&nbsp;${item.price} 
						&nbsp; x &nbsp;
						${item.qty}
	                </small>
	              </div>
	              <span class="text-muted">${item.currency_code}.&nbsp;${item.total}</span>
	            </li>`
	}
	((cart, quantities) => {
		$.get('/cart/items', { cart }).then(response => {
			let container = $('#cartItemList').empty();
			let totalDiscount = 0;
			let totalAmount = 0;
			response.forEach(function(element, index) {
				let amount = 0;
				element.qty = quantities[element.id] || 1;
				if(element.discount) {
					amount = element.discount.is_amount ? parseFloat(element.discount.amount) : ((element.discount.percent * element.price) / 100);
						totalDiscount += element.qty * amount;
				} 
				totalAmount += element.price * element.qty;
				element.price -= amount;
				element.name = element.product.name;
				element.total = element.price * element.qty;
				element.sn = index + 1;
				element.currency_code = element.currency ? element.currency.code : 'Rs';
				container.append(cartItem(element));
				$('#formInv').append(
					`<input type="hidden" name="inventory_id[]" value="${element.id}">
					<input type="hidden" name="qty[]" value="${element.qty}">`
				);
			});
			container.append(`
				<li class="list-group-item d-flex justify-content-between">
				  <span>Total (NRS)</span>
				  <strong>Rs.&nbsp;${totalAmount - totalDiscount}</strong>
				</li>
			`);
			$('#totalDiscount').text('Rs. '+ totalDiscount);
			$('#totalAmount').text('Rs. '+ (totalAmount - totalDiscount));
		});
	})(localStorage.getItem('cart') || '[]', JSON.parse(localStorage.getItem('quantities') || '{}'))
	function initMap() {
		let map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 27.7172, lng: 85.3240},
          zoom: 13
        });
        let marker = new google.maps.Marker({
        	map, position: {lat: 27.6644, lng: 85.3188}
        });
        // listen for click on map
        google.maps.event.addListener(map, 'click', event => {
        	let marker = new google.maps.Marker({
	        	map, position: event.latlng
	        }); 
        });
	}
</script>
<!--script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcqXuR65sn729h07D9e6-o1E_SmNyhkHg&callback=initMap"
    async defer></script-->
@endsection