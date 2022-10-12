@extends('users.layouts.home')
@section('title')
    <title>New Shop | Sản phẩm Hãng sản xuất</title>
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

    @include('users.sanpham.partials.sanpham',['name'=>$hangsanxuat])

@endsection()
