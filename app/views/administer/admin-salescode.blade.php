<!-- Prefix 'ascode' -->

@extends('templates.administer-menu')

@section('css-plus')
   <link rel="stylesheet" href="/packages/libs/bootstrap-table/bootstrap-table.min.css">
@stop

@section('baner-tittle')
   Códigos de venta (Embajadores Curiosity)
@stop

@section('content-administer')
   <div id="ascode-tools" class="btn-group">
      <a class='btn-floating btn-small waves-effect waves-light' id='ascode-btnNew'>
         <i class="fa fa-plus"></i>
      </a>
   </div>

   <div class='row'>
      <div class='col-xs-12'>
         <table id="ascode-table" class="table table-striped table-hover msad-table z-depth-1"
                     data-pagination="false"
                     data-search="true"
                     data-show-toggle="false"
                     data-show-columns="true"
                     data-toolbar="#ascode-tools"
                     data-minimum-count-columns='3'
                     data-page-list="[6, 15, 30, 50, 100, Todo]">
            <thead>
               <tr>
                  <th data-field='saler'>Embajador Curiosity</th>
                  <th data-field='code'>Código</th>
                  <th data-field='plan'>Plan Referente</th>
                  <th data-field='actions'>Acciones</th>
               </tr>
            </thead>
         </table>
      </div>
   </div>
   <br><br><br><br>

   <div class="modal fade msad-mdl" id="ascode-modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header"></div>
         <div class="modal-body">
            <form class="form form-horizontal" id="ascode-form">
               <div class="form-group">
                 <label for="ascode_employee" class="msad-mdl-label">Embajador Curiosity</label>
                 <select class="form-control msad-select" name="ascode_employee" id="ascode_employee"></select>
              </div>
              <div class="notyExplication">
                 <p>
                    <b>Nota: </b>
                    El plan que selecciones para el embajador estará completamente ligado al código que se genere.
                    El cliente haciendo uso del código obtendrá los beneficios y cóstos que esten establecidos en dicho plan,
                    independientemente del plan que el usuario seleccione.
                 </p>
              </div>
               <div class="form-group">
                 <label for="ascode_plan" class="msad-mdl-label">Selecciona el plan de referencia</label>
                 <select class="form-control msad-select" name="ascode_plan" id="ascode_plan"></select>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-default" id="ascode-cancel" data-dismiss="modal">
              <span class="fa fa-reply"></span>&nbsp;
              Cancelar
            </button>
           <button type="button" class="btn btn-default" id="ascode-save">
             <span class="fa fa-upload"></span>&nbsp;
             Guardar
           </button>
         </div>
       </div>
     </div>
   </div>
@stop

@section('js-plus')
   <script src="/packages/libs/bootstrap-table/bootstrap-table.min.js" charset="utf-8"></script>
   <script src="/packages/libs/bootstrap-table/locale/bootstrap-table-es-MX.min.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/Plan.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/Employee.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/SalerCode.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/Controllers/ascodeController.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/dispatchers/dsp-ascode.js?{{rand();}}" charset="utf-8"></script>
@stop
