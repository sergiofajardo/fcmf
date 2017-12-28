<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    //
     protected $connection='mysql';
    protected $table= 'teachers';

    protected $fillable= [
    	'name','last_name','phone','degree','image','state','user_create','user_update'
    ];
    
    public function Subject_classrooms(){//un paralelo puede ser asignado a una materia_paralelo
    return $this->hasMany(Subject_classrooms::class,'teacher_id','id');
}
}
