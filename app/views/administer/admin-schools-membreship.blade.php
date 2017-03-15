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
              <a class="nav-link waves-light" data-toggle="tab" href="#panel81" role="tab"><i class="fa fa-trash fa-2x" aria-hidden="true"></i><br> Membresias Eliminadas</a>
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
              <h3 class="text-center">10 usuarios registrados</h3>
            </div>
          </div>
          <div class="col-md-6">
            <div class="pull-right">
              <img src="/packages/assets/media/images/schools/cat.jpg" class="img-fluid shme-img-institution">
            </div>
            <div>
              <h5>Nombre de institución</h5>
              <p>Dirección: bla bla bla 3</p>
              <p>Correo electronico: bla bla bla 3</p>
              <p>Numero telefonico: bla bla bla 3</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="" class="tab-pane fade">
      <br>
    </div>
    <div id="shme-management" class="tab-pane fade">
      <div class="shme-header">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <div class="btn-group">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">9 seleccionados</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </div>
          </div>
          <div class="col-md-2"><a class="btn shme-btn-trash"><i class="fa fa-trash"></i></a></div>
          <div class="col-md-1"></div>
        </div>
      </div>
      <div class="shme-body">
      <div class="row">
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>

        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>

        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>

        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>

        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>

        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>

        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>

        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>
        <div class="col-md-2"><img src="/packages/assets/media/images/system/membreship-not-selected.png" class="img-fluid shme-img-member"><p class="shme-p-username text-center">username</p></div>

      </div>
      </div>
      <div class="shme-footer">
        <div class="row">
          <div class="col-md-3"><p>Intituto cat</p></div>
          <div class="col-md-3">88 membresias activas</div>
          <div class="col-md-4">
            <input type="range" min="0" max="100" />
          </div>
          <div class="col-md-2">
            <a class="btn text-black shme-btn-more"><i class="fa fa-plus"></i></a>
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
<!--<script src="/packages/assets/js/administer/dispatchers/dsp-acti.js?{{rand();}}" charset="utf-8"></script>-->
<script type="text/javascript">
$(function(){
  $(".shme-img-member").click(function(event){
    $(this).attr("src","/packages/assets/media/images/system/membreship-selected.png");
  });
});
</script>
@stop
