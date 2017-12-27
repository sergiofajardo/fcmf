<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dias extends Model
{
    //
    protected $connection='mysql';
    protected $table= 'dias';

    protected $fillable= [
    	'nombre','usuario_creacion','usuario_modificacion'
    ];

   public function Horarios(){//un dia se puede asignar a muchos horarios
    return $this->hasMany(Horarios::class,'id_dia','id_dia');
} 
}
