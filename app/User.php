<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Session;
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
        'name','surname', 'email', 'phone','avatar', 'password','active','rol_id','rel_entity_id'
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

    /*admin methods*/

    //asignacion de permisos en session
    public function permits(){
        $permits = array();        
        foreach(Auth::user()->rol()->get()[0]->options()->get() as $key => $option) {
            if(!array_key_exists($option->module()->get()[0]->name, $permits))$permits[$option->module()->get()[0]->name]=$option->module()->get()[0]->toArray();
            $permits[$option->module()->get()[0]->name]['options'][$option->id]=$option->toArray();
        }        
        Session::put('permits', $permits);
    }

    //asignacion de permisos en session
    public function userPermits($user_id){
        $user = User::find($user_id);
        $permits = array();                
        foreach($user->rol()->get()[0]->options()->get() as $key => $option) {
            if(!array_key_exists($option->module()->get()[0]->name, $permits))$permits[$option->module()->get()[0]->name]=$option->module()->get()[0]->toArray();
            $permits[$option->module()->get()[0]->name]['options'][$option->id]=$option->toArray();
        }        
        Session::put('permits', $permits);
    }

    //repository
    public function repository($user_id){
        //verificacion de existencia de directorio
        if (is_dir('users/'.$user_id)){
            return false;
        }
        if(!mkdir('users/'.$user_id.'/profile',0777,true)){
            return false;
        }
         chmod('users/'.$user_id, 0777);
        if (!copy('images/user/default.png', 'users/'.$user_id.'/profile/default.png')) {
           return false;
        }
        chmod('users/'.$user_id.'/profile/default.png', 0777);

        if(!mkdir('users/'.$user_id.'/stores',0777,true)){
            return false;                                   
        }                               
        chmod('users/'.$user_id, 0777);
        return true;
    }
}
