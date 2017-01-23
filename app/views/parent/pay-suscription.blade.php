@extends('templates.parent-menu')

@section('title')
Datos de la tarjeta
@stop
@section('title-baner')
 <i class="fa fa-user"></i> Agregar Tarjeta
@stop
@section('content-parent')
   <div class="container-fluid main"><br>
      <div class="row" id="p-row-main">
         <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
            <form action="#" method="POST" id="payment-form">
                <input type="hidden" name="token_id" id="token_id">
                <div class="pymnt-itm card active">
                    <h2>Tarjeta de crédito o débito</h2>
                    <div class="pymnt-cntnt col-md-12 container">
                        <div class="card-expl col-md-12">
                            <div class="row">
                                <div class="credit col-md-6"><h6>Tarjetas de crédito</h6></div>
                                <div class="debit col-md-6"><h6>Tarjetas de débito</h6></div>
                            </div>
                        </div>
                            <div class="sctn-row row">
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
                                <div class="shield col-md-4 pull-right">Tus pagos se realizan de forma segura</div>
                            </div>
                        </div>
                        <div class="sctn-row container">
                                <button class="btn btn-danger pull-right" id="pay-button">Pagar</button>
                        </div>
                    </div>
                </div>
            </form>
         </div>
         <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 border-left">

         </div>
      </div>

   </div>
@stop

@section('js-plus')
    <script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.5.0/js/conekta.js"></script>
    <script src="/packages/assets/js/parent/models/Parent.js"></script>
    <script src="/packages/assets/js/parent/controllers/parentController.js"></script>
    <script src="/packages/assets/js/parent/dispatchers/dsp-parent.js"></script>
@stop
