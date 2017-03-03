<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="icon" type="image/png" href="/packages/assets/media/images/landing/logo.png">
  <link rel="stylesheet" href="/packages/libs/mdb/css/bootstrap.min.css">
  <link rel="stylesheet" href="/packages/libs/mdb/css/mdb.min.css">
  <link rel="stylesheet" href="/packages/libs/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/packages/assets/css/parent/main.css?{{rand();}}">
	<title>Curiosity | Pago</title>

	<!--Navbar-->
	<nav class="navbar navbar-fixed-top navbar-dark">

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
   <div class="container-fluid main"><br>
      <div class="row" id="p-row-main">
        <div class="col-md-2"></div>
         <div class="col-md-8">
            <form action="#" method="POST" id="payment-form">
                <input type="hidden" name="token_id" id="token_id">
                <div class="pymnt-itm card active">
                    <h2>Tarjeta de crédito o débito</h2>
                    <div class="pymnt-cntnt col-md-12 container">
                        <div class="card-expl col-md-12" style="background-color:rgba(238, 238, 238, 0.63);padding-bottom:6.5rem;">
                            <div class="row">
                                <div class="credit col-md-6"><h6>Tarjetas de crédito</h6></div>
                                <div class="debit col-md-6"><h6>Tarjetas de débito</h6></div>
                            </div>
                        </div>
                            <div class="sctn-row row" style="margin-top: 2.5rem !important;">
                                <div class="sctn-col l col-md-6 ">
                                <label>Nombre del titular</label><input type="text" placeholder="Como aparece en la tarjeta" autocomplete="off" data-openpay-card="name" id="name" name="name">
                                </div>
                                <div class="sctn-col col-md-6">
                                    <label>Número de tarjeta</label><input type="text" autocomplete="off" data-openpay-card="card_number" id="card_number" name="card_number" class="form-control" length="16">
                                </div>
                            </div>
                            <div class="sctn-row row">
                                <div class="sctn-col l col-md-6">
                                    <label>Fecha de expiración</label>
                                    <div class="row">
                                        <div class="sctn-col half l col-md-6"><input type="text" placeholder="Mes" data-openpay-card="exp_month" id="exp_month" name="exp_month"  class="form-control" length="2"></div>
                                        <div class="sctn-col half l col-md-6"><input type="text" placeholder="Año" data-openpay-card="exp_year" id="exp_year" name="exp_year"  class="form-control" length="2"></div>
                                    </div>
                                </div>
                                <div class="sctn-col cvv col-md-4"><label>Código de seguridad</label>
                                    <div class="sctn-col half l"><input type="text" placeholder="3 dígitos" autocomplete="off" data-openpay-card="cvv2" name="cvv" id="cvv"  class="form-control" length="3"></div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="shield col-md-4 pull-letf">Tus pagos se realizan de forma segura</div>
                            </div>
                        </div>
                        <div class="sctn-row container">
									<button type="bitton" class="btn btn-rounded pull-right" id="pay-button">
										Continuar&nbsp;
										<span class="fa fa-chevron-circle-right"></span>
									</button>
									<button type="button" class="btn btn-rounded btn-outline-primary pull-right" id="sctn-code" hidden>
										Canjear
									</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
         </div>
      </div>

    <script src="/packages/libs/mdb/js/jquery-3.1.1.min.js"></script>
    <script src="/packages/libs/mdb/js/tether.min.js"></script>
    <script src="/packages/libs/mdb/js/bootstrap.min.js"></script>
    <script src="/packages/libs/mdb/js/mdb.min.js"></script>
    <script src="/packages/assets/js/Curiosity.js?{{rand();}}"></script>
    <script type="text/javascript" src="/packages/assets/js/config/request/request.js?{{rand();}}"></script>
    <script type="text/javascript" src="/packages/libs/validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/packages/libs/validation/additional-methods.min.js"></script>
    <script type="text/javascript" src="/packages/libs/validation/localization/messages_es.min.js"></script>
    <script type="text/javascript" src="/packages/assets/js/config/db/database.js?{{rand();}}"></script>
    <script type="text/javascript" src="/packages/assets/js/config/db/corm.js?{{rand();}}"></script>
    <script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.5.0/js/conekta.js"></script>
	 <script src="/packages/assets/js/administer/models/SalerCode.js"></script>
    <script src="/packages/assets/js/administer/models/Plan.js?{{rand();}}"></script>
    <script src="/packages/assets/js/parent/models/Parent.js?{{rand();}}"></script>
    <script src="/packages/assets/js/parent/controllers/parentController.js?{{rand();}}"></script>
    <script src="/packages/assets/js/parent/dispatchers/dsp-parent.js?{{rand();}}"></script>
    <script type="text/javascript">
		 $(document).ready(function() {
			$('.mdb-select').material_select();
		  });
	</script>
</body>
