<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header bg-primary">
			<div class="modal-title pull-left">PASAL - ADD</div>
			<button class="close pull-right" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
			<form action="/admin/component/pasals/store" id="component-pasal" method="post">
				@csrf
				<div class="form-group">
					<label>Pasals</label>
					<select multiple="multiple" id="pasals-select" name="pasals[]"></select>
				</div>
				<div>
					<button class="btn btn-sm btn-success" type="submit">
						&nbsp; &nbsp;
						Save
						&nbsp; &nbsp;
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#pasals-select').select2({
		width: '100%',
		placeholder: 'Multiple choice allowed',
		ajax: { url: '/admin/component/pasals/list', processResults : results => ({ results }) }
	});
</script>