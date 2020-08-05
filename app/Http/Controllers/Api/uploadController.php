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
            if($request->has('image')){
                $filepath = uploadImage('halls', $request->image);
                return $this->returnData("url", $filepath, 'تم الرفع بنجاح');
            }else{
                $this->returnError("لم يتم ارسال اي ملفات لرفعها, نرجوا اعادة المحاوله");
            }
        } catch (Exception $ex){
            return $ex;
        }
    }
}
