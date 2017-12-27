<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo_ciclos extends Model
{
      protected $connection='mysql';
    protected $table= 'periodo_ciclo';

    protected $fillable= [
    	'anio','ciclo','estado','usuario_creacion','usuario_modificacion'
    ];
public function Horarios(){//un periodo_ciclo puede tener muchos horarios
    return $this->hasMany(Horarios::class,'id_periodo_ciclo','id_periodo_ciclo');
} 

}
