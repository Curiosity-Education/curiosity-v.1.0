<?php
class SalerCode extends Eloquent{

   protected $table='codigos_vendedores';
   protected $fillable= ['codigo','trabajador_id','plan_id','active'];
   public $timestamps = false;

}
