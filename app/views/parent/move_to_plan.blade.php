@extends('templates.parent-menu')

@section('title')
   Información
@stop

@section('title-baner')
   Información de membresia
@stop

@section('content-parent')
   <div class='container-fluid z-depth-1' id='mvp-plans'>
      <div class='row'>
         <div class='col-xs-12'>
            <div id='mvp-desc1'>
               <h4>¡Cambiate de plan y aumenta tus beneficios!</h4>
               <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo sint similique tempora laborum eveniet saepe maxime odit labore. Fuga ea fugit eum reprehenderit eaque, quisquam minus laborum itaque ullam facere!
               </p>
            </div>
         </div>
      </div>
      <div class='row'>
         <div id='mvp-plansbox'>
            @for($i = 0; $i < 5; $i++)
            <div class='col-md-4'>
               <div class='z-depth-1'>
                  <div class='mvp-titplan'>
                     <h6 class='z-depth-1'>Nombre de Plan</h6>
                     <span class='fa fa-user z-depth-1'></span>
                     <h5>$116.00 MXN</h5>
                  </div>
                  <div class='mvp-desc'>
                     <ul>
                        <li>
                           <span class='fa fa-caret-right'></span>&nbsp;
                           Registra un límite de 2 hijos
                        </li>
                        <li>
                           <span class='fa fa-caret-right'></span>&nbsp;
                           Equivalente a $58.00/Mes
                        </li>
                        <li>
                           <span class='fa fa-caret-right'></span>&nbsp;
                           Ahorra un total de $50.00
                        </li>
                        <li>
                           <span class='fa fa-caret-right'></span>&nbsp;
                           Facturación Recurrente
                        </li>
                     </ul>
                     <center><button type='button' class='btn btn-rounded mvp-btnSelect'>
                        Cambiarme
                     </button></center>
                  </div>
               </div>
            </div>
            @endfor
         </div>
      </div>
   </div>

   <div class='container-fluid z-depth-1' id='mvp-info'>
      <div class='row'>
         <div class='col-md-6'>
            <div>
               <div class='form-group'>
                 <label class='mvp-label'>Nombre de cliente</label>
                 <input type='text' class='form-control' id='' value='{{$client->cards[0]->name}}' readonly>
               </div>
               <div class='form-group'>
                 <label class='mvp-label'>Tarjeta terminación</label>
                 <input type='text' class='form-control' id='' value='************{{$client->cards[0]->last4}}' readonly>
               </div>
               <div class='form-group'>
                 <label class='mvp-label'>Tipo de tarjeta</label>
                 <input type='text' class='form-control' id='' value="{{$client->cards[0]->brand}}" readonly>
               </div>
            </div>
         </div>
         <div class='col-md-6'>
            <div>
               <div class='form-group'>
                 <label class='mvp-label'>Fecha de inicio</label><br>
                 <input type='text' class='form-control' id='' value="{{date('d/m/Y H:i:s',$client->subscription->billing_cycle_start)}}" readonly>
               </div>
               <div class='form-group'>
                 <label class='mvp-label'>Próximo cargo</label><br>
                 <input type='text' class='form-control' id='' value="{{date('d/m/Y H:i:s',$client->subscription->billing_cycle_end)}}" readonly>
               </div>
               <button data-action='pause' type='button' class='btn btn-rounded mvp-btnpause float-xs-right suscription_gst'>
                  <span class='fa fa-pause'></span>&nbsp;
                  <span class='gst-susc-p'>Pausar</span> suscripción
               </button>
            </div>
         </div>
      </div>
   </div>
@stop

@section('js-plus')
<script src='/packages/assets/js/parent/controllers/parentGlobalController.js?{{rand();}}'></script>
<script src='/packages/assets/js/parent/dispatchers/dsp-confSuscript.js?{{rand();}}'></script>
@stop
