<form action="/admin/create/{{ $mod }}" method="post" id="dynamicForm">
	@csrf
	<div style="padding: 20px">
		@foreach($fieldArray as $input => $options)
			<div class="row">
				<?php $set = isset($options['type']); $type = $set ? $options['type'] : 'text'; ?>
				@if($set && $type === 'password')
					<div class="col-md-2">
						<div class="form-group text-right">
							<label for="df_{{ $input }}">{{ isset($options['label']) ? $options['label'] : ucwords($input) }}</label>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<input id="df_{{ $input }}" type="password" name="{{ $input }}" class="form-control">						
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
								<input id="df_{{ $id }}" type="checkbox" name="{{ $input }}" value="{{ $id }}" class="minimal">
								<label for="df_{{ $id }}">&nbsp;{{ $label }}</label>
							@endforeach						
						</div>
					</div>
				@elseif($set && $type === 'select')
					<div class="col-md-2">
						<div class="form-group text-right">
							<label for="df_{{ $input }}">{{ isset($options['label']) ? $options['label'] : ucwords($input) }}</label>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<select name="{{ $input }}" id="df_{{ $input }}" class="form-control select2ini">
								@foreach($options['options'] as $id => $label)
									<option value="{{ $id }}">{{ $label }}</option>
								@endforeach
							</select>
						</div>
					</div>
				@else
					<div class="col-md-2">
						<div class="form-group text-right">
							{!! Form::label($input, isset($options['label']) ? $options['label'] : ucwords($input)) !!}
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							{!! Form::$type($input, null, ['class' => 'form-control']) !!}	
						</div>
					</div>
				@endif
			</div>
			@if(isset($options['validation']) && strpos($options['validation'], 'confirmed'))
			<div class="row">
				<div class="col-md-2">
					<div class="form-group text-right">
						<label for="df_{{ $input }}2">{{ isset($options['label']) ? $options['label'] : ucwords($input) }} Confirmation</label>
					</div>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<input id="df_{{ $input }}2" type="password" name="{{ $input }}_confirmation" class="form-control">			
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
    $('select').select2({
    	tags : true,
    	allowClear: true
    });
</script>