<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Không có quyền</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Chuyên bán linh kiện máy tính tại Việt Nam" name="description" />
    <meta content="Coderthemes" name="author" />
    <link rel="shortcut icon" href="{{asset('resource/assets/images/logo_sm.png')}}">
    <link href="{{asset('resource/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('resource/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{asset('resource/assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" />

</head>

<body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card">
                    <!-- Logo -->
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <a href="#">
                            <span><img src="{{asset('resource/assets/images/logo.png')}}" alt=""></span>
                        </a>
                    </div>

                    <div class="card-body p-4">
                        <div class="text-center">
                            <h1 class="text-error">4<i class="mdi mdi-emoticon-sad"></i>3</h1>
                            <h4 class="text-uppercase text-danger mt-3">Quyền của bạn không đủ</h4>
                            <p class="text-muted mt-3 font-16">Có vẻ như bạn đã nhầm lẫn.Tài khoản của bạn chưa được cấp quyền cho việc này</p>
                            <a class="btn btn-info mt-3" href="{{route('admin.dashboard.index')}}"><i class="mdi mdi-reply"></i> Về trang chủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer footer-alt">
    2021 - Linh kiện máy tính NEW SHOP
</footer>

<script src="{{asset('resource/assets/js/vendor.min.js')}}"></script>
<script src="{{asset('resource/assets/js/app.min.js')}}"></script>

</body>
</html>
