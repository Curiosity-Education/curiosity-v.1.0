@extends('landing.indexBase')

@section('title')
	Curiosity Educación | Juegos educativos para primaria
@stop

@section('menu')
	<li class="nav-item nav-item1 anc">
		<a class="nav-link" href="#inicio">{{Lang::get('landingPage.menu.home')}} <span class="sr-only">(current)</span></a>
	</li>
	<li class="nav-item nav-item1 anc">
		<a class="nav-link" href="#nosotros">{{Lang::get('landingPage.menu.whatIs')}}</a>
	</li>
	<li class="nav-item nav-item1 anc">
		<a class="nav-link" href="#funcionamiento">{{Lang::get('landingPage.menu.howfunction')}}</a>
	</li>
	 <li class="nav-item nav-item2 anc">
		<a class="nav-link" href="#video">{{Lang::get('landingPage.menu.video')}}</a>
	</li>
	<li class="nav-item nav-item2 anc">
		<a class="nav-link" href="#membresia">{{Lang::get('landingPage.menu.paymentOption')}}</a>
	</li>
	<li class="nav-item nav-item2">
		<a href="#" data-toggle="modal" data-target="#modal-login" class="btn btn-outline-success btn-rounded waves-effect pull-right btn-action" style="color:#fff !important;">{{Lang::get('landingPage.menu.logIn')}}</a>
	</li>
	<li class="nav-item nav-item2">
		<a class="btn btn-warning btn-rounded pull-right btn-action" style="color:#fff; margin-left:10px;" href="#membresia">{{Lang::get('landingPage.menu.createAccount')}}</a>
		<!-- <a class="btn btn-warning btn-rounded pull-right btn-action" style="color:#fff; margin-left:10px;" href="javascript:void(0)">Próximamente</a> -->
	</li>
@stop

@section('contenido')
	<!-- Modal de login -->
	<div class="modal fade modal-ext" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<!--Content-->
			<div class="modal-content borderRounded">
				<!--Header-->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3 id="title-header"><i class="fa fa-user-circle"></i> Iniciar Sesión</h3>
				</div>
				<!--Body-->
				<div class="modal-body">
					<div class="container-fluid">
						<div class="col-md-12">
							<div class="row fadeIn animated" id="row-login">
								<div class="col-md-5">
									<center>
										<img src="packages/assets/media/images/system/logiin.jpg?{{rand();}}" alt="..." class="rounded-circle img-fluid" style="width:70%;">
									</center>
									<hr>
									<p class="text-xs-center"><i class="fa fa-quote-left"></i>&nbsp; Inicia tu experiencia Curiosity &nbsp;<i class="fa fa-quote-right"></i></p>
								</div>
								<div class="col-md-7" id="form-content">
									<div class="row">
										<form id="formLogin">
											<div class="md-form">
												<i class="fa fa-user prefix"></i>
												<input type="text" id="username" class="form-control" name="username">
												<label for="username">Usuario</label>
											</div>
											<div class="md-form">
												<i class="fa fa-lock prefix"></i>
												<input type="password" id="password" class="form-control" name="password">
												<label for="password">Contraseña</label>
											</div>
										</form>
										<div class="text-xs-center">
											<button class="btn btn-primaryCur btn-lg btn-block borderRounded" id="btnLogin">Iniciar</button>
										</div>
										<div style="margin-top:.7rem;text-align:center">
											<a id="recovery-password" style="color:blue;font-weight:300;font-size:1rem;"><i class="fa fa-info-circle"></i> Olvide mi contraseña</a>
										</div>
									</div>
								</div>
							</div>
							<div class="row fadeIn animated" id="row-recovery-password" style="display:none">
									<div class="row">
										<div class="col-md-12">
											<p class="text-center" style="text-align:center">
												Ingresa tu nombre de usuario o correo con el que te haz registrado.
												Se te enviará un correo electronico en el que podrás recuperar tu contraseña.
											</p>
										</div>
									</div>
									<form id="frm-recovery-pass">
										<div class="row">
											<div class="col-md-12">
												<div class="md-form">
													<i class="fa fa-key prefix"></i>
													<input type="text" id="username-recovery" class="form-control" name="username-recovery">
													<label for="username-recovery">Correo o nombre de usuario</label>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6"><button type="sumbit" class="btn btn-success btn-lg btn-block borderRounded" id="btn-recovery">Continuar</button> </div>
											<div class="col-md-6"><button type="reset" class="btn btn-primaryCur btn-lg btn-block borderRounded" id="btn-return-login">Regresar al login</button>  </div>
										</div>
									</form>
								</div>
								<div class="row fadeIn" id="row-confirmation" style="display:none">
									<h5 style="text-align:center">Confirmación de correo enviado</h5>
									<p style="text-align:center">Se ha enviado un correo de confirmación a tu correo electronico, da click en el link que encontrarás en el correo enviado para recuperar tu contraseña</p>
									<div class="col-md-12"><center style="text-align:center"><button type="button" class="btn btn-primaryCur btn-lg btn-block borderRounded" id="btn-recovery-complete">Aceptar</button></center></div>
								</div>
						</div>
					</div>
				</div>
			</div>
			<!--/.Content-->
		</div>
	</div>
	<!-- / Modal de login -->

	<!-- Sección de imagen a pantalla completa -->
	<div class="view-entrada hm-black-strong" id="inicio">
		<div class="full-bg-img flex-center">
			<ul class="animated rubberBand"><br>
				<li class="container-fluid">
					<div class="col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-xs-12">
						<img src="/packages/assets/media/images/landing/nuevo_log.png?{{rand();}}" alt="logo_curiosity" class="img-responsive" id="logo_entrada" style="width:100%; height:;">
					</div>
				</li>
				<li class="container-fluid">
					<h1 class="h1-responsive font-curiosity white-text">{{Lang::get('landingPage.eslogan')}}</h1>
				</li>
				<div class="col-xs-1 col-md-2"></div>
				<div class="button-sm-access col-xs-10 col-md-8">
					<a href="#" data-toggle="modal" data-target="#modal-login" class="btn btn-block btn-outline-success btn-rounded waves-effect pull-right btn-action" style="color:#fff !important;">{{Lang::get('landingPage.menu.logIn')}}</a>
					<a class="btn btn-block btn-warning btn-rounded pull-right btn-action" style="color:#fff; margin-left:10px;" href="#membresia">{{Lang::get('landingPage.menu.createAccount')}}</a>
					<!-- <a class="btn btn-block btn-warning btn-rounded pull-right btn-action" style="color:#fff; margin-left:10px;" href="javascript:void(0)">Próximamente</a> -->
				</div>
				<div class="col-xs-1 col-md-2"></div>
				<br>
			</ul>
		</div>
	</div>
	<!-- Fin de sección a pantalla completa -->

	<!-- Sección ¿Qué es curiosity? -->
	<section id="nosotros" class="margen-dispositivo">
		<div class="col-md-6 offset-md-3 divider-new z-depth-1 wow zoomInUp">
			<h2 class="section-header h2-responsive">
				<img src="/packages/assets/media/images/landing/computing.png" alt="Curiosity" style="width:35px; height:35px;" class="">
				¿Qué es Curiosity?
			</h2>
		</div>
		<div class="container" id="content-nosotros">
			<div class="col-md-12">
				<div class="col-md-6 col-sm-12 elemento-nosotros" id="">
					<div class="col-md-3 col-sm-4 col-xs-12">
						<img src="/packages/assets/media/images/landing/laptop.png" alt="plataforma" style="" class="wow bounceInLeft img-fluid">
					</div>
					<div class="col-md-9 col-sm-7">
						<p class="text-justify"><b>Plataforma web </b> diseñada para mejorar la educación de los niños y aprender jugando.
						</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="col-md-12  col-sm-12 elemento-nosotros" id="">
						<div class="col-md-3 col-sm-4">
							<img src="/packages/assets/media/images/landing/equidad.svg" alt="equidad" style="" class="wow bounceInLeft img-fluid">
						</div>
						<div class="col-md-9 col-sm-7">
							<p class="text-justify"><b>Equidad.</b> Acceso a los mejores profesores de diferentes escuelas para así evitar la desigualdad educativa.</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 offset-md-3 col-sm-12 elemento-nosotros" id="content-elemento">
					<div class="col-md-3 col-sm-4">
						<img src="/packages/assets/media/images/landing/diversion.svg" alt="diversion" style="" class="img-responsive wow bounceInLeft img-fluid">
					</div>
					<div class="col-md-9 col-sm-7">
						<p class="text-justify"><b>Diversión </b> en el mundo de la educación, para volver el aprendizaje uno de sus mejores momentos.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Fin Sección ¿Qué es curiosity? -->

	<!-- Sección ¿Cómo funciona curiosity? -->
	<section id="funcionamiento" class="margen-dispositivo">
		<div class="col-md-6 offset-md-3 divider-new z-depth-1 wow bounceIn">
			<h2 class="section-header h2-responsive">
				<img src="/packages/assets/media/images/landing/pencil.png" alt="como funciona curiosity" style="width:35px; height:35px;" class="">
				¿Cómo funciona?
			</h2>
		</div>
		<div class="container">
			<div class="col-md-12">
				<div class="col-md-3 col-sm-6">
					<div class="view hm-zoom overlay hm-orange-strong">
						<img src="/packages/assets/media/images/landing/fun-game.jpg" alt="Juegos" class="img-thumbnail img-responsive img-fluid">
						<div class="mask flex-center">
							<h4 class="white-text">Juegos</h4>
						</div>
					</div>
					<div class="funcionamiento-text"><p>Un tema, una aventura. <br> Diseñamos cada juego con el propósito de que el niño aprenda divirtiéndose y con cada tema viva una aventura </p></div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="view hm-zoom overlay hm-purple-strong">
						<img src="/packages/assets/media/images/landing/fun-video.jpg" alt="Videos" class="img-thumbnail img-responsive img-fluid">
						<div class="mask flex-center">
							<h4 class="white-text">Videos Animados</h4>
						</div>
					</div>
					<div class="funcionamiento-text"><p>¿Me lo explicas? <br> Desarrollamos videos animados con  explicaciones de los mejores profesores para comprender mejor cada tema. </p></div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="view hm-zoom overlay hm-blue-strong">
						<img src="/packages/assets/media/images/landing/fun-pdf.jpg" alt="PDF" class="img-thumbnail img-responsive img-fluid">
					<div class="mask flex-center">
						<h4 class="white-text">Documentos PDF</h4>
					</div>
				</div>
				<div class="funcionamiento-text"><p>Algo que leer. <br>Documentos evaluados por expertos, que ayudarán a comprender mejor cada tema.</p></div>
				</div>
				<div class="col-md-3 col-sm-6" id="content-elemento">
					<div class="view hm-zoom overlay hm-yellow-strong">
						<img src="/packages/assets/media/images/landing/fun-feedback.jpg" alt="Retroalimentación" class="img-thumbnail img-responsive img-fluid">
						<div class="mask flex-center">
							<h4 class="white-text">Retroalimentación</h4>
						</div>
					</div>
					<div class="funcionamiento-text"><p>¿Aprendió? <br> El desempeño de tu hijo a un solo click. Evaluamos y detectamos distintas áreas de oportunidad para que nunca deje de mejorar.</p></div>
				</div>
			</div>
		</div>
	</section>
	<!-- Fin Sección ¿Cómo funciona curiosity? -->

	<!-- Separador 1 -->
	<div class="col-md-12 view hm-cyan-light" id="separador1">
		<div class="mask flex-center">
			<center>
				<h2 class="white-text h1-responsive">Aprendiendo de una manera DIVERTIDA <br>
					<!-- <a href="javascript:void(0)" type="button" class="btn btn-secondary btn-rounded waves-effect">Próximamente</a> -->
					<a href="#membresia" type="button" class="btn btn-secondary btn-rounded waves-effect">Registrarme ahora</a>
				</h2>
			</center>
		</div>
	</div>

	<!-- Sección de Video -->
	<section id="video" class="">
		<div class="col-md-6 offset-md-3 divider-new z-depth-1 wow pulse">
			<h2 class="section-header h2-responsive">
				<img src="/packages/assets/media/images/landing/mortarboard.png" alt="Conoce mejor a curiosity" style="width:35px; height:35px;" class="">
				Conócenos mejor
			</h2>
		</div>
		<div class="container">
			<div class="col-md-12" id="">
				<div class="col-md-6">
					<img src="/packages/assets/media/images/landing/video-img.jpg" alt="construccion curiosity" class="img-fluid center-block animated zoomInRight" id="img-video">
				</div>
				<div class="col-md-6" id="content-iframe">
					<iframe width="100%" height="300px" id="videoCU" src="https://www.youtube.com/embed/9Ixi5LyyMuw" frameborder="0" allowfullscreen=""></iframe><br><br>
					<center>
						<button type="button" class="btn btn-fb btn-lg" id="shareFB"><small>compartir en <br></small><i class="fa fa-facebook left"></i> Facebook</button>
						<button type="button" class="btn btn-tw btn-lg" id="shareT"><small>compartir en <br></small><i class="fa fa-twitter left"></i> Twitter</button>
					</center>
				</div>
			</div>
		</div>
	</section>
	<!-- Fin Sección de Video -->

	<!-- Sección de Colaboradores -->
	<section id="colaboradores" class="margen-dispositivo">
		<div class="col-md-6 offset-md-3 divider-new z-depth-1 wow bounceInRight">
			<h2 class="section-header h2-responsive">
				<img src="/packages/assets/media/images/landing/school.png" alt="escuela" style="width:35px; height:35px;" class="">
				Colaboradores
			</h2>
		</div>
		<div class="container">
			<div class="col-md-12" id="carusel-colaboradores">
				<div class="col-md-12 col-md-offset-">
				<!--Carousel Wrapper-->
					<div id="multi-item-example2" class="carousel slide carousel-multi-item" data-ride="carousel">
						<!--Controls-->
						<div class="controls-top">
							<a class="btn-floating btn-small indicadores" href="#multi-item-example2" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
							<a class="btn-floating btn-small indicadores" href="#multi-item-example2" data-slide="next"><i class="fa fa-chevron-right"></i></a>
						</div>
						<!--/.Controls-->
						<?php $slide=0; $status="active"; $contador=0; $long = count($escuelas); $nPages = ceil($long/3);?>
						<ol class="carousel-indicators">
							@for($i=0;$i<$nPages;$i++)
	                            @if($i==0)
	                                <li data-target="#multi-item-example2" data-slide-to="{{$i}}" class="active" style="background-color:#65499d;"></li>
	                            @else
	                                <li data-target="#multi-item-example2" data-slide-to="{{$i}}" style="background-color:#65499d;"></li>
	                            @endif
	                        @endfor
						</ol>
						<!--/.Indicators-->

						<!--Slides-->
						<div class="carousel-inner" role="listbox">
							<!--First slide-->
							<?php $contador_esc=0; $long = count($escuelas); $control=0;?>
								@foreach($escuelas as $escuela)
									@if($contador_esc == 0)
										@if($escuelas[0]->id == $escuela->id)
											<div class="carousel-item active">
										@else
											<div class="carousel-item">
										@endif
									@endif
									<div class="col-md-4 col-sm-4">
										<div class="card">
											{{HTML::image('/packages/assets/media/images/schools/'.$escuela->logotipo, 'alt', array('class' => 'img-fluid img-esc'))}}
										</div>
									</div>
									<?php $contador_esc+=1; $control+=1;?>
									@if($contador_esc == 3 || $control == $long)
										</div>
										<?php $contador_esc=0;?>
									@endif
								@endforeach
							</div>
							<!--/.Slides-->
						</div>
						<!--/.Carousel Wrapper-->
					</div>	<!-- Fin escuelas -->
		 		</div>
	  		</div>
		</div>
	</section>
	<!-- Fin Sección de Colaboradores -->

	<!-- Separador 2 -->
	<div class="col-md-12 view hm-blue-light" id="separador2">
		<div class="mask flex-center">
			<center>
				<h2 class="white-text h1-responsive">Juega y aprende en cualquier dispositivo <br>
					<a type="button" class="btn btn-warning btn-rounded waves-effect" href="#membresia">Comenzar</a>
					<!-- <a type="button" class="btn btn-warning btn-rounded waves-effect" href="javascript:void(0)">Próximamente</a> -->
				</h2>
			</center>
	  	</div>
	</div>

	<!-- Sección de Membresías -->
	<section id="membresia" class="">
		<div class="col-md-6 offset-md-3 divider-new z-depth-1 wow rotateInUpLeft">
			<h2 class="section-header h2-responsive">
				<img src="/packages/assets/media/images/landing/attachment.png" alt="membresia" style="width:35px; height:35px;" class="">
				Membresía
			</h2>
		</div>
		<div class="container">
			<div class="col-md-12" id="content-elemento">


				<!--Section: Pricing v.3-->
				<section class="section">

					<!--First row-->
					<div class="row">

					@foreach($planes as $plan)
						@if($plan->num_card === 1)
						<!--First column-->
						<div class="col-lg-4 col-md-4 col-xs-12 mb-r">
							<!--Card-->
							<div class="card hoverable">

								<!--Content-->
								<div class="text-center">
									<div class="card-block">
										<h3 class="text-xs-center">{{$plan->name}}</h3>
										<div class="">
											<center>
												<div class="card-circle z-depth-1">
													<i class="fa fa-user iconcard"></i>
												</div>
											</center>
										</div>

										<!--Price-->
										<h2 class="text-xs-center"><strong>${{$plan->amount}}.00 {{$plan->currency}}</strong></h2>
										<p class="text-xs-center">¡ Muy Bien !</p>
										<p class="text-xs-center">
											Facturación Recurrente <br><br><br>
										</p>
										<center><a class="btn bluecard btn-rounded z-depth-2 space suscriptionBtn" data-id-plan="{{$plan->id}}">Adquirir</a></center>
									</div>
								</div>

							</div>
							<!--/.Card-->
						</div>
						<!--/First column-->
						@elseif($plan->num_card === 2)
						<!--Second column-->
						<div class="col-lg-4 col-md-4 col-xs-12 mb-r">
							<!--Card-->
							<div class="card planImportant z-depth-4 hoverable">

								<!--Content-->
								<div class="text-center white-text">
									<div class="card-block">
										<h3 class="text-xs-center">{{$plan->name}}</h3>
										<div class="">
											<center>
												<div class="card-circle  z-depth-1">
													<i class="fa fa-user white-text"></i>
												</div>
											</center>
										</div>

										<!--Price-->
										<h2 class="text-xs-center"><strong>${{$plan->amount}}.00 {{$plan->currency}}</strong></h2>
										<p class="text-xs-center">¡ La más popular !</p>
										<p class="text-xs-center">
											Equivalente a
											${{ number_format($plan->amount / 12, 2) }} / Mes <br><br>
											Facturación Recurrente.
										</p>
										<center><a class="btn btn-outline-white btn-rounded z-depth-2 space suscriptionBtn" data-id-plan="{{$plan->id}}">Adquirir</a></center>
									</div>
								</div>

							</div>
							<!--/.Card-->
						</div>
						<!--/Second column-->
						@else
						<!--Third column-->
						<div class="col-lg-4 col-md-4 col-xs-12 mb-r">
							<!--Card-->
							<div class="card hoverable">

								<!--Content-->
								<div class="text-center">
									<div class="card-block">
										<h3 class="text-xs-center">{{$plan->name}}</h3>
										<div class="">
											<center>
												<div class="card-circle z-depth-1">
													<i class="fa fa-group iconcard"></i>
												</div>
											</center>
										</div>

										<!--Price-->
										<h2 class="text-xs-center"><strong>${{$plan->amount}}.00 {{$plan->currency}}</strong></h2>
										<p class="text-xs-center">¡ Genial !</p>
										<p class="text-xs-center">
											Equivalente a
											${{ number_format(($plan->amount / 12) / $plan->limit, 2) }} / Mes por hijo<br>
											Registra hasta {{ $plan->limit }} hijos <br>
											Facturación Recurrente
										</p>
										<center><a class="btn bluecard btn-rounded z-depth-2 space suscriptionBtn" data-id-plan="{{$plan->id}}">Adquirir</a></center>
									</div>
								</div>

							</div>
							<!--/.Card-->
						</div>
						<!--/Third column-->
						@endif
					@endforeach

					</div>
					<!--/First row-->

				</section>
				<!--/Section: Pricing v.3-->


			</div> <!-- Cierre de contenedor -->
		</div>
	</section>
	<!-- Fin Sección de Membresías -->

	<!-- Sección con el Apoyo -->
	<section id="apoyo" class="margen-dispositivo">
		<div class="col-md-6 offset-md-3 divider-new z-depth-1 wow fadeInUpBig">
			<h2 class="section-header h2-responsive">
				<img src="/packages/assets/media/images/landing/compass.png?{{rand();}}" alt="Apoyo_icono" style="width:35px; height:35px;" class="">
				Con el Apoyo:
			</h2>
		</div>
		<div class="container">
			<div class="col-md-12" id="content-elemento">
				<div class="col-md-3 col-sm-6">
					<img src="/packages/assets/media/images/landing/SUM.png?{{rand();}}" alt="sum" class="img-fluid  hoverable z-depth-1 wow zoomInUp img-thumbnail"><br><br>
					<img src="/packages/assets/media/images/landing/incubadora_laguna.png?{{rand();}}" alt="incubadora laguna" class="img-fluid hoverable z-depth-1 wow zoomInUp img-thumbnail">
				</div>
				<div class="col-md-3 col-sm-6">
					<img src="/packages/assets/media/images/landing/logoFunBanorte.png?{{rand();}}" alt="fundacion banorte" class="img-fluid hoverable z-depth-1 wow zoomInUp img-thumbnail"><br><br>
					<img src="/packages/assets/media/images/landing/Work_St.jpg?{{rand();}}" alt="work st" class="img-fluid hoverable z-depth-1 wow zoomInUp img-thumbnail">
				</div>
				<div class="col-md-3 col-sm-6">
					<img src="/packages/assets/media/images/landing/penoles.png?{{rand();}}" alt="peñoles" class="img-fluid hoverable z-depth-1 wow zoomInUp img-thumbnail">
				</div>
				<div class="col-md-3 col-sm-6">
					<img src="/packages/assets/media/images/landing/logo-fs.jpg?{{rand();}}" alt="facebook start" class="img-fluid hoverable z-depth-1 wow zoomInUp img-thumbnail">
				</div>
			</div>
		</div>
	</section>
	<!-- Fin Sección con el Apoyo -->

	<!-- Separador 3 -->
	<div class="col-md-12 view hm-black-strong" id="separador3" hidden="hidden">
		<div class="mask flex-center">
			<center>
				<h2 class="white-text h1-responsive">
				    Educación divertida para todos con...<br>
				    <b>Padrino Curiosity</b>
				</h2>
			</center>
		</div>
	</div>

	<!-- Sección con Padrino curiosity -->
	<section id="padrino-curiosity" class="margen-dispositivo" hidden="hidden">
		<div class="col-md-6 offset-md-3 divider-new z-depth-1 wow fadeInUpBig">
			<h2 class="section-header h2-responsive">
				<!-- <img src="/packages/assets/media/images/landing/compass.png?{{rand();}}" alt="Apoyo_icono" style="width:35px; height:35px;" class=""> -->
				&nbsp; Padrino Curiosity &nbsp;
			</h2>
		</div>
		<div class="container">
			<div class="col-md-12" id="content-elemento">
                <p class="text-xs-center">
                    ¿Qué es padrino curiosity? <br>
                    Consiste en brindar la oportunidad a niños de casas hogares de tener el acceso
                    a una cuenta para acceder a la plataforma. <br>
                    Solo tienes que dar click al boton VER TODAS, el cual te mostrará las casas hogares, posterior a ello podrás elegir alguna y ver a los niños que en ella se encuentran y poder apadrinar a cualquiera de ellos.
                </p><br>

                <?php $contador = 0 ?>
                @foreach($casasHogares as $casaHogar)
                   <?php $contador = $contador + 1 ?>
                    @if($contador > 2)
                    <div class="col-md-3 col-sm-6 hidden-xs-down">
                        <div class="view hm-zoom overlay z-depth-1">
                            <img src="/packages/assets/media/images/instituciones/{{ $casaHogar -> logo }}" alt="" class="img-casaHogar img-fluid">
                        </div>
                        <div class="casahogar-text"><h5 class="font-weight-bold">{{ $casaHogar -> nombre }}</h5></div>
                    </div>
                    @else
                    <div class="col-md-3 col-sm-6">
                        <div class="view hm-zoom overlay z-depth-1">
                            <img src="/packages/assets/media/images/instituciones/{{ $casaHogar -> logo }}" alt="" class="img-casaHogar img-fluid">
                        </div>
                        <div class="casahogar-text"><h5 class="font-weight-bold">{{ $casaHogar -> nombre}}</h5></div>
                    </div>
				    @endif
				@endforeach

				<div class="col-md-12">
				    <center>
				        <a href="/casas-hogares" class="btn btn-info btn-rounded" id="btn-goHome">Ver todas</a>
				    </center>
				</div>
			</div>
		</div>
	</section>
	<!-- Fin Sección Padrino curiosity -->

	<!-- Sección de Noticias -->
	<section id="noticias">
		<div class="bg-noticias">
			<div class="flex-center container">
				<ul class="animated ">
					<li class="container-fluid">
						<h2 class="h1-responsive" style="color:white;">¿Quieres saber más sobre Curiosity?</h2>
					</li>
					<li class="container-fluid">
						<h4 class="h4-responsive" style="color:white;">¡ Síguenos en Facebook !</h4>
					</li>
					<li class="container-fluid">
						<h4 class="h4-responsive" style="color:white;">Regálanos tu like y forma parte de la familia Curiosity.</h4>
					</li>
					<div class="col-md-8 offset-md-2" hidden="hidden">
						<form class="form-inline form-control" action="mail_noticia" method="post" id="mail_noticia" name="mail_noticia"
						 style="padding-top:20px; padding-left:20px; border:1px solid #fff;">
						<div class="md-form form-group">

							<input type="email" id="correo_noticia" class="form-control validate">
							<label for="correo_noticia" data-error="no válido" data-success="correcto">@ escribe tu email</label>
						</div>
						<div class="md-form form-group">
							<a href="" class="btn btn-primary btn-lg">Enviar</a>
						</div>
					</form>
					</div>
				</ul>
			</div>
		</div>
	</section>
	<!-- Fin Sección de Noticias -->
@stop

@section('footer')
	<!--Footer-->
	<footer class="page-footer center-on-small-only" id="footer">
		<!--Footer Links-->
		<div class="container-fluid">
			<div class="row">
				<!--First column-->
				<div class="col-md-3 offset-md-1">
					<h4 class="h4-responsive font-italic font-curiosity">Porque una educación divertida es posible.</h4>
				</div>
				<!--/.First column-->
				<hr class="hidden-md-up">
				<!--Second column-->
				<div class="col-md-2 offset-md-1">
					<h5 class="title"><i class="fa fa-users"></i> Nosotros</h5>
					<ul class="ul-content">
						<li><a href="/equipo">- Nuestro equipo</a></li>
						<li class="separacion"><a href="/mentores">- Mentores</a></li>
					</ul>
				</div>
				<!--/.Second column-->
				<hr class="hidden-md-up">
				<!--Third column-->
				<div class="col-md-2">
					<h5 class="title"><i class="fa fa-info-circle"></i> Apoyo</h5>
					<ul class="ul-content">
						<!-- <li><a href="#">- Preguntas frecuentes</a></li> -->
						<li class="separacion"><a href="/terminos">- Términos y Condiciones</a></li>
						<li class="separacion"><a href="/aviso-privacidad">- Aviso de privacidad</a></li>
					</ul>
				</div>
				<!--/.Third column-->
				<hr class="hidden-md-up">
				<!--Fourth column-->
				<div class="col-md-2">
					<h5 class="title"><i class="fa fa-comments-o"></i> contacto</h5>
					<ul>
						<li> - &nbsp;(871) 255 89 65</li>
						<li> - &nbsp;hola@curiosity.com.mx</li>
					</ul>
				</div>
				<!--/.Fourth column-->
			</div>
		</div>
		<!--/.Footer Links-->
		<hr>
		<!--Call to action-->
		<div class="call-to-action">
			<ul>
				<li>
					<h5>¡Vamos! ¿Qué esperas para formar parte de la familia Curiosity?</h5></li>
				<li><a class="btn btn-danger" href="#membresia">¡Únete!</a></li>
				<!-- <li><a class="btn btn-danger" href="javascript:void(0)">Próximamente!</a></li> -->
			</ul>
		</div>
		<!--/.Call to action-->
		<hr>
		<!--Social buttons-->
		<div class="social-section">
			<ul>
				<li><a href="https://www.facebook.com/curiosity.mx/" class="btn-floating btn-small btn-fb" target="_blank"><i class="fa fa-facebook" > </i></a></li>
				<!-- <li><a href="" class="btn-floating btn-small btn-tw"><i class="fa fa-twitter"> </i></a></li> -->
				<li><a href="https://www.youtube.com/channel/UCucy9_laT18ac4DN8qosoEQ" class="btn-floating btn-small btn-gplus" target="_blank"><i class="fa fa-youtube"> </i></a></li>
			</ul>
			<!--- Boton Like fb desde la landing -->
			<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fcuriosity.mx%2F&width=214&layout=button_count&action=like&size=large&show_faces=true&share=true&height=46&appId=847478262051734" width="214" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
		</div>
		<!--/.Social buttons-->
		<!--Copyright-->
		<div class="footer-copyright">
			<div class="container-fluid">
				© {{Date('Y')}} Todos los derechos reservados: Curiosity.com.mx
			</div>
		</div>
		<!--/.Copyright-->
	</footer>
	<!--/.Footer-->
@stop

@section('js')
	<script src="/packages/assets/js/Curiosity.js" charset="utf-8"></script>
	<script type="text/javascript">
        $(function(){
            $(".suscriptionBtn").click(function(e){
                e.preventDefault();
                localStorage.setItem('plan-user-selected',$(this).data('idPlan'));
                window.location = '/parent-register';
            });
        });
    </script>
@stop
