<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
    protected $connection='mysql';
    protected $table= 'materias';

    protected $fillable= [
    	'id_carrera','nivel', 'estado','nombre','usuario_creacion','usuario_modificacion'
    ];
    //relaciones
public function Carrera(){//una materia puede pertenecer solo a una carrera
    return $this->belongsTo(Carreras::class,'id_carrera','id_carrera');
}

public function Materias_paralelos(){//una materia puede estar asignadas a mas de una materia_paralelo
    return $this->hasMany(Materias_paralelos::class,'id_materia','id_materia');
}
}

