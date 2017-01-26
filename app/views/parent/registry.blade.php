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
	<title>Registro Cuenta Papá</title>

	<!--Navbar-->
	<nav class="navbar navbar-fixed-top navbar-dark bg-primary reg-navbar">

		<!-- Collapse button-->
		<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
			<i class="fa fa-bars"></i>
		</button>

		<div class="container">

			<!--Collapse content-->
			<div class="collapse navbar-toggleable-xs" id="collapseEx2">
				<!--Navbar Brand-->
				<a class="navbar-brand" id="reg-navlogo">
					<img src="/packages/assets/media/images/system/icon.png" class="img-fluid reg-logo" id="reg-imgLogo">
					Curiosity Educación
				</a>
				<!--Links-->
				<ul class="nav navbar-nav pull-right">
					<li class="nav-item reg-nav-item">
						<a class="nav-link" href="/"><i class="fa fa-home reg-icon"></i> Inicio <span class="sr-only">(current)</span></a>
					</li>
				</ul>
			</div>
			<!--/.Collapse content-->

		</div>

	</nav>
	<!--/.Navbar-->
</head>
<body id="reg-bg">

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-md-3">
				    <!--Card-->
					<div class="card card-cascade narrower reg-rounded animated fadeInLeft">

						<!--Card image-->
						<div class="view overlay hm-white-slight reg-rounded">
							<img src="http://mdbootstrap.com/images/regular/city/img%20(11).jpg" class="img-fluid" alt="">
							<a>
								<div class="mask"></div>
							</a>
						</div>
						<!--/.Card image-->

						<!--Card content-->
						<div class="card-block">
							<h5 class="blue-text">Curiosity Educación</h5>
							<!--Title-->
							<h4 class="card-title">Hola !</h4>
							<!--Text-->
							<p class="card-text">Te invitamos a registrarte y formar parte de curiosity, disfruta de esta gran plataforma. Porque aprender también es divertido.</p>
							<hr>
							<center>
								<div class="options">
									<a href="/" class="btn reg-rounded reg-btnSesion">Iniciar Sesión</a>
									<p>¿Ya tienes cuenta?<br>¡ Inicia sesión ahora !</p>
								</div>
							</center>
						</div>
						<!--/.Card content-->

					</div>
					<!--/.Card-->
			</div>
			<div class="col-sm-8 col-md-9" id="reg-registry">

				<!--Form with header-->
				<div class="card reg-rounded">
					<div class="card-block">

						<!--Header-->
						<div class="form-header reg-rounded reg-colorHeader">
							<h3><i class="fa fa-user reg-icon"></i> Registro</h3>
						</div>

						<!--Body-->
						<form action="" class="form-inline text-xs-center" id="parent-form">
							<div class="container-fluid">
								<div class="row">
									<!-- <div class="col-md-12 col-sm-12 col-xs-12"> -->
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="md-form form-group">
												<i class="fa fa-envelope prefix reg-icon-bl"></i>
												<input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico" class="form-control validate">
											</div>
											<div class="md-form form-group">
												<i class="fa fa-unlock-alt prefix reg-icon-bl"></i>
												<input type="password" id="password" name="password" class="form-control" length="20" placeholder="Ingresa tu contraseña">
											</div>
											<div class="md-form form-group">
												<i class="fa fa-user prefix reg-icon-bl"></i>
												<input type="text" id="nombre" name="nombre" placeholder="¿Cuál es tu nombre?" class="form-control">
											</div>
											<div class="md-form form-group" id="reg-gender">
												<select class="mdb-select" id="sexo" name="sexo">
													<option value="" disabled selected>Genero</option>
													<option value="m" data-icon="/packages/assets/media/images/parents/profile/dad-def.png" class="rounded-circle">Masculino</option>
													<option value="f" data-icon="/packages/assets/media/images/parents/profile/mom-def.png" class="rounded-circle">Femenino</option>
												</select>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="md-form form-group">
												<i class="fa fa-user prefix reg-icon-bl"></i>
												<input type="text" id="username" name="username" placeholder="Username" class="form-control validate" length="20">
											</div>
											<div class="md-form form-group">
												<i class="fa fa-unlock-alt prefix reg-icon-bl"></i>
												<input type="password" id="cpassword" name="cpassword" class="form-control" length="20" placeholder="Confirmar contraseña">
											</div>
											<div class="md-form form-group">
												<i class="fa fa-user prefix reg-icon-bl"></i>
												<input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="¿Cuáles son tus apellidos?">
											</div>
											<div class="md-form form-group">
												<i class="fa fa-phone prefix reg-icon-bl"></i>
												<input type="text" id="telefono" name="telefono" placeholder="Ingresa tu teléfono" class="form-control" length="10">
											</div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12 text-xs-center">
											<hr>
											<div class="row">
												<div class="col-md-6">
													<fieldset class="form-group" id="reg-field">
														<input type="checkbox" id="accept_conditions" name="accept_conditions">
														<label for="accept_conditions">Acepto los <a href="/terminos">Términos y Condiciones</a></label>
													</fieldset>
												</div>
												<div>
													<button class="btn reg-btnRegister reg-rounded" id="parent-save">Registrarme</button>
												</div>
											</div>
										</div>
									<!-- </div> -->
								</div>
							</div>
						</form>

					</div>
				</div>
				<!--/Form with header-->

			</div>
		</div>
	</div>

	<script src="/packages/libs/mdb/js/jquery-3.1.1.min.js"></script>
	<script src="/packages/assets/js/Curiosity.js"></script>
    <script src="/packages/libs/mdb/js/tether.min.js"></script>
    <script src="/packages/libs/mdb/js/bootstrap.min.js"></script>
    <script src="/packages/libs/mdb/js/mdb.min.js"></script>
    <script src="/packages/libs/validation/jquery.validate.min.js"></script>
    <script src="/packages/libs/validation/localization/messages_es.min.js"></script>
    <script src="/packages/assets/js/config/db/corm.js"></script>
    <script src="/packages/assets/js/config/db/database.js"></script>
    <script src="/packages/assets/js/config/request/request.js"></script>
    <script src="/packages/assets/js/parent/models/Parent.js"></script>
    <script src="/packages/assets/js/parent/controllers/parentController.js"></script>
    <script src="/packages/assets/js/parent/dispatchers/dsp-parent.js"></script>
    <script type="text/javascript">
		 $(document).ready(function() {
			$('.mdb-select').material_select();
		  });
	</script>
</body>
</html>
