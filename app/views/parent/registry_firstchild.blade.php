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
												<input type="text" id="rfc-username" name="username" class="form-control">
												<label for="rfc-username">Usuario</label>
											</div>
											<div class="md-form form-group">
												<i class="fa fa-user prefix"></i>
												<input type="text" id="rfc-name" name="name" class="form-control">
												<label for="rfc-name">Nombre</label>
											</div>
											<div class="md-form form-group" id="slc-rfc-gender">
												<select class="mdb-select" id="rfc-gender" name="gender">
													<option value="" disabled selected>Genero</option>
													<option value="H" data-icon="http://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" class="rounded-circle">Niño</option>
													<option value="M" data-icon="http://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle">Niña</option>
												</select>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="md-form form-group">
												<i class="fa fa-unlock-alt prefix"></i>
												<input type="password" id="rfc-password" name="password" class="form-control">
												<label for="rfc-password">Contraseña</label>
											</div>
											<div class="md-form form-group">
												<i class="fa fa-unlock-alt prefix"></i>
												<input type="password" id="rfc-cpassword" name="cpassword" class="form-control">
												<label for="rfc-cpassword">Confirmar Contraseña</label>
											</div>
											<div class="md-form form-group">
												<i class="fa fa-user prefix"></i>
												<input type="text" id="rfc-surnames" name="rfc-surnames" class="form-control">
												<label for="rfc-surnames">Apellidos</label>
											</div>
											<div class="md-form form-group rfc-content-average">
												<h5 class="h5-responsive text-xs-left">Promedio Escolar:</h5>
												<input type="range" class="form-control" id="rfc-average" name="average" min="5" max="10" step=".1" />
											</div>
										</div>
									</div>
									<hr>
									<div class="col-md-12 col-sm-12 col-xs-12 text-xs-center">
										<button type="reset" class="btn btn-warning rfc-rounded">Limpiar Datos</button>
										<button type="button" class="btn {{--rfc-btn-default--}} btn-success rfc-rounded" data-toggle="modal" data-target="#rfc-modalPayment" id="rfc-btn-finish">Registrar</button>
									</div>
								</div>
							</div>
						</form>

					</div>
				</div><br>
			</div>
		</div>
	</div>

	<script src="/packages/libs/mdb/js/jquery-3.1.1.min.js"></script>
    <script src="/packages/libs/mdb/js/tether.min.js"></script>
    <script src="/packages/libs/mdb/js/bootstrap.min.js"></script>
    <script src="/packages/libs/mdb/js/mdb.min.js"></script>
    <script type="text/javascript" src="/packages/assets/js/config/request/request.js"></script>
    <script type="text/javascript" src="/packages/libs/validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/packages/libs/validation/additional-methods.min.js"></script>
    <script type="text/javascript" src="/packages/libs/validation/localization/messages_es.min.js"></script>
    <script type="text/javascript" src="/packages/assets/js/config/db/database.js"></script>
    <script type="text/javascript" src="/packages/assets/js/config/db/corm.js"></script>
    <script type="text/javascript" src="/packages/assets/js/child/models/child.js"></script>
    <script type="text/javascript" src="/packages/assets/js/child/controllers/childrenCtrl.js"></script>
    <script src="/packages/assets/js/parent/registry_firstchild.js"></script>
    <script type="text/javascript">
		 $(document).ready(function() {
			$('.mdb-select').material_select();
		  });
	</script>
</body>
