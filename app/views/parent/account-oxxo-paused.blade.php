<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="icon" type="image/png" href="/packages/assets/media/images/landing/logo.png">
  <link rel="stylesheet" href="/packages/libs/mdb/css/bootstrap.min.css">
  <link rel="stylesheet" href="/packages/libs/mdb/css/mdb.min.css">
  <link rel="stylesheet" href="/packages/libs/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/packages/assets/css/parent/main.css?{{rand();}}">
  <title>Curiosity | OXXO</title>

</head>
<body id="rfc-bg">

   <!--Navbar-->
	<nav class="navbar navbar-fixed-top navbar-dark rfc-navbar">
		<div class="container">
			<a class="navbar-brand" href="/" style="cursor:pointer;">
				<img src="/packages/assets/media/images/system/icon.png" class="img-fluid reg-logo" id="reg-imgLogo">
				Curiosity Educación
			</a>
         <a href="/logout" class="hidden-md-down float-xs-right logOut-btn">
            <div class="chip hoverable" id="logOut-btn">
               <img src="/packages/assets/media/images/system/iconLogOut.png" alt="Contact Person">
               Cerrar Sesión
            </div>
         </a>
		</div>
	</nav>
	<!--/.Navbar-->

	<div class="container-fluid">
		<div class="row">
         <div class="col-md-1"></div>
         <div class="col-md-10">
            <div class="opp-container z-depth-1">
               <div style="margin-top: 1rem;
                           margin-left: 2rem;">
                  <h6 style="font-weight:600;">Curiosity Educación</h6>
                  <h6>www.curiosity.com.mx</h6>
                  <h6>Fecha: {{ $dateNow = date("d-m-Y H:i:s"); }}</h6>
               </div>

               <img src="/packages/assets/media/images/system/logoDef.png" style="width: 10%;
                                                                                  float: right;
                                                                                  margin-top: -6rem;
                                                                                  margin-right: 2rem;">
               <p style="margin-top: 2rem;
                         background: #f3f3f3;
                         padding: 1rem;
                         border-radius: .23rem;
                         border: solid .1rem #d8d8d8;
                         margin-bottom:2rem;">
                  Hemos detectado que te encuentras suscrito a la familia Curiosity, pero aun no has completado tu pago. <br>
                  Has seleccionado el método de pago mediante OXXO Pay, por lo tanto te invitamos a completar tu suscripción acudiendo a tu OXXO más cercano, y presentar el número de referencia mostrado a continuación. <br><br>
                  <b>Nota:</b> Una vez que completes tu pago, disfrutaras de la gran aventra Curiosity.
                  <br>
                  <b>Nota:</b> Si ya has completado tu pago y sigues viendo esta información, porfavor comunicate con nosotros.
               </p>
               <label style="float: right;
                             margin-left: -14rem;
                             margin-top: 4rem;
                             margin-right: 1rem;">
                  Tus pagos se realizan <br>de manera segura
               </label>
               <img src="/packages/assets/media/images/parents/payment_cards/security.png" style="float:right;margin-right:10rem;margin-top:4rem;">
               <img src="/packages/assets/media/images/system/oxxo-pay.png" style="width:40%;float:right;margin-top:1rem;margin-right:8rem;">
               <h6 style="font-size: .8rem;font-weight: 600;">MONTO A PAGAR</h6>
               <h6 style="background: #f3f3f3;
                          padding: .7rem;
                          width: 15rem;
                          text-align: center;
                          border-radius: .23rem;
                          border: solid .1rem #d8d8d8;">
               $00.00 MXN</h6>
               <h6 style="font-size: .8rem;font-weight: 600;">REFERENCIA</h6>
               <h6 style="background: #f3f3f3;
                          padding: .7rem;
                          width: 15rem;
                          text-align: center;
                          border-radius: .23rem;
                          border: solid .1rem #d8d8d8;">
               0000-0000-0000-00</h6>
            </div>
         </div>
         <div class="col-md-1"></div>
		</div>
	</div>

	<script src="/packages/libs/mdb/js/jquery-3.1.1.min.js"></script>
   <script src="/packages/libs/mdb/js/tether.min.js"></script>
   <script src="/packages/libs/mdb/js/bootstrap.min.js"></script>
   <script src="/packages/libs/mdb/js/mdb.min.js"></script>
</body>
