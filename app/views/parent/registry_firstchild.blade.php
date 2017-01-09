<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" href="/packages/assets/media/images/landing/logo.png">
    <link rel="stylesheet" href="/packages/libs/mdb/css/bootstrap.min.css">
    <link rel="stylesheet" href="/packages/libs/mdb/css/mdb.min.css">
    <link rel="stylesheet" href="/packages/libs/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/packages/assets/css/parent/main.css">
	<title>Curiosity | Mi primer hijo</title>

	<!--Navbar-->
	<nav class="navbar navbar-fixed-top navbar-dark rfc-navbar">

		<div class="container">

			<a class="navbar-brand">
				<img src="/packages/assets/media/images/system/icon.png" class="img-fluid reg-logo" id="reg-imgLogo">
				Curiosity Educación
			</a>

		</div>

	</nav>
	<!--/.Navbar-->
</head>
<body id="rfc-bg">

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-xs-12">
				<div class="jumbotron animated flash" id="rfc-info">
					<h3 class="h3-responsive">Registro de tu primer(a) Hijo(a) <i class="fa fa-male"></i> <i class="fa fa-female"></i> <a class="btn-floating btn-small pull-right hidden-xs-down rfc-close-info rfc-infoCloseMD"><i class="fa fa-close"></i></a></h3>

					<hr>

					<p class=""><span class="tag rfc-tag-default"><i class="fa fa-question"></i></span> Te preguntaras, ¿Por qué un registro más?</p>
					<p class=""><span class="tag rfc-tag-info"><i class="fa fa-info"></i></span> Este registro es necesario, ya que crearás la cuenta de tu primer hijo y así tener acceso a la plataforma, posteriormente podrás registrar más hijos desde tu cuenta.</p>
					<hr class="hidden-sm-up">
					<button type="button" class="btn btn-outline-warning waves-effect float-xs-right rfc-rounded hidden-sm-up rfc-close-info rfc-infoCloseSM">Ocultar</button><br class="hidden-sm-up"><br class="hidden-sm-up">
				</div>
				<a class="rfc-hidde" href="#" id="rfc-show-info">
					<div class="chip rfc-details animated bounce">
						<i class="fa fa-info"></i> |
						Detalles sobre este registro
					</div>
				</a>
				<br>

				<div class="card rfc-rounded">
					<div class="card-block">

						<!--Header-->
						<div class="form-header rfc-rounded reg-colorHeader">
							<h3><i class="fa fa-user"></i> Registro Hijo</h3>
						</div>

						<!--Body-->
						<form action="" class="form-inline text-xs-center" id="rfc-form">
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="md-form form-group">
												<i class="fa fa-user prefix"></i>
												<input type="email" id="rfc-username" class="form-control">
												<label for="rfc-username">Usuario</label>
											</div>
											<div class="md-form form-group">
												<i class="fa fa-user prefix"></i>
												<input type="text" id="rfc-name" class="form-control">
												<label for="rfc-name">Nombre</label>
											</div>
											<div class="md-form form-group" id="rfc-gender">
												<select class="mdb-select" id="rfc-selgender">
													<option value="" disabled selected>Genero</option>
													<option value="" data-icon="http://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" class="rounded-circle">Niño</option>
													<option value="" data-icon="http://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle">Niña</option>
												</select>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="md-form form-group">
												<i class="fa fa-unlock-alt prefix"></i>
												<input type="password" id="rfc-password" class="form-control">
												<label for="rfc-password">Contraseña</label>
											</div>
											<div class="md-form form-group">
												<i class="fa fa-user prefix"></i>
												<input type="text" id="rfc-surnames" class="form-control">
												<label for="rfc-surnames">Apellidos</label>
											</div>
											<div class="md-form form-group rfc-content-average">
												<h5 class="h5-responsive text-xs-left">Promedio Escolar:</h5>
												<input type="range" class="form-control" id="rfc-average" min="0" max="100" />
											</div>
										</div>
									</div>
									<hr>
									<div class="col-md-12 col-sm-12 col-xs-12 text-xs-center">

										<hr>
										<button class="btn rfc-btn-default rfc-rounded" data-toggle="modal" data-target="#rfc-modalPayment">Registrar</button>
									</div>
								</div>
							</div>
						</form>

					</div>
				</div><br>
			</div>

			<!-- Modal data of Payments -->
			<div class="modal fade" id="rfc-modalPayment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<!--Content-->
					<div class="modal-content">
						<!--Header-->
						<div class="modal-header rfc-modal-header">
							<button type="button" class="close rfc-modalClose" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title text-xs-center" id="myModalLabel"><i class="fa fa-credit-card-alt"></i>&nbsp; Datos de pago</h4>
						</div>
						<!--Body-->
						<div class="modal-body">
							...
						</div>
						<!--Footer-->
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-warning waves-effect rfc-rounded rfc-btnCancel" data-dismiss="modal">Regresar</button>
							<button type="button" class="btn rfc-btn-primary rfc-rounded">Terminar registro</button>
						</div>
					</div>
					<!--/.Content-->
				</div>
			</div>
		</div>
	</div>

	<script src="/packages/libs/mdb/js/jquery-3.1.1.min.js"></script>
    <script src="/packages/libs/mdb/js/tether.min.js"></script>
    <script src="/packages/libs/mdb/js/bootstrap.min.js"></script>
    <script src="/packages/libs/mdb/js/mdb.min.js"></script>
    <script src="/packages/assets/js/parent/registry_firstchild.js"></script>
    <script type="text/javascript">
		 $(document).ready(function() {
			$('.mdb-select').material_select();
		  });
	</script>
</body>
</html>
