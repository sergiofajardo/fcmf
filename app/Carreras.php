<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carreras extends Model
{
    protected $connection='mysql';
    protected $table= 'carreras';

    protected $fillable= [
    	'carrera','id_facultad','telefono', 'direccion','logo','usuario_creacion','usuario_modificacion','mision','vision'
    ];
    //relaciones
public function Facultad(){//una ccarrera puede pertenecer a una sola facultad
    return $this->belongsTo(Facultades::class,'id_facultad','id_facultad');
}
public function Materias(){//una carrera puede tener muchas materias 
    return $this->hasMany(Materias::class,'id_carrera','id_carrera');
}

}


