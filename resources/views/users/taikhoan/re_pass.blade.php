@extends('users.layouts.home')
@section('title')
    <title>New Shop | Tài khoản</title>
@endsection
@section('link_css')
    <link rel="stylesheet" href="{{asset('user_resources/category/category.css')}}">
@endsection()
@section('link_js')
    <script src="{{asset('user_resources/category/category.js')}}"></script>
    <script src="{{asset('user_resources/taikhoan/taikhoan.js')}}"></script>
@endsection()
@section('content')
    <section>
        @include('users.sanpham.partials.danhmuc')

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-3 mt-4">Đổi mật khẩu</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row font-18 info_user">
                                <form id="form-update-password" action="{{route('taikhoan.re_passPost')}}" method="post">
                                    @csrf
                                    <div class="col-12">
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label text-center" for="name3">Mật khẩu cũ</label>
                                            <div class="col-md-9">
                                                <input type="password" name="password_old" class="form-control" placeholder="Nhập mật khẩu cũ..." required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label text-center" for="surname3">Mật khẩu mới</label>
                                            <div class="col-md-9">
                                                <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Nhập mật khẩu mới..." required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label text-center" for="email3">Nhập lại mật khẩu</label>
                                            <div class="col-md-9">
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu..." required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-9">
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
                                        </div>

                                        <div class="text-center">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-outline-dark rounded-pill mb-2">Thay đổi</button>
                                                <a href="{{route('taikhoan.index')}}" class="btn btn-outline-danger rounded-pill mb-2">Quay về</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection()




