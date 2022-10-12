<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Gửi mail
Route::get('/email/verify', function () {
    return view('users.vefiyemail');
})->middleware('CheckUser')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('home');
})->middleware(['signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['throttle:6,1'])->name('verification.send');

//FileManager
Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth:admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

//AdminLogin
Route::prefix('admin')->group(function (){
    Route::get('/login',[
        'as'=>'admin.login',
        'uses'=>'App\Http\Controllers\AdminLoginController@login',
    ])->middleware('Admin');
    Route::post('/login',[
        'as'=>'admin.loginPost',
        'uses'=>'App\Http\Controllers\AdminLoginController@loginPost',
    ]);
    Route::get('/logout',[
        'as'=>'admin.logout',
        'uses'=>'App\Http\Controllers\AdminLoginController@logout',
    ]);
});

//Admin
Route::prefix('admin')->middleware('CheckAdmin')->group(function (){
    Route::get('/',[
       'as'=>'admin.dashboard.index',
       'uses'=>'App\Http\Controllers\AdminDashboardController@index',
    ]);

    Route::get('/xoabinhluan',[
        'as'=>'admin.dashboard.delete',
        'uses'=>'App\Http\Controllers\AdminDashboardController@delete',
    ]);

    Route::prefix('categories')->group(function (){
        Route::get('/',[
            'as' =>'categories.index',
            'uses' => 'App\Http\Controllers\AdminCategoryController@index',
        ]);
        Route::get('/create',[
            'as'=>'categories.create',
            'uses' => 'App\Http\Controllers\AdminCategoryController@create',
        ]);
        Route::post('/store',[
            'as'=>'categories.store',
            'uses' => 'App\Http\Controllers\AdminCategoryController@store',
        ]);
        Route::get('/edit/{id}',[
            'as'=>'categories.edit',
            'uses' => 'App\Http\Controllers\AdminCategoryController@edit',
        ]);
        Route::post('/update/{id}',[
            'as'=>'categories.update',
            'uses' => 'App\Http\Controllers\AdminCategoryController@update',
        ]);
        Route::get('/delete/{id}',[
            'as'=>'categories.delete',
            'uses' => 'App\Http\Controllers\AdminCategoryController@delete',
        ]);
    });

    Route::prefix('menu')->group(function (){
        Route::get('/',[
            'as'=>'menu.index',
            'uses' => 'App\Http\Controllers\AdminMenuController@index',
        ]);
        Route::get('/create',[
            'as'=>'menu.create',
            'uses'=>'App\Http\Controllers\AdminMenuController@create',
        ]);
        Route::post('/store',[
            'as'=>'menu.store',
            'uses'=>'App\Http\Controllers\AdminMenuController@store',
        ]);
        Route::get('/edit/{id}',[
            'as'=>'menu.edit',
            'uses' => 'App\Http\Controllers\AdminMenuController@edit',
        ]);
        Route::post('/update/{id}',[
            'as'=>'menu.update',
            'uses' => 'App\Http\Controllers\AdminMenuController@update',
        ]);
        Route::get('/delete/{id}',[
            'as'=>'menu.delete',
            'uses' => 'App\Http\Controllers\AdminMenuController@delete',
        ]);
    });

    Route::prefix('product')->group(function (){
        Route::get('/',[
            'as'=>'product.index',
            'uses'=> 'App\Http\Controllers\AdminSanphamController@index',
        ]);
        Route::get('/create',[
            'as'=>'product.create',
            'uses'=> 'App\Http\Controllers\AdminSanphamController@create',
        ]);
        Route::post('/store',[
            'as'=>'product.store',
            'uses'=>'App\Http\Controllers\AdminSanphamController@store',
        ]);
        Route::get('/edit/{id}',[
            'as'=>'product.edit',
            'uses' => 'App\Http\Controllers\AdminSanphamController@edit',
        ]);
        Route::post('/update/{id}',[
            'as'=>'product.update',
            'uses' => 'App\Http\Controllers\AdminSanphamController@update',
        ]);
        Route::get('/delete/{id}',[
            'as'=>'product.delete',
            'uses' => 'App\Http\Controllers\AdminSanphamController@delete',
        ]);
        Route::get('/active/{id}',[
            'as'=>'product.active',
            'uses' => 'App\Http\Controllers\AdminSanphamController@active',
        ]);
    });

    Route::prefix('khuyenmai')->group(function (){
        Route::get('/',[
            'as'=>'khuyenmai.index',
            'uses'=> 'App\Http\Controllers\AdminKhuyenMaiController@index',
        ]);
        Route::get('/create',[
            'as'=>'khuyenmai.create',
            'uses'=> 'App\Http\Controllers\AdminKhuyenMaiController@create',
        ]);
        Route::post('/store',[
            'as'=>'khuyenmai.store',
            'uses'=> 'App\Http\Controllers\AdminKhuyenMaiController@store',
        ]);
        Route::get('/edit/{id}',[
            'as'=>'khuyenmai.edit',
            'uses'=> 'App\Http\Controllers\AdminKhuyenMaiController@edit',
        ]);
        Route::post('/update/{id}',[
            'as'=>'khuyenmai.update',
            'uses'=> 'App\Http\Controllers\AdminKhuyenMaiController@update',
        ]);
        Route::get('/delete/{id}',[
            'as'=>'khuyenmai.delete',
            'uses'=> 'App\Http\Controllers\AdminKhuyenMaiController@delete',
        ]);
        Route::get('/add_product/{id}',[
            'as'=>'khuyenmai.add_product',
            'uses'=> 'App\Http\Controllers\AdminKhuyenMaiController@add_product',
        ]);
        Route::post('/post_add_product/{id}',[
            'as'=>'khuyenmai.post_add_product',
            'uses'=> 'App\Http\Controllers\AdminKhuyenMaiController@post_add_product',
        ]);
        Route::get('/active_product/{id}',[
            'as'=>'khuyenmai.active_product',
            'uses'=> 'App\Http\Controllers\AdminKhuyenMaiController@active_product',
        ]);
    });

    Route::prefix('/donhang')->group(function (){
        Route::get('/choduyet/',[
           'as'=>'admindonhang.choduyet',
           'uses'=>'App\Http\Controllers\AdminDonHangController@choduyet'
        ]);
        Route::get('/danggiao/',[
            'as'=>'admindonhang.danggiao',
            'uses'=>'App\Http\Controllers\AdminDonHangController@danggiao'
        ]);
        Route::get('/dagiao/',[
            'as'=>'admindonhang.dagiao',
            'uses'=>'App\Http\Controllers\AdminDonHangController@dagiao'
        ]);
        Route::get('/huy/',[
            'as'=>'admindonhang.huy',
            'uses'=>'App\Http\Controllers\AdminDonHangController@huy'
        ]);
        Route::get('/view/{id}',[
           'as'=>'admindonhang.view',
            'uses'=>'App\Http\Controllers\AdminDonHangController@view'
        ]);
        Route::get('/huydon/',[
            'as'=>'admindonhang.huydon',
            'uses'=>'App\Http\Controllers\AdminDonHangController@huydon'
        ]);
        Route::get('/duyetdon/',[
            'as'=>'admindonhang.duyetdon',
            'uses'=>'App\Http\Controllers\AdminDonHangController@duyetdon'
        ]);
        Route::get('/xacnhandon/',[
            'as'=>'admindonhang.xacnhandon',
            'uses'=>'App\Http\Controllers\AdminDonHangController@xacnhandon'
        ]);
    });

    Route::prefix('/baocao')->group(function (){
        Route::get('/',[
           'as'=>'baocao.index',
            'uses'=>'App\Http\Controllers\AdminBaoCaoController@index'
        ]);
        Route::get('/selectDT',[
            'as'=>'baocao.selectdt',
            'uses'=>'App\Http\Controllers\AdminBaoCaoController@selectdt'
        ]);
        Route::get('/dukien',[
            'as'=>'baocao.dtdk',
            'uses'=>'App\Http\Controllers\AdminBaoCaoController@dtdk'
        ]);
        Route::get('/dukien/selectDTDK',[
            'as'=>'baocao.selectdtdk',
            'uses'=>'App\Http\Controllers\AdminBaoCaoController@selectdtdk'
        ]);
        Route::get('/sanpham',[
           'as'=>'baocao.sanpham',
           'uses'=>'App\Http\Controllers\AdminBaoCaoController@sanpham'
        ]);
    });

    Route::prefix('/user')->group(function (){
        Route::get('/',[
            'as'=>'admins.user.index',
            'uses'=>'App\Http\Controllers\AdminUserController@index'
        ]);
        Route::get('/user.active',[
            'as'=>'admins.user.active',
            'uses'=>'App\Http\Controllers\AdminUserController@active'
        ]);
    });
    Route::prefix('/admin')->middleware('CheckQuanTri')->group(function (){
        Route::get('/',[
            'as'=>'admins.admin.index',
            'uses'=>'App\Http\Controllers\QuanLyAdminController@index',
        ]);
        Route::get('/user.active',[
            'as'=>'admins.admin.active',
            'uses'=>'App\Http\Controllers\QuanLyAdminController@active',
        ]);
        Route::get('/addAdmin',[
            'as'=>'admins.admin.add',
            'uses'=>'App\Http\Controllers\QuanLyAdminController@add',
        ]);
        Route::post('/addAdmin',[
            'as'=>'admins.admin.addPost',
            'uses'=>'App\Http\Controllers\QuanLyAdminController@addPost',
        ]);
    });
    Route::prefix('taikhoan')->group(function (){
        Route::get('/',[
            'as'=>'admintaikhoan.index',
            'uses'=>'App\Http\Controllers\AdminTaiKhoanController@index'
        ]);
        Route::post('/edit',[
            'as'=>'admintaikhoan.update',
            'uses'=> 'App\Http\Controllers\AdminTaiKhoanController@update'
        ]);
        Route::get('/re-pass',[
            'as'=>'admintaikhoan.re_pass',
            'uses'=> 'App\Http\Controllers\AdminTaiKhoanController@re_pass'
        ]);
        Route::post('/re-pass',[
            'as'=>'admintaikhoan.re_passPost',
            'uses'=> 'App\Http\Controllers\AdminTaiKhoanController@re_passPost'
        ]);
    });
});

//UserLogin
Route::prefix('/')->group(function (){
    Route::get('/login',[
        'as'=>'user.login',
        'uses'=>'App\Http\Controllers\UserLoginController@login',
        'middleware'=>'CheckLogin'
    ]);
    Route::post('/login',[
        'as'=>'user.loginPost',
        'uses'=>'App\Http\Controllers\UserLoginController@loginPost',
        'middleware'=>'CheckLogin'
    ]);
    Route::get('/register',[
        'as'=>'user.register',
        'uses'=>'App\Http\Controllers\UserLoginController@register',
        'middleware'=>'CheckLogin'
    ]);
    Route::post('/register',[
        'as'=>'user.registerPost',
        'uses'=>'App\Http\Controllers\UserLoginController@registerPost',
        'middleware'=>'CheckLogin'
    ]);
    Route::get('/logout',[
        'as'=>'user.logout',
        'uses'=>'App\Http\Controllers\UserLoginController@logout',
    ]);
    Route::get('/reload-captcha',[
       'as'=>'user.reloadcaptcha',
       'uses'=>'\App\Http\Controllers\UserLoginController@reloadCaptcha'
    ]);
});

//Web
Route::prefix('/')->group(function (){
    Route::get('/',[
       'as'=>'home',
       'uses'=>'App\Http\Controllers\HomeController@index'
    ]);

    Route::prefix('/sanpham')->group(function (){
        Route::get('/',[
           'as'=>'sanpham.index',
           'uses'=>'App\Http\Controllers\SanPhamController@index'
        ]);
        Route::get('/chitiet/{id}',[
           'as'=>'sanpham.chitiet',
           'uses'=>'App\Http\Controllers\SanPhamController@chitiet'
        ]);

        Route::get('/danhmuc/{id}',[
           'as'=>'sanpham.danhmuc',
           'uses'=>'App\Http\Controllers\SanPhamController@danhmuc'
        ]);
        Route::get('/{danhmuc}/{id}',[
           'as'=>'sanpham.hangsanxuat',
            'uses'=>'App\Http\Controllers\SanPhamController@hangsanxuat'
        ]);
        Route::get('/khuyenmai',[
           'as'=>'sanpham.khuyenmai',
           'uses'=>'App\Http\Controllers\SanPhamController@khuyenmai'
        ]);
        Route::get('/timkiem',[
            'as' => 'sanpham.timkiem',
            'uses' => 'App\Http\Controllers\SanPhamController@timkiem'
        ]);
    });

    Route::prefix('binhluan')->group(function (){
        Route::post('/',[
            'as'=>'binhluan.add',
            'uses'=>'App\Http\Controllers\BinhLuanController@add',
        ]);
        Route::get('/delete',[
            'as'=>'binhluan.delete',
            'uses'=>'App\Http\Controllers\BinhLuanController@delete',
        ]);
    });

    Route::prefix('giohang')->group(function (){
        Route::get('/',[
            'as'=>'giohang.index',
            'uses'=> 'App\Http\Controllers\GioHangController@index'
        ]);
        Route::get('/add-cart/{id}',[
            'as'=>'giohang.add',
            'uses'=> 'App\Http\Controllers\GioHangController@addCart'
        ]);
        Route::get('/update-cart',[
            'as'=>'giohang.update',
            'uses'=> 'App\Http\Controllers\GioHangController@update'
        ]);
        Route::get('/delete-cart',[
            'as'=>'giohang.delete',
            'uses'=> 'App\Http\Controllers\GioHangController@delete'
        ]);
    });

    Route::prefix('dathang')->middleware('CheckDathang')->group(function (){
        Route::get('/',[
            'as'=>'dathang',
            'uses'=>'App\Http\Controllers\DatHangController@dathang',
        ]);
        Route::post('/',[
            'as'=>'dathangpost',
            'uses'=>'App\Http\Controllers\DatHangController@dathangpost',
        ]);
    });

    Route::prefix('donhang')->middleware('CheckDathang')->group(function (){
        Route::get('/',[
            'as'=>'donhang.index',
            'uses'=>'App\Http\Controllers\DonHangController@index',
        ]);
        Route::get('/{id}',[
            'as'=>'donhang.view',
            'uses'=>'App\Http\Controllers\DonHangController@view',
        ]);
        Route::get('/delete/{id}',[
            'as'=>'donhang.delete',
            'uses'=>'App\Http\Controllers\DonHangController@delete',
        ]);
    });

    Route::prefix('taikhoan')->middleware('CheckDathang')->group(function (){
        Route::get('/',[
           'as'=>'taikhoan.index',
           'uses'=>'App\Http\Controllers\TaiKhoanController@index'
        ]);
        Route::get('/edit',[
           'as'=>'taikhoan.edit',
           'uses'=> 'App\Http\Controllers\TaiKhoanController@edit'
        ]);
        Route::post('/edit',[
            'as'=>'taikhoan.update',
            'uses'=> 'App\Http\Controllers\TaiKhoanController@update'
        ]);
        Route::get('/re-pass',[
            'as'=>'taikhoan.re_pass',
            'uses'=> 'App\Http\Controllers\TaiKhoanController@re_pass'
        ]);
        Route::post('/re-pass',[
            'as'=>'taikhoan.re_passPost',
            'uses'=> 'App\Http\Controllers\TaiKhoanController@re_passPost'
        ]);
    });
});
