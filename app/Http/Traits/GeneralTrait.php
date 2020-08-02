<?php
namespace App\Traits;

trait GeneralTrait{

    public function getCurrentLang(){
        return app()->getLocale();
    }
    public function returnError($msg){
        return response() -> json([
           'status' => false,
            'message' => $msg
        ]);
    }
    public function returnSuccess($msg){
        return response() -> json([
           'status' => true,
            'message' => $msg
        ]);
    }
    public function returnData($key, $value, $msg = ""){
        return response()->json([
            'status' => true,
            'message' => $msg,
            $key => $value
        ]);
    }
}
