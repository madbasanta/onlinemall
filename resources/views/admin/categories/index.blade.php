@extends('admin.blueprint.blueprint')
@section('content')
<div class="box">
	<div class="box-header">
		<h3 class="box-title">Data Table With Full Features</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="categoriesTable" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Code</th>
					<th>Is Sub</th>
					<th>Actions</th>
				</tr>

			</thead>
			<tbody>
				@foreach($categories as $category)
				<tr>
					<td>{{ $category->name }}</td>
					<td>{{ $category->code }}</td>
					<td>{{ $category->is_sub }}</td>
					<td>
						<div>
							<button type="button" class="btn btn-xs" >
								<i class="fa fa-edit text-primary"></i>
							</button>
							<button type="button" class="btn btn-xs" >
								<i class="fa fa-times text-danger" ></i>
							</button>
						</div>
					</td>
					
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>Name</th>
					<th>Code</th>
					<th>Is Sub</th>
					<th>Actions</th>
				</tr>
			</tfoot>
		</table>
	</div>
	<!-- /.box-body -->
</div>
@endsection

@section('script')
<script>
	$('#categoriesTable').DataTable();
</script>
@endsection