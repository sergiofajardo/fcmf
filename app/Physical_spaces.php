<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Physical_spaces extends Model
{
     protected $connection='mysql';
    protected $table= 'physical_spaces';

    protected $fillable= [
    	'faculty_id','type','locate','state','name','user_create','user_update'
    ];

    public function Faculties(){//un espacio fisico puede pertenecer a una sola facultad
    return $this->belongsTo(Faculties::class,'id','faculty_id');
}
    public function Schedules(){//un espacio fisico puede tener mas de un horaario
    return $this->hasMany(Schedules::class,'physical_space_id','id');
} 
}
