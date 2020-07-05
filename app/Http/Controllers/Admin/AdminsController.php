<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminsRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index(){
        $admins = Admin::selection();
        return view('admin.admins.index', compact('admins'));
    }

    public function create(){
        return view('admin.admins.create');
    }

    public function store(AdminsRequest $request){
        try {
            $filepath = "";
            if($request->has('image')){
                $filepath = uploadImage('admins', $request->image);
            }

            Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'image' => $filepath,
                'active' => $request->has('active') ? 1 : 0
            ]);

            return redirect()->route('admin.admins')->with(['success'=>'تم الحفظ بنجاح']);
        }catch (\Exception $ex){
//            return $ex;
            return redirect()->route('admin.admins')->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }

    }



    public function edit($id){

        $admin = Admin::selection()->find($id);
        if(!$admin){
            return redirect()->route('admin.admins')->with(['error'=>'هذا المشرف غير موجود']);
        }
        return view('admin.admins.edit', compact('admin'));
    }

    public function update($id, AdminsRequest $request){
        try {
            $admin = Admin::find($id);
            if(!$admin){
                return redirect()->route('admin.admins.edit', $id)->with(['error'=>'هذا المشرف غير موجود']);
            }

            if($request->has('image')){
                $filepath = uploadImage('admins', $request->image);
                Admin::where('id', $id)->update(
                    [
                        'image'=>$filepath,
                    ]
                );
            }

            if ($request->has('password') && !is_null($request->  password)) {

                Admin::where('id', $id)->update(
                    [
                        'password' => bcrypt($request->password),
                    ]
                );
            }

            $data = $request->except('_token', 'id', 'logo', 'password');
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'active' => $request->has('active') ? 1 : 0
            ]);
            return redirect()->route('admin.admins')->with(['success'=>'تم التحديث بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.admins')->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }
    }


    public function destroy($id){
        try {
            $cat = Admin::find($id);
            if(!$cat){
                return redirect()->route('admin.admins', $id)->with(['error'=>'هذا المشرف غير موجود']);
            }
            $cat->delete();
            return redirect()->route('admin.admins')->with(['success'=>'تم الحذف بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.admins')->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }
    }

}
