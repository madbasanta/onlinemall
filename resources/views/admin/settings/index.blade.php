<div class="panel">
	<div class="panel-body">
		<h4 class="clearfix">
			Settings <i class="fa fa-cogs"></i> 
			<span class="btn btn-primary btn-xs pull-right" id="addSetting">
				<i class="fa fa-plus"></i> Add
			</span>
		</h4>
		<div>
			<table class="table table-sm table-striped">
				<thead>
					<tr>
						<th style="width: 50px;">SN</th>
						<th>Code</th>
						<th>Value</th>
						<th style="width: 100px;">Action</th>
					</tr>
				</thead>
				<tbody>
					@forelse($settings as $setting)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $setting->code }}</td>
						<td>{{ $setting->value }}</td>
						<td>
							<span class="btn btn-xs btn-default editActionButton" data-id="{{ $setting->id }}">
								<i class="fa fa-edit"></i> Edit
							</span>
							&nbsp; &nbsp;
							<span class="btn btn-xs btn-danger deleteActionBtn" data-id="{{ $setting->id }}">
								<i class="fa fa-times"></i>
							</span>
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="4" style="text-align: center;">No data found.</td>
					</tr>
					@endforelse
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4" id="pagination">{!! $settings->links() !!}</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<div class="modal" id="addSettingModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header clearfix bg-primary">
				<div class="modal-title pull-left">SETTINGS - ADD</div>
				<span class="close pull-right" data-dismiss="modal">&times;</span>
			</div>
			<div class="modal-body">
				<form action="/admin/site-settings/store" id="SettingsForm">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<label for="settingCode">Code</label>
							<input type="text" name="code" id="settingCode" class="form-control">
						</div>
						<div class="col-md-6">
							<label for="settingValue">Value</label>
							<input type="text" name="value" id="settingValue" class="form-control">
						</div>
					</div>
					<hr>
					<div>
						<button class="btn btn-success" style="padding: 3px 15px;">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(function () {
		$('#addSetting').off('click').on('click', function(e) {
			$('#addSettingModal').modal('show');
		});
		$('#SettingsForm').off('submit').on('submit', function(e) {
			e.preventDefault();
			$.post(this.action, $(this).serializeArray()).then(resp => {
				$('.modal').modal('hide');
				$('#content-wrapper').html(resp);
			}, err => {
				if(err.status === 422) {
					$(this).find('[name]').css('border', '1px solid #eee');
					for(let i in err.responseJSON.errors) {
						$(this).find('[name="'+ i +'"]').css('border', '1px solid brown');
					}
				} else {
					alert(
						'Something went wrong.'+
						'\nCannot create or update setting.'+
						'\nPlease contact support.'
					);
				}
			});
		});
		$('.editActionButton').off('click').on('click', function(e) {
			$('#addSettingModal').loader().show();
			$.get('/admin/site-settings/'+ this.dataset.id +'/edit').then(resp => $('#addSettingModal').html(resp));
		});
		$('.deleteActionBtn').off('click').on('click', function(e) {
			if(!confirm('Are you sure you want to delete it?')) return;
			let _token = $('[name="csrf-token"]').attr('content');
			$.post('/admin/site-settings/'+ this.dataset.id +'/delete', { _token })
			.then(resp => $('#content-wrapper').html(resp));
		});
		$('#pagination .pagination a').off('click').on('click', function(e) {
			e.preventDefault();
			$.get(this.href).then(resp => $('#content-wrapper').html(resp));
		});
	});
</script>