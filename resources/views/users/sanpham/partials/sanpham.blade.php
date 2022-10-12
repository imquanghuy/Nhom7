<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-3 mt-4">{{$name}}</h2>
            </div> <!-- end col -->
        </div>
        <div class="row">
            @foreach($sanphams as $sanpham)
                @if($sanpham->khuyenmai()->where('active',1)->count()==0)
                    <div class="col-md-4">
                        <div class="card ribbon-box sanpham">
                            <div class="card-body">
                                <div class="ribbon ribbon-danger float-start"><i class="mdi mdi-access-point"></i> Hot </div>
                                <h3 class="text-danger float-end mt-0 dongia-sp" data-dg="{{$sanpham->dongia}}"><span class=""></span>{{number_format($sanpham->dongia)}} VNĐ</h3>
                                <a href="{{route('sanpham.chitiet',['id'=>$sanpham->id])}}">
                                    <div class="ribbon-content ">
                                        <div class="d-flex justify-content-center">
                                            <img src="{{asset($sanpham->hinhanh)}}" class="card-img-top img-thumbnail w-75 hinhanh-sanpham" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h3 class="card-title text-success text-center" style="min-height: 50px">{{$sanpham->tensp}}</h3>
                                        </div>
                                    </div>
                                </a>
                                <div class="d-flex justify-content-around">
                                    <a href="{{route('sanpham.chitiet',['id'=>$sanpham->id])}}" class="btn btn-primary"><i class="mdi mdi-eye-outline"></i> Xem chi tiết</a>
                                    <a href="" data-url="{{route('giohang.add',['id'=>$sanpham->id])}}" class="btn btn-primary btn-add-cart" target="_blank"><i class="mdi mdi-cart me-1"></i> Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-4">
                        <div class="card ribbon-box sanpham">
                            <div class="card-body">
                                <div class="ribbon ribbon-success float-start"><i class="mdi mdi-access-point"></i> Giảm {{$sanpham->khuyenmai[0]->tyle}} %</div>
                                <h3 class="text-danger float-end mt-0 dongia-sp" data-dg="{{doubleval($sanpham->dongia) - (doubleval($sanpham->dongia)*((doubleval($sanpham->khuyenmai[0]->tyle))/100))}}">
                                    <span class="text-warning font-16">Chỉ còn </span>
                                    {{number_format(doubleval($sanpham->dongia) - (doubleval($sanpham->dongia)*((doubleval($sanpham->khuyenmai[0]->tyle))/100)))}} VNĐ</h3>
                                <a href="{{route('sanpham.chitiet',['id'=>$sanpham->id])}}">
                                    <div class="ribbon-content ">
                                        <div class="d-flex justify-content-center">
                                            <img src="{{asset($sanpham->hinhanh)}}" class="card-img-top img-thumbnail w-75 hinhanh-sanpham" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h3 class="card-title text-success text-center" style="min-height: 50px">{{$sanpham->tensp}}</h3>
                                        </div>
                                    </div>
                                </a>
                                <div class="d-flex justify-content-around">
                                    <a href="{{route('sanpham.chitiet',['id'=>$sanpham->id])}}" class="btn btn-primary"><i class="mdi mdi-eye-outline"></i> Xem chi tiết</a>
                                    <a href="" data-url="{{route('giohang.add',['id'=>$sanpham->id])}}" class="btn btn-primary btn-add-cart" target="_blank"><i class="mdi mdi-cart me-1"></i> Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="row mb-5">
            <div class="text-center d-flex justify-content-center">
                {!!$sanphams->links()!!}
            </div>
        </div>
    </div>
</section>
