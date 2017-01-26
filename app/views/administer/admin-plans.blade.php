<!-- Prefix 'plns' -->

@extends('templates.administer-menu')

@section('css-plus')
@stop

@section('baner-tittle')
   Planes
@stop

@section('content-administer')
   <div class='row'>
      <div class='col-xs-12'>
         <div class='plns-buttons float-xs-right'>
            <a class='btn-floating btn-small primary-color-dark waves-effect waves-light' id='plns-btnNew'>
               <i class="fa fa-plus"></i>
            </a>
         </div>
      </div>
   </div>

   <div class='row'>
      <div class='col-xs-12'>
         <table class='table table-hover table-striped z-depth-1 msad-table' id='plns-table'>
            <thead>
               <tr>
                  <th>Nombre</th><th>Acciones</th>
               </tr>
            </thead>
            <tbody></tbody>
         </table>
      </div>
   </div>

   <div class="modal fade msad-mdl" id="plns-modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header"></div>
         <div class="modal-body">
            <form class="form form-horizontal" id="plns-form">
               <div class="form-group">
                 <label for="plns-name" class="msad-mdl-label">Nombre</label>
                 <input type="text" class="form-control plnsInp" id="plns_name" name="plns_name">
               </div>
               <div class="form-group">
                 <label for="plns-amount" class="msad-mdl-label">Precio</label>
                 <input type="text" class="form-control plnsInp" id="plns_amount" name="plns_amount">
               </div>
               <div class="form-group">
                 <label for="plns-freeTrialDays" class="msad-mdl-label">Días Gratiuitos</label>
                 <input type="text" class="form-control plnsInp" id="plns_freeTrialDays" name="plns_freeTrialDays">
               </div>
               <div class="form-group">
                 <label for="plns-limit" class="msad-mdl-label">Límite</label>
                 <input type="text" class="form-control plnsInp" id="plns_limit" name="plns_limit">
               </div>
               <div class="form-group">
                 <label for="plns-currency" class="msad-mdl-label">Moneda</label>
                 <select class="form-control msad-select" name="plns_currency" id="plns_currency">
                    <option value="MXN">MXN</option>
                    <option value="USD">USD</option>
                 </select>
               </div>
               <div class="form-group">
                 <label for="plns-interval" class="msad-mdl-label">Intervalo</label>
                 <select class="form-control msad-select" name="plns_interval" id="plns_interval">
                    <option value="month">Mensual</option>
                    <option value="semester">Semestral</option>
                    <option value="year">Anual</option>
                 </select>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-default" id="plns-cancel" data-dismiss="modal">
              <span class="fa fa-reply"></span>&nbsp;
              Cancelar
            </button>
           <button type="button" class="btn btn-default" id="plns-save">
             <span class="fa fa-upload"></span>&nbsp;
             Guardar
           </button>
         </div>
       </div>
     </div>
   </div>
@stop

@section('js-plus')
   <script src="/packages/assets/js/administer/models/Plan.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/Controllers/plnsController.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/dispatchers/dsp-plns.js?{{rand();}}" charset="utf-8"></script>
@stop
