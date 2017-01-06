<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="icon" type="image/png" href="/packages/assets/media/images/landing/logo.png">
	<title>Aviso de privacidad</title>
	<link rel="stylesheet" href="/packages/libs/mdb/css/bootstrap.min.css">
    <link rel="stylesheet" href="/packages/libs/mdb/css/mdb.min.css">
    <link rel="stylesheet" href="/packages/libs/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/packages/assets/css/landing/notice_privacy.css">
</head>
<body>

		<main>
			<div class="main-wrapper">

				<!--Navbar-->
				<nav class="navbar navbar-dark bg-nav">

					<!-- Collapse button-->
					<!--<a href="#" data-activates="slide-out" class="button-collapse" id="desplege"><i class="fa fa-bars"></i></a>-->
					<a id="inicio" class="nav-link pull-right waves-effect" href="/"><i class="fa fa-home"></i> INICIO <span class="sr-only">(current)</span></a>					<div class="">

						<!--Collapse content-->
						<div class="collapse navbar-toggleable-xs" id="collapseEx2">
							<!--Navbar Brand-->

							<!--Links-->
							<ul class="nav navbar-nav pull-right">
								<li class="nav-item active">
									<!--<a class="nav-link" href="#">INICIO <span class="sr-only">(current)</span></a>-->
								</li>
							</ul>
							<!--Search form-->

						</div>
						<!--/.Collapse content-->

					</div>

				</nav>
				<!--/.Navbar-->

					<!-- Encabezado -->
					<div class="col-md-12 view hm-black-strong z-depth-1" id="titulo">
						<div class="mask flex-center">
							<center class="">
								<h1 class="white-text h1-responsive titulo-apartado">Aviso de privacidad</h1>
								<h6 class="white-text h6-responsive">Ultima revisión 25-Julio-2016</h6>
							</center>
						</div>
					</div>
					<!-- Fin Encabezado -->

					<!-- Contenido -->
					<div class="col-md-10 col-sm-10 col-xs-12 jumbotron offset-md-1 offset-sm-1 animated bounceInRight secciones" id="descripcion" >
						<p style="font-size:1.1em;"><b style="font-size:2em; color:#f68e55;">E</b>n <b>Curiosity Educación</b> estamos convencidos que el
						 principal activo son nuestros clientes, es por ello que aplicamos lineamientos, políticas, procedimientos y programas de privacidad
						 para proteger su información. <br><br>

						 Como cliente de Curiosity, usted tiene la oportunidad de escoger entre una amplia gama de servicios, sabiendo que sus datos personales
						 estarán protegidos. La seguridad de su información es nuestra prioridad, es por ello que la protegemos mediante el uso, aplicación y
						 mantenimiento de altas medidas de seguridad técnicas, físicas y administrativas.
						 </p>

						<p style="font-size:1.1em;"><b style="font-size:1.1em; color:#f68e55;">Finalidades del tratamiento de sus datos personales:</b><br>

						 Los datos personales que Curiosity recaben, serán utilizados para atender las siguientes finalidades:</p>
						 <p class="tab"><b>El conocimiento de nuestros clientes</b> dentro la plataforma, y comunicación con el mismo así como el informe de servicios adquiridos para sus respectivos hijos.</p>
						 <p class="tab"><b>Ayuda para una mejor experiencia</b> en nuestra plataforma cada dato que usted nos brinda nos ayuda a saber quien esta con nosotros. Relacionar padres e hijos y poder
						 darle un servicio más personalizado. El perfil curiosity es una sección de nuestra plataforma donde se mostrará mucha de la información que usted nos brinda y en algunas otras secciones
						 se muestra información que se obtiene dependiendo de ciertos datos obtenidos (gustos, populares etc).</p>
						 <p class="tab"><b>Las contraseñas de las cuentas</b> que usted posee (ej. cuenta padre y cuentas hijo) cuentan con un hash de encriptación de esa manera obtener las contraseñas del
						 servidor no basta para acceder a su cuenta.</p>
						 <p class="tab"><b>La información de su tarjeta de pago </b> se destruye al instante al momento de su uso. No guardamos datos de la tarjeta en nuestra base de datos nos referenciamos
						 a ella a través de un token generado dinámicamente(Este jamás es igual en los distintos usos). </p><br>

						<p style="font-size:1.1em;"><b style="font-size:1.1em; color:#f68e55;">Finalidades no indispensables:</b><br>

						 Los datos personales que Curiosity recaben, serán utilizados para atender las siguientes finalidades:</p>

						 <p class="tab"><b>(I)</b> Mercadotecnia, publicidad y prospección comercial. </p>
						 <p class="tab"><b>(II)</b> Ofrecerle, en su caso, otros servicios propios o de cualquiera de sus afiliadas, subsidiarias, sociedades controladoras, asociadas, comisionistas o sociedades
						 integrantes de Curiosity. </p>
						 <p class="tab"><b>(III)</b> Remitirle promociones de otros bienes o servicios relacionados con los citados productos. </p>
						 <p class="tab"><b>(IV)</b> Hacer de su conocimiento o invitarle a participar en nuestras actividades no lucrativas de compromiso social que tengan como objetivo promover el desarrollo de
						 las personas, a través de proyectos educativos, sociales, ecológicos y culturales. </p>
						 <p class="tab"><b>(V)</b> Realizar análisis estadístico, de generación de modelos de información y/o perfiles de comportamiento actual y predictivo. Participar en encuestas, sorteos y promociones. </p>
					</div>
					<!-- Fin de Contenido -->


			</div>
		</main>

	<script src="/packages/libs/mdb/js/jquery-3.1.1.min.js"></script>
    <script src="/packages/libs/mdb/js/mdb.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
    		$(".button-collapse").sideNav();
			if($("div#descripcion")){
				$($(this)).show();
			}else{
				$(".secciones").hide();
			}

			$(".item").click(function(event){
				event.preventDefault();
				$(".secciones").hide();
				$($(this).attr("href")).show();
			});

  		});
	</script>
</body>
</html>
