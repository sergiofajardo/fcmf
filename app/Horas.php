<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horas extends Model
{
    //
     protected $connection='mysql';
    protected $table= 'horas';

    protected $fillable= [
    	'desde','hasta','estado','usuario_creacion','usuario_modificacion'
    ];
    
    public function Horarios(){//una hora se puede asignar a muchos horarios
    return $this->hasMany(Horarios::class,'id_hora','id_hora');
} 
}
