<!-- Prefix 'atp' -->

@extends('templates.administer-menu')

@section('css-plus')
@stop

@section('title')
Temas
@stop

@section('baner-tittle')
   Temas
@stop

@section('content-administer')
   <div class='row'>
      <div class='col-xs-12'>
         <div class='atp-buttons float-xs-right'>
            <a class='btn-floating btn-small waves-effect waves-light' id='atp-btnNew'>
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
                <label for="atp-levels">Niveles (Grados Escolares)</label>
                <select class="form-control msad-select" name="atp_lvlSel" id="atp_lvlSel"></select>
              </div>
           </div>
           <div class="col-sm-4">
             <div class="form-group">
               <label for="atp-intelligences">Inteligencias (Materias)</label>
               <select class="form-control msad-select" name="atp_intSel" id="atp_intSel"></select>
             </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="atp-block msad-select">Bloques</label>
              <select class="form-control msad-select" name="atp_blSel" id="atp_blSel"></select>
            </div>
         </div>
         </div>
      </div>
   </div>

   <div class='row'>
      <div class='col-xs-12'>
         <table class='table table-hover table-striped z-depth-1 msad-table' id='atp-table'>
            <thead>
               <tr>
                  <th>Nombre</th><th>Acciones</th>
               </tr>
            </thead>
            <tbody></tbody>
         </table>
      </div>
   </div>

   <div class="modal fade msad-mdl" id="atp-modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header"></div>
         <div class="modal-body">
            <form class="form form-horizontal" id="atp-form">
               <div class="form-group">
                 <label for="atp-name" class="msad-mdl-label">Nombre</label>
                 <input type="text" class="form-control atpInp" id="atp_name" name="atp_name">
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-default" id="atp-cancel" data-dismiss="modal">
              <span class="fa fa-reply"></span>&nbsp;
              Cancelar
            </button>
           <button type="button" class="btn btn-default" id="atp-save">
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
   <script src="/packages/assets/js/administer/models/Block.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/Topic.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/Controllers/atpController.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/dispatchers/dsp-atp.js?{{rand();}}" charset="utf-8"></script>
@stop
