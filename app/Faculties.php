<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculties extends Model
{
    protected $connection='mysql';
    protected $table ='faculties';

    protected $fillable= [
    	'name','phone', 'address','image','user_create','user_update','mission','vision'
    ];

 
    //relaciones
public function Careers(){//una facultad puede tener muchas carreras
    return $this->hasMany(Careers::class,'faculty_id','id');
}
public function Physical_spaces(){//una facultad puede tener muchos espacios fisicos
    return $this->hasMany(Physical_spaces::class,'faculty_id','id');
}
}

