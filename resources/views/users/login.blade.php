@extends('users.layouts.home')
@section('title')
    <title>New Shop | Đăng nhập</title>
@endsection
@section('link_css')
    <link rel="stylesheet" href="{{asset('user_resources/category/category.css')}}">
@endsection()
@section('link_js')
    <script src="{{asset('user_resources/category/category.js')}}"></script>
    <script type="text/javascript">
        $('#reload').click(function () {
            let url = $(this).data('url');
            $.ajax({
                type: 'GET',
                url: url,
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>
@endsection()
@section('content')

    @include('users.sanpham.partials.danhmuc')

    <section>
        <div class="container">
            <div class="row mt-4 font-18 d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="auth-fluid-form-box">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0">Đăng nhập</h4>
                                <p class="text-muted mb-4">Nhập Email và mật khẩu để đăng nhập vào tài khoản.</p>
                                <form action="{{route('user.loginPost')}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Địa chỉ email</label>
                                        <input name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" id="emailaddress" required="" placeholder="Enter your email">
                                    </div>
                                    @error('email')
                                    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                        <button type="button" class="btn-close @error('password') is-invalid @enderror" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                    <div class="mb-3">
                                        {{--<a href="pages-recoverpw-2.html" class="text-muted float-end"><small>Forgot your password?</small></a>--}}
                                        <label for="password" class="form-label">Mật khẩu</label>
                                        <div class="input-group input-group-merge">
                                            <input name="password" type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Nhập password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @error('password')
                                    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                    
                                    @if(isset($message))
                                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input name="remember_me" type="checkbox" class="form-check-input" id="checkbox-signin">
                                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="d-grid mb-0 text-center">
                                        <button class="btn btn-primary font-18" type="submit"><i class="mdi mdi-login"></i> Đăng nhập </button>
                                    </div>
                                </form>
                                <p class="text-muted mt-3">Chưa có tài khoản ? <a href="{{route('user.register')}}" class="text-muted font-20 ms-1 text-primary"><b>Đăng ký</b></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection()
