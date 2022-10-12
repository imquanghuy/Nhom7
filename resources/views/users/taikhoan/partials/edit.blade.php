<form id="form-update-info" action="{{route('taikhoan.edit')}}" method="post">
    @csrf
    <div class="col-12">
        <div class="row mb-3">
            <label class="col-md-3 col-form-label text-center" for="name3">Họ tên</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="userName" name="hoten" value="{{auth()->user()->name}}">
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
                <input type="text" class="form-control" id="userName" name="phone" value="{{auth()->user()->phone}}">
            </div>
        </div>
        <div class="text-center">
            <div class="col-md-12">
                <button type="submit" class="btn btn-outline-dark rounded-pill mb-2">Cập nhập</button>
                <a href="{{route('taikhoan.index')}}" class="btn btn-outline-danger rounded-pill mb-2">Quay về</a>
            </div>
            <a href="{{route('taikhoan.re_pass')}}" class="btn btn-outline-dark rounded-pill mb-2">Đổi mật khẩu</a>
        </div>
    </div>
</form>
<script>
    $("#form-update-info").submit(function (e){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Cập nhập thông tin thành công!',
            showConfirmButton: false,
            timer: 1500
        })
    })
</script>
