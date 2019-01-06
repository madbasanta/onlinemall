<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header bg-primary">
			<div class="modal-title pull-left">
				<h3 class="h5 text-white m-0">{{ strtoupper(str_singular($mod)) }} - ADD</h3>
			</div>
			<span class="pull-right close text-white" data-dismiss="modal">&times;</span>
		</div>
		<div class="modal-body">
			{!! $form !!}
		</div>
	</div>
</div>