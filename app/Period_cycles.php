<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period_cycles extends Model
{
      protected $connection='mysql';
    protected $table= 'period_cycles';

    protected $fillable= [
    	'year','cycle','state','user_create','user_update'
    ];
public function Schedules(){//un periodo_ciclo puede tener muchos horarios
    return $this->hasMany(Schedules::class,'period_cycle_id','id');
} 

}
