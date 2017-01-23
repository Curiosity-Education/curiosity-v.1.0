<?php
class Employee extends Eloquent{

   protected $table='trabajadores';
   protected $fillable=[
      'nombre',
      'apellidos',
      'correo',
      "telefono",
      "sexo",
      "foto",
      "active",
      "direccion_id",
      "puestos_id"
   ];

}
