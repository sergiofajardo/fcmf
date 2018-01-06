<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers_Careers extends Model
{
    //
        protected $connection='mysql';
    protected $table= 'teachers_careers';

    protected $fillable= [
    	'teacher_id','career_id','user_create','user_update'
    ];
    
    public function teachers(){//un paralelo puede ser asignado a una materia_paralelo
    return $this->hasMany(teachers::class,'id','teacher_id');
}
public function careers(){//un paralelo puede ser asignado a una materia_paralelo
    return $this->hasMany(careers::class,'id','career_id');
}

public function schedules_physicals_spaces(){//un paralelo puede ser asignado a una materia_paralelo
    return $this->hasMany(schedules_physicals_spaces::class,'teacher_career_id','id');
}


}
