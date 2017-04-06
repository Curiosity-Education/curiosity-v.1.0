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
    <script src="//code.tidio.co/fkqcqcm9kdpxi40osnnqerxr0wn9gpy2.js"></script>
</head>
<body>
    <div class="col-md-12 view hm-black-strong" id="casasHogares">
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
	    <div class="col-md-10 offset-md-1 animated " id="text-info">
			<div class="introduccion">
				<p class="text-xs-center">
				    Te presentamos las casas hogares con las cuales hemos hecho alianza para brindar a sus niños la oportunidad de disfrutar de la plataforma y colaborar con parte de su desarrollo.
				</p>
				<hr class="hr-apartado">
			</div>
		</div>
		<!-- Container of the houses-homes -->
		<div class="col-md-12 col-sm-12 animated margin " id="content-homes">

		    @foreach($casasHogares as $casaHogar)

                <div class="col-md-4 col-sm-6">
                    <!--Card-->
                    <div class="card">

                        <!--Card image-->
                        <img class="img-fluid" src="/packages/assets/media/images/instituciones/{{$casaHogar->logo}}" alt="{{$casaHogar->nombre}}">
                        <!--/.Card image-->

                        <!--Card content-->
                        <div class="card-block">

                            <!--Title-->
                            <h4 class="card-title text-xs-center">{{$casaHogar->nombre}}</h4>

                            <center><a href="#" class="btn btn-rounded btn-homes" data-inst="{{$casaHogar->id}}" data-name="{{$casaHogar->nombre}}">ver a sus niños</a></center>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>

		    @endforeach

		</div>

		<!-- Container of children -->
		<div class="col-md-12 col-sm-12 animated fadeInRightBig displaynone" id="content-children" style="margin-bottom:1rem;">
           <div class="row">
               <a class="z-depth-2 btn-floating btn-small blue pull-right" id="close"><i class="fa fa-times"></i></a>
           </div>
            <h3 class="text-xs-center" id="nameHome"></h3>
            <hr class="hr-apartado">
            <br>
            <div id="displayChildren"></div>
		</div>

        <div class="row">
            <div class="col-md-12">
                <div id="boxPaymentChild">
                    <div class="col-md-3">
                        <center><img id="img-modalChild" src="" class="rounded-circle img-fluid" style="width:70%;"></center>
                        <hr>
                        <p class="text-xs-center">¿Quiéres apadrinar a <span class="font-weight-bold" id="nameChild"></span>?</p>
                        <p class="text-xs-center"><i class="fa fa-info-circle blue-text-ce"></i>&nbsp; Solo llena los datos y listo.</p>
                    </div>
                </div>
            </div>
        </div>

		<!-- Modal for apadrinar -->
		<div class="modal fade modal-ext" id="modal-apadrinar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!--Content-->
                <div class="modal-content borderRounded">
                    <!--Header-->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 id="title-header"> Apadrinamiento</h3>
                    </div>
                    <!--Body-->
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="col-md-12">
                                <div class="row fadeIn animated" id="row-login">
                                    <div class="col-md-5">
                                        <center>
                                            <img id="img-modalChild" src="" class="rounded-circle img-fluid" style="width:70%;">
                                        </center>
                                        <hr>
                                        <p class="text-xs-center"><span class="font-weight-bold" id="nameChild"></span></p>
                                        <p class="text-xs-center"><i class="fa fa-info-circle blue-text-ce"></i>&nbsp; Solo llena los datos y listo.</p>
                                    </div>
                                    <form id="formLogin">
                                        <div class="col-md-7" id="form-content">
                                            <div class="row">
                                                <div class="form-group">
                                                  <label for="">Correo Electrónico</label>
                                                  <input type="text" class="form-control" id="">
                                                </div>
                                                <div class="form-group">
                                                  <label for="">Nombre Completo</label>
                                                  <input type="text" class="form-control" id="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label for="">Número de tarjeta</label>
                                                  <input type="text" class="form-control" id="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                  <label for="">Mes de expiración</label>
                                                  <input type="text" class="form-control" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                  <label for="">Año de expiración</label>
                                                  <input type="text" class="form-control" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                  <label for="">Código de seguridad</label>
                                                  <input type="text" class="form-control" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="text-xs-center">
                                                    <button class="btn btn-primaryCur btn-lg btn-block borderRounded" id="btnConfirm">Aceptar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div> <!-- /.col-md-12 -->
                        </div>
                    </div> <!-- /.modal-body -->
                </div>
                <!--/.Content-->
            </div>
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
