@foreach($binhluans as $binhluan)
    <div class="card mb-0 mt-2">
        <div class="card-body">
            <div class="d-flex align-items-start">
                <div class="w-100 overflow-hidden">
                    <div class=" d-flex justify-content-between">
                        <h4 class="font-20 text-primary mb-1 mt-0">{{$binhluan->user->name}}</h4>
                        <p class="font-16">
                            @for($i=1;$i<=$binhluan->danhgia;$i++)
                                <span class="text-warning mdi mdi-star"></span>
                            @endfor
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <p class="f"> {{$binhluan->created_at}} </p>
                        </div>
                        @if(auth()->check())
                            @if(auth()->user()->id==$binhluan->user->id)
                                <div class="col-md-2" data-url="{{route('binhluan.delete')}}">
                                    <a href="" data-id="{{$binhluan->id}}" class="fw-bold btn-delete-bl">Xóa</a>
                                </div>
                            @endif
                        @endif
                    </div>
                    <p class="mb-0 text-muted">
                        <span class="font-18 fst-italic"><b>"</b>{{$binhluan->binhluan}}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endforeach
