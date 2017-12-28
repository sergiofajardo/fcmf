<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
     protected $connection='mysql';
    protected $table= 'schedules';

    protected $fillable= [
    	'pyshical_space_id','period_cycle_id','day_id','hour_id','subject_classroom_id','observation','state','user_create','user_update'
    ];

    public function Physical_spaces(){
    return $this->hasMany(Physical_spaces::class,'id','pyshical_space_id');
    }
    public function Period_cycles(){
    return $this->belongsTo(Period_cycles::class,'id','period_cycle_id');
}
    public function Days(){
    return $this->hasMany(Days::class,'id','day_id');
}
    public function Hours(){
    return $this->hasMany(Hours::class,'id','hour_id');
}
    public function Subject_classrooms(){
    return $this->hasMany(Subject_classrooms::class,'id','subject_classroom_id');
    
}
}
