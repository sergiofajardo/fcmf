<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $connection='mysql';
    protected $table= 'subjects';

    protected $fillable= [
    	'career_id','level', 'state','name','user_create','user_update'
    ];
    //relaciones
public function Career(){//una materia puede pertenecer solo a una carrera
    return $this->belongsTo(Careers::class,'id','career_id');
}

public function Subjects_classrooms(){//una materia puede estar asignadas a mas de una materia_paralelo
    return $this->hasMany(Subjects_classrooms::class,'subject_id','id');
}
}

