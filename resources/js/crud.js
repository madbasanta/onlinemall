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
	let btn = url.split('-');
	let el_url = btn[0]+ '-' +btn[1];
	let el = document.querySelector('[data-id="#'+ el_url +'"]');
	if(!el) return;
	active_link(el);
	url = el_url.split('-').join('/');
	$.ajax({url: '/admin/'+ url}).then(resp => {
		$('#content-wrapper').html(resp);
		if(2 in btn) {
			$(window).ready(function() {
				showDetails(parseInt(btn[2]), btn[1]);
			});
		}
	});
})(location.href, '');

$('li', '.sidebar-menu').on('click', function(e) {
	$(this).siblings('li').removeClass('active');
	this.className = 'active';
});

function createNewTab(props, callback = '') {
	let tab_holder = $('#mod-nav-tabs');
	let content_holder = $('#mod-tab-content');
	if(content_holder.has(props.divId).length) return;
	tab_holder.appendTab(props);
	content_holder.appnedContent(props);
	if(props.hasOwnProperty('ajax') && props.ajax === false) {
		if(typeof callback === 'function') return callback(props);
		else return false; 
	}
	$.ajax('/admin/add/'+ props.mod).then(resp => $(props.divId).html(resp));
}

$(document).on('click', '.tab-closer', function(e) {
	destroyTab(this);
});

function destroyTab(closer) {
	$(closer.dataset.content).remove();
	closer.closest('li').remove();
	let res = $('#mod-nav-tabs li').not('.pull-right').last().find('a');
	$(res).tab('show');
}

$.fn.appendTab = function(props) {
	this.find('li.active').toggleClass('active');
	this.append(`
		<li class="active">
			<a data-toggle="tab" href="${props.divId}">
				<h3><span id="${props.titleId}">${props.title}</span> &nbsp; 
				<i class="tab-closer fa" data-content="${props.divId}">&times;</i></h3>
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
$.fn.loader = function() {
	let loader = '<div class="loading" style="height:100px;margin-top: 200px;">\
	                <span class="loader fa-spin"></span>\
	            </div>\
	            <div>\
	                <h4 class="text-center text-white">Loading</h4>\
	            </div>';
	return this.html(loader);
}

/*
	DYNAMIC FORM SUBMISSION
*/
$(document).on('submit', '#dynamicForm', function(e) {
	e.preventDefault();
	let form = this;
	$.post({url: form.action, data: new FormData(form), contentType: false, processData: false}).then(resp => {
		let that = $('#mod-nav-tabs li.active a .tab-closer');
		if(that.length) destroyTab(that[0]);
		$('#dynamicTable').ajaxReload();
	}, err => {
		if(err.status !== 422) return alert('Error ! Please contact support');
		return $(form).validationErrorHandler(err.responseJSON.errors);
	});
});

$(document).on('submit', '.dynamicForm', function(e) {
	e.preventDefault();
	let form = this;
	$.post({url: form.action, data: new FormData(form), contentType: false, processData: false}).then(resp => {
		$('#cModal').modal('hide');
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
	this.find('[name]').siblings('.select2-container').find('.select2-selection').css('border', '1px solid #d2d6de');
	for (let i in errors) {
		this.find('[name="'+ i +'"]').css('border-color', 'brown').attr('title', errors[i][0]);
		this.find('[name="'+ i +'"]').siblings('.select2-container').find('.select2-selection')
		.css('cssText','border-color: brown !important;');
	}
	return false;
}

$(document).on('click', '.delete-row', function(e) {
	let id = this.closest('tr').dataset.id;

	$('#master_modal').modalSetting({
		classes: {'modal-dialog' : 'modal-sm', 'modal-header' : 'bg-danger', 'modal-footer' : 'p-10'},
		html: {'modal-title h3' : 'DELETE', 'modal-body' : 'Are you sure do you want to delete this?'},
		buttons : [{text: 'Yes ! Delete', class: 'btn-danger delete-confirmed', data: {id}}]
	}).modal('show');
});

$.fn.modalSetting = function(options = {}) {
    if(options.classes) {
        for (let i in options.classes) {
            this.find('.' + i).addClass(options.classes[i]);
        }
    }
    if(options.buttons) {
        let modal_footer = this.find('.modal-footer');
        modal_footer.children().not('[data-dismiss]').remove();
        for (let b in options.buttons) {
            let btn = options.buttons[b];
            let datas = '';
            if(btn.data)
            	for(let i in btn.data)
            		datas += `data-${i}="${btn.data[i]}"`;
            modal_footer.append(`
            	<button${btn.id?` id="${btn.id}" `:' '}type="${(btn.type || 'button')}" 
            	${ datas } 
            	class="btn btn-sm ${btn.class}">${btn.text}</button>
            `);
        }
    }
    if(options.html) {
        for (let h in options.html) {
            this.find('.' + h).html(options.html[h]);
        }
    }
    return this;
}

function addNewMod(single, table) {
	createNewTab({
		divId: '#createnewmod',
		title: 'Add New ' + single,
		mod: table
	});
}

function deleteAction(table, table_name, token) {
	let id = this.dataset.id;
	$.post('/admin/delete/'+table_name+'/'+ id, {'_token': token}).then(resp => {
		table.ajax.reload();
		if(resp.error === 0) alert(resp.message);
		$('#master_modal').modal('hide');
	}, err => {
		alert('Error ! Please contact support.');
	});
}

function editAction(single, table) {
	let id = this.closest('tr').dataset.id;
	createNewTab({
		divId: '#edit-mod-'+ id,
		title: 'Loading '+ single +'...',
		ajax: false,
		titleId: 'edit-mod-title-' +id
	}, function(props) {
		$.get('/admin/editOne/'+ table +'/'+ id).then(resp => {
			$('#'+ props.titleId).html(resp.title);
			$(props.divId).html(resp.body);
		}, err => alert('Error ! Please contact support.'));					
	});
}

function showDetails(btn, table) {
	let id = typeof btn === 'number' ? btn : btn.closest('tr').dataset.id;
	let loc = '#mod-'+ table +  '-' + id;
	location.replace(loc);
	createNewTab({
		divId: '#details-mod-'+ id,
		title: 'Loading # '+id+' ...',
		ajax: false,
		titleId: 'details-mod-title-'+id
	}, function(props) {
		$.get('/admin/mod/'+ table +'/'+ id).then(resp => {
			$('#'+ props.titleId).html(resp.title);
			$(props.divId).html(resp.body);
		}, err => alert('Error ! Please contact support.'));
	});
} 
function showStaticDetails (btn,table) {
	let id = typeof btn ==='number' ? btn : btn.closest('tr').dataset.id;
	let loc = '#mod-'+table+'-'+id;
	location.replace(loc);


	 (function(props) {
		$.get('/admin/static/'+ table +'/'+ id).then(resp => {
			$('#content-wrapper').html(resp);
		}, err => alert('Error ! Please contact support.'));
	})();


}