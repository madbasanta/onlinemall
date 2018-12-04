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
	<link rel="icon" type="image/png" href="favicon.png">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/all.css') }}">
	@yield('style')
</head>
<body>
	@include('layouts.nav')
	@yield('content')
	@include('layouts.footer')
	@include('layouts.master_modal')
	<script src="{{ asset('js/app.js') }}"></script>
	@yield('script')
	<script>
		document.addEventListener('click', function(e) {
			let element = e.target || e.srcElement;
			if(element.id !== 'iamtoggler' && !element.closest('#iamtoggler')) return;
			element = element.closest('#iamtoggler') || element;
			let target = element.querySelector('.fas');
			if(element.classList.contains('collapsed') === false) {
				target.classList.remove('fa-ellipsis-h');
				target.classList.add('fa-ellipsis-v');
			} else {
				target.classList.remove('fa-ellipsis-v');
				target.classList.add('fa-ellipsis-h');
			}
		});
	</script>
</body>
</html>