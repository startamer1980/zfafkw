<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{

    public function get_main_category(){
        $result = Category::activeMainCategory()->orderby("sort", "asc")->paginate(PAGINATION_API_COUNT);
        $resultArray = $result->toArray();
        $categories = $resultArray["data"];
        unset($resultArray['data']);
        $resultArray['categories'] = $categories;
        return response()->json($resultArray);
    }

    public function get_all_qabael(){
        $result = Category::activeMainCategory()->where('type_category', 5)->orderby("sort", "asc")->paginate(PAGINATION_API_COUNT);
        $resultArray = $result->toArray();
        $categories = $resultArray["data"];
        unset($resultArray['data']);
        $resultArray['categories'] = $categories;
        return response()->json($resultArray);
    }
    public function get_sub_category($cat_id){
        $sub_categories = Category::getAllSubCategory($cat_id)->get();
        return response()->json($sub_categories);
    }
}
