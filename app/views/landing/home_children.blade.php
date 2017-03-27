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
    <link rel="stylesheet" href="/packages/libs/sweetalert2/sweetalert2.min.css">
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
	    <div class="col-md-10 offset-md-1 animated">
			<div class="introduccion">
				<p class="text-xs-center">
				    Te presentamos las casas hogares con las cuales hemos hecho alianza para brindar a sus niños la oportunidad de disfrutar de la plataforma y colaborar con parte de su desarrollo.
				</p>
				<hr class="hr-apartado">
			</div>
		</div>
		<!-- Container of the houses-homes -->
		<div class="col-md-12 col-sm-12 animated margin" id="content-homes">

		    @foreach($casasHogares as $casaHogar)

                <div class="col-md-4">
                    <!--Card-->
                    <div class="card">

                        <!--Card image-->
                        <img class="img-fluid" src="/packages/assets/media/images/instituciones/{{$casaHogar->logo}}" alt="{{$casaHogar->nombre}}">
                        <!--/.Card image-->

                        <!--Card content-->
                        <div class="card-block">

                            <!--Title-->
                            <h4 class="card-title text-xs-center">{{$casaHogar->nombre}}</h4>

                            <center><a href="#" class="btn btn-rounded btn-homes" data-inst="{{$casaHogar->id}}">ver a sus niños</a></center>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>

		    @endforeach

		</div>

		<!-- Container of children -->
		<div class="col-md-12 col-sm-12 animated fadeInRightBig margin displaynone" id="content-children">
                <h1>sjgkhslhgjsh</h1>
		</div>
	</div>


    <script src="/packages/libs/mdb/js/jquery-3.1.1.min.js"></script>
    <script src="/packages/libs/mdb/js/tether.min.js"></script>
    <script src="/packages/libs/mdb/js/bootstrap.min.js"></script>
    <script src="/packages/libs/mdb/js/mdb.min.js"></script>
	<script type="text/javascript" src="/packages/assets/js/landing/app-index.js"></script>

	<script src="/packages/libs/sweetalert2/sweetalert2.min.js"></script>
	<script src="/packages/assets/js/Curiosity.js?{{rand();}}"></script>
	<script src="/packages/assets/js/config/db/corm.js?{{rand();}}"></script>
    <script src="/packages/assets/js/config/db/database.js?{{rand();}}"></script>
    <script src="/packages/assets/js/config/request/request.js?{{rand();}}"></script>
    <script src="/packages/assets/js/config/db/StorageDB.js?{{rand();}}"></script>

    <script src="/packages/assets/js/landing/models/apadrinar.js?{{rand();}}" charset="utf-8"></script>
   	<script src="/packages/assets/js/landing/controllers/ctrl-apadrinar.js?{{rand();}}" charset="utf-8"></script>
   	<script src="/packages/assets/js/landing/dispatchers/dsp-apadrinar.js?{{rand();}}" charset="utf-8"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$(function () {
				$("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
			});
		});

		new WOW().init();
	</script>
</body>
</html>
