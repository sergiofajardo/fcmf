<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
     protected $connection='mysql';
    protected $table= 'horarios';

    protected $fillable= [
    	'id_espacio_fisico','id_periodo_ciclo','id_dia','id_hora','id_materia_paralelo','observacion','estado','usuario_creacion','usuario_modificacion'
    ];

    public function Espacios_fisicos(){
    return $this->hasMany(Espacios_fisicos::class,'id_espacio_fisico','id_espacio_fisico');
    }
    public function Periodo_ciclo(){
    return $this->belongsTo(Periodo_ciclo::class,'id_periodo_ciclo','id_periodo_ciclo');
}
    public function Dias(){
    return $this->hasMany(Dias::class,'id_dia','id_dia');
}
    public function Horas(){
    return $this->hasMany(Horas::class,'id_hora','id_hora');
}
    public function Materias_paralelos(){
    return $this->hasMany(Materias_paralelos::class,'id_materia_paralelo','id_materia_paralelo');
    
}
}
