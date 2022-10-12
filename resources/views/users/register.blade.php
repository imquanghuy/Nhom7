@extends('users.layouts.home')
@section('title')
    <title>New Shop | Đăng ký</title>
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

    <section>
        <div class="container">
            <div class="row mt-4 font-18 d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="auth-fluid-form-box">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0">Đăng ký</h4>
                                <p class="text-muted mb-4">Không có tài khoản? Tạo tài khoản của bạn, chỉ mất chưa đầy một phút.</p>
                                <form action="{{route('user.registerPost')}}" method="post" name="registration">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Họ và tên</label>
                                        <input name="name" value="{{ old('name') }}" class="form-control" type="text" id="fullname" placeholder="Enter your name" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Email</label>
                                        <input name="email" value="{{ old('email') }}"  class="form-control @error('email') is-invalid @enderror" type="email" id="emailaddress" required="" placeholder="Enter your email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Mật khẩu</label>
                                        <input name="password" class="form-control @error('password') is-invalid @enderror" type="password" required="" id="password" placeholder="Enter your password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Nhập lại mật khẩu</label>
                                        <input name="password_confirmation" class="form-control" type="password" required="" id="password_confirmation" placeholder="Enter your password">
                                    </div>
                                    
                                    <div class="mb-3 text-center">
                                        @error('email')
                                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                            <button type="button" class="btn-close @error('password') is-invalid @enderror" data-bs-dismiss="alert" aria-label="Close"></button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
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
                                    </div>
                                    <div class="mb-0 d-grid text-center">
                                        <button id="submit" class="btn btn-primary" type="submit"><i class="mdi mdi-account-circle" disabled></i> Đăng ký </button>
                                    </div>
                                </form>
                                <p class="text-muted mt-3">Đã có tài khoản? <a href="{{route('user.login')}}" class="text-muted ms-1"><b>Đăng nhập</b></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection()
