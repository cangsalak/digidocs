<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

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
}