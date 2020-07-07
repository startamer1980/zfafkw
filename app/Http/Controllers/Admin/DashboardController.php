<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        // Get the currently authenticated user...

        $user = Auth::user();

            return view('admin.dashboard');
    }

}
