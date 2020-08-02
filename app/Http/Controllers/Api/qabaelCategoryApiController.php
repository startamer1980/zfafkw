<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\QabaelCategory;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class qabaelCategoryApiController extends Controller
{
    use GeneralTrait;
    public function list(){
        $result = QabaelCategory::selection();
        return  response()->json($result);
    }
}
