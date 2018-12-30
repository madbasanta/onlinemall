/* page from sidebar */
$(document).on('click', '#models-tree li a', function(e) {
	e.preventDefault();
	active_link(this.parentElement);
	location.replace(this.dataset.id);
	$.ajax({url: this.href}).then(resp => {
		$('#content-wrapper').html(resp);
	});
});

function active_link(el) {
	if(!el) return;
	if(!$(el).is('li')) el = el.closest('li');
	$(el).siblings('li').removeClass('active');
	el.className = 'active';
	let parent = el.closest('ul').closest('li');
	if(!parent) return;
	$(parent).siblings('li').removeClass('active');
	parent.className = 'active';
}

(function(url, id) {
	if(url.search('admin#mod') === -1) return;
	url = url.substring(url.search('admin#mod'));
	url = url.replace('admin#', '');
	let el = document.querySelector('[data-id="#'+ url +'"]');
	if(!el) return;
	active_link(el);
	url = url.split('-').join('/');
	$.ajax({url: '/admin/'+ url}).then(resp => {
		$('#content-wrapper').html(resp);
	});
})(location.href, '');

$('li', '.sidebar-menu').on('click', function(e) {
	$(this).siblings('li').removeClass('active');
	this.className = 'active';
});

function createNewTab(props) {
	let tab_holder = $('#mod-nav-tabs');
	let content_holder = $('#mod-tab-content');
	if(content_holder.has(props.divId).length) return;
	tab_holder.appendTab(props);
	content_holder.appnedContent(props);
	$.ajax('/admin/add/'+ props.mod).then(resp => $(props.divId).html(resp));
}

$(document).on('click', '.tab-closer', function(e) {
	$(this.dataset.content).remove();
	this.closest('li').remove();
	let res = $('#mod-nav-tabs li').not('.pull-right').last().find('a');
	$(res).tab('show');
});

$.fn.appendTab = function(props) {
	this.find('li.active').toggleClass('active');
	this.append(`
		<li class="active">
			<a data-toggle="tab" href="${props.divId}">
				<h3>${props.title} &nbsp; <i class="tab-closer fa" data-content="${props.divId}">&times;</i></h3>
			</a>
		</li>
	`);
	return this;
}

$.fn.appnedContent = function(props) {
	this.find('div.active.tab-pane').toggleClass('active');
	this.append(`
		<div id="${props.divId.replace('#', '')}" class="tab-pane fade in active">
			<div class="loading" style="height:400px"><span class="loader fa-spin"></span></div>
		</div>
	`);
	return this;
}

/*
	DYNAMIC FORM SUBMISSION
*/
$(document).on('submit', '#dynamicForm', function(e) {
	e.preventDefault();
	let form = this;
	$.post({url: form.action, data: new FormData(form), contentType: false, processData: false}).then(resp => {
		form.reset();
		$('#dynamicTable').ajaxReload();
	}, err => {
		if(err.status !== 422) return alert('Error ! Please contact support');
		return $(form).validationErrorHandler(err.responseJSON.errors);
	});
});

$.fn.ajaxReload = function () {
	this.DataTable().ajax.reload();
}

$.fn.validationErrorHandler = function(errors) {
	this.find('[name]').css('border', '1px solid #d2d6de').attr('title', '');
	for (let i in errors)
		this.find('[name="'+ i +'"]').css('border-color', 'brown').attr('title', errors[i][0]);
	return false;
}