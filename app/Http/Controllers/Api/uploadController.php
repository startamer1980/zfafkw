<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class uploadController extends Controller
{
    use GeneralTrait;
    public function uploadFile(Request $request){
        try {
            if($request->hasFile('images')){
                $images=array();
                $imagesFiles= $request->file('images');
                    foreach($imagesFiles as $item){
                        $images[] = uploadImage('halls', $item);
                    }
                    return $this->returnData("url", implode(",",$images) , 'تم الرفع بنجاح');

            }else{
                $this->returnError("لم يتم ارسال اي ملفات لرفعها, نرجوا اعادة المحاوله");
            }
        } catch (Exception $ex){
            return $ex;
        }
    }
}
