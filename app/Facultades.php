<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultades extends Model
{
    protected $connection='mysql';

    protected $fillable= [
    	'facultad','telefono', 'direccion','logo','usuario_creacion','usuario_modificacion','mision','vision'
    ];
    //relaciones
public function carreras(){//una facultad puede tener muchas carreras
    return $this->hasMany(Carreras::class,'id_facultad','id_facultad');
}
public function espacios_fisicos(){//una facultad puede tener muchos espacios fisicos
    return $this->hasMany(espacios_fisicos::class,'id_facultad','id_facultad');
}
}

