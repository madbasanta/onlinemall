<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header bg-primary">
			<div class="modal-title pull-left">MANAGE INVENTORIES</div>
			<button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
			<form action="/admin/inventory/order/update/{{ $order->id }}" 
			@if(request()->has('inv_id')) data-id="{{ request()->inv_id }}" @else data-id="{{ $order->id }}" data-mod="orders" @endif 
			id="inventoryOrderEditForm">
				@csrf
				<input type="hidden" name="o_type" value="{{ request()->has('inv_id')?'required':'notrequired' }}">
				<div class="row">
					<div class="@if(!request()->has('inv_id')) hidden @endif col-md-12">
						<div><h5 style="margin-top: 0">Order Information</h5></div>
						{{-- <div>&nbsp;</div> --}}
					</div>
					<div class="@if(!request()->has('inv_id')) hidden @endif col-md-2">
						<div class="text-right">
							<label for="oerderInv">Order For</label>
						</div>
					</div>
					<div class="@if(!request()->has('inv_id')) hidden @endif col-md-10">
						<div class="form-group">
							<select name="name" id="oerderInv" class="form-control">
								<option value="{{ $order->first_name.' '.$order->last_name }}" data-email="">Select</option>
								@foreach($users as $user)
								<option value="{{ $user->name }}" data-email="{{ $user->email }}">
									{{ $user->name }}
								</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="@if(!request()->has('inv_id')) hidden @endif col-md-2">
						<div class="text-right">
							<label for="userEmail">Email</label>
						</div>
					</div>
					<div class="@if(!request()->has('inv_id')) hidden @endif col-md-10">
						<div class="form-group">
							<input type="email" name="email" class="form-control" id="userEmail" value="{{ $order->email }}">
						</div>
					</div>
					@if($address)
					<div class="@if(!request()->has('inv_id')) hidden @endif col-md-2">
						<div class="text-right">
							<label for="add1">Address1</label>
						</div>
					</div>
					<div class="@if(!request()->has('inv_id')) hidden @endif col-md-10">
						<div class="form-group">
							<input type="text" name="add1" id="add1" class="form-control" value="{{ $address->add1 }}">
						</div>
					</div>
					<div class="@if(!request()->has('inv_id')) hidden @endif col-md-2">
						<div class="text-right">
							<label for="add2">Address2</label>
						</div>
					</div>
					<div class="@if(!request()->has('inv_id')) hidden @endif col-md-10">
						<div class="form-group">
							<input type="text" name="add2" id="add2" class="form-control" value="{{ $address->add2 }}">
						</div>
					</div>
					<div class="@if(!request()->has('inv_id')) hidden @endif col-md-2">
						<div class="text-right">
							<label for="city">City</label>
						</div>
					</div>
					<div class="@if(!request()->has('inv_id')) hidden @endif col-md-5">
						<div class="form-group">
							<input type="text" name="city" id="city" class="form-control" value="{{ $address->city }}">
						</div>
					</div>
					<div class="@if(!request()->has('inv_id')) hidden @endif col-md-2">
						<div class="text-right">
							<label for="zip">Zip</label>
						</div>
					</div>
					<div class="@if(!request()->has('inv_id')) hidden @endif col-md-3">
						<div class="form-group">
							<input type="text" name="zip" id="zip" class="form-control" value="{{ $address->zip }}">
						</div>
					</div>
					<div class="@if(!request()->has('inv_id')) hidden @endif col-md-2">
						<div class="text-right">
							<label for="country">Country</label>
						</div>	
					</div>
					<div class="@if(!request()->has('inv_id')) hidden @endif col-md-5">
						<div class="form-group">
							<input type="text" name="country" id="country" class="form-control" value="{{ $address->country }}">
						</div>
					</div>
					<div class="@if(!request()->has('inv_id')) hidden @endif col-md-2">
						<div class="text-right">
							<label for="state">State</label>
						</div>
					</div>
					<div class="@if(!request()->has('inv_id')) hidden @endif col-md-3">
						<div class="form-group">
							<input type="text" name="state" id="state" class="form-control" value="{{ $address->state }}">
						</div>
					</div>
					@endif
					<div class="col-md-12" id="inventoryInformation">
						<div>
							<hr style="margin: 0">
							<h5 class="clearfix">Inventory Information 
								<span id="addItem" class="btn btn-xs btn-default pull-right" title="Add more item"><i class="fa fa-plus"></i></span>
							</h5>
						</div>
						@foreach($inventories as $inventory)
						<div class="row" data-row="1">
							<div class="col-md-2">
								<div><label for="invItem">Product</label></div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<select name="inventory_id[{{ $loop->iteration }}]" id="invItem" class="form-control">
										@if($product = $inventory->product)
										<option value="{{ $inventory->id }}">{{ $product->name }}</option>
										@endif
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div><label for="invQty">Quantity</label></div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input type="number" name="qty[{{ $loop->iteration }}]" id="invQty" class="form-control"
									value="{{ $inventory->pivot->quantity }}">
								</div>
							</div>
							<div class="col-md-4">
								<div>
									<span class="btn itemRemove btn-xs btn-danger" title="Remove item from list">&nbsp;&times;&nbsp;</span>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="col-md-10 col-md-offset-2">
						<div>
							<button class="btn btn-sm btn-success"> &nbsp; &nbsp; Save &nbsp; &nbsp; </button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(function() {
		$('#oerderInv').on('change', function(event) {
			let index = this.selectedIndex;
			let option = this.options[index];
			$('#userEmail').val(option.dataset.email);
		}).select2({ tags: true });
		// inv item select2
		$('#invItem').select2();

		// add new item row
		$('#addItem').off('click').on('click', function(e) {
			$('#inventoryInformation').append(addItem());

			$('.invItem').select2({
				ajax: { 
					url: '/admin/static/getOptions/products', data: param => param,
					processResults: results => ({ results }) 
				}
			});
		});
	});
</script>