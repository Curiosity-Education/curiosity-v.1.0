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
				 <h4 class="h4-responsive white-text"><i class="fa fa-cogs"></i>&nbsp; Configuración de mi cuenta</h4>
			  </div>
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
									<h4 class="card-title"><i class="fa fa-user"></i>&nbsp; USERNAME</h4>
									<hr>
									<a class="activator btn btn-default btn-rounded">Editar mis datos</a>
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

										<!--Social Icons-->
										<ul class="inline-ul text-xs-center">
											<li><a class="btn btn-warning btn-rounded">Cancelar</a></li>
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
									<h4 class="card-title"><i class="fa fa-flag-checkered"></i>&nbsp; Meta diaria</h4>
									<hr>
									<a class="activator btn btn-info btn-rounded">cambiar mi meta</a>
								</div>
								<!--/.Card content-->

								<!--Card reveal-->
								<div class="card-reveal">
									<!--Content-->
									<div class="content text-xs-center">

										<h4 class="card-title">Social shares <i class="fa fa-close"></i></h4>
										<hr>

										<!--Social Icons-->
										<ul class="inline-ul">
											<li><a class="btn-floating btn-small btn-fb"><i class="fa fa-facebook"> </i></a></li>
											<li><a class="btn-floating btn-small btn-tw"><i class="fa fa-twitter"> </i></a></li>
											<li><a class="btn-floating btn-small btn-gplus"><i class="fa fa-google-plus"> </i></a></li>
											<li><a class="btn-floating btn-small btn-li"><i class="fa fa-linkedin"> </i></a></li>
											<li><a class="btn-floating btn-small btn-git"><i class="fa fa-github"> </i></a></li>
											<li><a class="btn-floating btn-small btn-pin"><i class="fa fa-pinterest"> </i></a></li>
											<li><a class="btn-floating btn-small btn-ins"><i class="fa fa-instagram"> </i></a></li>
										</ul>

										<h5>Join our community</h5>
										<hr>

										<!--Social Icons-->
										<ul class="inline-ul">
											<li><a class="btn btn-fb"><i class="fa fa-facebook"> </i></a></li>
											<li><a class="btn btn-tw"><i class="fa fa-twitter"> </i></a></li>
											<li><a class="btn btn-li"><i class="fa fa-linkedin"> </i></a></li>
											<li><a class="btn btn-ins"><i class="fa fa-instagram"> </i></a></li>
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
