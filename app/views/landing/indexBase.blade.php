<!DOCTYPE html5>
<html lang="es">
<head name="theme-color">
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="/packages/assets/media/images/landing/logo.png">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="keywords" content="Curiosity, Educación, juegos, juegos educativos , juegos de primaria , tarea, escuela, videos para niños, videos animados">
	<meta name="description" content="A través de juegos educativos y videos animados Curiosity Educación te ayuda en tus tareas de primaria">
	<meta name="theme-color" content="#2262ae" >
	<link rel="stylesheet" href="/packages/libs/mdb/css/bootstrap.min.css">
	<link rel="stylesheet" href="/packages/libs/mdb/css/mdb.min.css">
	<link rel="stylesheet" href="/packages/libs/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/packages/assets/css/landing/style-index.min.css?{{rand();}}">
 	@yield('css')

	<title>@yield('title')</title>
</head>
<body>
<!--Navbar-->
<nav class="navbar navbar-dark navbar_inicio navbar-fixed-top">
	<!-- Collapse button-->
	<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
		<i class="fa fa-bars"></i>
	</button>
	<div class="container-fluid">
		<!--Collapse content-->
		<div class="collapse navbar-toggleable-xs" id="collapseEx2">
			<!--Navbar Brand-->
			<div hidden="hidden">
				<a class="btn success-rounded-outline waves-effect pull-right">Iniciar sesión</a>
				<a class="btn warning-rounded-outline waves-effect pull-right">Registrarme</a>
			</div><br>
			<a href="/" class="navbar-brand pull-left  chicle font-curiosity">
				<span><img src="/packages/assets/media/images/landing/logo.png?{{rand();}}" alt="logo-curiosity" class="logo-current"></span>
				Curiosity Educación
			</a>
			<!--Links-->
			<ul class="nav navbar-nav pull-right">
				@yield('menu')
			</ul>
		</div>
		<!--/.Collapse content-->
	</div>
</nav>
<!--/.Navbar-->

@yield('contenido')

@yield('footer')

<!-- Preloader web -->
	<div id="cssload-pgloading" hidden="hidden">
		<div class="cssload-loadingwrap">
			<ul class="cssload-bokeh">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
			<h4 class="textPreloader">Espera un momento...</h4>
		</div>
	</div>
<!-- Fin de preloader -->

	<script src="/packages/libs/mdb/js/jquery-3.1.1.min.js"></script>
	<script src="/packages/libs/mdb/js/tether.min.js"></script>
	<script src="/packages/libs/mdb/js/bootstrap.min.js"></script>
	<script src="/packages/libs/mdb/js/mdb.min.js"></script>
	<script type="text/javascript" src="/packages/assets/js/landing/app-index.js?{{rand();}}"></script>
	<script type="text/javascript" src="/packages/assets/js/landing/controllers/loginController.js?{{rand();}}"></script>
	<script type="text/javascript" src="/packages/assets/js/landing/dispatchers/login.js?{{rand();}}"></script>
	<!-- Script Google Analitycs -->
	<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-79267407-1', 'auto');
      ga('send', 'pageview');

    </script>
	<!-- End  Google Analitycs -->
  @yield('js')
</body>
</html>
