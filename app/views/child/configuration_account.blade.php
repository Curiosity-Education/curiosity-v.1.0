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
									<h4 class="card-title text-xs-left"><i class="fa fa-user"></i>&nbsp; USERNAME</h4>
									<hr>
									<a class="activator btn btn-default btn-rounded ca-btnConf">Editar mis datos</a>
								</div>
								<!--/.Card content-->

								<!--Card reveal-->
								<div class="card-reveal">
									<!--Content-->
									<div class="content">

										<h4 class="card-title text-xs-center">Mis Datos <i class="fa fa-close"></i></h4>
										<hr>

											<!-- Form -->
											<div class="card-block ca-formData">
												<div class="md-form">
													<i class="fa fa-user prefix"></i>
													<input type="text" id="form2" class="form-control">
													<label for="form2">Dato</label>
												</div>
												<div class="md-form">
													<i class="fa fa-user prefix"></i>
													<input type="text" id="form2" class="form-control">
													<label for="form2">Dato</label>
												</div>
												<div class="md-form">
													<i class="fa fa-user prefix"></i>
													<input type="text" id="form2" class="form-control">
													<label for="form2">Dato</label>
												</div>
											</div>
										<hr>

										<!--buttons of options-->
										<ul class="inline-ul text-xs-center">
											<li><a class="btn btn-outline-warning btn-rounded waves-effect ca-btn">Cancelar</a></li>
											<li><a class="btn btn-secondary btn-rounded">Siguiente</a></li>
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
							<div class="card ovf-hidden ca-card">

								<!--Card image-->
								<div class="view hm-orange-light">
									<img src="http://mdbootstrap.com/images/reg/reg%20(60).jpg" class="img-fluid" alt="">
									<a>
										<div class="mask"></div>
									</a>
								</div>
								<!--/.Card image-->

								<!--Social shares button-->
								<a class="activator"><i class="fa fa-share-alt"></i></a>

								<!--Card content-->
								<div class="card-block">
									<!--Title-->
									<h4 class="card-title text-xs-left"><i class="fa fa-flag-checkered"></i>&nbsp; Meta diaria</h4>
									<hr>
									<a class="activator btn btn-info btn-rounded ca-btnConf">cambiar mi meta</a>
								</div>
								<!--/.Card content-->

								<!--Card reveal-->
								<div class="card-reveal">
									<!--Content-->
									<div class="content text-xs-center">

										<h4 class="card-title text-xs-center">Meta Diaria Actual <i class="fa fa-close"></i></h4>
										<hr>

										<!--Social Icons-->
										<ul class="inline-ul">
											<li>
												<div class="container-fluid">
													<div class="row">
														<!-- image of Daily goal -->
														<div class="">
															<center><img src="http://mdbootstrap.com/images/reg/reg%20(60).jpg" class="img-fluid" alt="" id="ca-img-goal"></center>
														</div>
														<!-- name of Daily goal -->
														<div class="text-xs-center">
															<h4 class="h4-responsive"><span class="tag red">Emocionado</span></h4>
														</div>
													</div>
												</div>
											</li>
										</ul>
										<hr>
										<div class="container-fluid">
											<div class="col-md-12">
												<div class="row">
													<a href="#">
														<div class="col-md-4 col-sm-6 col-xs-6 text-xs-center">
															<center><img src="http://mdbootstrap.com/images/reg/reg%20(60).jpg" class="img-fluid ca-goals-img" alt=""></center>
															<h6 class="h6-responsive black-text"><span class="tag blue">Normal</span><br><br>3 juegos</h6>
														</div>
													</a>
													<a href="#">
														<div class="col-md-4 col-sm-6 col-xs-6 text-xs-center">
															<center><img src="http://mdbootstrap.com/images/reg/reg%20(60).jpg" class="img-fluid ca-goals-img" alt=""></center>
															<h6 class="h6-responsive black-text"><span class="tag blue">Conquistador</span><br><br>5 juegos</h6>
														</div>
													</a>
													<a href="#">
														<div class="col-md-4 col-sm-6 col-xs-6 text-xs-center">
															<center><img src="http://mdbootstrap.com/images/reg/reg%20(60).jpg" class="img-fluid ca-goals-img" alt=""></center>
															<h6 class="h6-responsive black-text"><span class="tag blue">Emocionado</span><br><br>8 juegos</h6>
														</div>
													</a>
												</div>
											</div>
										</div>
										<hr>
										<!--buttons of options-->
										<ul class="inline-ul text-xs-center">
											<li><a class="btn btn-outline-warning btn-rounded waves-effect ca-btn">Cancelar</a></li>
											<li><a class="btn btn-success btn-rounded">Guardar</a></li>
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
	{{ HTML::script('/packages/assets/js/child/configuration_account.js') }}
@stop
