<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Registered;
use phpDocumentor\Reflection\Types\This;

class UserLoginController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login(){
        return view('users.login');
    }
    public function loginPost(UserLoginRequest $request){
        $remember = $request->has('remember_me') ? true:false;
        if (auth()->attempt([
            'email' =>$request->email,
            'password' => $request->password,
        ],$remember)){
            if(auth()->user()->loaitaikhoan!=2){
                auth()->logout();
                $message = "Tài khoản này là tài khoản quản trị viên";
                return view('users.login',compact('message'));
            }
            if(auth()->user()->active==0){
                auth()->logout();
                $message = "Tài khoản này đã bị vô hiệu hóa";
                return view('users.login',compact('message'));
            }
            return redirect()->route('home');
        } else {
            $message = "Email hoặc tài khoản sai";
            return view('users.login',compact('message'));
        }
    }
    public function register(){
        return view('users.register');
    }
    public function registerPost(UserRegisterRequest $request){
        try {
            DB::beginTransaction();
            $user =$this->user->create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'loaitaikhoan'=>2,
                'active'=>1,
            ]);
            event(new Registered($user));
            DB::commit();
            if(auth()->attempt([
                'email' =>$request->email,
                'password' => $request->password,
            ])){
                return redirect()->route('home');
            };
        } catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message' . $exception->getMessage() . 'Line : ' . $exception->getLine());
            $message = "Email đã tồn tại";
            return view('users.register',compact('message'));
        }
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('home');
    }
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
