<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classrooms extends Model
{
     protected $connection='mysql';
    protected $table= 'classrooms';

    protected $fillable= [
    	'code','state','user_create','user_update'
    ];
 
  public function Subject_classroom(){//un paralelo puede tener muchas materias
    return $this->hasMany(Subject_classrooms::class,'classroom_id','id');
}

}
