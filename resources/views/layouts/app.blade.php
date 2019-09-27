<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:title" content="">
    <title>MyCompany</title>
    <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/jquery.fileupload.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{asset('fontawesome/css/all.min.css')}}">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->

		@include('layouts.header')

		@include('layouts.aside')

		@yield('content')

    <!-- Essential javascripts for application to work-->
    <script src="{{asset('template/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('template/js/popper.min.js')}}"></script>
    <script src="{{asset('template/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('template/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('template/js/plugins/pace.min.js')}}"></script>
    <script src="{{asset('template/js/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('template/js/sweetalert.min.js')}}"></script>
    <!-- Page specific javascripts-->
    <script>
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
    </script>
    @yield('script')
  </body>
</html>
