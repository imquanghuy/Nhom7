<?php

namespace App\Http\Controllers;

use App\Models\chitietkhuyenmai;
use App\Models\danhmuc;
use App\Models\sanpham;
use App\Models\User;
use App\Traits\UpdateKhuyenMai;


class HomeController extends Controller
{
    use UpdateKhuyenMai;
    private $danhmuc;
    private $sanpham;
    private $chitietkhuyenmai;
    public function __construct(danhmuc $danhmuc,sanpham $sanpham,chitietkhuyenmai $chitietkhuyenmai)
    {
        $this->updateKhuyenMai();
        $this->danhmuc = $danhmuc;
        $this->sanpham = $sanpham;
        $this->chitietkhuyenmai = $chitietkhuyenmai;
    }

    public function index(){
        $danhmucs = $this->danhmuc->get();
        $sanphamnew = $this->sanpham->latest()->take(6)->get();
        $sanphamlike = $this->sanpham->latest('view','desc')->take(2)->get();
        $sanphamkhuyenmai = $this->chitietkhuyenmai->where('active',1)->latest()->take(3)->get();
        return view('users.home.index',compact('danhmucs','sanphamnew','sanphamlike','sanphamkhuyenmai'));
    }
}
