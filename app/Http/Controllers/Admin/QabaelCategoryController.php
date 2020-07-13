<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QabaelCategoryRequest;
use App\Models\QabaelCategory;
use Illuminate\Http\Request;

class QabaelCategoryController extends Controller
{
    public function index($cat_type){
        $qabael_cat = QabaelCategory::selection()->where('cat_type', $cat_type);
        return view('admin.qabael.category.index', compact('qabael_cat', 'cat_type'));
    }
    public function create($cat_type){
        $lastSort= QabaelCategory::lastSortNumber($cat_type) + 1;
        return view('admin.qabael.category.create', compact('lastSort', 'cat_type'));
    }

    public function store(QabaelCategoryRequest $request, $cat_type){
        try {
            $filepath = "";
            if($request->has('image')){
                $filepath = uploadImage('qabael_categories', $request->image);
            }

            QabaelCategory::create([
                'title' => $request->title,
                'image' => $filepath,
                'sort' => $request->sort,
                'cat_type'=> $cat_type
            ]);

            return redirect()->route('admin.qabael.category', $cat_type)->with(['success'=>'تم الحفظ بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.qabael.category', $cat_type)->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }

    }

    public function edit($cat_type, $id){

        $qabela = QabaelCategory::selection()->find($id);
        if(!$qabela){
            return redirect()->route('admin.qabael.category', $cat_type)->with(['error'=>'هذا التصنيف غير موجود']);
        }
        return view('admin.qabael.category.edit', compact('qabela', 'cat_type'));
    }

    public function update($cat_type, $id, QabaelCategoryRequest $request){
        try {
            $qabela = QabaelCategory::find($id);
            if(!$qabela){
                return redirect()->route('admin.qabael.category.edit', $id, $cat_type)->with(['error'=>'هذا المشرف غير موجود']);
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
            return redirect()->route('admin.qabael.category', $cat_type)->with(['success'=>'تم التحديث بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.qabael.category', $cat_type)->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }
    }


    public function destroy($cat_type, $id){
        try {
            $qabela = QabaelCategory::find($id);
            if(!$qabela){
                return redirect()->route('admin.qabael.category', $id, $cat_type)->with(['error'=>'هذا المشرف غير موجود']);
            }
            $qabela->delete();
            return redirect()->route('admin.qabael.category', $cat_type)->with(['success'=>'تم الحذف بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.qabael.category', $cat_type)->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }
    }
}
