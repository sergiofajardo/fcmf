<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedules_physicals_spaces extends Model
{
     protected $connection='mysql';
    protected $table= 'schedules_physicals_spaces';

    protected $fillable= [
    	'pyshical_space_id', 'teacher_career_id','period_cycle_id','day_id','hour_id','observation','state','user_create','user_update'
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
    public function teachers_careers(){
    return $this->hasMany(teachers_careers::class,'id','teacher_career_id');
    
}
}
