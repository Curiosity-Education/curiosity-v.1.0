<?php
/*
    This namespace is using
    for to get the functions
    this model
*/
namespace App\Models;

/*
    As use a namespace it is
    necessary the use Eloquent
*/

use Eloquent;

class File extends Eloquent{

	protected $table='archivos';
  protected $fillable = ['archivos'];
  /*
  *
  ## A file belongs to an activity
  */
  public function Activity(){
      return $this->belongsTo('actividad');
  }
}
