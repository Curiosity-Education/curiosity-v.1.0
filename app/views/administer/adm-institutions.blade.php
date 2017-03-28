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

<div class="row" id="adIn-selection">
  <div class="col-md-12 card" id="adIn-card">
    <div class="col-md-4">
      <select class="mdb-select" id="type">
        <option value="" disabled selected>Seleccione un Tipo de Institucion</option>
        <option value="Escuela Privada" id="ll">Escuela Privada</option>
        <option value="Escuela Publica">Escuela Publica</option>
        <option value="Empresa">Empresa</option>
        <option value="Casa Hogar">Casa Hogar</option>
      </select>
    </div>
    <div class="col-md-2 offset-md-6  col-xs-4 offset-xs-4" id="adAv-add-btn">
        <a class="btn-floating btn-large blue" id="add-insti"  data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i>
        </a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <table class="table" id="adIn-table">
    <thead class="thead-inverse">
      <tr>
        <th class="text-center adInHeader">Nombre</th>
        <th class="text-center adInHeader">Acciones</th>
      </tr>
    </thead>
      <tbody>

      </tbody>
    </table>
  </div>

  <div id="modals">

  </div>

</div>

@stop

@section('js')
<script type="text/javascript" src="/packages/assets/js/administer/models/Institution.js"></script>
<script type="text/javascript" src="/packages/assets/js/administer/controllers/ainstiController.js"></script>
<script type="text/javascript" src="/packages/assets/js/administer/dispatchers/dps-insti.js"></script>
@stop
