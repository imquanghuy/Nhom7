<section class="bg-white py-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="mt-0"><i class="mdi mdi-heart-multiple-outline"></i></h1>
                    <h3>Sản phẩm được <span class="text-danger">Yêu thích</span></h3>
                    <p class="text-muted mt-2 font-18">Lượt xem cao nhất trong tất cả sản phẩm.
                    </p>
                </div>
            </div>
        </div>
        <div class="row mt-2 py-2 align-items-center">
            <div class="col-lg-5">
                <div class="sanpham_like">
                    <a href="{{route('sanpham.chitiet',['id'=>$sanphamlike[0]->id])}}">
                        <img src="{{asset($sanphamlike[0]->hinhanh)}}" class="img-fluid img-thumbnail shadow-lg rounded-circle w-75 float-end" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <h2 class="text-primary">{{$sanphamlike[0]->tensp}}</h2>

                <h3 class="text-success">{{number_format($sanphamlike[0]->dongia)}} VNĐ</h3>

                <div class="mt-4">
                    {!! $sanphamlike[0]->cauhinh !!}
                </div>

                <a href="{{route('sanpham.chitiet',['id'=>$sanphamlike[0]->id])}}" class="btn btn-primary btn-rounded mt-3 font-20">Xem ngay<i class="mdi mdi-arrow-right ms-1"></i></a>

            </div>
        </div>

        <div class="row pb-3 pt-1 align-items-center">
            <div class="col-lg-5 offset-lg-1">
                <div>
                    <h2 class="text-primary">{{$sanphamlike[1]->tensp}}</h2>

                    <h3 class="text-success">{{number_format($sanphamlike[1]->dongia)}} VNĐ</h3>

                    <div class="mt-4">
                        {!! $sanphamlike[1]->cauhinh !!}
                    </div>

                    <a href="{{route('sanpham.chitiet',['id'=>$sanphamlike[1]->id])}}" class="btn btn-success btn-rounded mt-3 font-20">Xem ngay<i class="mdi mdi-arrow-right ms-1"></i></a>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="sanpham_like">
                    <a href="{{route('sanpham.chitiet',['id'=>$sanphamlike[1]->id])}}">
                        <img src="{{asset($sanphamlike[1]->hinhanh)}}" class="img-fluid img-thumbnail rounded w-75 shadow-lg" alt="">
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
