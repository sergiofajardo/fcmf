<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hours extends Model
{
    //
     protected $connection='mysql';
    protected $table= 'hours';

    protected $fillable= [
    	'since','until','state','user_create','user_update'
    ];
    
    public function Schedules(){//una hora se puede asignar a muchos horarios
    return $this->hasMany(Horarios::class,'hour_id','id');
} 
}
