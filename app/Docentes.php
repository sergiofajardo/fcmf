<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docentes extends Model
{
    //
     protected $connection='mysql';
    protected $table= 'docentes';

    protected $fillable= [
    	'nombres','apellidos','telefono','titulo','imagen','estado','usuario_creacion','usuario_modificacion'
    ];
    
    public function Materia_paralelo(){//un paralelo puede ser asignado a una materia_paralelo
    return $this->hasMany(Materia_paralelo::class,'id_docente','id_docente');
}
}
