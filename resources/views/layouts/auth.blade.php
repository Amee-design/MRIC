<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title')</title>
        <!-- Fevicon -->
    <link rel="shortcut icon" href="{{ asset('main/images/logo.png') }}">
    <!-- Start css -->
    <link href="{{asset('main/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('main/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('main/css/style.css')}}" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>

<body class="vertical-layout">

    @yield('content')

    <!-- Start js -->
    <script src="{{asset('main/js/jquery.min.js')}}"></script>
    <script src="{{asset('main/js/popper.min.js')}}"></script>
    <script src="{{asset('main/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('main/js/modernizr.min.js')}}"></script>
    <script src="{{asset('main/js/detect.js')}}"></script>
    <script src="{{asset('main/js/jquery.slimscroll.js')}}"></script>
</body>

</html>
