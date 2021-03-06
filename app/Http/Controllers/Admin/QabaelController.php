<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QabelaForm1Requests;
use App\Models\Category;
use App\Models\QabaelCategory;
use App\Models\WeddingHalls;
use App\User;
use Illuminate\Http\Request;

class QabaelController extends Controller
{
    public function cat($cat_id){
        $cat = Category::find($cat_id);
        $qa_cat = QabaelCategory::selection()->where('cat_type', 0);
        return view('admin.qabael.cat', compact('cat', 'qa_cat'));
    }
    public function form1index($qa_id, $type_id){
        $qabela = Category::find($qa_id);
        $type = QabaelCategory::find($type_id);
        $list = WeddingHalls::qabelaSelection($qa_id, $type_id);
        return view('admin.qabael.form1.index', compact('list', 'qabela', 'type'));

    }
    public function form1create($qa_id, $type_id){
        $qabela = Category::find($qa_id);
        $type = QabaelCategory::find($type_id);
        $users = User::selection();
        return view('admin.qabael.form1.create', compact('qabela', 'type', 'users'));
    }
    public function form1store (QabelaForm1Requests $request, $qabela_id, $type_id){

        try {
            $filepath = "";
            if($request->has('image')){
                $filepath = uploadImage('qabael_categories', $request->image);
            }

            WeddingHalls::create([
                'user_id'       =>$request->user_id,
                'cat_id'        =>$qabela_id,
                'type_cat_id'   =>$type_id,
                'image'         =>$filepath,
                'title'         =>$request->title,
                'description'   =>$request->description
            ]);

            return redirect()->route('admin.qabael.form1.index', [$qabela_id, $type_id])->with(['success'=>'تم الحفظ بنجاح']);
        }catch (\Exception $ex){
            return $ex;
            return redirect()->route('admin.qabael.form1.index', [$qabela_id, $type_id])->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }

    }

    public function form1edit($qa_id, $type_id, $id){
        $qabela = Category::find($qa_id);
        $type = QabaelCategory::find($type_id);
        $hall = WeddingHalls::find($id);
        $users = User::selection();
        return view('admin.qabael.form1.edit', compact('hall', 'qabela', 'type', 'users'));

    }



    public function form1update($cat_id, $type_id, $id, QabelaForm1Requests $request){

        try {
            $hall = WeddingHalls::find($id);
            if(!$hall){
                return redirect()->route('admin.qabael.form1.index', [$cat_id, $type_id])->with(['error'=>'هذا العنصر غير موجود']);
            }

            if($request->has('image')){
                $filepath = uploadImage('halls', $request->image);
                WeddingHalls::where('id', $id)->update(
                    [
                        'image'=>$filepath,
                    ]
                );
            }

            $hall->update([
                'title'         =>$request->title,
                'description'   =>$request->description,
                'user_id'        =>$request->user_id
            ]);
            return redirect()->route('admin.qabael.form1.index', [$cat_id, $type_id])->with(['success'=>'تم الحفظ بنجاح']);
        }catch (\Exception $ex) {
            return $ex;
            return redirect()->route('admin.qabael.form1.index', [$cat_id, $type_id])->with(['error'=>'حدث خطأ, حاول مره اخري']);

        }
    }

    public function form1destroy($qabela_id, $type_id, $id){
        try {
            $cat = WeddingHalls::find($id);
            if(!$cat){
                return redirect()->route('admin.qabael.form1.index', [$qabela_id, $type_id])->with(['error'=>'هذا القسم غير موجود']);
            }
            $cat->delete();
            return redirect()->route('admin.qabael.form1.index', [$qabela_id, $type_id])->with(['success'=>'تم الحذف بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.qabael.form1.index', [$qabela_id, $type_id])->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }
    }


}
