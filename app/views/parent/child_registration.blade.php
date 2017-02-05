@extends('templates.parent-menu')

@section('title')
	Gestión de Mis Hijos
@stop

@section('css-plus')
<link rel="stylesheet" href="/packages/libs/materialize/css/carousel.css">
@stop

@section('title')
Gestión de Mis Hijos
@stop

@section('title-baner')
 <i class="fa fa-child" id="upch-iconChild"></i>&nbsp; Gestión de Mis Hijos
@stop
@section('content-parent')
<div class="container-fluid" id="upch-container">
<div class="row">
   <div class="col-md-7 col-lg-7 upch-col-children">
      <div class="row">
			<div class="carousel">

		  </div>

		  <div id="upch-contentInfo" class="text-center upch-carouse-content z-depth-1">
			 <center><div id="upchHome-contentInfo-arrow" class="upch-carousel-arrow"></div></center>
			 <div class="upch-content-card border-bottom texr-justify">
			 	Te mostramos a tus hijos registrados. Puedes modificar los datos de sus cuentas así como dar de baja las mismas. <br>
			 	<span class="tag upch-tag-info">Información: </span> Desplaza a los lados las imagenes.
			 </div>
			 <div class="upch-footer-card">
				<a class="rotate-btn btn btn-block btn-border-curiosity" id="upch-btnEdit"><i class="fa fa-pencil"></i>&nbsp; Modificar</a>
				<button type="button" class="rotate-btn btn btn-block btn-outline-warning waves-effect waves-light btn-border-curiosity" id="upch-btnDelete"><i class="fa fa-trash"></i>&nbsp; Dar de Baja</button>
			 </div>
		  </div>
      </div>
   </div>
   <div class="col-md-5 col-lg-5 col-sm-6 upch-col-upload-child">
     <div class="row">
     	 <!--Rotating card-->
      <div class="card-wrapper">
          <div id="card-1" class="card-rotating effect__click">
              <!--Front Side-->
              <div class="face front">
                  <!-- Image-->
                  <div class="card-up">
                      <img src="packages/assets/media/images/parents/children/ninos.jpg" class="img-fluid">
                  </div>
                  <!--Avatar-->
                  <div class="avatar"><img src="http://mdbootstrap.com/wp-content/uploads/2015/10/team-avatar-1.jpg" alt="papa-curiosity" class="rounded-circle img-responsive">
                  </div>
                  <!--Content-->
                  <div class="card-block">
                      <h4><i class="fa fa-child"></i> Mis hijos registrados</h4>
                      <p>Curiosity Educación</p>
                      <!--Triggering button-->
                      <a class="rotate-btn btn btn-border-curiosity" data-card="card-1" id="upch-btnAdd"><i class="fa fa-plus"></i>&nbsp; Registrar un nuevo hijo</a>
                  </div>
              </div>
              <!--/.Front Side-->

              <!--Back Side-->
              <div class="face back" id="upch-content-formReg">
                  <!--Content-->
                  <h4 class="h4-responsive"><i class="fa fa-child"></i> Registro Nuevo Hijo</h4>
                  <hr>
                  <form class="upch-frm-child">
                    <!--Body-->
                    <div class="tab-1 active animated fadeIn">
                      <div class="md-form">
                        <i class="fa fa-user prefix"></i>
                        <input type="text" id="upch-username" name="username" class="form-control" placeholder="Nombre de usuario">
                      </div>
                      <div class="md-form">
                        <i class="fa fa-user prefix"></i>
                        <input type="password" id="upch-pass" name="password" class="form-control" placeholder="contraseña">
                      </div>
                      <div class="md-form">
                        <i class="fa fa-user prefix"></i>
                        <input type="password" id="upch-cpass" name="cpassword" class="form-control" placeholder="Confirmar contraseña">
                      </div>
                      <div class="md-form form-group" id="slc-upch-level">
                        <select class="mdb-select" id="upch-level" name="level">
                          <option value="" disabled selected>Grado escolar</option>
                          @foreach(Level::all() as $level)
                          <option value="{{$level->id}}" class="rounded-circle">{{$level->nombre}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="tab-2 animated fadeIn upch-tab2">
                      <div class="md-form upch-select">
                          <select class="mdb-select" id="upch-gender" name="gender">
                              <option value="" disabled selected>Genero</option>
                              <option value="m" data-icon="/packages/assets/media/images/child/store/ProfilePhotos/profDefMale.png" class="rounded-circle">Niño</option>
                              <option value="f" data-icon="/packages/assets/media/images/child/store/ProfilePhotos/profDefFemale.png" class="rounded-circle">Niña</option>
                          </select>
                      </div>
                      <div class="md-form">
                        <i class="fa fa-user prefix"></i>
                        <input type="text" id="upch-name" name="name" class="form-control" placeholder="Nombre(s)">
                      </div>
                      <div class="md-form">
                        <i class="fa fa-user prefix"></i>
                        <input type="text" id="upch-surnames" name="surnames" class="form-control" placeholder="Apellido(s)">
                      </div>
                      <div class="md-form upch-average">
                        <h6 class="text-left">
                          Promedio Actual de tu Hijo:
                        </h6>
                       <input type="range" id="upch-average" min="5" max="10" step=".1" name="average" class="form-control" value="5">
                      </div>
                    </div>
                    <hr>
                    <div class="text-xs-center">
                      <button type="reset" data-card="card-1" class="btn btn-outline-warning waves-effect waves-light btn-cancel btn-border-curiosity rotate-btn upch-btnCalcel">Cancelar</button>
                      <button type="button" class="btn btn-to-move btn-return btn-outline btn-warning waves-effect waves-light btn-border-curiosity upch-btnCancel hidden" data-step="1">Regresar</button>
                      <button type="button" class="btn upch-btnNext btn-to-move btn-next btn-border-curiosity btn-next btn-upload-child hidden">Registrar</button>
                      <button type="button" class="btn btn-to-move btn-next btn-border-curiosity upch-btnNext" data-step="1"> Siguiente</button>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-xs-12">
                          <ul class="stepper stepper-horizontal p-stepper-user">
                              <li class="active">
                                  <a>
                                      <span class="circle">1</span>
                                  </a>
                              </li>
                              <li>
                                  <a>
                                      <span class="circle">2</span>
                                  </a>
                              </li>
                          </ul>

                      </div>
                    </div>
                  </form>

                  <!--Triggering button-->
              </div>
              <!--/.Back Side-->
          </div>
      </div>
      <!--/.Rotating card-->
     </div>
   </div>
</div>
</div>
@stop

@section('js-plus')
<script type="text/javascript" src="/packages/libs/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="/packages/libs/validation/additional-methods.min.js"></script>
<script type="text/javascript" src="/packages/libs/validation/localization/messages_es.min.js"></script>
<script type="text/javascript" src="/packages/assets/js/child/models/child.js?{{rand();}}"></script>
<script type="text/javascript" src="/packages/assets/js/child/controllers/childrenCtrl.js?{{rand();}}"></script>
<script src="/packages/libs/materialize/js/materialize.min.js" charset="utf-8"></script>
<script src="/packages/assets/js/parent/child-registration.js?{{rand();}}" charset="utf-8"></script>
<script type="text/javascript" src="/packages/assets/js/parent/models/child-registration.js?{{rand();}}"></script>
<script type="text/javascript" src="/packages/assets/js/parent/controllers/child-registrationCrtrl.js?{{rand();}}"></script>
<script type="text/javascript" src="/packages/assets/js/parent/dispatchers/dp-child-registration.js?{{rand();}}"></script>
@stop
@stop
