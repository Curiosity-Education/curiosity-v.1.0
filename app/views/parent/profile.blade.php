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
            <div class="card card-border-standard animated fadeInRightBig upch-card-new-parent" data-wow-delay="1s" id="card-news">
                <div class="card-block">

                    <!--Header-->
                    <div class="form-header p-novedades bg-blue darken-4">
                        <h3><i class="fa fa-matk-question"></i> Quizas te interese!</h3>
                    </div>
                     <ul class="p-list-news">
                        <li class="p-item-new">
                          <div class="card hoverable card-border-standard upch-card-new">
                            <div class="card-block">
                              <div class="card-left border-right">
                                <div class="upch-img-new">
                                  <img src="http://mdbootstrap.com/img/Photos/Horizontal/People/4-col/img%20%28106%29.jpg">
                                </div>
                              </div>
                              <div class="card-right">
                                <div class="upch-card-title text-center">
                                  <h5>Title of news</h5>
                                </div>
                                <div class="upch-card-description">
                                  <p>Neque porro quisquam est, qui dolorem ipsum quia dolor ...</p>
                                </div>
                                <hr>
                                <div class="upch-footer-card text-right">
                                  <p>Hace 3 minutos</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="p-item-new">
                          <div class="card hoverable card-border-standard upch-card-new">
                            <div class="card-block">
                              <div class="card-left border-right">
                                <div class="upch-img-new">
                                  <img src="http://mdbootstrap.com/img/Photos/Slides/img%20%2858%29.jpg">
                                </div>
                              </div>
                              <div class="card-right">
                                <div class="upch-card-title text-center">
                                  <h5>Title of news</h5>
                                </div>
                                <div class="upch-card-description">
                                  <p>Neque porro quisquam est, qui dolorem ipsum quia dolor ...</p>
                                </div>
                                <hr>
                                <div class="upch-footer-card text-right">
                                  <p>Hace 3 minutos</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </li>
                     </ul>
                </div>
            </div>
            <!--/Form about novedades-->
             <!--Form for refresh perfil-->
            <div class="card card-border-standard upch-card-update-user p-card-user animated fadeInRightBig" data-wow-delay="1s" id="card-data-editing">
                <div class="card-block">
                    <!--Header-->
                    <div class="form-header p-data-editing bg-blue darken-4">
                        <h3><i class="fa fa-matk-question"></i> Mis datos!</h3>
                    </div>
                     <!--Body-->
                    <div class="tab-1 active animated fadeIn">
                        <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="username" name="username" class="form-control" value="roger17">
                            <label for="username">username</label>
                        </div>
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
                    </div>
                    <div class="tab-2 animated fadeIn">
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
                    <div class="tab-3 animated fadeIn">
                        <div class="md-form">
                            <i class="fa fa-phone prefix"></i>
                            <input type="password" id="telefono" name="telefono" class="form-control">
                            <label for="telefono">Télefono</label>
                        </div>
                        <div class="md-form">
                            <select class="mdb-select">
                                <option value="" disabled selected>Sexo</option>
                                <option value="" data-icon="http://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" class="rounded-circle">Hombre</option>
                                <option value="" data-icon="http://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle">Mujer</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-xs-center upch-content-buttons animated fadeIn">
                      <button class="btn btn-deep-orange border-standard btn-return btn-to-move" disabled data-step="1">Regresar</button>
                      <button class="btn btn-deep-purple border-standard btn-next btn-to-move" data-step="1">Siguiente</button>
                      <button class="btn btn-green border-standard upch-btn-update hidden">Guardar cambios</button>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <ul class="stepper stepper-horizontal upch-stepper-user">
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
                              <li>
                                  <a>
                                      <span class="circle">3</span>
                                  </a>
                              </li>
                          </ul>

                      </div>
                    </div>
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
                    <ul class="list text-justify">
                      <li class="list-item">Nombre(s): <span id="span-name">Rogelio Rafael</span></li>
                      <li class="list-item">Apellido(s): <span id="span-name">Jinestas garcía</span></li>
                      <li class="list-item">hijos registraods <span id="span-name">1</span></li>
                      <li class="list-item">telefono: <span id="span-name">+52 8711010214</span> <i class="fa fa-phone"></i></li>
                    </ul>
                    <hr>
                    <!--//.. end data list -->
                    <!--Quotation-->
                    <a class="btn bg-blue btn-border-curiosity waves-effect waves-light" data-card="card-1" id="btn-toggle-cards" data-target="#card-data-editing"><i class="fa fa-refresh"></i> Editar mis datos</a>  
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
