<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    //
     protected $connection='mysql';
    protected $table= 'teachers';

    protected $fillable= [
    	'card','name','last_name','phone','degree','image','state','user_create','user_update'
    ];
    
    public function teachers_careers(){//un paralelo puede ser asignado a una materia_paralelo
    return $this->hasMany(teachers_careers::class,'teacher_id','id');
}
}
