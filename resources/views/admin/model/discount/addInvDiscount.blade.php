<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header bg-primary">
			<div class="modal-title pull-left">DISCOUNT - ADD</div>
			<button class="close pull-right" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
			<form action="/admin/inventory/{{ $inventory->id }}/discount/store" data-id="{{ $inventory->id }}" id="invDiscountForm">
				@csrf
				<table class="table" style="margin-bottom: 0;">
					<tr>
						<td width="100px">Product</td>
						<td width="10px">:</td>
						<th>{{ $inventory->product->name }}</th>
					</tr>
					<tr>
						<td width="100px">Current Price</td>
						<td width="10px">:</td>
						<th>{{ $inventory->currency->code ?? '' }} {{ $inventory->price }}</th>
					</tr>
					<tr>
						<td width="100px">Stock</td>
						<td width="10px">:</td>
						<th>{{ $inventory->quantity ?? 0 }}</th>
					</tr>
					<tr>
						<td width="100px">Dis. Name</td>
						<td width="10px">:</td>
						<td>
							<div>
								<!-- <input type="text" name="discount_name" class="form-control form-control-sm discountName" style="height: 28px;"> -->
								<select name="discount_name" id="discountName" class="form-control form-control-sm"></select>
							</div>
						</td>
					</tr>
					<tr>
						<td width="100px">Dis. Type</td>
						<td width="10px">:</td>
						<td>
							<div>
								<label><input type="radio" name="discount_type" value="1">&nbsp; Amount</label> &nbsp;&nbsp;&nbsp;&nbsp;
								<label><input type="radio" name="discount_type"  value="0">&nbsp; Percent</label>
							</div>
						</td>
					</tr>
					<tr>
						<td width="100px">Dis. Value</td>
						<td width="10px">:</td>
						<td>
							<div>
								<input type="number" name="discount_value" id="discount_value" class="form-control form-control-sm" style="width: 100px;height: 28px;">
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2" width="110px">&nbsp;</td>
						<td>
							<div>
								<button class="btn btn-success" style="padding: 3px 20px">Save</button>
							</div>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>

<script>
	$(() => {
		$('#discountName').select2({
			tags: true, 
			ajax : {
				url: '/admin/static/discounts',
				data: query => ({ query }),
				processResults(results) {
					return { results };
				}
			}
		}).on('select2:select', e => {
			let data = e.params.data;
			$('#discount_value, [name="discount_type"]').prop('disabled', true);
			if(data.is_amount === 0) {
				$('#discount_value').val(data.percent);
			} else if (data.is_amount === 1) {
				$('#discount_value').val(data.amount);
			} else {
				$('#discount_value').val(0);
				$('[name="discount_type"]').prop('checked', false);
				$('#discount_value, [name="discount_type"]').prop('disabled', false);
			}
			$('[name="discount_type"][value="'+ data.is_amount +'"]').prop('checked', true);
		});
	});
</script>