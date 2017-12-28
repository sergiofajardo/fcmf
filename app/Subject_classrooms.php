<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject_classrooms extends Model
{
     protected $connection='mysql';
    protected $table= 'ubject_classrooms';

    protected $fillable= [
    	'teacher_id','subject_id','classroom_id','user_create','user_update'
    ];

    public function Teachers(){//una materia_paralelo puede tener un docente
    return $this->belongsTo(Teachers::class,'id','teacher_id');
}
public function Subjects(){//una materia_paralelo puede tener mas de una materia
    return $this->hasMany(Subjects::class,'id','subject_id');
}
public function Classrooms(){//una materia_paralelo puede tener mas de un paralelo
    return $this->hasMany(Classrooms::class,'id','classroom_id');
}

}
