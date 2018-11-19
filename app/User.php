<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'name','surname', 'email', 'phone','avatar', 'password','active','rol_id','rel_entiti_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //un usuario posee/pertenece un rol
    public function rol(){
        return $this->belongsTo(Model\Admin\Rol::class);
    }

     //un usuario posee una cuenta
    public function acount(){
        return $this->belongsTo(Model\Admin\Acount::class);
    }
}
