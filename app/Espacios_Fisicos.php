<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Espacios_Fisicos extends Model
{
     protected $connection='mysql';
    protected $table= 'espacios_fisicos';

    protected $fillable= [
    	'id_facultad','tipo','ubicacion','estado','nombre','usuario_creacion','usuario_modificacion'
    ];

    public function Facultad(){//un espacio fisico puede pertenecer a una sola facultad
    return $this->belongsTo(Facultades::class,'id_facultad','id_facultad');
}
    public function Horarios(){//un espacio fisico puede tener mas de un horaario
    return $this->hasMany(Horarios::class,'id_espacio_fisico','id_espacio_fisico');
} 
}
