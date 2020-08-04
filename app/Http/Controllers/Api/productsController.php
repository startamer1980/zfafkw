<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeddingHallsRequest;
use App\Models\WeddingHalls;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class productsController extends Controller
{
    use GeneralTrait;
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
    public function store(Request $request){
        $filepath = "";
        try {
            if($request->has('image')){

                $filepath = uploadImage('qabael_categories', $request->image);

            }else{
                $filepath = "images/qabael_categories/hzzFyvWwfr5jk3Dfhysa8jQch50D0od9z15msaXJ.jpeg";
            }

            WeddingHalls::create([
                'user_id'       =>$request->user_id,
                'cat_id'        =>$request->cat_id,
                'type_cat_id'   =>$request->cat_type_id,
                'image'         =>$filepath,
                'title'         =>$request->name,
                'description'   =>$request->description,
                'active'        =>1,
                'phone'         =>$request->phone,
                'whatsapp'      =>$request->whatsapp,
                'address'       =>$request->address,
                'latitude'      =>$request->latitude,
                'longitude'     =>$request->longitude
            ]);
            return $this->returnSuccess("تمت الاضافه بنجاح");
        }catch (\Exception $ex) {
            return $ex;

        }
    }







    // ##################################### start qabael #######################


    public function getProductQabaelList($cat_id, $type_cat_id){

        $result = WeddingHalls::qabelaProductSelection($cat_id, $type_cat_id)->paginate(PAGINATION_API_COUNT);
        $resultArray = $result->toArray();
        $products = $resultArray["data"];
        unset($resultArray['data']);
        $resultArray['products'] = $products;
        return response()->json($resultArray);
    }

    // ##################################### end qabael #######################


}
