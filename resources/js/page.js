
(function(path){
	let length = path.search('#component-');
	if(length === -1) return;
	let url = path.substring(length);
	let element = $('[data-id="'+ url +'"]');
	url = url.split('-').join('/').replace('#', '/');
	let container = $('#content-wrapper');
	if(element.length) active_link(element.parent()[0]);
	$.get('/admin'+ url).then(resp => container.html(resp));
})(window.location.href);

/* component from sidebar */
$(document).on('click', '#pages-tree li a', function(e) {
	e.preventDefault();
	active_link(this.parentElement);
	location.replace(this.dataset.id);
	$('#content-wrapper').loader('height:400px;');
	$.ajax({url: this.href}).then(resp => {
		$('#content-wrapper').html(resp);
	});
});

$(document).on('submit', '#banner-form', function(e) {
	e.preventDefault();
	let form = this;
	$.post({
		url: form.action,
		data: new FormData(form),
		contentType: false,
		processData: false
	}).then(resp => {
		$('#banner-modal').modal('hide');
		$('#content-wrapper').html(resp);
	});
});

$(document).on('click', '.btn-preview', function(e) {
	e.preventDefault();
	let path = this.dataset.img;
	let name = path.substring(path.lastIndexOf('/') + 1);
	let body = `
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body p-0">
					<img src="${path}" class="img-responsive" />
				</div>
			</div>
			<div style="color: #fff;">${name}</div>
		</div>
	`;
	$('#banner-modal').html(body).modal('show');
});

$(document).on('click', '.btn--remove', function(e) {
	e.preventDefault();
	let decision = confirm('Are you sure you want to remove this file?');
	if(!decision) return;
	let _token = $('meta[name="csrf-token"]').attr('content');
	$.post('/admin/component/banner/remove', { path : this.dataset.img, _token }).then(resp => {
		$('#content-wrapper').html(resp);
	});
});

/*
	PASAL
*/
$(document).on('submit', '#component-pasal', function(e) {
	e.preventDefault();
	let form = this;
	$.post({
		url: form.action,
		data: $(form).serializeArray()
	}).then(resp => {
		$('#pasal-modal').modal('hide');
		$('#content-wrapper').html(resp);
	});
});
$(document).on('click', '.pasal-remove', function(e) {
	let decision = confirm('Are you sure you want to remove this pasal ?');
	if(!decision) return;
	let _token = $('meta[name="csrf-token"]').attr('content');
	$.post('/admin/component/pasals/remove', { id: $(this).data('id'), _token }).then(resp => {
		$('#content-wrapper').html(resp);
	});
});


