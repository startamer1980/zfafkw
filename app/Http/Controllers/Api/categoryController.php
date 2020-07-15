<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{

    public function get_main_category(){
        $result = Category::getAllMainCategory()->paginate(PAGINATION_API_COUNT);
//        return $result;
//        return response()->json($result);
        return response()->json($result);
    }
    public function get_sub_category($cat_id){
        $sub_categories = Category::getAllSubCategory($cat_id)->paginate(PAGINATION_API_COUNT);
        return response()->json($sub_categories);
    }
}
