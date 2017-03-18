@extends('templates.administer-menu')

@section('css-plus')
@stop

@section('title')
 Gestion avatar
@stop

@section('baner-tittle')
   Gestion Instituciones
@stop

@section('content-administer')

<div class="row">
  <div class="col-md-2 offset-md-10  col-xs-4 offset-xs-4" id="adAv-add-btn">
      <a class="btn-floating btn-large blue" data-toggle="modal" data-target="#modal-contact">
          <i class="fa fa-plus"></i>
      </a>
  </div>
</div>

<!-- <div class="row">
  <div class="col-md-12 blue">
    <div class="col-md-6">
      <select class="mdb-select">
        <option value="" disabled selected>Choose your option</option>
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
        <option value="3">Option 3</option>
      </select>
      <label>Example label</label>
    </div>
    <div class="col-md-6">

    </div>
  </div>
</div> -->
@stop

@section('js')
@stop
