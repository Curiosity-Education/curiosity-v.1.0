<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="/packages/assets/media/images/landing/logo.png">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="/packages/libs/mdb/css/bootstrap.min.css">
    <link rel="stylesheet" href="/packages/libs/mdb/css/mdb.min.css">
    <link rel="stylesheet" href="/packages/libs/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/packages/assets/css/landing/style-index.min.css">
    <title>Casas Hogares</title>
</head>
<body>
    <div class="col-md-12 view hm-black-strong" id="equipo">
		<div class="mask flex-center" id="content-titulo">
        	<ul class="animated rubberBand">
  				<li class="container-fluid">
  					<h1 class="h1-responsive font-curiosity titulo-apartado white-text">Casas Hogares</h1>
  				</li>
  				<li class="container-fluid">
  					<a href="/" class="btn btn-secondary btn-rounded">Regresar al Inicio</a>
  				</li>
  			</ul>
    	</div>
	</div>
	<div class="container">
	    <div class="col-md-10 offset-md-1">
			<div class="introduccion">
				<p class="text-xs-center">Somos un equipo joven y multidisciplinario. Creemos que una educación de primer nivel debe ser accesible para todos.
				En <i>Curiosity Educación</i> buscamos brindar equidad educativa de una manera divertida.
				</p>
				<hr class="hr-apartado">
			</div>
		</div>
	</div>


    <script src="/packages/libs/mdb/js/jquery-3.1.1.min.js"></script>
    <script src="/packages/libs/mdb/js/tether.min.js"></script>
    <script src="/packages/libs/mdb/js/bootstrap.min.js"></script>
    <script src="/packages/libs/mdb/js/mdb.min.js"></script>
	<script type="text/javascript" src="/packages/assets/js/landing/app-index.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(function () {
				$("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
			});

			$(".tooltipShow").tooltipster({
				position : 'bottom',
				touchDevices: true
			  });
		});

		new WOW().init();
	</script>
</body>
</html>
