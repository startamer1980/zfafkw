<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeddingHallsRequest;
use App\Models\Admin;
use App\Models\Category;
use App\Models\WeddingHalls;
use App\User;
use Illuminate\Http\Request;

class WeddingHallsController extends Controller
{
    public function index($cat_id){
        $halls = WeddingHalls::selection($cat_id);
        $cat = Category::find($cat_id);
        return view('admin.wedding_halls.index', compact('halls', 'cat'));
    }
    public function create($cat_id){
        $cat = Category::find($cat_id);
        $users = User::selection();
        return view('admin.wedding_halls.create', compact('cat', 'users'));
    }
    public function store(WeddingHallsRequest $request){

        try {
            $filepath = "";
            if($request->has('image')){
                $filepath = uploadImage('halls', $request->image);
            }

            WeddingHalls::create([
                'user_id'       =>$request->user_id,
                'cat_id'        =>$request->cat_id,
                'image'         =>$filepath,
                'title'         =>$request->name,
                'description'   =>$request->description,
                'active'        =>$request->has('active') ? 1 : 0,
                'phone'         =>$request->phone,
                'whatsapp'      =>$request->whatsapp,
                'address'       =>$request->address,
                'latitude'      =>$request->latitude,
                'longitude'     =>$request->longitude
            ]);
            return redirect()->route('admin.wedding_halls', $request->cat_id)->with(['success'=>'تم الحفظ بنجاح']);
        }catch (\Exception $ex) {
            return $ex;
            return redirect()->route('admin.wedding_halls', $request->cat_id)->with(['error' => 'حدث خطأ, حاول مره اخري']);

        }
    }


    public function edit($cat_id, $id){

        $cat = Category::find($cat_id);
        $users = User::selection();
        $hall = WeddingHalls::find($id);
        if(!$hall){
            return redirect()->route('admin.wedding_halls', $cat_id, $id)->with(['error'=>'هذا العنصر غير موجود']);
        }
        try {
            return view('admin.wedding_halls.edit', compact('cat', 'users', 'hall'));
        }catch (\Exception $ex){
            return $ex;
        }

    }



    public function update($cat_id, $id, WeddingHallsRequest $request){

        try {
            $hall = WeddingHalls::find($id);
            if(!$hall){
                return redirect()->route('admin.wedding_halls', $cat_id, $id)->with(['error'=>'هذا العنصر غير موجود']);
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
                'title'         =>$request->name,
                'description'   =>$request->description,
                'active'        =>$request->has('active') ? 1 : 0,
                'phone'         =>$request->phone,
                'whatsapp'      =>$request->whatsapp,
                'address'       =>$request->address,
                'latitude'      =>$request->latitude,
                'longitude'     =>$request->longitude
            ]);
            return redirect()->route('admin.wedding_halls', $cat_id)->with(['success'=>'تم الحفظ بنجاح']);
        }catch (\Exception $ex) {
            return $ex;
            return redirect()->route('admin.wedding_halls',$cat_id)->with(['error' => 'حدث خطأ, حاول مره اخري']);

        }
    }



    public function destroy($cat_id, $id){
        try {
            $hall = WeddingHalls::find($id);
            if(!$hall){
                return redirect()->route('admin.wedding_halls', $cat_id)->with(['error'=>'هذا المشرف غير موجود']);
            }
            $hall->delete();
            return redirect()->route('admin.wedding_halls', $cat_id)->with(['success'=>'تم الحذف بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.wedding_halls', $cat_id)->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }
    }

}
