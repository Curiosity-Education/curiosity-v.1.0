@extends('templates.parent-menu')

@section('css-plus')
<link rel="stylesheet" href="/packages/libs/materialize/css/carousel.css">
@stop
@section('title-baner')
 <i class="fa fa-child"></i> Administración de hijos 
@stop
@section('content-parent')
<div class="container-fluid">
<div class="row">
   <div class="col-md-7 col-lg-7 upch-col-children">
      <div class="carousel">
         <a href="javascript:void(0)" class="carousel-item">
            <div class="itemCarousel">
               <img src="/packages/assets/media/images/parents/profile/mom-def.png" >
               <h6>Odaliz Ramirez</h6>
            </div>
         </a>
         <a href="javascript:void(0)" class="carousel-item">
            <div class="itemCarousel">
               <img src="/packages/assets/media/images/parents/profile/mom-def.png" >
               <h6>Odaliz Ramirez</h6>
            </div>
         </a>
         <a href="javascript:void(0)" class="carousel-item">
            <div class="itemCarousel">
               <img src="/packages/assets/media/images/parents/profile/mom-def.png" >
               <h6>Odaliz Ramirez</h6>
            </div>
         </a>
         <a href="javascript:void(0)" class="carousel-item">
            <div class="itemCarousel">
               <img src="/packages/assets/media/images/parents/profile/mom-def.png" >
               <h6>Odaliz Ramirez</h6>
            </div>
         </a>
         <a href="javascript:void(0)" class="carousel-item">
            <div class="itemCarousel">
               <img src="/packages/assets/media/images/parents/profile/mom-def.png" >
               <h6>Odaliz Ramirez</h6>
            </div>
         </a>
      </div>

      <div id="prntHome-contentInfo" class="text-center upch-carouse-content">
         <center><div id="prntHome-contentInfo-arrow" class="upch-carousel-arrow"></div></center>
         <div class="upch-content-card border-bottom texr-justify">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut doloremque quasi repudiandae nulla eaque recusandae saepe cupiditate hic atque veritatis?
         </div>
         <div class="upch-footer-card">
            <a class="rotate-btn btn btn-warning btn-border-curiosity"><i class="fa fa-refresh"></i> Modificar</a>
            <a class="rotate-btn btn btn-danger btn-border-curiosity"><i class="fa fa-trash"></i> Dar de baja</a>
         </div>
      </div>
   </div>
   <div class="col-md-5 col-lg-5 upch-col-upload-child">
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
                      <a class="rotate-btn btn btn-green btn-border-curiosity" data-card="card-1"><i class="fa fa-plus"></i>  Registrar un nuevo hijo</a>
                  </div>
              </div>
              <!--/.Front Side-->

              <!--Back Side-->
              <div class="face back">
                  <!--Content-->
                  <h4>Panel de registro</h4>
                  <hr>
                  <form class="upch-frm-child">
                    <!--Body-->
                    <div class="step-1 active animated fadeInUpBig">
                      <div class="md-form">
                        <i class="fa fa-user prefix"></i>
                        <input type="text" id="upch-username" name="upch-username" class="form-control">
                        <label for="upch-username">username niño</label>
                      </div>
                      <div class="md-form">
                        <i class="fa fa-user prefix"></i>
                        <input type="text" id="upch-pass" name="upch-pass" class="form-control">
                        <label for="upch-pass">Contraseña</label>
                      </div>
                      <div class="md-form">
                        <i class="fa fa-user prefix"></i>
                        <input type="text" id="upch-cpass" name="upch-cpass" class="form-control">
                        <label for="upch-cpass">Confirmar Contraseña</label>
                      </div>
                      <div class="md-form">
                        <h5 class="text-center">
                          <i class="fa"></i>
                          Promedio
                        </h5>
                       <input type="range" id="upch-promedio" min="5" max="10" step=".1" name="upch-promedio" class="form-control" value="5">
                      </div>
                    </div>
                    <div class="step-2 animated fadeInUpBig">
                      <div class="md-form">
                        <i class="fa fa-user prefix"></i>
                        <input type="text" id="upch-username" name="upch-username" class="form-control">
                        <label for="upch-username">Nombre(s)</label>
                      </div>
                      <div class="md-form">
                        <i class="fa fa-user prefix"></i>
                        <input type="text" id="upch-username" name="upch-username" class="form-control">
                        <label for="upch-username">Apellido(s)</label>
                      </div>
                       <div class="md-form">
                            <select class="mdb-select">
                                <option value="" disabled selected>Sexo</option>
                                <option value="" data-icon="http://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" class="rounded-circle">Hombre</option>
                                <option value="" data-icon="http://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle">Mujer</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="text-xs-center">
                      <button type="button" data-card="card-1" class="btn btn-cancel btn-warning btn-border-curiosity rotate-btn">Cancelar</button>
                      <button type="button" class="btn btn-indigo btn-border-curiosity btn-next">Siguiente</button>
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
@stop

@section('js-plus')
<script src="/packages/libs/materialize/js/materialize.min.js" charset="utf-8"></script>
<script src="/packages/assets/js/parent/child-registration.js" charset="utf-8"></script>
@stop
