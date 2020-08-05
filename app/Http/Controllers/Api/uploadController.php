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
            if($request->has('images')){
                $images=array();
                if($files=$request->file('images')){
                    foreach($files as $file){
                        $images[]=uploadImage('halls', $file);
                    }
                }
                return $this->returnData("url", implode(",",$images), 'تم الرفع بنجاح');
            }else{
                $this->returnError("لم يتم ارسال اي ملفات لرفعها, نرجوا اعادة المحاوله");
            }
        } catch (Exception $ex){
            return $ex;
        }
    }
}
