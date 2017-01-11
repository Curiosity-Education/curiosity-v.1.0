<?php

class LibraryPdfs extends Eloquent
{
   protected $table='biblioteca_pdfs';
   protected $fillable = array('nombre', 'nombre_real', 'active', 'vistos', 'tema_id');
}
