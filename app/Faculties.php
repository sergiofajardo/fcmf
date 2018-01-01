<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Faculties extends Model
{
    protected $connection='mysql';
    protected $table ='faculties';

    protected $fillable= [
    	'name','phone', 'address','image','user_create','user_update','mission','vision'
    ];

    public function setimageAttribute($image){
$this->attributes['image'] = Carbon::now()->second.$image->getClientOriginalName();
	$name =Carbon::now()->second.$image->getClientOriginalName();
	\Storage::disk('local')->put($name ,\File::get($image));
    } 
    //relaciones
public function Careers(){//una facultad puede tener muchas carreras
    return $this->hasMany(Careers::class,'faculty_id','id');
}
public function Physical_spaces(){//una facultad puede tener muchos espacios fisicos
    return $this->hasMany(Physical_spaces::class,'faculty_id','id');
}
}

