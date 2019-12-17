<!doctype html>
<html>

    <head>

		<!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>@yield('title')</title>

        <!-- CSS -->
        <link href="https://fonts.googleapis.com/css?family=Changa" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/css/jquery.mCustomScrollbar.min.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/animate.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.css')}}">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/css-hamburgers/hamburgers.min.css')}}">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animsition/css/animsition.min.css')}}">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/select2.min.css')}}">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/daterangepicker/daterangepicker.css')}}">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/util.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css')}}">

        <link rel="stylesheet" href="{{ asset('assets/css/media-queries.css')}}">
        <link rel="icon" type="image/png" href="{{ asset('assets/img//favicon.png')}}">


        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/ico/apple-touch-icon-144-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/ico/apple-touch-icon-114-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/ico/apple-touch-icon-72-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/ico/apple-touch-icon-57-precomposed.png')}}">

    </head>

    <body>

		<!-- Wrapper -->
    	<div class="wrapper">

			<!-- Sidebar -->
			@include('back_end.layout.side_bar')

			<!-- End sidebar -->
			
			<!-- Dark overlay -->
    		<div class="overlay"></div>

			<!-- Content -->
			<div class="content">

			
				<!-- open sidebar menu -->
				<a class="btn btn-primary btn-customized open-menu" href="#" role="button">
                <i class="fas fa-align-right"></i><span> القائمة </span>
                </a>

			
		        <!-- Top content -->
				@include('back_end.layout.massege')
				@yield('content')

		

				@include('back_end.layout.footer')
		        
	        
	        </div>
	        <!-- End content -->
        
        </div>
        <!-- End wrapper -->

        <!-- Javascript -->
		<script src="{{ asset('assets/js/jquery-3.3.1.min.js')}}"></script>
		<script src="{{ asset('assets/js/jquery-migrate-3.0.0.min.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/jquery.backstretch.min.js')}}"></script>
        <script src="{{ asset('assets/js/wow.min.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.waypoints.min.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
        <script src="{{ asset('assets/js/scripts.js')}}"></script>

        <script src="{{ asset('assets/vendor/animsition/js/animsition.min.js')}}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

        <script src="{{ asset('assets/vendor/select2/select2.min.js')}}"></script>

        <script src="{{ asset('assets/vendor/daterangepicker/moment.min.js')}}"></script>
        <script src="{{ asset('assets/vendor/daterangepicker/daterangepicker.js')}}"></script>

        <script src="{{ asset('assets/vendor/countdowntime/countdowntime.js')}}"></script>

        <script src="{{ asset('assets/js/main.js')}}"></script>
        <script src="{{ asset('assets/js/fontawesome.min.js')}}"></script>


    </body>

</html>