<!-- Prefix 'aint' -->

@extends('templates.administer-menu')

@section('css-plus')
@stop

@section('baner-tittle')
   Inteligencias (Materias)
@stop

@section('content-administer')
   <div class='row'>
      <div class='col-xs-12'>
         <div class='aint-buttons float-xs-right'>
            <a class='btn-floating btn-small waves-effect waves-light' id='aint-btnNew'>
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
                <label for="aint-levels">Niveles (Grados Escolares)</label>
                <select class="form-control msad-select" name="aint_lvlSel" id="aint_lvlSel"></select>
              </div>
           </div>
         </div>
      </div>
   </div>

   <div class='row'>
      <div class='col-xs-12'>
         <table class='table table-hover table-striped z-depth-1 msad-table' id='aint-table'>
            <thead>
               <tr>
                  <th>Nombre</th><th>Acciones</th>
               </tr>
            </thead>
            <tbody></tbody>
         </table>
      </div>
   </div>

   <div class="modal fade msad-mdl" id="aint-modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header"></div>
         <div class="modal-body">
            <form class="form form-horizontal" id="aint-form">
               <div class="form-group">
                 <label for="aint-name" class="msad-mdl-label">Nombre</label>
                 <input type="text" class="form-control aintInp" id="aint_name" name="aint_name">
               </div>
               <div class="form-group">
                 <label for="aint-name" class="msad-mdl-textArea">Descripción</label>
                 <textarea id="aint_descript" name="aint_descript" rows="15" class="form-control aintInp"></textarea>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-default" id="aint-cancel" data-dismiss="modal">
              <span class="fa fa-reply"></span>&nbsp;
              Cancelar
            </button>
           <button type="button" class="btn btn-default" id="aint-save">
             <span class="fa fa-upload"></span>&nbsp;
             Guardar
           </button>
         </div>
       </div>
     </div>
   </div>
@stop

@section('js-plus')
   <script src="/packages/assets/js/administer/models/Level.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/Intelligence.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/Controllers/aintController.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/dispatchers/dsp-aint.js?{{rand();}}" charset="utf-8"></script>
@stop
