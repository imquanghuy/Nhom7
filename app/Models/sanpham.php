<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sanpham extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    public function images(){
        return $this->hasMany(hinhanh_sanpham::class,'sanpham_id');
    }
    public function category(){
        return $this->belongsTo(danhmuc::class,'category_id');
    }
    public function menu(){
        return $this->belongsTo(hangsanxuat::class,'menu_id');
    }
    public function khuyenmai(){
        return $this->hasMany(chitietkhuyenmai::class,'sanpham_id');
    }
}
