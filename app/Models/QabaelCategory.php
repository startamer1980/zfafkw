<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QabaelCategory extends Model
{

    protected $table = 'category_qabael';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'image', 'sort', 'created_at', 'updated_at',
    ];


    public function ScopeSelection($query){
        return $query -> get();
    }

    public function getImageAttribute($val){
        return ($val !== null) ? asset('assets/'. $val) : "";
    }
    public function ScopeLastSortNumber($query){
    try {
        return $query ->select('sort')->orderBy('id', 'DESC')->first()->sort;
    }catch (\Exception $ex){
        return 0;
    }

}
}
