@extends('users.layouts.home')
@section('title')
    <title>New Shop | Khuyến mãi</title>
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

    <section style="min-height: 400px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if($sanphams->count()==0)
                        <h2 class="mb-3 mt-4">Không có sản phẩm huyến mãi</h2>
                    @else
                        <h2 class="mb-3 mt-4">Khuyến mãi</h2>
                    @endif
                </div> <!-- end col -->
            </div>
            <div class="row">
                @foreach($sanphams as $sanpham)
                    <div class="col-md-4">
                        <div class="card ribbon-box sanpham">
                            <div class="card-body">
                                <div class="ribbon ribbon-success float-start"><i class="mdi mdi-access-point"></i> Giảm {{$sanpham->tyle}} %</div>
                                <h3 class="text-danger float-end mt-0 dongia-sp" data-dg="{{doubleval($sanpham->product->dongia) - (doubleval($sanpham->product->dongia)*((doubleval($sanpham->tyle))/100))}}">
                                    <span class="text-warning font-16">Chỉ còn </span>{{number_format(doubleval($sanpham->product->dongia) - (doubleval($sanpham->product->dongia)*((doubleval($sanpham->tyle))/100)))}} VNĐ</h3>
                                <a href="{{route('sanpham.chitiet',['id'=>$sanpham->product->id])}}">
                                    <div class="ribbon-content ">
                                        <div class="d-flex justify-content-center">
                                            <img src="{{asset($sanpham->product->hinhanh)}}" class="card-img-top img-thumbnail w-75 hinhanh-sanpham" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h3 class="card-title text-success text-center" style="min-height: 50px">{{$sanpham->product->tensp}}</h3>
                                        </div>
                                    </div>
                                </a>
                                <div class="d-flex justify-content-around">
                                    <a href="{{route('sanpham.chitiet',['id'=>$sanpham->product->id])}}" class="btn btn-primary" ><i class="mdi mdi-eye-outline"></i> Xem chi tiết</a>
                                    <a href="" data-url="{{route('giohang.add',['id'=>$sanpham->id])}}" class="btn btn-primary btn-add-cart" target="_blank"><i class="mdi mdi-cart me-1"></i> Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mb-5">
                <div class="text-center d-flex justify-content-center">
                    {!!$sanphams->links()!!}
                </div>
            </div>
        </div>
    </section>

@endsection()
