<?php  

namespace App\Traits;

trait UserRelation
{
	public function user(){
        return $this->belongsTo('App\User');
    }
}