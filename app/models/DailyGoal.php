<?php

class DailyGoal extends Eloquent{

  protected $table      = 'metas_diarias';
  public    $timestamps = false;

  public function SonDailyGoal(){
    return $this->hasMany("SonDailyGoal","meta_diaria_id");
  }
  
}
