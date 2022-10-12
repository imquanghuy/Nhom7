@extends('users.layouts.home')
@section('title')
    <title>New Shop | Tài khoản</title>
@endsection
@section('link_css')
    <link rel="stylesheet" href="{{asset('user_resources/category/category.css')}}">
@endsection()
@section('link_js')
    <script src="{{asset('vendor/sweetAlert2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('user_resources/category/category.js')}}"></script>
    <script src="{{asset('user_resources/taikhoan/taikhoan.js')}}"></script>
@endsection()
@section('content')
    <section>
        @include('users.sanpham.partials.danhmuc')

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-3 mt-4">Tài khoản</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row font-18 info_user">
                                @include('users.taikhoan.partials.info')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection()




