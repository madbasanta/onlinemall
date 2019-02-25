<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header clearfix bg-primary">
			<div class="modal-title pull-left">SETTINGS - EDIT</div>
			<span class="close pull-right" data-dismiss="modal">&times;</span>
		</div>
		<div class="modal-body">
			<form action="/admin/site-settings/{{ $setting->id }}/update" id="EditSettingsForm">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<label for="settingCode">Code</label>
						<input type="text" name="code" value="{{ $setting->code }}" id="settingCode" class="form-control">
					</div>
					<div class="col-md-6">
						<label for="settingValue">Value</label>
						<input type="text" name="value" value="{{ $setting->value }}" id="settingValue" class="form-control">
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

<script>
	$(function() {
		$('#EditSettingsForm').off('submit').on('submit', function(e) {
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
				}
			});
		});
	});
</script>