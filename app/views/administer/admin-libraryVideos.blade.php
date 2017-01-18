<!-- Prefix 'albvid' -->

@extends('templates.administer-menu')

@section('css-plus')
@stop

@section('baner-tittle')
   Biblioteca de Videos
@stop

@section('content-administer')
   <div class='row'>
      <div class='col-xs-12'>
         <div class='albvid-buttons float-xs-right'>
            <a class='btn-floating btn-small waves-effect waves-light' id='albvid-btnNew'>
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
                <label for="albvid_lvlSel">Niveles (Grados Escolares)</label>
                <select class="form-control msad-select" name="albvid_lvlSel" id="albvid_lvlSel"></select>
              </div>
           </div>
           <div class="col-sm-3">
             <div class="form-group">
               <label for="albvid_intSel">Inteligencias (Materias)</label>
               <select class="form-control msad-select" name="albvid_intSel" id="albvid_intSel"></select>
             </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="albvid_blSel">Bloques</label>
              <select class="form-control msad-select" name="albvid_blSel" id="albvid_blSel"></select>
            </div>
         </div>
         <div class="col-sm-3">
           <div class="form-group">
             <label for="albvid_tpSel">Temas</label>
             <select class="form-control msad-select" name="albvid_tpSel" id="albvid_tpSel"></select>
           </div>
        </div>
         </div>
      </div>
   </div>

   <div class='row'>
      <div class='col-xs-12'>
         <table class='table table-hover table-striped z-depth-1 msad-table' id='albvid-table'>
            <thead>
               <tr>
                  <th>Nombre</th><th>Acciones</th>
               </tr>
            </thead>
            <tbody></tbody>
         </table>
      </div>
   </div>

   <div class="modal fade msad-mdl" id="albvid-modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header"></div>
         <div class="modal-body">
            <form class="form form-horizontal" id="albvid-formCode">
               <div class="form-group">
                  <div class="input-group">
                     <label for="albvid_link" class="msad-mdl-label">Link del video (embed)</label>
                     <input type="text" class="form-control albvidInp" id="albvid_link" name="albvid_link">
                     <span class="input-group-addon" id="albvid_addon"><span class=""></span></span>
                  </div><br>
                  <div class="form-group">
                    <label for="albvid_school" class="msad-mdl-label">Escuela</label>
                    <select class="form-control msad-select" name="albvid_school" id="albvid_school"></select>
                  </div>
                  <div class="form-group">
                    <label for="albvid_teacher" class="msad-mdl-label">Profesor</label>
                    <select class="form-control msad-select" name="albvid_teacher" id="albvid_teacher"></select>
                 </div>
               </div>
            </form>
            <div class="form-group">
               <label class="msad-mdl-label">Poster</label><br><br>
               <div class="input-group">
                 <span class="input-group-addon" id="albvid-open">
                    <span class="fa fa-folder-open"></span>&nbsp;
                    Examinar
                 </span>
                 <input type="text" class="form-control albvidInp" id="albvid_posterName" name="albvid_posterName" readonly>
               </div>
            </div>
            <form class="form form-horizontal" id="albvid-form">
               <input type="file" name="albvid_poster" id="albvid_poster" class="albvidInp">
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-default" id="albvid-cancel" data-dismiss="modal">
              <span class="fa fa-reply"></span>&nbsp;
              Cancelar
            </button>
           <button type="button" class="btn btn-default" id="albvid-save">
             <span class="fa fa-upload"></span>&nbsp;
             Guardar
           </button>
         </div>
       </div>
     </div>
   </div>

   <div class="modal fade" id="albvid-preview" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header albvid-modal-header">
           <button type="button" class="close albvid-close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title" id=""></h4>
         </div>
         <div class="modal-body albvid-modal-body">
            <embed src="" width="300" height="300" id="albvid_embedPrev">
         </div>
         <div class="modal-footer albvid-modal-footer"></div>
       </div>
     </div>
   </div>
@stop

@section('js-plus')
   <script src="/packages/assets/js/administer/models/Level.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/Intelligence.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/Block.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/Topic.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/Schoolasc.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/Teacher.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/Library_video.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/Controllers/albvidController.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/dispatchers/dsp-albvid.js" charset="utf-8"></script>
@stop
