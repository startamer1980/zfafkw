<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin(){
        return view('admin.Auth.login');
    }
    public function login(LoginRequest $request){

        $remember_me = $request->has('remember_me') ? true : false;
        if(auth()->guard('admin')->attempt(['email'=>$request->input("email"), 'password'=>$request->input("password")])){
            //notify()->success('تم الدخول بنجاح');
            return redirect()->route('admin.dashboard');
        }
        //notify()->error('خطأ في البيانات.. يرجي المحاوله لاحقاً');
        return redirect()->route('admin.Auth.login')->with(['error'=>'هناك خطأ بالبيانات ']);
    }

    public function logout(Request $request){
        \Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('get.admin.login');
    }
}
