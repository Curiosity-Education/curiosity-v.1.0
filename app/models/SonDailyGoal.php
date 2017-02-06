<?php

class SonDailyGoal extends Eloquent{

  protected $table      = 'hijos_metas_diarias';
  public    $timestamps = false;

  public function DailyGoal(){
    return $this->belongsTo("DailyGoal");
  }
  
  public function Son(){
  	return $this->belongsTo("Son");
  }

  public function ProgressGoal(){
  	return $this->hasMany("ProgressGoal","avance_id");
  }
  
}
