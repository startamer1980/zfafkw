<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{

    public function forgot_password(){
        return view('front.login.reset_password');
    }
}
