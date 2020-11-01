<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;

class PageController extends Controller
{

    public function edit($id){

        $page = Page::find($id);
        if(!$page){
            return redirect()->back()->with(['error'=>'حدث خطا..  نرجوا المحاوله مره اخرى.']);
        }
        return view('admin.page.edit', compact('page'));
    }

    public function update($id, PageRequest $request){
        try {
            $page = Page::find($id);
            if(!$page){
                return 1;
                return redirect()->back()->with(['error'=>'حدث خطا..  نرجوا المحاوله مره اخرى.']);

            }


            $page->update([
                'content' => $request->content
            ]);
            return redirect()->back()->with(['success'=>'تم التحديث بنجاح']);
        }catch (\Exception $ex){
            return $ex;
            return redirect()->back()->with(['error'=>'حدث خطأ, حاول مره اخري']);
        }
    }
}
