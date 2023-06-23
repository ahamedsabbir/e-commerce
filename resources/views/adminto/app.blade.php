<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dashboard | Adminto - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('/adminto/assets/images/favicon.ico') }}">
		<!-- App css -->
        <link href="{{ asset('adminto/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
        <!-- icons -->
        <link href="{{ asset('adminto/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
		@yield('style')
	</head>
	<body class="loading" data-layout-color="light"  data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>
		@yield('content')
		<!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor -->
        <script src="{{ asset('adminto/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('adminto/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('adminto/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('adminto/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('adminto/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('adminto/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('adminto/assets/libs/feather-icons/feather.min.js') }}"></script>
        <!-- knob plugin -->
        <script src="{{ asset('adminto/assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
        <!--Morris Chart-->
        <script src="{{ asset('adminto/assets/libs/morris.js06/morris.min.js') }}"></script>
        <script src="{{ asset('adminto/assets/libs/raphael/raphael.min.js') }}"></script>
        <!-- Dashboar init js-->
        <script src="{{ asset('adminto/assets/js/pages/dashboard.init.js') }}"></script>
        @yield('script')
		<!-- App js-->
        <script src="{{ asset('adminto/assets/js/app.min.js') }}"></script>
    </body>
</html>
