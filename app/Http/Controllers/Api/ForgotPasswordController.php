<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    use GeneralTrait;
    public function forgot() {
        $credentials = request()->validate(['email' => 'required|email']);

        Password::sendResetLink($credentials);

        return $this->returnSuccess('Reset password link sent on your email id.');
    }
    public function reset() {
        $credentials = request()->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        $reset_password_status = Password::reset($credentials, function ($user, $password) {
            $user->password = $password;
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            return $this->returnError("Invalid token provided");
        }

        return $this->returnSuccess("Password has been successfully changed");
    }
}
