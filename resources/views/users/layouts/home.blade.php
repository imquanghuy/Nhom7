<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <link rel="shortcut icon" href="{{asset('resource/assets/images/logo_sm.png')}}">
    <link href="{{asset('resource/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('resource/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style">
    <link href="{{asset('resource/assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style">
    <link rel="stylesheet" href="{{asset('user_resources/home/home.css')}}">
    <link rel="stylesheet" href="{{asset('user_resources/home/user.css')}}">
    <link rel="stylesheet" href="{{asset('user_resources/giohang/giohang.css')}}">
    <link rel="stylesheet" href="{{asset('user_resources/giohang/sub_cart.css')}}">

    @yield('link_css')
</head>
<body class="loading" data-layout-config='{"darkMode":false}'>

    @include('users.partials.navbar')

    @yield('danhmuc')

    @yield('content')

    @include('users.partials.footer')

    <a id="button-to-top" class="btn btn-secondary rounded-3 unshow-btn"><i class="mdi mdi-arrow-up-thick"></i></a>

    <script src="{{asset('resource/assets/js/vendor.min.js')}}"></script>
    <script src="{{asset('resource/assets/js/app.min.js')}}"></script>
    <script src="{{asset('user_resources/home/search.js')}}"></script>
    <script src="{{asset('user_resources/home/user.js')}}"></script>
    <script src="{{asset('user_resources/giohang/giohang.js')}}"></script>
    <script src="{{asset('vendor/sweetAlert2/sweetalert2@11.js')}}"></script>
    @yield('link_js')
    <script>
        var msg = '{{Session::get('jsAlert')}}';
        var exist = '{{Session::has('jsAlert')}}';
        if(exist){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: msg,
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>
</body>

</html>
