<?php
$arr = json_decode($component->data, true);
?>
<div style="padding: 10px; background-color: #fff;">
	<h3 class="h4">
		Banner 
		<button class="btn btn-xs pull-right add-banner" type="button">
			&nbsp;&nbsp;<i class="fa fa-plus"></i>&nbsp; Add &nbsp;&nbsp;
		</button>
	</h3>
	<table id="bannerTable" class="table table-bordered">
		<tr>
			<th>SN</th>
			<th>File</th>
			<th class="text-center">Action</th>
		</tr>
		@forelse($arr as $data)
			<tr>
				<td width="50px">{{ $loop->iteration }}</td>
				<td>{{ $data }}</td>
				<td width="100px" class="text-center">
					<button class="btn btn-xs btn-default btn-preview" data-img="{{ url(str_replace('public/', 'storage/', $data)) }}" type="button">
						<i class="fa fa-eye"></i>
					</button> &nbsp;
					<button class="btn btn-xs btn-danger btn--remove" data-img="{{ $data }}" type="button">
						<i class="fa fa-close"></i>
					</button>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="3">
					<div class="text-center">
						No images found.
					</div>
				</td>
			</tr>	
		@endforelse
	</table>
</div>
<div id="banner-modal" class="modal"></div>
<script type="text/javascript">
	$('.add-banner').off('click').on('click', function(e) {
		$.get('admin/component/banner/add').then(resp => {
			$('#banner-modal').html(resp).modal('show');
		});
	});
</script>