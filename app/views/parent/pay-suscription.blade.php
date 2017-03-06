<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="icon" type="image/png" href="/packages/assets/media/images/landing/logo.png">
  <link rel="stylesheet" href="/packages/libs/mdb/css/bootstrap.min.css">
  <link rel="stylesheet" href="/packages/libs/mdb/css/mdb.min.css">
  <link rel="stylesheet" href="/packages/libs/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/packages/assets/css/parent/sass/styles.css">
  <link rel="stylesheet" href="/packages/assets/css/parent/main.css?{{rand();}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
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
      <div class="row hidden row-content" id="p-row-main">
        <div class="col-md-2"></div>
         <div class="col-md-8">
            <form action="#" method="POST" id="payment-form">
                <input type="hidden" name="token_id" id="token_id">
                <div class="pymnt-itm card active">
                    <h2>Tarjeta de crédito o débito <span class="pull-right hoverable return-method" title="regresar a metodo de pago"><a><i class="fa fa-arrow-left"></i></a></span></h2>
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
							<button type="button" class="btn btn-rounded pull-right" id="pay-button">
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
        <div class="row row-content" id="p-row-method-pay">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="pymnt-itm card active">
                    <h2>Selecciona un metodo de pago</h2>
                    <div class="pymnt-cntnt col-md-12 container">
                     <!--Second column-->
                     <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <!--Card-->
                                    <div class="card unique-color hoverable" id="option-credit-card">

                                        <!--Content-->
                                        <div class="text-center white-text">
                                            <div class="card-block">
                                                <h5>Tarjeta de debito</h5>
                                                <div class="flex-center">
                                                    <img src="/packages/assets/media/images/system/credit-card.png?v={{rand()}}">
                                                </div>
                                                <!--Price-->
                                                <p style="text-align:center;">Paga a través de tu tarjeta de debito.</p>
                                                <a class="btn btn-outline-white btn-rounded btn-method-pay">Seleccionar</a>
                                            </div>
                                        </div>

                                    </div>
                                    <!--/.Card-->
                                </div>
                                <!--/Second column-->
                                  <div class="col-lg-6 col-md-12">
                                    <!--Card-->
                                    <div class="card hoverable" id="option-pay-oxxo" {{-- style="background-color: #38547f;" --}}>

                                        <!--Content-->
                                        <div class="text-center white-text">
                                            <div class="card-block">
                                                <h5>Oxxo Pay</h5>
                                                <div class="flex-center">
                                                    <img src="/packages/assets/media/images/system/oxxo-pay.png?v={{rand()}}">
                                                </div>

                                                <!--Price-->
                                                <p style="color:black;text-align:justify;">Ahora puedes realizar tus pagos desde oxxo. <a href="https://iiemd.com/que-es-oxxo-pay/" style="display">Para más información. </a> </p>
                                                <a class="btn btn-outline-info btn-rounded btn-method-pay method-oxxo-pay">Seleccionar</a>
                                            </div>
                                        </div>

                                    </div>
                                    <!--/.Card-->
                                </div>
                                <!--/Second column-->
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                     </div>

                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row hidden row-content" id="p-row-oxxo-pay">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="pymnt-itm card active">
                    <h2>FICHA DIGITAL NO ES NECESARIO IMPIMIR<span class="pull-right hoverable return-method" title="regresar a metodo de pago"><a><i class="fa fa-arrow-left"></i></a></span></h2>
                    <div class="pymnt-cntnt col-md-12 container">
                         <div class="row">
                            <div class="col-md-6">
                                <div class="opps">
                                    <div class="opps-info row">
                                        <div class="col-md-12" style="margin-top:.3rem;margin-bottom:.2rem;">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h1 style="background-color:transparent!important;color:black!important;border:none!important;">Monto a pagar</h1>
                                                </div>
                                                <div class="col-md-12">
                                                    <h1>$ 0,000.00 <sup>MXN</sup></h1>
                                                    <p>OXXO cobrará una comisión adicional al momento de realizar el pago.</p>
                                                </div>
                                                <div class="opps-reference">
                                                    <h3>Referencia</h3>
                                                    <h1>0000-0000-0000-00</h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <img src="/packages/assets/media/images/system/oxxo-pay.png?v={{rand()}}" alt="OXXOPay">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="opps opps-right">
                                    <h3>Instrucciones</h3>
                                    <ol>
                                        <li>Acude a la tienda OXXO más cercana. <a href="https://www.google.com.mx/maps/search/oxxo/" target="_blank">Encuéntrala aquí</a></li>
                                        <li>Indica en caja que quieres ralizar un pago de <strong>OXXOPay</strong>.</li>
                                        <li>Dicta al cajero el número de referencia en esta ficha para que tecleé directamete en la pantalla de venta.</li>
                                        <li>Realiza el pago correspondiente con dinero en efectivo.</li>
                                        <li>Al confirmar tu pago, el cajero te entregará un comprobante impreso. <strong>En el podrás verificar que se haya realizado correctamente.</strong> Conserva este comprobante de pago.</li>
                                    </ol>
                                    <div class="opps-footnote">Al completar estos pasos recibirás un correo de <strong>Nombre del negocio</strong> confirmando tu pago.</div>
                                </div>
                            </div>
                         </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="shield col-md-4 pull-letf">Tus pagos se realizan de forma segura</div>
                    </div>
                </div>
            </div>
        </div>
            <!--<div class="col-md-8">
                <div class="pymnt-cntnt col-md-12 container">

                    <div class="opps row">
                        <div class="opps-header opps-content" style="background-color:rgba(238, 238, 238, 0.63)">
                            <div class="opps-reminder" style="background-color:#2262ae">Ficha digital. No es necesario imprimir.</div>
                            <div class="opps-info">
                                <div class="opps-brand"><img src="/packages/assets/media/images/system/oxxopay_brand.png" alt="OXXOPay"></div>
                                <div class="opps-ammount">
                                    <h3>Monto a pagar</h3>
                                    <h2>$ 0,000.00 <sup>MXN</sup></h2>
                                    <p>OXXO cobrará una comisión adicional al momento de realizar el pago.</p>
                                </div>
                            </div>
                            <div class="opps-reference">
                                <h3>Referencia</h3>
                                <h1>0000-0000-0000-00</h1>
                            </div>
                        </div>
                        <div class="opps-instructions opps-content">
                            <h3>Instrucciones</h3>
                            <ol>
                                <li>Acude a la tienda OXXO más cercana. <a href="https://www.google.com.mx/maps/search/oxxo/" target="_blank">Encuéntrala aquí</a>.</li>
                                <li>Indica en caja que quieres ralizar un pago de <strong>OXXOPay</strong>.</li>
                                <li>Dicta al cajero el número de referencia en esta ficha para que tecleé directamete en la pantalla de venta.</li>
                                <li>Realiza el pago correspondiente con dinero en efectivo.</li>
                                <li>Al confirmar tu pago, el cajero te entregará un comprobante impreso. <strong>En el podrás verificar que se haya realizado correctamente.</strong> Conserva este comprobante de pago.</li>
                            </ol>
                            <div class="opps-footnote">Al completar estos pasos recibirás un correo de <strong>Nombre del negocio</strong> confirmando tu pago.</div>
                        </div>
                    </div>
                </div>
            </div>-->
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
            $(".btn-method-pay").click(function(){
                $(".row-content").hide("fast");
                if($(this).hasClass("method-oxxo-pay")){
                    $("#p-row-oxxo-pay").show("slow");
                }else{
                    $("#p-row-main").show("slow")
                }
            });
            $(".return-method").click(function(){
                $(".row-content").hide("fast");
                $("#p-row-method-pay").show("slow");
            });
		  });
	</script>
</body>
