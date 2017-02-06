<?php

class ProgressGoal extends Eloquent{

  protected $table      = 'avances_metas';
  public    $timestamps = false;

  public function SonDailyGoal(){
    return $this->belongsTo("SonDailyGoal");
  }
}
