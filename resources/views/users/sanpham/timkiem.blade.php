@extends('users.layouts.home')
@section('title')
    <title>New Shop | Tìm kiếm sản phẩm</title>
@endsection
@section('link_css')
    <link rel="stylesheet" href="{{asset('user_resources/category/category.css')}}">
    <link rel="stylesheet" href="{{asset('user_resources/sanpham/sanpham.css')}}">
@endsection()
@section('link_js')
    <script src="{{asset('user_resources/sanpham/sanpham.js')}}"></script>
    <script src="{{asset('user_resources/category/category.js')}}"></script>
    <script src="{{asset('user_resources/giohang/cart.js')}}"></script>
@endsection()
@section('content')

    @include('users.sanpham.partials.danhmuc')
    @if($sanphams->count()==0)
        <section style="min-height: 400px">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-3 mt-4">Không tìm có kết quả {{$search}}</h2>
                    </div> <!-- end col -->
                </div>
            </div>
        </section>
    @else
        @include('users.sanpham.partials.sanpham',['name'=>$search])
    @endif
@endsection()
