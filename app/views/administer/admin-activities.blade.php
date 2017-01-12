<!-- Prefix 'acti' -->

@extends('templates.administer-menu')

@section('css-plus')
@stop

@section('baner-tittle')
   Panel de Actividades
@stop

@section('content-administer')
   <div class='row'>
      <div class='col-xs-12'>
         <div class='acti-buttons float-xs-right'>
            <a class='btn-floating btn-small waves-effect waves-light' id='acti-btnNew'>
               <i class="fa fa-plus"></i>
            </a>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="container-fluid">
         <div class="col-xs-12 msad-selectGroup z-depth-1">
            <div class="col-sm-3">
              <div class="form-group">
                <label for="acti_lvlSel">Niveles (Grados Escolares)</label>
                <select class="form-control msad-select" name="acti_lvlSel" id="acti_lvlSel"></select>
              </div>
           </div>
           <div class="col-sm-3">
             <div class="form-group">
               <label for="albpdf_intSel">Inteligencias (Materias)</label>
               <select class="form-control msad-select" name="acti_intSel" id="acti_intSel"></select>
             </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="acti_blSel">Bloques</label>
              <select class="form-control msad-select" name="acti_blSel" id="acti_blSel"></select>
            </div>
         </div>
         <div class="col-sm-3">
           <div class="form-group">
             <label for="acti_tpSel">Temas</label>
             <select class="form-control msad-select" name="acti_tpSel" id="acti_tpSel"></select>
           </div>
        </div>
         </div>
      </div>
   </div>

   <div class='row'>
      <div class='col-xs-12'>
         <table class='table table-hover table-striped z-depth-1 msad-table' id='acti-table'>
            <thead>
               <tr>
                  <th>Nombre</th><th>Acciones</th>
               </tr>
            </thead>
            <tbody></tbody>
         </table>
      </div>
   </div>

   <div class="modal fade msad-mdl" id="acti-modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header"></div>
         <div class="modal-body">
            <form class="form form-horizontal" enctype="multipart/form-data" id="acti-form-activity" >
               <div class="form-group">
                 <label for="acti-name" class="msad-mdl-label">Nombre</label>
                 <input type="text" class="form-control actiInp" id="acti_name" name="acti_name">
               </div>
               <div class="form-group">
                 <label for="acti-status" class="msad-mdl-label">Estatus</label>
                 <select class="form-control msad-select" name="acti_estatus" id="acti_estatus">
                    <option value="lock">Bloqueado</option>
                    <option value="unlock">Desbloqueado</option>
                 </select>
               </div>
               <div class="form-group">
                   <div class="input-group">
                     <span class="input-group-addon" id="acti-open-wallpaper">
                        <span class="fa fa-folder-open"></span>&nbsp;
                        Seleccionar wallpaper
                     </span>
                     <input type="text" class="form-control actiInp" id="acti_name_wallpaper" name="acti_name_wallpaper" readonly>
                     <input type="file" name="acti_wallpaper" id="acti_wallpaper" style="display:none;">
                   </div>
                </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-default" id="acti-cancel" data-dismiss="modal">
              <span class="fa fa-reply"></span>&nbsp;
              Cancelar
            </button>
           <button type="button" class="btn btn-default" disabled="disabled" id="acti-save">
             <span class="fa fa-upload"></span>&nbsp;
             Guardar
           </button>
         </div>
       </div>
     </div>
   </div>
   <div class="modal fade msad-mdl" id="acti-activity-modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header"></div>
         <div class="modal-body">
            <div class="form-group">
               <div class="input-group">
                 <span class="input-group-addon" id="acti-open">
                    <span class="fa fa-folder-open-game"></span>&nbsp;
                    Seleccionar juego
                 </span>
                 <input type="text" class="form-control sctiInp" id="acti_name" name="acti_name" readonly>
               </div>
            </div>
            <form class="form form-horizontal" id="acti-form">
               <input type="file" name="game" id="game" class="actiInp" style="display:none;">
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-default" id="acti-cancel" data-dismiss="modal">
              <span class="fa fa-reply"></span>&nbsp;
              Cancelar
            </button>
           <button type="button" class="btn btn-default" id="acti-save">
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
   <script src="/packages/assets/js/administer/models/Block.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/Topic.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/Activity.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/Controllers/actiController.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/dispatchers/dsp-acti.js" charset="utf-8"></script>
@stop
