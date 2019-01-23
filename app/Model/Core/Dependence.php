<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

class Dependence extends Model
{
    protected $fillable = [		
		'name',		
		'adress',
		'phone1',
		'phone2',
		'phone3',
		'email_institutional',
		'description',		
		'label',
		'entity_id',
		'active'
	];

	//una mesa pertenece a una entidad
    public function entity(){
        return $this->belongsTo(Entity::class);
    }

    //Query Scope    
    public function scopeName($query,$name){
    	if($name){
    		return $query->where('name','LIKE',"%$name%");
    	}
    }
    public function scopeAdress($query,$adress){
    	if($adress){
    		return $query->where('adress','LIKE',"%$adress%");
    	}
    }
}
