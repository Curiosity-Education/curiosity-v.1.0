@extends('templates.parent-menu')

@section('title')
Mi Perfil
@stop
@section('title-baner')
 <i class="fa fa-user"></i> Mi perfil 
@stop
@section('content-parent')
   <div class="container-fluid main" id="p-container-main">
      <div class="row" id="p-row-main">
         <div class="col-md-8 col-sm-8 col-xs-12 col-lg-8">
             <!--Form about novedades-->
            <div class="card card-border-standard animated fadeInUpBig p-card-new-parent" data-wow-delay="1s" id="card-news">
                <div class="card-block hidden-xs-down">
                    <!--Header-->
                    <div class="form-header p-novedades bg-blue darken-4">
                        <h3 class="h3-responsive"><i class="fa fa-matk-question"></i>¡ Quizas te interese!</h3>
                    </div>
                     <ul class="p-list-news">
                        <li class="p-item-new">
                          <div class="card hoverable card-border-standard p-card-new">
                            <div class="card-block">
                              <div class="card-left border-right">
                                <div class="p-img-new">
                                  <img src="/packages/assets/media/images/parents/profile/pdf.ico" class="img-thumbnail">
                                </div>
                              </div>
                              <div class="card-right">
                                <div class="p-card-title text-xs-left">
                                  <h5>Suceciones Númericas</h5>
                                </div>
                                <div class="p-card-description text-xs-left">
                                  <p>Neque porro quisquam est, qui dolorem ipsum quia dolor ...</p>
                                </div>
                                <hr>
                                <div class="p-footer-card text-right">
                                  <p>Hace 3 minutos</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="p-item-new">
                          <div class="card hoverable card-border-standard p-card-new">
                            <div class="card-block">
                              <div class="card-left border-right">
                                <div class="p-img-new">
                                  <img src="/packages/assets/media/images/parents/profile/pdf.ico" class="img-thumbnail">
                                </div>
                              </div>
                              <div class="card-right">
                                <div class="p-card-title text-xs-left">
                                  <h5>Resolución de problemas</h5>
                                </div>
                                <div class="p-card-description text-xs-left">
                                  <p>Neque porro quisquam est, qui dolorem ipsum quia dolor ...</p>
                                </div>
                                <hr>
                                <div class="p-footer-card text-right">
                                  <p>Hace 3 minutos</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="p-item-new">
                          <div class="card hoverable card-border-standard p-card-new">
                            <div class="card-block">
                              <div class="card-left border-right">
                                <div class="p-img-new">
                                  <img src="/packages/assets/media/images/parents/profile/pdf.ico" class="img-thumbnail">
                                </div>
                              </div>
                              <div class="card-right">
                                <div class="p-card-title text-xs-left">
                                  <h5>Grafica de barras</h5>
                                </div>
                                <div class="p-card-description text-xs-left">
                                  <p>Neque porro quisquam est, qui dolorem ipsum quia dolor ...</p>
                                </div>
                                <hr>
                                <div class="p-footer-card text-right">
                                  <p>Hace 17 minutos</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </li>
                     </ul>
                </div>
                <div class="hidden-sm-up" id="p-content-novelty">
					<div class="list-group">
					  <a href="#" class="list-group-item active">
						¡ Quizas te interese !
					  </a>
					  <a href="#" class="list-group-item text-xs-left"><i class="fa fa-file-pdf-o"></i>&nbsp; Sucesiones Númericas</a>
					  <a href="#" class="list-group-item text-xs-left"><i class="fa fa-file-pdf-o"></i>&nbsp; Resolución de problemas</a>
					  <a href="#" class="list-group-item text-xs-left"><i class="fa fa-file-pdf-o"></i>&nbsp; Gráfica de barras</a>
					</div>
                </div>
            </div>
            <!--/Form about novedades-->
             <!--Form for refresh perfil-->
            <form id="p-frm-user">
            <div class="card card-border-standard p-card-update-user p-card-user animated fadeInRightBig" data-wow-delay="1s" id="card-data-editing">
                <div class="card-block" id="p-cardData">
                    <!--Header-->
                    <div class="form-header p-data-editing bg-blue darken-4">
                        <h3 class="h3-responsive"><i class="fa fa-matk-question"></i> Mis datos</h3>
                    </div>
                     <!--Body-->
                    <input type="hidden" value="{{Auth::user()->id}}" name="id" id="id">
                    <div class="tab-1 active animated fadeIn p-tab">
                        <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="username" name="username" class="form-control" value="{{$username}}" length="40" placeholder="username">
                        </div>
                        <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="{{$nombre}}" placeholder="Nombre(s)">
                        </div>

                        <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="apellidos" name="apellidos" class="form-control" value="{{$apellidos}}" placeholder="Apellido(s)">
                        </div>
                    </div>
                    <div class="tab-2 animated fadeIn p-tab">
                        <div class="md-form">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" id="old_password" name="old_password" class="form-control" placeholder="Contraseña actual">
                        </div>
                        <div class="md-form">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" id="new_password" name="new_password" class="form-control" placeholder="Contraseña nueva" length="100">
                        </div>
                        <div class="md-form">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" id="cnew_password" name="cnew_password" class="form-control" placeholder="Confirmar contraseña" length="100">
                        </div>
                    </div>
                    <div class="tab-3 animated fadeIn p-tab p-tab3">
                        <div class="md-form">
                            <select class="mdb-select" id="sexo" name="sexo">
                                <option value="" disabled>Sexo</option>
                                @if($sexo == "M" || $sexo== "m")
                                <option value="M" selected data-icon="http://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" class="rounded-circle">Masculino</option>
                                <option value="F" data-icon="http://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle">Femenino</option>
                                @elseif($sexo == "F" || $sexo == "m")
                                <option value="M" selected data-icon="http://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" class="rounded-circle">Masculino</option>
                                <option value="F" data-icon="http://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle">Femenino</option>
                                @endif
                            </select>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-phone prefix"></i>
                            <input type="text" id="telefono" name="telefono" class="form-control" length="10" placeholder="Telefono" value="{{$telefono}}">
                        </div>
                    </div>
                    <div class="text-xs-center p-content-buttons animated fadeIn">
                     	<center>
                     	   	<button type="button" class="btn btn-outline-warning waves-effect border-standard btn-return btn-to-move p-btnBack" disabled data-step="1">Regresar</button>
                      		<button type="button" class="btn border-standard btn-next btn-to-move p-btnNext" data-step="1">Siguiente</button>
                      		<button type="button" class="btn btn-green border-standard p-btn-update hidden p-btnSave" id="p-btn-update">Guardar cambios</button>
                     	</center>
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
            </form>
            <!--/Form for refresh perfil-->
         </div>
         <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 border-left">
            <!--Card-->
            <div class="card card-border-standard testimonial-card animated fadeInRight" data-wow-delay="1s">
                <!--Bacground color-->
                <div class="card-up bg-blue pf-bgCardEdit">
                </div>

                <!--Avatar-->
                <div class="avatar"><img src="http://mdbootstrap.com/wp-content/uploads/2015/10/avatar-1.jpg" class="rounded-circle img-responsive">
                </div>

                <div class="card-block">
                    <!--Name-->
                    <h4 class="card-title">Username´s parent</h4>
                    <hr>
                    <!-- data list-->
                    <ul class="list text-justify hidden-md-down p-cardInfo" >
                      <li class="list-item"><i class="fa fa-user"></i>&nbsp; Nombre(s): <span id="span-name">Rogelio Rafael</span></li>
                      <li class="list-item"><i class="fa fa-user"></i>&nbsp; Apellido(s): <span id="span-name">Jinestas garcía</span></li>
						<li class="list-item"><i class="fa fa-phone"></i>&nbsp; telefono: <span id="span-name">+52 8711010214</span></li>
                    </ul>
                    <hr class="hidden-md-down p-cardInfo">
                    <!--//.. end data list -->
                    <!--Quotation-->
                    <a class="btn pf-bg-default btn-border-curiosity waves-effect waves-light pf-border-rounded" data-card="card-1" id="btn-toggle-cards" data-target="#card-data-editing"><i class="fa fa-edit"></i> Editar mis datos</a>
                </div>
            </div>
            <!--/.Card-->
         </div>
      </div>
      <!-- view pdf -->
      <div class="row animated fadeInUp hidden" id="p-row-pdf">
        <div class="col-md-12">
            <div class="card card-border-standard" id="p-card-pdf">
              <div class="view hm-black-strong z-depth-1 col-xs-12" id="p-banner-showPDF">
                <div class="mask border-standard flex-center">
                 <h4 class="h4-responsive white-text"><i class="fa fa-file-pdf-o hidden-xs-down"></i>&nbsp; Sucesión Númerica &nbsp;&nbsp;<i class="float-xs-right fa fa-times-circle hidden-sm-up dismiss-card" data-toggle="tooltip" data-placement="bottom" title="Cerrar PDF"></i></h4>
                </div>
                 <a class="btn-floating btn-small primary-color-dark float-xs-right hidden-xs-down dismiss-card" data-dismiss-card="#p-row-pdf" data-toggle="tooltip" data-placement="left" title="Cerrar PDF"><i class="fa fa-times"></i></a>
              </div>
              <div class="card-block">
                <embed src="/packages/assets/pdf/guia.pdf" type="application/pdf" width="100%" height="100%" id="p-pdf">
                <h1 class="h1-responsive text-xs-center" id="p-text-info">Por favor gira tu dispositivo para mejor lectura</h1>
              </div>
            </div>
        </div>
      </div>
      <!--//.. end view pdf -->
   </div>
@stop

@section('js-plus')
<script type="text/javascript" src="/packages/libs/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="/packages/libs/validation/additional-methods.min.js"></script>
<script type="text/javascript" src="/packages/libs/validation/localization/messages_es.min.js"></script>
<script type="text/javascript" src="/packages/assets/js/parent/models/Parent.js"></script>
<script type="text/javascript" src="/packages/assets/js/parent/controllers/parentController.js"></script>
<script type="text/javascript" src="/packages/assets/js/parent/profile.js"></script>
<script type="text/javascript" src="/packages/assets/js/parent/dispatchers/dsp-parent-profile.js"></script>
@stop
