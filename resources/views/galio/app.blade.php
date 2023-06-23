<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		
		<title>{{ config('app.name', 'Laravel') }}</title>
		<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />
		
		
		
		
		
		
		
		
		<!-- Bootstrap CSS -->
		<link href="{{ asset('/galio/assets/css/bootstrap.min.css') }}" rel="stylesheet">
		<!-- Font-Awesome CSS -->
		<link href="{{ asset('/galio/assets/css/font-awesome.min.css') }}" rel="stylesheet">
		<!-- helper class css -->
		<link href="{{ asset('/galio/assets/css/helper.min.css') }}" rel="stylesheet">
		<!-- Plugins CSS -->
		<link href="{{ asset('/galio/assets/css/plugins.css') }}" rel="stylesheet">
		<!-- Main Style CSS -->
		<link href="{{ asset('/galio/assets/css/style.css') }}" rel="stylesheet">
		<link href="{{ asset('/galio/assets/css/skin-default.css') }}" rel="stylesheet" id="galio-skin">
		@yield('style')
	</head>
	<body>
		@include('galio/inc/color')
		@yield('content')
		<!-- Scroll to top start -->
		<div class="scroll-top not-visible">
			<i class="fa fa-angle-up"></i>
		</div>
		<!-- Scroll to Top End -->
	</body>
	<!--All jQuery, Third Party Plugins & Activation (main.js) Files-->
    <script src="{{ asset('/galio/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <!-- Jquery Min Js -->
    <script src="{{ asset('/galio/assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <!-- Popper Min Js -->
    <script src="{{ asset('/galio/assets/js/vendor/popper.min.js') }}"></script>
    <!-- Bootstrap Min Js -->
    <script src="{{ asset('/galio/assets/js/vendor/bootstrap.min.js') }}"></script>
    <!-- Plugins Js-->
    <script src="{{ asset('/galio/assets/js/plugins.js') }}"></script>
    <!-- Ajax Mail Js -->
    <script src="{{ asset('/galio/assets/js/ajax-mail.js') }}"></script>
    <!-- Active Js -->
    <script src="{{ asset('/galio/assets/js/main.js') }}"></script>
    <!-- Switcher JS [Please Remove this when Choose your Final Projct] -->
    <script src="{{ asset('/galio/assets/js/switcher.js') }}"></script>
	@yield('script')
</html>
