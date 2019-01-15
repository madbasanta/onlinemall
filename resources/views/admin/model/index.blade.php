<div class="box" style="margin-bottom: 0">
	<ul class="nav nav-tabs" id="mod-nav-tabs">
	  <li class="active">
	  	<a data-toggle="tab" href="#home"><h3>{{ title_case($model->getTable()) }}</h3></a>
	  </li>
	  @if($model->fields)
	  <li class="pull-right">
	  	<button class="btn btn-xs btn-success pull-right add-new-btn" type="button"
		data-mod="{{ $model->getTable() }}" style="margin: 10px;">
			&nbsp; <i class="fa fa-plus"></i> &nbsp; New &nbsp;
		</button>
	  </li>
	  @endif
	</ul>

	<div class="tab-content" id="mod-tab-content">
	  <div id="home" class="tab-pane fade in active">
	  	<div class="box-body">
			<table id="dynamicTable" class="table table-striped" style="width: 100%;">
				<thead>
					<tr>
						@foreach($model->heads as $key => $head)
						<th data-field="{{ $key }}">{{ $head }}</th>
						@endforeach
						<th data-field="actions" data-width="100">Actions</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
		<!-- /.box-body -->
	  </div>
	</div>
</div>

@include('admin.blueprint.master-modal')

<script type="text/javascript">
	$(function() {
		let dynamicTable = $('#dynamicTable');
		let columns = [];
		dynamicTable.find('thead tr th').each(function() {
			if(this.dataset.field)
				columns.push({data: this.dataset.field});
		});
		let table = dynamicTable.DataTable({
			ajax: "{{ admin_url('table') }}/getData?mod={{ $model->getTable() }}",
			columns,
			columnDefs: [{
				targets: -1,
				data: null,
				defaultContent: `<button class="btn btn-xs goto-details" type="button" title="View"><i class="fa fa-eye"></i></button>
					<button class="btn btn-xs btn-primary edit-row" type="button" title="Edit"><i class="fa fa-pencil"></i></button>
								<button class="btn btn-xs btn-danger delete-row" type="button" title="Delete"><i class="fa fa-times"></i></button>`
			}],
			createdRow: (row, data) => {row.dataset.id = data.id; row.dataset.mod = data.id;}
		});

		$(document).off('click', '.add-new-btn').on('click', '.add-new-btn', function(e) {
			addNewMod('{{ title_case(str_singular($model->getTable())) }}', '{{ $model->getTable() }}');
		});
		$(document).off('click', '.delete-confirmed').on('click', '.delete-confirmed', function(e) {
			e.preventDefault();
			deleteAction.call(this, table, '{{ $model->getTable() }}', '{{ csrf_token() }}');
		});
		$(document).off('click', '.edit-row').on('click', '.edit-row', function(e) {
			editAction.call(this, '{{ str_singular($model->getTable()) }}', '{{ $model->getTable() }}');
		});
		$(document).off('click', '.goto-details').on('click', '.goto-details', function(e) {
			let samePageTables = ['orders','inventories','pasals','discounts'];
			let currentTable = '{{ $model->getTable() }}';
			if(samePageTables.indexOf(currentTable) === -1)
				showDetails(this, '{{ $model->getTable() }}');
			else showStaticDetails(this, '{{ $model->getTable() }}');
		})
	});
</script>