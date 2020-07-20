<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WeddingHalls;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public function getProductList($cat_id){

        $result = WeddingHalls::getProductsListActiveForCatId($cat_id)->paginate(PAGINATION_API_COUNT);
        $resultArray = $result->toArray();
        $products = $resultArray["data"];
        unset($resultArray['data']);
        $resultArray['products'] = $products;
        return response()->json($resultArray);
    }
}
