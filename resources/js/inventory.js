function addItem() {
	let row = 1;
	$('.row[data-row]').each((i, elem) => {
		let current_row = parseInt($(elem).data('row'));
		row = current_row >= row ? ++current_row : row;
	});
	return `
	<div class="row" data-row="${row}">
		<div class="col-md-2">
			<div><label>Product</label></div>
		</div>
		<div class="col-md-10">
			<div class="form-group">
				<select name="inventory_id[${row}]" class="form-control invItem">
				</select>
			</div>
		</div>
		<div class="col-md-2">
			<div><label>Quantity</label></div>
		</div>
		<div class="col-md-10">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="number" name="qty[${row}]" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<div>
						<span class="btn itemRemove btn-xs btn-danger" title="Remove item from list">&nbsp;&times;&nbsp;</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	`;
}

$(document).on('click', '.itemRemove', function (e) {
	$(this).closest('.row[data-row]').remove();
});

$(document).on('submit', '#inventoryOrderForm', function (e) {
	e.preventDefault();
	$.post(this.action, $(this).serializeArray()).then(resp => {
		$('.modal').modal('hide');
		showStaticDetails(parseInt(this.dataset.id), 'inventories');
	}, err => {
		if (err.status === 422) return formValidationError(this, errors(err));
	});
});

$(document).on('submit', '#inventoryOrderEditForm', function (e) {
	e.preventDefault();
	$.post(this.action, $(this).serializeArray()).then(resp => {
		$('.modal').modal('hide');
		showStaticDetails(parseInt(this.dataset.id), this.dataset.mod || 'inventories');
	}, err => {
		if (err.status === 422) return formValidationError(this, errors(err));
	});
});

function errors(err) {
	return err.responseJSON.errros;
}

function formValidationError(form, errors) {
	$(form).validationErrorHandler(errors);
}

$(document).on('click', '.delete-order', function (e) {
	let id = $(this).closest('tr').data('id');
	$('#master_modal').modalSetting({
		classes: { 'modal-dialog': 'modal-sm', 'modal-header': 'bg-danger', 'modal-footer': 'p-10' },
		html: { 'modal-title h3': 'DELETE', 'modal-body': 'Are you sure you want to delete this?' },
		buttons: [{ text: 'Yes ! Delete', class: 'btn-danger delete-confirmed', data: { id } }]
	}).modal('show');
});

$(document).on('click', '.remove-order-inv', function (e) {
	let id = $(this).closest('tr').data('id');
	$('#master_modal').modalSetting({
		classes: { 'modal-dialog': 'modal-sm', 'modal-header': 'bg-danger', 'modal-footer': 'p-10' },
		html: { 'modal-title h3': 'DELETE', 'modal-body': 'Are you sure you want to remove this item?' },
		buttons: [{ text: 'Yes ! Delete', class: 'btn-danger delete-confirmed', data: { id } }]
	}).modal('show');
});

$(document).on('click', '.add-discount[data-id]', function (e) {
	let id = $(this).data('id');
	$('#discountModal').loader().modal('show');
	$.get('/admin/inventory/' + id + '/discount/add').then(response => {
		$('#discountModal').html(response);
	});
});
$(document).on('click', '.edit-discount[data-id]', function (e) {
	let id = $(this).data('id');
	let did = $(this).data('did');
	$('#discountModal').loader().modal('show');
	$.get('/admin/inventory/' + id + '/discount/' + did + '/edit').then(response => {
		$('#discountModal').html(response);
	});
});
$(document).on('click', '.cancel-discount', function (e) {
	let id = $(this).data('id');
	$('#master_modal').modalSetting({
		classes: { 'modal-dialog': 'modal-sm', 'modal-header': 'bg-danger', 'modal-footer': 'p-10' },
		html: { 'modal-title h3': 'Remove', 'modal-body': 'Are you sure you want to remove the discount?' },
		buttons: [{ text: 'Yes ! Remove', class: 'btn-danger remove-confirmed', data: { id } }]
	}).modal('show');
	// $('#discountModal').loader().modal('show');
	// $.get('/admin/inventory/' + id + '/discountRemove').then(response => {
	// 	$('#discountModal').html(response);
	// });
});

// inv discount form
$(document).on('submit', '#invDiscountForm', function (e) {
	e.preventDefault();
	let data = $(this).serializeArray();
	$(this).find('[name]:disabled').each(function() {
		data.push({ name: $(this).attr('name'), value: $(this).val() });
	});
	$.post(this.action, data).then(response => {
		$('#discountModal').modal('hide');
		showStaticDetails(parseInt($(this).data('id')), 'inventories');
	}, err => {
		if (err.status === 422) return formValidationError(this, errors(err));
		alert('Error ! Please contact support.');
	});
});


// orders

$(document).on('click', '#markShipped', function (e) {
	let id = $(this).data('id');
	$.post('/admin/orders/' + id + '/markShipped', { _token: $(this).data('token'), shipped: $(this).data('val') }).then(resp => {
		showStaticDetails(id, 'orders');
	});
});