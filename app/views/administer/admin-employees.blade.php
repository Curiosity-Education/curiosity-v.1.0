<!-- Prefix 'aemp' -->

@extends('templates.administer-menu')

@section('css-plus')
@stop

@section('baner-tittle')
   Empleados
@stop

@section('content-administer')
   <div class='row'>
      <div class='col-xs-12'>
         <div class='aemp-buttons float-xs-right'>
            <a class='btn-floating btn-small waves-effect waves-light' id='aemp-btnNew'>
               <i class="fa fa-plus"></i>
            </a>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="container-fluid">
         <div class="col-xs-12 msad-selectGroup z-depth-1">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="aemp-position" class="msad-mdl-label">Puesto</label>
                <select class="form-control msad-select" name="aemp_posSel" id="aemp_posSel"></select>
              </div>
           </div>
         </div>
      </div>
   </div>

   <div class='row'>
      <div class='col-xs-12'>
         <table class='table table-hover table-striped z-depth-1 msad-table' id='aemp-table'>
            <thead>
               <tr>
                  <th>Nombre</th><th>E-Mail</th><th>Acciones</th>
               </tr>
            </thead>
            <tbody></tbody>
         </table>
      </div>
   </div>

   <div class="modal fade msad-mdl" id="aemp-modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header"></div>
         <div class="modal-body">
            <form class="form form-horizontal" id="aemp-form">
               <div class="form-group">
                 <label for="aemp-name" class="msad-mdl-label">Nombre</label>
                 <input type="text" class="form-control aempInp" id="aemp_name" name="aemp_name">
               </div>
               <div class="form-group">
                 <label for="aemp-name" class="msad-mdl-textArea">Descripción</label>
                 <textarea id="aemp_descript" name="aemp_descript" rows="15" class="form-control aempInp"></textarea>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-default" id="aemp-cancel" data-dismiss="modal">
              <span class="fa fa-reply"></span>&nbsp;
              Cancelar
            </button>
           <button type="button" class="btn btn-default" id="aemp-save">
             <span class="fa fa-upload"></span>&nbsp;
             Guardar
           </button>
         </div>
       </div>
     </div>
   </div>
@stop

@section('js-plus')
   <script src="/packages/assets/js/administer/models/Level.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/Intelligence.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/Controllers/aempController.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/dispatchers/dsp-aemp.js" charset="utf-8"></script>
@stop
