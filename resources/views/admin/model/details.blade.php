<div>
	<div class="row">
		<div class="col-md-4">
			@foreach($fieldArray as $key => $data)
			<?php if($key === 'password') continue; ?>
				<table class="table">
					<tr>
						<th width="40%">{{ isset($data['label']) ? $data['label'] : ucwords($key) }}</th>
						<td>{{ $data['options'][$model->$key] ?? $model->$key }}</td>
					</tr>
				</table>
			@endforeach
		</div>
	</div>
</div>

{{-- <div class="col-md-4">
	<div class="row">
		<div class="col-md-5">
			<div class="text-right form-group">{{ isset($data['label']) ? $data['label'] : ucwords($key) }}</div>
		</div>
		<div class="col-md-7">
			<div style="font-weight: bold">{{ isset($data['options'][$model->$key]) ? $data['options'][$model->$key] : $model->$key }}</div>
		</div>
	</div>
</div> --}}