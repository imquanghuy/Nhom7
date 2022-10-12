<section class="py-2 bg-light-lighten border-top border-bottom border-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="mt-0"><i class="mdi mdi-new-box text-danger" style="font: 30px"></i></h1>
                    <h2>Sản phẩm <span class="text-primary">Mới</span></h2>
                    <p class="text-muted mt-2 font-18">Chúng tôi luôn mang đến cho bạn những sản phẩm <br> chất lượng nhất. </p>
                </div>
            </div>
        </div>

        @foreach($sanphamnew as $key=>$sanpham)
            @if($key % 3 == 0)
                <div class="row">
            @endif
                <div class="col-lg-4 sanpham_new">
                    <div class="card bg-white overflow-hidden">
                        <div class="demo-box text-center">
                            <img src="{{asset($sanpham->hinhanh)}}" alt="demo-img" class="img-fluid shadow-lg rounded-circle card-img-top w-75 mt-3">
                            <div class="card-body">
                                <a href="{{route('sanpham.chitiet',['id'=>$sanpham->id])}}" class="btn btn-outline-primary rounded-pill fw-bold font-20 w-100">
                                    <div class="row">
                                        <div class="col-12 text-truncate">
                                            {{$sanpham->tensp}}
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <div class=" w-100 sanpham_new_hover">
                            <a href="{{route('sanpham.chitiet',['id'=>$sanpham->id])}}">
                                <div class="h-100 d-flex align-items-center justify-content-center">
                                    <div class="alert alert-dark text-dark d-flex align-items-center" role="alert">
                                        <h5 class="card-text text-danger fw-bold font-24 text-center  m-0">{{number_format($sanpham->dongia)}} VNĐ</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @if($key%3==2)
                </div>
            @endif
        @endforeach
    </div>
</section>
