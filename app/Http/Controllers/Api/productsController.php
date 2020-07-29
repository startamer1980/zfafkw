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
    public function increaseViews($id){

        $result = array();

            try {
                $hall = WeddingHalls::find($id);
                if(!$hall){
                    $result['status'] = false;
                    $result['message']= "هذا العنصر غير موجود او تم حذفه";
                }
                $hall->increment('views');
                $hall->save;
                $result['status'] = true;
                $result['message']= "تمت العمليه بنجاح";
            }catch (\Exception $ex){
                $result['status'] = false;
                $result['message']= "حدث خطأ حاول مره اخري لاحقاً";
            }
            return response()->json($result);
    }
}
