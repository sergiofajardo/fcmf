<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
	use SoftDeletes;
    protected $connection='mysql';
    protected $table= 'roles';

    protected $fillable= [
    	'name', 'description'
    ];
    //relaciones
public function users(){//un rol puede tener muchos usuarios
	return $this->hasMany(User::class,'role_id','id');
}
}


