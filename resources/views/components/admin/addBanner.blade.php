<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header bg-primary">
			<div class="modal-title pull-left">
				BANNER - ADD
			</div>
			<button class="close pull-right" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
			<form action="/admin/component/banner/store" method="post" id="banner-form">
				@csrf
				<div class="form-group">
					<label>File</label>
					<input type="file" name="file[]" multiple="multiple">
				</div>
				<div>
					<button class="btn btn-sm btn-success" type="submit">
						<i class="fa fa-upload"></i>
						&nbsp; &nbsp; Upload &nbsp; &nbsp;
					</button>
				</div>
			</form>
		</div>
	</div>
</div>