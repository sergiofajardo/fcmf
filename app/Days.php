<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    //
    protected $connection='mysql';
    protected $table= 'days';

    protected $fillable= [
    	'name','user_create','user_update'
    ];

   public function Schedules(){//un dia se puede asignar a muchos horarios
    return $this->hasMany(Schedules::class,'day_id','id');
} 
}
