<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paralelos extends Model
{
     protected $connection='mysql';
    protected $table= 'paralelo';

    protected $fillable= [
    	'codigo','estado','usuario_creacion','usuario_modificacion'
    ];
 
  public function Materia_paralelo(){//un paralelo puede tener muchas materias
    return $this->hasMany(Materia_paralelo::class,'id_paralelo','id_paralelo');
}

}
