<form action="/admin/{{ $model->id ? 'update' : 'create' }}/{{ $table_name = $model->getTable() }}/{{ $model->id }}" method="post" 
	id="dynamicForm{{ request()->has('redirect') && request()->redirect == 'false' ? $model->getTable() : '' }}"
	@if(request()->has('redirect') && request()->redirect == 'false') class="dynamicForm" @endif>
	@csrf
	<div style="padding: 20px">
		@foreach($fieldArray as $input => $options)
			<div class="row">
				<?php $set = isset($options['type']); $type = $set ? $options['type'] : 'text'; ?>
				@if($set && $type === 'password')
					<div class="col-md-2">
						<div class="form-group text-right">
							<label for="df_{{ $table_name }}{{ $input }}">{{ isset($options['label']) ? $options['label'] : ucwords($input) }}</label>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<input id="df_{{ $table_name }}{{ $input }}" type="password" name="{{ $input }}" class="form-control">						
						</div>
					</div>
				@elseif($set && $type === 'checkbox')
					<div class="col-md-2">
						<div class="form-group text-right">
							<label>{{ isset($options['label']) ? $options['label'] : ucwords($input) }}</label>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							@foreach($options['options'] as $id => $label)
								<input id="df_{{ $table_name }}{{ $id }}" type="checkbox" name="{{ $input }}" value="{{ $id }}" class="minimal" 
								@if($model->$input === $id || stripos($model->$input, $label) !== false) checked="checked"  @endif>
								<label for="df_{{ $table_name }}{{ $id }}">&nbsp;{{ $label }}</label>
							@endforeach						
						</div>
					</div>
				@elseif($set && $type === 'select')
					<div class="col-md-2">
						<div class="form-group text-right">
							<label for="df_{{ $table_name }}{{ $input }}">{{ $label = isset($options['label']) ? $options['label'] : ucwords($input) }}</label>
						</div>
					</div>
					@php $putButton = isset($options['select2']); @endphp
					<div class="col-md-8">
						<div class="form-group">
							<select name="{{ $input }}" id="df_{{ $table_name }}{{ $input }}" class="form-control @if($putButton) select2ini @endif" 
								@if($putButton)
									@foreach($options['select2'] as $d => $v)
										data-{{ $d }}="{{ $v }}"
									@endforeach
								@endif>
								@foreach($options['options'] as $id => $text)
									<option value="{{ $id }}" selected="selected">{{ $text }}</option>
								@endforeach
							</select>
						</div>
					</div>
					@if($putButton)
					<div class="col-md-2">
						<div class="form-group">
							<button class="btn btn-default btn-flat add-new-modal" type="button" 
							data-target="#df_{{ $table_name }}{{ $input }}" title="Add new {{ $label }}">
								<i class="fa fa-plus"></i>
							</button>
						</div>
					</div>
					@endif
				@else
					<div class="col-md-2">
						<div class="form-group text-right">
							{!! Form::label($input, isset($options['label']) ? $options['label'] : ucwords($input)) !!}
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							{!! Form::$type($input, $model->$input, ['class' => 'form-control']) !!}	
						</div>
					</div>
				@endif
			</div>
			@if(isset($options['validation']) && strpos($options['validation'], 'confirmed'))
			<div class="row">
				<div class="col-md-2">
					<div class="form-group text-right">
						<label for="df_{{ $table_name }}{{ $input }}2">{{ isset($options['label']) ? $options['label'] : ucwords($input) }} Confirmation</label>
					</div>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<input id="df_{{ $table_name }}{{ $input }}2" type="password" name="{{ $input }}_confirmation" class="form-control">			
					</div>
				</div>
			</div>
			@endif
		@endforeach
		<div class="row">
			<div class="col-md-10 col-md-offset-2">
				<div>
					<button class="btn btn-sm btn-success" type="submit"> &nbsp; &nbsp; Save &nbsp; &nbsp; </button>
				</div>
			</div>
		</div>
	</div>
</form>

<script type="text/javascript">
	$('input[type="checkbox"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue'
    });
    $('select.select2ini').each(function() {
    	let that = $(this);
    	let url = '/admin/getOptions/'+ that.data('table');
    	let params = {
    		id: that.data('id'),
    		text: that.data('text')
    	};
    	that.select2({
	    	tags : true,
	    	ajax: {
	    		url, data: query => ({query: query.term, id: params.id, text: params.text}),
	    		processResults: results => ({ results })
	    	}
	    });
    });
    $('select').not('.select2ini').select2();
    $('.add-new-modal').off('click').on('click', function(e) {
    	let id = this.dataset.target;
    	let that = $(id);
    	if(!that.data('table')) return;
    	$('#cModal').loader().modal('show');
    	$.get('/load/sub-form/'+ that.data('table') + '?redirect=false').then(form => $('#cModal').html(form));
    });
    $(function() {
    	$('textarea').each(function() {
    		if(this.id) CKEDITOR.replace(this.id)
    	});
    });
</script>