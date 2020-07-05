<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{

    use Notifiable;

    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'image', 'password', 'active', 'permission', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function ScopeSelection($query){
        return $query -> where('permission', 'admin')->get();
    }
    public function ScopeActive($query){
        return $query -> selection()->where('active', 1);
    }


    public function getActive(){
        return $this->active == 1 ? 'مفعل' : 'غير مفعل';
    }

    public function getImageAttribute($val){
        return ($val !== null) ? asset('assets/'. $val) : "";
    }

}
