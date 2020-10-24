<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    ############################ Begain main category ######################################################

    public function index(){
        $categories = Category::getAllMainCategory()->paginate(PAGINATION_COUNT);
        return view('admin.category.index', compact('categories'));
    }

    public function create(){
        $lastSortNumber = Category::sortNumberLastMainCategory() +1;
        return view('admin.category.create', compact('lastSortNumber'));
    }

    public function store(CategoryRequest $request){
        try {
            $filepath = "";
            if($request->has('image')){
                $filepath = uploadImage('categories', $request->image);
            }

            Category::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $filepath,
                'active' => $request->has('active') ? 1 : 0,
                'is_hase_sub_category' => $request->has('is_hase_sub_category') ? 1 : 0,
                'type_category' => $request->type_category,
                'sort' => $request->sort
            ]);

            return redirect()->route('admin.category')->with(['success'=>'تم الحفظ بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.category')->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }

    }

    public function edit($id){

        $cat = Category::getAllMainCategory()->find($id);
        if(!$cat){
            return redirect()->route('admin.category')->with(['error'=>'هذا القسم غير موجود']);
        }
        return view('admin.category.edit', compact('cat'));
    }

    public function update($id, CategoryRequest $request){
        try {
            $cat = Category::find($id);
            if(!$cat){
                return redirect()->route('admin.category.edit', $id)->with(['error'=>'هذا القسم غير موجود']);
            }

            if($request->has('image')){
                $filepath = uploadImage('categories', $request->image);
                Category::where('id', $id)->update(
                    [
                        'image'=>$filepath,
                    ]
                );
            }


            $cat->update([
                'name' => $request->name,
                'description' => $request->description,
                'active' => $request->has('active') ? 1 : 0,
                'is_hase_sub_category' => $request->has('is_hase_sub_category') ? 1 : 0,
                'type_category' => $request->type_category,
                'sort' => $request->sort
            ]);
            return redirect()->route('admin.category')->with(['success'=>'تم التحديث بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.category')->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }
    }

    public function destroy($id){
        try {
            $cat = Category::find($id);
            if(!$cat){
                return redirect()->route('admin.category', $id)->with(['error'=>'هذا القسم غير موجود']);
            }
            $cat->delete();
            return redirect()->route('admin.category')->with(['success'=>'تم الحذف بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.category')->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }
    }


    ############################ End main category ######################################################





    ############################ Begain sub category ######################################################


    public function index_sub_category($cat_id){
        try {
            $sub_categories = Category::getAllSubCategory($cat_id)->paginate(PAGINATION_COUNT);
            $main_cat = Category::getAllMainCategory()->find($cat_id);
            return view('admin.category_sub.index', compact('sub_categories', 'cat_id', 'main_cat'));
        }catch (\Exception $ex){
            return $ex;
        }

    }

    public function create_sub_category($cat_id){
        try {
            $lastSortNumber = Category::sortNumberLastSubCategory($cat_id) + 1;
            $main_cat = Category::getAllMainCategory()->find($cat_id);

            return view('admin.category_sub.create', compact('lastSortNumber', 'cat_id', 'main_cat'));
        }catch (\Exception $ex){
            return $ex;
        }

    }


    public function store_sub_category(CategoryRequest $request, $cat_id){
        try {
            $filepath = "";
            if($request->has('image')){
                $filepath = uploadImage('categories', $request->image);
            }

            Category::create([
                'name' => $request->name,
                'image' => $filepath,
                'active' => $request->has('active') ? 1 : 0,
                'sort' => $request->sort,
                'main_category' => $cat_id,
                'is_hase_sub_category' => 0
            ]);

            return redirect()->route('admin.category.sub_category', $cat_id)->with(['success'=>'تم الحفظ بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.category.sub_category', $cat_id)->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }

    }

    public function edit_sub_category($cat_id, $id){

        $cat = Category::getAllSubCategory($cat_id)->find($id);
        $main_cat = Category::getAllMainCategory()->find($cat_id);
        if(!$cat){
            return redirect()->route('admin.category.sub_category', $cat_id)->with(['error'=>'هذا القسم غير موجود']);
        }
        try {
            return view('admin.category_sub.edit', compact('cat', 'cat_id', 'main_cat'));
        }catch (\Exception $ex){
            return $ex;
        }

    }

    public function update_sub_category($cat_id, $id, CategoryRequest $request){

        try {
            $cat = Category::find($id);
            if(!$cat){
                return redirect()->route('admin.category.sub_category', $cat_id)->with(['error'=>'هذا القسم غير موجود']);
            }

            if($request->has('image')){
                $filepath = uploadImage('categories', $request->image);
                Category::where('id', $id)->update(
                    [
                        'image'=>$filepath,
                    ]
                );
            }

            $cat->update([
                'name' => $request->name,
                'active' => $request->has('active') ? 1 : 0,
                'sort' => $request->sort
            ]);
            return redirect()->route('admin.category.sub_category', $cat_id)->with(['success'=>'تم التحديث بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.category.sub_category', $cat_id)->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }
    }


    public function destroy_sub_category($cat_id, $id){

        try {
            $sub_categories = Category::getAllSubCategory($cat_id)->paginate(PAGINATION_COUNT);
            $main_cat = Category::getAllMainCategory()->find($cat_id);
            $cat = Category::find($id);
            if(!$cat){
                return redirect()->route('admin.category.sub_category', $cat_id)->with(['error'=>'هذا القسم غير موجود']);
            }
            $cat->delete();
            return redirect()->route('admin.category.sub_category', $cat_id)->with(['success'=>'تم الحفظ بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.category.sub_category', $cat_id)->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }
    }
    ############################ End sub category ######################################################


}
