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
			<table id="dynamicTable" class="table table-bordered" style="width: 100%;">
				<thead>
					<tr>
						@foreach($model->heads as $key => $head)
						<th data-field="{{ $key }}">{{ $head }}</th>
						@endforeach
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
<script type="text/javascript">
	$(function() {
		let dynamicTable = $('#dynamicTable');
		let columns = [];
		dynamicTable.find('thead tr th').each(function() {
			columns.push({data: this.dataset.field});
		});
		dynamicTable.DataTable({
			ajax: "{{ admin_url('table') }}/getData?mod={{ $model->getTable() }}",
			columns
		});

		$(document).off('click', '.add-new-btn').on('click', '.add-new-btn', function(e) {
			createNewTab({
				divId: '#createnewmod',
				title: 'Add New {{ title_case(str_singular($model->getTable())) }}',
				mod: '{{ $model->getTable() }}'
			});
		});
	});
</script>