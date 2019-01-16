<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use App\Model\Core\Department;
use App\Model\Core\City;

class Entity extends Model
{
    protected $fillable = [
		'nit',
		'name',
		'department',
		'city',
		'adress',
		'phone1',
		'phone2',
		'phone3',
		'email_institutional',
		'description',
		'slogan',
		'scutcheon1',
		'scutcheon2',
		'label',
		'active'
	];

    //found attr_id
    public function department_class(){
        return Department::find($this->id);
    }

    public function city_class(){
        return City::find($this->id);
    }

    //Query Scope
    public function scopeNit($query,$nit){
    	if($nit){
    		return $query->where('nit','LIKE',"%$nit%");
    	}
    }
    public function scopeName($query,$name){
    	if($name){
    		return $query->where('name','LIKE',"%$name%");
    	}
    }
    public function scopeDescription($query,$description){
    	if($description){
    		return $query->where('description','LIKE',"%$description%");
    	}
    }

    public function repository($user_id){
        if (is_dir('entities/'.$user_id)){
            return false;
        }
        if(!mkdir('entities/'.$user_id.'/profile',0777,true)){
            return false;
        }
        chmod('entities/'.$user_id, 0777);
        if (!copy('images/scutcheon/default2.png', 'entities/'.$user_id.'/profile/default.png')) {
           return false;
        }
        chmod('entities/'.$user_id.'/profile/default.png', 0777);
    }   
}