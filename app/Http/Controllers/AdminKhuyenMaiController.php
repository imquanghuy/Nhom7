<?php

namespace App\Http\Controllers;

use App\Models\chitietkhuyenmai;
use App\Models\khuyenmai;
use App\Models\sanpham;
use App\Traits\DeleteModelTrait;
use App\Traits\UpdateKhuyenMai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;
use function GuzzleHttp\Promise\all;

class AdminKhuyenMaiController extends Controller
{
    use UpdateKhuyenMai;
    use DeleteModelTrait;
    private $khuyenmai;
    private $sanpham;
    private $chitietkhuyenmai;
    public function __construct(khuyenmai $khuyenmai,sanpham $sanpham,chitietkhuyenmai $chitietkhuyenmai)
    {
        $this->updateKhuyenMai();
        $this->khuyenmai = $khuyenmai;
        $this->sanpham = $sanpham;
        $this->chitietkhuyenmai = $chitietkhuyenmai;
    }

    public function index(){
        Paginator::useBootstrap();
        $khuyenmais = $this->khuyenmai->paginate(10);
        return view('admins.khuyenmai.index',compact('khuyenmais'));
    }
    public function create(){
        return view('admins.khuyenmai.add');
    }
    public function store(Request $request){
        /*
         * active = 0 : chưa bắt đầu
         * active = 1 : đang diễn ra
         * active = 2 : đã kết thúc
         */
        $ngaybd = strtotime($request->ngaybd);
        $ngaykt = strtotime($request->ngaykt);

        $now = strtotime(now());
        $active = 0;
        if ($ngaykt < $ngaybd) {
            $message = "Ngày kết thúc phải diễn ra sau ngày bắt đầu.";
            return view('admins.khuyenmai.add',compact('message'));
        }
        if ($ngaykt < $now) {
            $message = "Ngày kết thúc phải diễn ra sau ngày hôm nay.";
            return view('admins.khuyenmai.add',compact('message'));
        }
        if ($ngaybd < $now) {
            $active = 1;
        }
        $ngaybd = date('Y-m-d H:i:s',$ngaybd);
        $ngaykt = date('Y-m-d H:i:s',$ngaykt);
        $this->khuyenmai->create([
            'name'=> $request->name,
            'ngaybatdau'=> $ngaybd,
            'ngayketthuc'=> $ngaykt,
            'active'=>$active,
        ]);
        return redirect()->route('khuyenmai.index');
    }

    public function edit($id){
        $khuyenmai = $this->khuyenmai->find($id);
        $ngaybd =Carbon::parse($khuyenmai->ngaybatdau)->format('Y-m-d').'T'.Carbon::parse($khuyenmai->ngaybatdau)->format('H:i');
        $ngaykt =Carbon::parse($khuyenmai->ngayketthuc)->format('Y-m-d').'T'.Carbon::parse($khuyenmai->ngayketthuc)->format('H:i');
        return view('admins.khuyenmai.edit',compact('khuyenmai','ngaybd','ngaykt'));
    }
    public function update($id,Request $request){
        $khuyenmai = $this->khuyenmai->find($id);
        $ngaybd =Carbon::parse($khuyenmai->ngaybatdau)->format('Y-m-d').'T'.Carbon::parse($khuyenmai->ngaybatdau)->format('H:i');
        $ngaykt =Carbon::parse($khuyenmai->ngayketthuc)->format('Y-m-d').'T'.Carbon::parse($khuyenmai->ngayketthuc)->format('H:i');
        $ngaybatdau = strtotime($request->ngaybd);
        $ngayketthuc = strtotime($request->ngaykt);
        $now = strtotime(now());
        $active = 0;
        if ($ngayketthuc < $ngaybatdau) {
            $message = "Ngày kết thúc phải diễn ra sau ngày bắt đầu.";
            return view('admins.khuyenmai.edit',compact('khuyenmai','ngaybd','ngaykt','message'));
        }
        if ($ngayketthuc < $now) {
            $message = "Ngày kết thúc phải diễn ra sau ngày hôm nay.";
            return view('admins.khuyenmai.edit',compact('khuyenmai','ngaybd','ngaykt','message'));
        }
        if ($ngaybatdau < $now) {
            $active = 1;
        }

        $ngaybatdau = date('Y-m-d H:i:s',$ngaybatdau);
        $ngayketthuc = date('Y-m-d H:i:s',$ngayketthuc);
        $this->khuyenmai->find($id)->update([
            'name'=> $request->name,
            'ngaybatdau'=> $ngaybatdau,
            'ngayketthuc'=> $ngayketthuc,
            'active'=>$active,
        ]);
        return redirect()->route('khuyenmai.index');
    }
    public function delete($id){
        return $this->deleteModelTrait($id,$this->khuyenmai);
    }
    public function add_product($id){
        $spkm = [];
        foreach ($this->chitietkhuyenmai->where('active',1)->get() as $ctkm){
            $spkm[] = $ctkm->sanpham_id;
        }
        $sanphams = $this->sanpham->whereNotIn('id',$spkm)->get();
        $khuyenmai = $this->khuyenmai->find($id);
        $chitietkhuyenmais = $this->chitietkhuyenmai->where('khuyenmai_id',$id)->get();
        $i = -1;
        $ngaybd =Carbon::parse($khuyenmai->ngaybatdau)->format('Y-m-d').'T'.Carbon::parse($khuyenmai->ngaybatdau)->format('H:i');
        $ngaykt =Carbon::parse($khuyenmai->ngayketthuc)->format('Y-m-d').'T'.Carbon::parse($khuyenmai->ngayketthuc)->format('H:i');
        return view('admins.khuyenmai.add_product',compact('khuyenmai','ngaybd','ngaykt','sanphams','chitietkhuyenmais','i'));
    }
    public function post_add_product($id,Request $request){
        $sanpham = $request->sanpham;
        $soluong = $request->soluong;
        $tyle = $request->tyle;
        $chitietkhuyenmai = $this->chitietkhuyenmai->where('khuyenmai_id',$id)->get();
        if ($chitietkhuyenmai->count()!=0){
            unset($sanpham[0]);
        }
        foreach ($chitietkhuyenmai as $ctkm) {
            foreach ($sanpham as $key=>$spkm) {
                if ($ctkm->sanpham_id==$spkm){
                    $chitietkhuyenmai->find($ctkm->id)->update([
                        'soluong'=>$request->soluong[$key],
                        'tyle'=> $request->tyle[$key],
                    ]);
                    unset($sanpham[$key]);
                }
            }
        }
        foreach ($sanpham as $key=>$spkm){
            $this->chitietkhuyenmai->create([
                'sanpham_id' => $spkm,
                'khuyenmai_id'=>$id,
                'soluong'=>$request->soluong[$key],
                'tyle'=>$request->tyle[$key],
                'active'=>1,
            ]);
        }
        return redirect()->route('khuyenmai.index');
    }
    public function active_product($id){
        try{
            $number = 1;
            if($this->chitietkhuyenmai->find($id)->active==1){
                $number = 0;
            }
            $this->chitietkhuyenmai->find($id)->update([
                'active'=> $number,
            ]);
            return Response()->json([
                'code'=>200,
                'message'=>'success'
            ],200);
        }catch (\Exception $exception){
            Log::error('Message'.$exception->getMessage().'Line : '.$exception->getLine());
            return Response()->json([
                'code'=>500,
                'message'=>'fail'
            ],500);
        }
    }
}
