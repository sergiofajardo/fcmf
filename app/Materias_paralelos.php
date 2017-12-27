<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materias_paralelos extends Model
{
     protected $connection='mysql';
    protected $table= 'materia_paralelo';

    protected $fillable= [
    	'id_docente','id_materia','id_paralelo','usuario_creacion','usuario_modificacion'
    ];

    public function Docentes(){//una materia_paralelo puede tener un docente
    return $this->belongsTo(Docentes::class,'id_docente','id_docente');
}
public function Materias(){//una materia_paralelo puede tener mas de una materia
    return $this->hasMany(Materias::class,'id_materia','id_materia');
}
public function Paralelos(){//una materia_paralelo puede tener mas de un paralelo
    return $this->hasMany(Paralelos::class,'id_paralelo','id_paralelo');
}

}
