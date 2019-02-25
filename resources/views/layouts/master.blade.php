<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="<?= $__env->yieldContent('description'); ?>">
	<meta name="keywords" content="Online Mall,Online Shopping,<?= $__env->yieldContent('keywords'); ?>">
	<meta name="author" content="<?= $__env->yieldContent('author'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>
	<link rel="icon" type="image/png" href="{{ url('favicon.png') }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/all.css') }}">
	@yield('style')
</head>
<body>
	@include('layouts.nav')
	@yield('content')
	@include('layouts.footer')
	@include('layouts.master_modal')
	<div class="modal" id="cartItemModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body text-center">
					<button type="button" class="close" style="position: absolute;right: 20px;"
					data-dismiss="modal">&times;</button>
					1 item added to your cart.
				</div>
			</div>
		</div>
	</div>
	<div class="modal" id="loginModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<div class="row justify-content-center">
						<div class="col-sm-8">
							<form action="/login">
								<div class="form-group">
									<input type="text" name="email" class="form-control" placeholder="Email address...">
								</div>
								<div class="form-group">
									<input type="password" name="password" class="form-control">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ asset('js/app.js') }}"></script>
	@yield('script')
	<script>
		$(document).off('click', '.putInCartByNow').on('click', '.putInCartByNow', function(e) {
			e.preventDefault();
			safelyPutInCart.call(this);
			location.href = '/cart';
		});
		$(document).off('click', '.putInCart').on('click', '.putInCart', function(e) {
			e.preventDefault(); e.stopPropagation();
			safelyPutInCart.call(this);
			$("#cartItemModal").modal('show');
		});

		$(window).ready(e => loadcartInfo());
		function loadcartInfo() {
			((storage) => {
				let cartText = $('.cart-text');
				let cart = storage.getItem('cart') || '[]';
				cartText.text(JSON.parse(cart).length);
			})(localStorage);
		}
		function safelyPutInCart() {
			let cart = localStorage.getItem('cart');
			let item = this.dataset.item;
			if(!cart) {
				cart = [ item ];
			} else {
				cart = JSON.parse(cart);
				if(cart.indexOf(item) === -1)
					cart.push(item);
				cart = [... new Set(cart)];
			}
			localStorage.setItem('cart', JSON.stringify(cart));
			loadcartInfo();
			return cart;
		}
	</script>
	<script>
	    function isScrolledIntoView(elem)
	    {
	        var docViewTop = $(window).scrollTop();
	        var docViewBottom = docViewTop + $(window).height();

	        var elemTop = $(elem).offset().top;
	        var elemBottom = elemTop + $(elem).height();

	        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
	    }
	    function doFunc()
	    {
	        let main_nav = $('#main-nav');
	        if(main_nav.length === 0) return;
	        if(!isScrolledIntoView(main_nav[0])) main_nav.addClass('fixed-top mt-4').closest('body').addClass('nav-is-fixed');
	    }
	    function notDoFunc()
	    {
	        let main_nav = $('#main-nav');
	        if(main_nav.length === 0) return;
	        main_nav.removeClass('fixed-top mt-4').closest('body').removeClass('nav-is-fixed');
	    }
	    $(function() {
	        let last_scroll = 0;
	        $(window).scroll(function(e) {
	            let current_scroll = $(this).scrollTop();
	            if(last_scroll > current_scroll) doFunc();
	            else notDoFunc();
	            last_scroll = current_scroll;
	        });
	    });
	</script>
	<script type="text/javascript">
		$(function(){
			let dropdown = $('#categories-dropdown').empty();
			$.get('/frontend/categories').then(data => {
				data.forEach(function(cat) {
					dropdown.append(main_cat(cat));
				});
			});
			function main_cat(data) {
				let hasChild = data.children && data.children.length > 0;
				return `
					<li class="dropdown-submenu">
	                    <a class="${hasChild ? 'test dropdown-toggle' : ''}" tabindex="-1" href="/search?search=${data.id}&category=${data.name}&t=${(new Date()).getTime()}">${data.name}</a>
	                    ${hasChild ? child_data(data.children) : '' }
	                </li>
				`;
			}
			function child_data(children) {
				let fake = '<ul class="dropdown-menu">';
				children.forEach(function(child) {
					let hasChild = child.children && child.children.length > 0;
					fake += `
						<li class="dropdown-submenu">
	                        <a class="${hasChild ? 'test dropdown-toggle' : ''}" href="/search?search=${child.id}&category=${child.name}&t=${(new Date()).getTime()}" tabindex="-1">${child.name}</a>
	                        ${hasChild ? child_data(child.children) : ''}
	                    </li>
					`;
				});
				fake += '</ul>';
				return fake;
			}
			$(document).on("mouseenter", '.dropdown-submenu a.test', function(e) {
	        	if($(this).next('ul').is(':visible')) return;
	            $(this).next('ul').toggle();
	            $(this).closest('li').siblings('li').find('.dropdown-menu').hide();
	            e.stopPropagation();
	            e.preventDefault();
	        });
		});
	</script>
</body>
</html>