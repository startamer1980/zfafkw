<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QabaelCategoryRequest;
use App\Models\QabaelCategory;
use Illuminate\Http\Request;

class QabaelCategoryController extends Controller
{
    public function index(){
        $qabael_cat = QabaelCategory::selection();
        return view('admin.qabael.category.index', compact('qabael_cat'));
    }
    public function create(){
        $lastSort= QabaelCategory::lastSortNumber() + 1;
        return view('admin.qabael.category.create', compact('lastSort'));
    }

    public function store(QabaelCategoryRequest $request){
        try {
            $filepath = "";
            if($request->has('image')){
                $filepath = uploadImage('qabael_categories', $request->image);
            }

            QabaelCategory::create([
                'title' => $request->title,
                'image' => $filepath,
                'sort' => $request->sort
            ]);

            return redirect()->route('admin.qabael.category')->with(['success'=>'تم الحفظ بنجاح']);
        }catch (\Exception $ex){
            return $ex;
//            return redirect()->route('admin.qabael.category')->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }

    }

    public function edit($id){

        $qabela = QabaelCategory::selection()->find($id);
        if(!$qabela){
            return redirect()->route('admin.qabael.category')->with(['error'=>'هذا المشرف غير موجود']);
        }
        return view('admin.qabael.category.edit', compact('qabela'));
    }

    public function update($id, QabaelCategoryRequest $request){
        try {
            $qabela = QabaelCategory::find($id);
            if(!$qabela){
                return redirect()->route('admin.qabael.category.edit', $id)->with(['error'=>'هذا المشرف غير موجود']);
            }

            if($request->has('image')){
                $filepath = uploadImage('qabael_categories', $request->image);
                QabaelCategory::where('id', $id)->update(
                    [
                        'image'=>$filepath,
                    ]
                );
            }

            $qabela->update([
                'title' => $request->title,
                'sort' => $request->sort
            ]);
            return redirect()->route('admin.qabael.category')->with(['success'=>'تم التحديث بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.qabael.category')->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }
    }


    public function destroy($id){
        try {
            $qabela = QabaelCategory::find($id);
            if(!$qabela){
                return redirect()->route('admin.qabael.category', $id)->with(['error'=>'هذا المشرف غير موجود']);
            }
            $qabela->delete();
            return redirect()->route('admin.qabael.category')->with(['success'=>'تم الحذف بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.qabael.category')->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }
    }
}
