@extends('templates.child-menu')

@section('title')
	 Configuración de cuenta
@stop

@section('content')
	<div class="container-fluid">

		<div class="row">
			<!-- Banner -->
			<div class="view hm-black-strong z-depth-1 col-xs-12" id="lp-banner">
			  <div class="mask flex-center">
				 <h4 class="h4-responsive white-text text-xs-center"><i class="fa fa-cogs"></i>&nbsp; Configuración de mi cuenta</h4>
			  </div>
			</div>

			<!-- Message for smartphone landscape -->
			<div class="col-md-12 z-depth-1" id="ca-text-info">
				<h1 class="text-xs-center h1-responsive">Para mejor interacción gira tu dispositivo en forma vertical</h1>
			</div>

			<!-- Card configuration of data -->
			<div class="col-md-6 col-sm-6 col-xs-12" id="ca-cardData">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<!--Card-->
							<div class="card ovf-hidden ca-card">

								<!--Card image-->
								<div class="view hm-orange-light">
									<img src="http://mdbootstrap.com/images/reg/reg%20(60).jpg" class="img-fluid" alt="">
									<a>
										<div class="mask"></div>
									</a>
								</div>
								<!--/.Card image-->

								<!--Card content-->
								<div class="card-block">
									<!--Title-->
									<h4 class="card-title text-xs-left"><i class="fa fa-user"></i>&nbsp;
										<label class="masterUserName">{{Auth::user()->username}}</label>
									</h4>
									<hr>
									<a class="activator btn btn-rounded ca-btnConf">Editar mis datos</a>
								</div>
								<!--/.Card content-->

								<!--Card reveal-->
								<div class="card-reveal">
									<!--Content-->
									<div class="content">

										<h4 class="card-title text-xs-center" id="ca-titileConf"> Mis Datos <i class="fa fa-close"></i></h4>
										<hr>
											<!-- Form -->
											<div class="card-block ca-formData">
												<div class="md-form">
													<i class="fa fa-user prefix"></i>
													<input type="text" id="ca-userName" class="form-control" value="{{Auth::user()->username}}">
													<label for="ca-userName">Nombre de usuario</label>
												</div>
												<div class="md-form">
													<i class="fa fa-user prefix"></i>
													<input type="password" id="ca-pass" class="form-control">
													<label for="ca-pass">Contraseña actual</label>
												</div>
												<div class="md-form">
													<i class="fa fa-user prefix"></i>
													<input type="password" id="ca-npass" class="form-control">
													<label for="ca-npass">Nueva contraseña</label>
												</div>
												<div class="md-form">
													<i class="fa fa-user prefix"></i>
													<input type="password" id="ca-cpass" class="form-control">
													<label for="ca-cpass">Confirmar nueva contraseña</label>
												</div>
											</div>
										<hr>

										<!--buttons of options-->
										<ul class="inline-ul text-xs-center" id="ca-buttonsConf">
											<li><button class="btn btn-outline-warning btn-rounded waves-effect ca-btn ca-cancel" id="ca-cancelConf">Cancelar</button></li>
											<li><button class="btn btn-rounded ca-save" id="ca-saveConf" data-data="{{Auth::user()->id}}">Guardar</button></li>
										</ul>

									</div>
									<!--/.Content-->
								</div>
								<!--/.Card reveal-->
							</div> <!--/.Card-->
						</div> <!--/.row-->
					</div>
				</div> <!--/.row-->
			</div>

			<!-- Card configuration Daily goal -->
			<div class="col-md-6 col-sm-6 col-xs-12" id="ca-cardGoal">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<!--Card-->
							<div class="card" id="ca-cardGoalSelect">

								<!--Card reveal-->
								<div>
									<!--Content-->
									<div class="content text-xs-center">

										<h4 class="card-title text-xs-center" id="ca-titleGoal">Meta Diaria Actual</h4>
										<hr>

										<!--Social Icons-->
										<ul class="inline-ul">
											<li>
												<div class="container-fluid">
													<div class="row">
														<!-- image of Daily goal -->
														<div id="ca-goalSelected">
															<center><img src="/packages/assets/media/images/child/{{$miMeta->emoji}}" class="img-fluid" id="ca-img-goal"></center>
														</div>
														<!-- name of Daily goal -->
														<div class="text-xs-center">
															<h4 class="h4-responsive"><span class="tag red" id="ca-tit-goal">{{$miMeta->nombre}}</span></h4>
														</div>
													</div>
												</div>
											</li>
										</ul>
										<hr>
										<div class="container-fluid">
											<div class="col-md-12">
												<div class="row">
													@foreach($metas as $meta)
													<a href="#" id="ca-ca">
														<div class="col-md-4 col-sm-6 col-xs-6 text-xs-center ca-box" data-data="{{$meta->id}}">
															<center><img src="/packages/assets/media/images/child/{{$meta->emoji}}" class="img-fluid ca-goals-img"></center>
															<h6 class="h6-responsive black-text"><span class="tag blue">{{$meta->nombre}}</span><br><br>
															{{$meta->meta}} juegos</h6>
														</div>
													</a>
													@endforeach
												</div>
											</div>
										</div>
										<hr>
										<!--buttons of options-->
										<ul class="inline-ul text-xs-center" id="ca-ullibtns">
											<li><a class="btn btn-outline-warning btn-rounded waves-effect ca-btn ca-cancel" id="ca-cancelGoal">Cancelar</a></li>
											<li><a class="btn btn-rounded ca-save" id="ca-saveGoal">Guardar</a></li>
										</ul>

									</div>
									<!--/.Content-->
								</div>
								<!--/.Card reveal-->
							</div> <!--/.Card-->
						</div> <!--/.row-->
					</div>
				</div> <!--/.row-->
			</div>

		</div>
	</div>
@stop

@section('js-plus')
	<script src="/packages/assets/js/child/models/child.js?{{rand();}}" charset="utf-8"></script>
	<script src="/packages/assets/js/child/models/DailyGoal.js?{{rand();}}" charset="utf-8"></script>
	<script src="/packages/assets/js/child/controllers/confController.js?{{rand();}}" charset="utf-8"></script>
	<script src="/packages/assets/js/child/dispatchers/dsp-confupdt.js?{{rand();}}" charset="utf-8"></script>
@stop
