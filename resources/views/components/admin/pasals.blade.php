<div style="padding: 10px; background-color: #fff;">
	<h3 class="h4">
		Pasal 
		<button class="btn btn-xs pull-right add-pasal" type="button">
			&nbsp;&nbsp;<i class="fa fa-plus"></i>&nbsp; Add &nbsp;&nbsp;
		</button>
	</h3>
	<table id="bannerTable" class="table table-bordered">
		<tr>
			<th>SN</th>
			<th>Pasal</th>
			<th class="text-center">Action</th>
		</tr>
		@forelse($pasals as $pasal)
			<tr>
				<td width="50px">{{ $loop->iteration }}</td>
				<td>{{ $pasal->name }}</td>
				<td width="100px" class="text-center">
					<button class="btn btn-xs btn-danger pasal-remove" data-id="{{ $pasal->id }}" type="button">
						<i class="fa fa-close"></i>
					</button>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="3">
					<div class="text-center">
						No pasal found.
					</div>
				</td>
			</tr>	
		@endforelse
	</table>
</div>
<div id="pasal-modal" class="modal"></div>
<script type="text/javascript">
	$('.add-pasal').off('click').on('click', function(e) {
		$.get('admin/component/pasals/add').then(resp => {
			$('#pasal-modal').html(resp).modal('show');
		});
	});
</script>