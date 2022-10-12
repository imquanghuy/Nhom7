<div class="col-12">
    <div class="row mb-3">
        <label class="col-md-3 col-form-label text-center" for="name3">Họ tên</label>
        <div class="col-md-9">
            <div class="alert alert-primary fw-bold" role="alert">
                {{auth()->user()->name}}
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-md-3 col-form-label text-center" for="surname3">Email</label>
        <div class="col-md-9">
            <div class="alert alert-info fw-bold" role="alert">
                {{auth()->user()->email}} <span class="badge badge-outline-danger rounded-pill">Đã xác nhận</span>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-md-3 col-form-label text-center" for="email3">Phone</label>
        <div class="col-md-9">
            <div class="alert alert-secondary fw-bold" role="alert">
                @if(auth()->user()->phone)
                    {{auth()->user()->phone}}
                @else
                    <span class="badge badge-outline-danger rounded-pill">* Vui lòng thêm số điện thoại</span>
                @endif
            </div>
        </div>
    </div>
    <div class="text-center">
        <a href="" data-url="{{route('taikhoan.edit')}}" class="btn btn-outline-dark rounded-pill mb-2 btn_edit_user">Thay đổi thông tin</a>
        <a href="{{route('taikhoan.re_pass')}}" class="btn btn-outline-dark rounded-pill mb-2">Đổi mật khẩu</a>
    </div>
</div>

