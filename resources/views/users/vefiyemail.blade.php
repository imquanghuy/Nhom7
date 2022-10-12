@extends('users.layouts.home')
@section('title')
    <title>New Shop | Xác nhận email</title>
@endsection
@section('link_css')
    <link rel="stylesheet" href="{{asset('user_resources/category/category.css')}}">
@endsection()
@section('link_js')
    <script src="{{asset('user_resources/category/category.js')}}"></script>
@endsection()
@section('content')

    <section>
        <div class="container">
            <div class="row justify-content-center  mt-4">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center m-auto">
                                <img src="{{asset('resource/assets/images/mail_sent.svg')}}" alt="mail sent image" height="64">
                                <h4 class="text-dark-50 text-center mt-4 fw-bold">Yêu cầu xác nhận email</h4>
                                <p class="text-muted mb-4">
                                    Một email đã được gửi đến <b>{{auth()->user()->email}}</b>.
                                    Vui lòng kiểm tra email , nhấn vào liên kết để xác nhận email và đăng nhập lại vào hệ thống.
                                </p>
                            </div>

                            <form action="{{route('user.logout')}}">
                                <div class="mb-0 text-center">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-home me-1"></i> Back to Home</button>
                                </div>
                            </form>

                        </div> <!-- end card-body-->
                    </div>
                    <!-- end card-->

                </div> <!-- end col -->
            </div>
        </div>
    </section>


@endsection()
