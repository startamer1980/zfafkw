<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class QabaelController extends Controller
{
    public function cat($cat_id){
        $cat = Category::find($cat_id);
        return view('admin.qabael.cat', compact('cat'));
    }
}
