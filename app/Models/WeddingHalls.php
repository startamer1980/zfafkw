<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeddingHalls extends Model
{
    protected $table = 'wedding_halls';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'cat_id', 'type_cat_id', 'image', 'img_other', 'title', 'description', 'active', 'phone', 'whatsapp', 'address', 'latitude', 'longitude', 'created_at', 'updated_at', 'views'
    ];


    public function ScopeSelection($query, $cat_id){
        return $query -> where('cat_id', $cat_id)->orderBy('id', 'desc')->get();
    }
    public function ScopeSelect($query, $cat_id){
        return $query -> where('cat_id', $cat_id)->orderBy('id', 'desc');
    }


    public function getActive(){
        return $this->active == 1 ? 'مفعل' : 'غير مفعل';
    }
    public function getImageAttribute($val){
        return ($val !== null) ? asset('assets/'. $val) : "";
    }

    public function ScopeQabelaSelection($query, $cat_id, $typeCatId){
        return $query->Selection($cat_id)-> where('type_cat_id', $typeCatId);
    }

    public function ScopeGetProductsListActiveForCatId($query, $cat_id){
        return $query -> select($cat_id)->where('active', 1);

    }
}
