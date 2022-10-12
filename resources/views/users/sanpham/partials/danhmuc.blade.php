@php
    $danhmucs = \App\Models\danhmuc::all();
    $spkm = \App\Models\chitietkhuyenmai::where('active',1)->get();
    $i = $spkm->count();
    $row = 0;
@endphp
<section class="background_category border-bottom">
    <div class="container ">
        <div class="row">
            <nav>
                <div class="nav_responsive">
                    <ul class="nav d-flex justify-content-between">
                        <li class="nav-link">
                            <button type="button" class=" btn btn-outline-primary font-18 fw-bold p-2 btn_category"><i class="mdi mdi-menu"></i> Chọn danh mục</button>
                        </li>
                        <li class="nav-link">
                            <a href="{{route('giohang.index')}}" class=" btn btn-outline-primary font-18 fw-bold p-2 "><i class="mdi mdi-menu"></i>Giỏ hàng</a>
                        </li>
                    </ul>
                </div>
                <ul class="nav nav_category">
                    <li class="nav-link">
                        <a href="javascript:void(0);" class="font-20 fw-bolder">Chọn danh mục <i class="uil  uil-angle-double-right"></i></a>
                    </li>
                    @foreach($danhmucs as $danhmuc)
                        <li class="nav-link category border-start border-end li_nav dropdown-toggle">
                            <a href="{{route('sanpham.danhmuc',['id'=>$danhmuc->id])}}" class="font-20 fw-bold">{{$danhmuc->name}}</a>
                            <div class="sub_nav rounded-3">
                                @foreach($danhmuc->menu()->distinct()->get() as $menu)
                                    <a class="dropdown-item font-18 fw-bold text-primary " href="{{route('sanpham.hangsanxuat',['danhmuc'=>$danhmuc->id,'id'=>$menu->id])}}">{{$menu->name}}</a>
                                @endforeach
                            </div>
                        </li>
                    @endforeach
                    @if($i>0)
                        <li class="nav-link category border-start border-end li_nav">
                            <a href="{{route('sanpham.khuyenmai')}}" class="font-20 fw-bold">Khuyến mãi</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
    <div class="navbar_responsive d-none">
        <div class="">
            @foreach($danhmucs as $danhmuc)
                    <a class="dropdown-item font-18 fw-bold text-primary " href="{{route('sanpham.danhmuc',['id'=>$danhmuc->id])}}"><i class="mdi mdi-menu-right-outline font-18"></i>{{$danhmuc->name}}</a>
            @foreach($danhmuc->menu()->distinct()->get() as $menu)
                    <a class="dropdown-item font-18 fw-bold text-primary " href="{{route('sanpham.hangsanxuat',['danhmuc'=>$danhmuc->id,'id'=>$menu->id])}}">{{$menu->name}}</a>
                @endforeach
            @endforeach
                @if($i>0)
                    <a class="dropdown-item font-18 fw-bold text-primary " href="{{route('sanpham.khuyenmai')}}">Khuyến mãi</a>
                @endif
        </div>
    </div>
</section>
