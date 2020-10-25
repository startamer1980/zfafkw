<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QabelaForm1Requests;
use App\Models\Category;
use App\Models\QabaelCategory;
use App\Models\WeddingHalls;
use App\Models\User;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function cat(){
        $cat = Category::find(17);
        $qa_cat = QabaelCategory::selection()->where('cat_type', 1);
        return view('admin.cards.cat', compact('cat', 'qa_cat'));
    }
    public function form1index($type_id){
        $qabela = Category::find(17);
        $type = QabaelCategory::find($type_id);
        $list = WeddingHalls::qabelaSelection(17, $type_id);
        return view('admin.cards.form1.index', compact('list', 'qabela', 'type'));

    }
    public function form1create($type_id){
        $qabela = Category::find(17);
        $type = QabaelCategory::find($type_id);
        $users = User::selection();
        return view('admin.cards.form1.create', compact('qabela', 'type', 'users'));
    }
    public function form1store (QabelaForm1Requests $request, $type_id){

        try {
            $filepath = "";
            if($request->has('image')){
                $filepath = uploadImage('qabael_categories', $request->image);
            }

            WeddingHalls::create([
                'user_id'       =>$request->user_id,
                'cat_id'        =>17,
                'type_cat_id'   =>$type_id,
                'image'         =>$filepath,
                'title'         =>$request->title,
                'description'   =>$request->description
            ]);

            return redirect()->route('admin.cards.form1.index', $type_id)->with(['success'=>'تم الحفظ بنجاح']);
        }catch (\Exception $ex){
            return $ex;
            return redirect()->route('admin.cards.form1.index', $type_id)->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }

    }

    public function form1edit($type_id, $id){
        $qabela = Category::find(17);
        $type = QabaelCategory::find($type_id);
        $hall = WeddingHalls::find($id);
        $users = User::selection();
        return view('admin.cards.form1.edit', compact('hall', 'qabela', 'type', 'users'));

    }



    public function form1update( $type_id, $id, QabelaForm1Requests $request){

        try {
            $hall = WeddingHalls::find($id);
            if(!$hall){
                return redirect()->route('admin.cards.form1.index', $type_id)->with(['error'=>'هذا العنصر غير موجود']);
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
            return redirect()->route('admin.cards.form1.index', $type_id)->with(['success'=>'تم الحفظ بنجاح']);
        }catch (\Exception $ex) {
            return redirect()->route('admin.cards.form1.index', $type_id)->with(['error'=>'حدث خطأ, حاول مره اخري']);

        }
    }

    public function form1destroy($type_id, $id){
        try {
            $cat = WeddingHalls::find($id);
            if(!$cat){
                return redirect()->route('admin.cards.form1.index', $type_id)->with(['error'=>'هذا القسم غير موجود']);
            }
            $cat->delete();
            return redirect()->route('admin.cards.form1.index', $type_id)->with(['success'=>'تم الحذف بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.cards.form1.index', $type_id)->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }
    }
}
