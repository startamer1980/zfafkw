<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'description', 'active', 'main_category', 'is_hase_sub_category', 'type_category', 'sort', 'created_at', 'updated_at',
    ];



    ############################ Begain main category ######################################################
    public function ScopeSortNumberLastMainCategory($query){
        try {
            return $query ->select('sort')-> where('main_category', 0)->orderBy('id', 'DESC')->first()->sort;
        }catch (\Exception $ex){
            return 0;
        }

    }

    public function ScopeActiveMainCategory($query){
        return $query -> where(['active'=> 1, 'main_category'=> 0]);
    }


    public function ScopeGetAllMainCategory($query){

        return $query-> select('id', 'name', 'description', 'type_category', 'is_hase_sub_category', 'image','active','sort')->where('main_category', 0)->orderBy('sort', 'asc');
    }

    public function getActive(){
        return $this->active == 1 ? 'مفعل' : 'غير مفعل';
    }

    public function getImageAttribute($val){
        return ($val !== null) ? asset('assets/'. $val) : "";
    }

    ############################ End main category ######################################################


    ############################ Begain sub category ######################################################
    public function ScopeSortNumberLastSubCategory($query, $mainCategory){
        try {

           return  $this->where('main_category',$mainCategory)->orderBy('sort', 'desc')->first()->sort;
        }catch (\Exception $ex){
            return 0;
        }
        
    }

    public function ScopeActiveSubCategory($query, $mainCategory){
        return $query -> where(['active'=> 1, 'main_category'=> $mainCategory]);
    }

    public function ScopeGetAllSubCategory($query, $mainCategory){

        return $query-> select('id', 'name', 'type_category', 'image','active','sort')->where('main_category', $mainCategory)->orderBy('id', 'desc');
    }
    ############################ End sub category ######################################################
}
