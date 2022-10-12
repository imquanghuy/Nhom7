@if(empty(session()->get('cart')))
    <div>
        <img src="{{asset('resource/assets/images/empty-cart.png')}}" alt="">
    </div>
@else
<div class="layout-sub-cart">
    @foreach ($carts as $id=>$cartItem)
        <div class="row subcart" data-url="{{route('giohang.delete')}}">
            <div class="col-md-10">
                <a class="dropdown-item font-18" href="{{route('sanpham.chitiet',['id'=>$id])}}">
                    <h6 class="m-0 font-18 pt-1 w-100">{{$cartItem['name']}}</h6>
                    <h6 class="m-0 font-16 pt-1">{{$cartItem['soluong']}} x {{$cartItem['dongia']}}</h6>
                </a>
            </div>
            <div class="col-md-2">
                <a href="" data-id="{{$id}}" class="btn btn-outline-dark btn-rounded mt-2 delete-subcart"> <i class="mdi mdi-delete"></i></a>
            </div>
        </div>
    @endforeach
</div>
@endif
<div class="row">
    <div class="col-md-6">
        <a class="dropdown-item font-18 text-center text-primary" href="{{route('giohang.index')}}">
            <h6 class="m-0 font-18 pt-1 w-100">Xem giỏ hàng</h6>
        </a>
    </div>
    <div class="col-md-6">
        @if(auth()->check())
            <a class="dropdown-item font-18 text-center text-primary" href="{{route('dathang')}}">
                <h6 class="m-0 font-18 pt-1 w-100">Đặt hàng</h6>
            </a>
        @else
            <a class="dropdown-item font-18 text-center text-primary" href="{{route('user.login')}}">
                <h6 class="m-0 font-18 pt-1 w-100">Đăng nhập</h6>
            </a>
        @endif
    </div>
</div>
