<section class="py-2 bg-light-lighten border-top border-bottom border-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="mt-0"><i class="mdi mdi-tag-multiple"></i></h1>
                    <h3>Sản phẩm <span class="text-primary">khuyến mãi</span></h3>
                    <p class="text-muted mt-2 font-18">Nhằm tri ân khách hàng mỗi tháng
                        <br>chúng tôi có những chương trình khuyến mãi.</p>
                </div>
            </div>
        </div>

        <div class="row pt-3 d-flex justify-content-center">
            @foreach($sanphamkhuyenmai as $spkm)
            <div class="col-md-4 ">
                <div class="card card-pricing card-pricing-recommended sanpham_discount overflow-hidden">
                    <div class="card-body text-center">
                        <div class="card-pricing-plan-tag font-18">Giảm {{$spkm->tyle}}%</div>
                        <div style="min-height: 100px">
                            <p class="card-pricing-plan-name fw-bold text-uppercase font-22">{{$spkm->product->tensp}}</p>
                        </div>
                        <div class="avatar-xl d-flex " style="margin: auto">
                            <div class="">
                                <img src="{{asset($spkm->product->hinhanh)}}" alt="image" class="img-fluid img-thumbnail rounded-circle w-100"/>
                            </div>
                        </div>
                        <h3 class="card-pricing-price text-danger">
                            {{number_format(doubleval($spkm->product->dongia) - (doubleval($spkm->product->dongia)*((doubleval($spkm->tyle))/100)))}} VNĐ
                            <span class="text-dark font-13">/ {{number_format(doubleval($spkm->product->dongia))}} VNĐ</span></h3>

                        <div class="">
                            <a href="{{route('sanpham.chitiet',['id'=>$spkm->product->id])}}" class="btn btn-primary mb-1 mt-2 btn-rounded font-18">Xem ngay<i class="mdi mdi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                    <div class="sanpham_discount_hover w-100 d-flex align-items-center justify-content-center">
                        <a href="{{route('sanpham.chitiet',['id'=>$spkm->product->id])}}">
                            <h5 class="cauhinh">
                                {!! $spkm->product->cauhinh !!}
                            </h5>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <a href="{{route('sanpham.khuyenmai')}}" class="btn rounded-pill fw-bold fw-bolder btn-outline-primary font-20 w-75">Xem thêm sản phẩm khuyến mãi<i class="mdi mdi-arrow-right ms-1"></i></a>
        </div>
    </div>
</section>
