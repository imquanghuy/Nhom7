@extends('users.layouts.home')
@section('title')
    <title>New Shop | Vât liệu xây dựng</title>
@endsection
@section('link_css')
    <link rel="stylesheet" href="{{asset('user_resources/home/slider.css')}}">
    <link rel="stylesheet" href="{{asset('user_resources/home/sanpham_home.css')}}">
@endsection()
@section('link_js')
    <script src="{{asset('user_resources/home/khuyenmai.js')}}"></script>
@endsection()
@section('content')
    <!-- SLIDER-->
    @include('users.home.partials.slider')
    <!-- SLIDER-->

    <!-- DANHMUC -->
    @include('users.home.partials.danhmuc')
    <!-- DANHMUC END -->

    <!-- SẢN PHẨM MỚI-->
    @include('users.home.partials.sanpham_new')
    <!-- SẢN PHẨM MỚI END -->

    <!-- SẢN PHẨM YÊU THÍCH -->
    @include('users.home.partials.sanpham_like')
    <!-- SẢN PHẨM YÊU THÍCH END -->

    <!-- SẢN PHẨM KHUYẾN MÃI -->
    @if ($sanphamkhuyenmai->count()>0)
        @include('users.home.partials.sanpham_discount')
        <!-- SẢN PHẨM KHUYẾN MÃI END -->
    @endif
@endsection()
