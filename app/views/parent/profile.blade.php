@extends('templates.parent-menu')

@section('title')
Curiosity | Perfil
@stop
@section('title-baner')
 <i class="fa fa-user"></i> Mi perfil
@stop
@section('content-parent')
   <div class="container-fluid main">
      <div class="row">
         <div class="col-md-8 col-lg-8">
             <!--Form about novedades-->
            <div class="card card-border-standard animated fadeInRightBig" data-wow-delay="1s" id="card-news">
                <div class="card-block">

                    <!--Header-->
                    <div class="form-header p-novedades bg-blue darken-4">
                        <h3><i class="fa fa-matk-question"></i> Quizas te interese!</h3>
                    </div>
                     <ul class="p-list-news">
                        <li class="p-item-new">
                           <div class="card row hoverable">
                              <div class="card-left col-md-3 img-new">
                                 <img class="img-fluid" src="http://mdbootstrap.com/images/reg/reg%20(63).jpg" alt="Card image cap">
                              </div>
                              <div class="card-block-right col-md-9 text-center">
                                 <h4 class="card-title">Card title</h4>
                              </div>
                            </div>
                        </li>
                        <li class="p-item-new">
                           <div class="card row hoverable">
                              <div class="card-left col-md-3 img-new">
                                 <img class="img-fluid" src="http://mdbootstrap.com/images/reg/reg%20(6).jpg" alt="Card image cap">
                              </div>
                              <div class="card-block-right col-md-9 text-center">
                                 <h4 class="card-title">Card title</h4>
                              </div>
                            </div>
                        </li>
                        <li class="p-item-new">
                           <div class="card row hoverable">
                              <div class="card-left col-md-3 img-new">
                                 <img class="img-fluid" src="http://mdbootstrap.com/images/reg/reg%20(3).jpg" alt="Card image cap">
                              </div>
                              <div class="card-block-right col-md-9 text-center">
                                 <h4 class="card-title">Card title</h4>
                              </div>
                            </div>
                        </li>
                     </ul>
                   

                </div>

                <!--Footer-->
                <div class="modal-footer text-center">
                   <h5>Novedades</h5>
                </div>

            </div>
            <!--/Form about novedades-->
             <!--Form for refresh perfil-->
            <div class="card card-border-standard p-card-user animated fadeInRightBig" data-wow-delay="1s" id="card-data-editing">
                <div class="card-block">

                    <!--Header-->
                    <div class="form-header p-data-editing bg-blue darken-4">
                        <h3><i class="fa fa-matk-question"></i> Mis datos!</h3>
                    </div>
                     <!--Body-->
                    <div class="tab-1 active">
                        <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="username" name="username" class="form-control" value="roger17">
                            <label for="username">username</label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" id="old-password" name="old-password" class="form-control">
                            <label for="old-password">Contraseña actual</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" id="new-password" name="new-password" class="form-control">
                            <label for="new-password">Nueva contraseña</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" id="cnew-password" class="form-control">
                            <label for="cnew-password">Confirmar contraseña</label>
                        </div>
                    </div>
                    <div class="tab-2">
                      <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="roger17">
                            <label for="username">nombre(s)</label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="password" id="apellidos" name="apellidos" class="form-control">
                            <label for="apellidos">Apellido(s)</label>
                        </div>
                        <div class="md-form">
                            <select class="mdb-select">
                                <option value="" disabled selected>Sexo</option>
                                <option value="" data-icon="http://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" class="rounded-circle">Hombre</option>
                                <option value="" data-icon="http://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle">Mujer</option>
                            </select>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="password" id="email" name="email" class="form-control">
                            <label for="email">Email</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="password" id="telefono" name="telefono" class="form-control">
                            <label for="telefono">Télefono</label>
                        </div>
                    </div>
                    <div class="text-xs-center">
                        <button class="btn btn-deep-purple">Siguiente</button>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer text-center">
                   <h5>Ediatar datos</h5>
                </div>

            </div>
            <!--/Form for refresh perfil-->
         </div>
         <div class="col-md-4 col-lg-4 border-left">
            <!--Card-->
            <div class="card card-border-standard testimonial-card animated fadeInLeft" data-wow-delay="1s">
                <!--Bacground color-->
                <div class="card-up bg-blue">
                </div>

                <!--Avatar-->
                <div class="avatar"><img src="http://mdbootstrap.com/wp-content/uploads/2015/10/avatar-1.jpg" class="rounded-circle img-responsive">
                </div>

                <div class="card-block">
                    <!--Name-->
                    <h4 class="card-title">Username´s parent</h4>
                    <hr>
                    <!-- data list-->
                    <ul class="list-group">
                      <li class="list-group-item">Nombre(s): <span id="span-name">Rogelio Rafael</span></li>
                      <li class="list-group-item">Apellido(s)<span id="span-name">Jinestas garcía</span></li>
                    </ul>
                    <hr>
                    <!--//.. end data list -->
                    <!--Quotation-->
                    <a class="btn btn-green btn-border-curiosity waves-effect waves-light" data-card="card-1" id="btn-toggle-cards" data-target="#card-data-editing"><i class="fa fa-refresh"></i> Editar mis datos</a>  
                </div>
            </div>
            <!--/.Card-->
         </div>
      </div>
   </div>
@stop

@section('js-plus')
<script type="text/javascript" src="/packages/assets/js/parent/profile.js"></script>
@stop
