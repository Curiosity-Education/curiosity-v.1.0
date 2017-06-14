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
                        <img class="img-fluid" src="/packages/assets/media/images/institutions/{{$casaHogar->logo}}" alt="{{$casaHogar->nombre}}">
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

        <div class="row" id="paybox" style="margin-bottom:1rem;">
            <div class="col-md-12">
                <div id="boxPaymentChild" class="z-depth-1">
                    <div id="boxtobtnback">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="chip animated bounce" id="homes-backfrompay">
                                   <img src="/packages/assets/media/images/system/iconBack.png">
                                   Regresar
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div id="boxtitlepay">
                                    <!-- <label>Tarjeta de crédito o débito</label> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <center><img id="img-modalChild" class="img-fluid z-depth-1"></center>
                                <hr>
                            </div>
                            <p class="text-xs-center text-sm-left text-md-center">¿Quiéres apadrinar a <span class="font-weight-bold" id="nameChild"></span>?</p>
                            <h4 style="font-size: 1rem;text-align: center;margin-bottom: 1rem;font-weight: bold; line-height: 1.7rem;">Costo: $348.00 MXN <br> Por un año</h4>
                            <p class="text-xs-center text-sm-left text-md-center"><i class="fa fa-info-circle blue-text-ce"></i>&nbsp; Solo llena los datos y listo.</p>
                            <div id="secureIcon">
                                <img src="/packages/assets/media/images/parents/payment_cards/security.png">
                                <label>Tus pagos se realizan <br> de forma segura</label>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div id="paymentlogoshomes">
                                <div class="row">
                                    <div class="col-md-3" style="border-right: solid .1rem #bbbbbb;">
                                        <h6 class="labelTypePat">Tarjetas de débito</h6>
                                        <img src="/packages/assets/media/images/parents/payment_cards/cards1.png" class="img-fluid typePayImg">
                                    </div>
                                    <div class="col-md-9">
                                        <h6 class="labelTypePat">Tarjetas de crédito</h6>
                                        <img src="/packages/assets/media/images/parents/payment_cards/cards2.png" class="img-fluid typePayImg">
                                    </div>
                                </div>
                            </div>
                            <form id="formToPay">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                          <label class="labelDataPay">Nombre Completo</label>
                                          <input type="text" class="form-control" id="name" name="name" placeholder="Nombre y apellidos">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                          <label class="labelDataPay">Correo Electrónico</label>
                                          <input type="email" class="form-control" id="email" name="email" placeholder="alguien@dominio.com">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                          <label class="labelDataPay">Número de tarjeta</label>
                                          <input type="text" class="form-control" id="card_number" name="card_number" placeholder="4242424242424242" maxlength="16">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                          <label class="labelDataPay">Mes de expiración</label>
                                          <input type="text" class="form-control" id="exp_month" name="exp_month" placeholder="01" maxlength="2">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                          <label class="labelDataPay">Año de expiración</label>
                                          <input type="text" class="form-control" id="exp_year" name="exp_year" placeholder="30" maxlength="2">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                              <label class="labelDataPay">Código de seguridad (CVV)</label>
                                              <input type="text" class="form-control" id="cvv" name="cvv" placeholder="123" maxlength="3">
                                            </div>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7"></div>
                                        <div class="col-xs-12 col-md-5">
                                            <button type="button" class="btn btn-primaryCur btn-lg btn-block borderRounded" id="btnConfirm">
                                                Confirmar Información
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>


    <script src="/packages/libs/mdb/js/jquery-3.1.1.min.js"></script>
    <script src="/packages/libs/mdb/js/tether.min.js"></script>
    <script src="/packages/libs/validation/jquery.validate.min.js?{{rand();}}" charset="utf-8"></script>
    <script src="/packages/libs/validation/localization/messages_es.min.js?{{rand();}}" charset="utf-8"></script>
    <script src="/packages/libs/mdb/js/bootstrap.min.js"></script>
    <script src="/packages/libs/mdb/js/mdb.min.js"></script>
	<script src="/packages/libs/sweetalert2/sweetalert2.min.js"></script>
	<script src="/packages/assets/js/Curiosity.js?{{rand();}}"></script>
	<script src="/packages/assets/js/config/db/dist/corm-dist.js?{{rand();}}"></script>
    <script src="/packages/assets/js/config/db/dist/database-dist.js?{{rand();}}"></script>
    <script src="/packages/assets/js/config/request/dist/request-dist.js?{{rand();}}"></script>
    <script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.5.0/js/conekta.js"></script>
    <script src="/packages/assets/js/config/db/StorageDB.js?{{rand();}}"></script>
    <script type="text/javascript" src="/packages/assets/js/landing/app-index.js"></script>
    <script src="/packages/assets/js/landing/models/dist/apadrinar-dist.js?{{rand();}}" charset="utf-8"></script>
   	<script src="/packages/assets/js/landing/controllers/ctrl-apadrinar.js?{{rand();}}" charset="utf-8"></script>
   	<script src="/packages/assets/js/landing/dispatchers/dsp-apadrinar.js?{{rand();}}" charset="utf-8"></script>
</body>
</html>
