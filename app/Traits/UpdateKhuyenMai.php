<?php
namespace App\Traits;
use App\Models\chitietkhuyenmai;
use App\Models\khuyenmai;

trait UpdateKhuyenMai{
    public function updateKhuyenMai(){
        $listKhuyenMai = khuyenmai::all();
        /*
         * active = 0 : chưa bắt đầu
         * active = 1 : đang diễn ra
         * active = 2 : đã kết thúc
         */
        foreach ($listKhuyenMai as $khuyenmai) {
            $ngaybd = strtotime($khuyenmai->ngaybatdau);
            $ngaykt = strtotime($khuyenmai->ngayketthuc);
            $now = strtotime(now());
            $active = 0;
            if ($ngaybd < $now) {
                $active = 1;
            }
            if ($ngaykt < $now){
                $active = 2;
            }
            $khuyenmai->update([
                'active'=>$active,
            ]);
            if($active!=1){
                $ctkm = chitietkhuyenmai::where("khuyenmai_id",$khuyenmai->id)->get();
                foreach ($ctkm as $value){
                    $value->update([
                        'active'=>0,
                    ]);
                }
            }
        }
    }
}
