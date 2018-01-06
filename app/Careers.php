<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Careers extends Model
{
    protected $connection='mysql';
    protected $table= 'careers';

    protected $fillable= [
    	'name','faculty_id','phone', 'address','image','user_create','user_update','mission','vision'
    ];
    //relaciones
public function Faculty(){//una ccarrera puede pertenecer a una sola facultad
    return $this->belongsTo(Faculties::class,'id','faculty_id');
}
public function teachers_careers(){//una carrera puede tener muchas materias 
    return $this->hasMany(teachers_careers::class,'career_id','id');
}



}


