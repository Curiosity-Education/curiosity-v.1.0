<!-- Prefix 'acti' -->

@extends('templates.administer-menu')

@section('css-plus')

@stop

@section('title')
Gestion de cuentas masivas
@stop

@section('baner-tittle')
   Gestion de cuentas masivas
@stop

@section('content-administer')

<div class="row">
  <div class="col-md-12">
    <!-- Nav tabs -->
  <div class="tabs-wrapper">
      <ul class="nav classic-tabs tabs-grey" role="tablist">
          <li class="nav-item">
              <a class="nav-link waves-light active" data-toggle="tab" href="#home" role="tab"><i class="fa fa-home fa-2x" aria-hidden="true"></i><br> Inicio</a>
          </li>
          <li class="nav-item">
              <a class="nav-link waves-light" data-toggle="tab" href="#shme-management" role="tab"><i class="fa fa-user fa-2x" aria-hidden="true"></i> <i class="fa fa-graduation-cap fa-2x" aria-hidden="true"></i><br> Gestion de cuentas masivas</a>
          </li>
          <li class="nav-item">
              <a class="nav-link waves-light" data-toggle="tab" href="#panel81" role="tab"><i class="fa fa-ban fa-2x" aria-hidden="true"></i><br> Membresias Eliminadas</a>
          </li>
      </ul>
  </div>


  <div class="tab-content card-panel white lighten-5">
    <div id="home" class="tab-pane fade in active">
      <br>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="card-circle text-center circle-black">
              <img src="/packages/assets/media/images/administers/group.png" class="img-fluid" id="shme-user-mem">
              <h3 class="text-center">{{count($data->usuarios)}} usuarios registrados</h3>
            </div>
          </div>
          <div class="col-md-6">
            <div class="pull-right">
              <img src="/packages/assets/media/images/institutions/{{$data->logo}}" class="img-fluid shme-img-institution">
            </div>
            <div>
              <h5>Institucion: {{$data->nombre}}</h5>
              <p>Direccion: cale {{$data->calle}} numero {{$data->numero}}</p>
              <p>Colonia: {{$data->colonia}}</p>
              <p>Ciudad: {{$data->ciudad}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="" class="tab-pane fade">
      <br>
    </div>
    <div id="shme-management" class="tab-pane fade">
      <div class="shme-header hidden animated fadeInDown" id="shme-header-mem">
        <div class="row">
          <div class="col-md-4">
            <fieldset style="margin-bottom: 0rem;margin-top: 0.7rem;color:white;margin-left: .7rem;" class="form-group" id="shme-select-all">
                <input type="checkbox" class="filled-in" id="checkbox2">
                <label for="checkbox2">Seleccionar todo</label>
            </fieldset>
          </div>
          <div class="col-md-3">
           <h6 class="text-white" style="margin-top: .8rem;">4 seleccionados</h6>
          </div>
          <div class="col-md-2"><a class="btn shme-btn-trash"><i class="fa fa-trash"></i></a></div>
          <div class="col-md-1"></div>
        </div>
      </div>
      <div class="shme-body">
        @if(count($data->usuarios)>0)
        <div class="row">
          @foreach($data->usuarios as $user)
            <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">{{$user->username}}</p></div>
            <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">{{$user->username}}</p></div>

          @endforeach
        </div>
        @else
        <div class="row row-void" style="margin-top:5%!important;">
          <div class="col-md-12 col-xs-12 col-sm-12">
            <h1 class="text-void text-center"><i class="fa fa-search"></i></h1>
            <h1 class="text-void text-center">No se ha agregado ningun usario.</h1>
            <h3 class="text-void text-center">Actual mente esta instutución se encuentra sin usuarios, <br>puedes agregar usuarios a través del panel que se encuentra en la parte inferior.</h3>
          </div>
        </div>
        @endif
   
      </div>
      <div class="shme-footer">
        <div class="row">
          <div class="col-md-2"><p>Intituto cat</p></div>
          <div class="col-md-3">88 membresias activas</div>
          <div class="col-md-4">
            <input type="range" min="0" max="200" />
          </div>
          <div class="col-md-2">
            <a class="btn text-black shme-btn-more z-depth-0"><i class="fa fa-plus"></i></a>
            <a class="btn text-black shme-btn-more z-depth-0"><i class="fa fa-file-excel-o"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div id="menu3" class="tab-pane fade">
      <br>
      <h5>Menu 3</h5>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
  </div>
</div>
@stop

@section('js-plus')
<script src="/packages/assets/js/administer/models/Level.js?{{rand();}}" charset="utf-8"></script>
<script src="/packages/assets/js/administer/Controllers/actiController.js?{{rand();}}" charset="utf-8"></script>
<script src="/packages/assets/js/administer/dispatchers/dsp-shme.js?{{rand();}}" charset="utf-8"></script>
@stop
