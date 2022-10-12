<div class="card mb-0 mt-2">
    <div class="card-body">
        <form id="form-binhluan" action="{{route('binhluan.add')}}" method="post">
            @csrf
            <input type="text" value="{{$sanpham->id}}" name="sanpham" class="d-none">
            <div class="d-flex align-items-start">
                <div class="w-100 overflow-hidden">
                    <h4 class="font-20 text-primary mb-0 mt-0">Đánh giá</h4>
                    <div class="rating">
                        <input type="radio" name="rating" value="5" id="5">
                        <label for="5">☆</label>
                        <input type="radio" name="rating" value="4" id="4">
                        <label for="4">☆</label>
                        <input type="radio" name="rating" value="3" id="3">
                        <label for="3">☆</label>
                        <input type="radio" name="rating" value="2" id="2">
                        <label for="2">☆</label>
                        <input type="radio" name="rating" value="1" id="1">
                        <label for="1">☆</label>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start">
                <div class="w-100 overflow-hidden">
                    <h4 class="font-20 text-primary mb-1 mt-0">Bình luận của bạn</h4>
                    <div class="d-flex mb-2">
                        <div class="w-100 border rounded">
                            <textarea name="binhluan" id="binhluan" class="form-control border-0 resize-none" placeholder="Viết bình luận" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="float-end font-16 btn btn-sm btn-success"><i class="uil uil-message me-1"></i>Gửi</button>
        </form>
    </div>
</div>
