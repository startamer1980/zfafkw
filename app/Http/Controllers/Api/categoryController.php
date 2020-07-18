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
        // More info about toArray() method, see: vendor\laravel\framework\src\Illuminate\Pagination\LengthAwarePaginator.php file
        $resultArray = $result->toArray();

// Now, what you need is the $result["data"] element
        $categories = $resultArray["data"];
        unset($resultArray['data']);
        $resultArray['categories'] = $categories;
        return response()->json($resultArray);
    }
    public function get_sub_category($cat_id){
        $sub_categories = Category::getAllSubCategory($cat_id)->paginate(PAGINATION_API_COUNT);
        return response()->json($sub_categories);
    }
}
