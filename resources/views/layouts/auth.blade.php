<!DOCTYPE html>
<html dir="ltr" lang="{{ app()->getLocale() }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" type="text/css"
	href="{{asset('template/css/main.css')}}">
<link rel="stylesheet" type="text/css"
	href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


	@yield('content')



	<script src="{{asset('template/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('template/js/popper.min.js')}}"></script>
	<script src="{{asset('template/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('template/js/main.js')}}"></script>
	<script src="{{asset('template/js/plugins/pace.min.js')}}"></script>

    @yield('script')

    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
	<!-- The javascript plugin to display page loading on top-->
	<script type="text/javascript">
                  // Login Page Flipbox control
                  $('.login-content [data-toggle="flip"]').click(function() {
                  	$('.login-box').toggleClass('flipped');
                  	return false;
                  });
                </script>

</body>
</html>
