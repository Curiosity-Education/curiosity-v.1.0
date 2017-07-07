<!-- Prefix 'albpdf' -->

@extends('templates.administer-menu')

@section('css-plus')
@stop

@section('title')
Biblioteca de Pdfs
@stop

@section('baner-tittle')
   Biblioteca de Pdfs
@stop

@section('content-administer')
   <div class='row'>
      <div class='col-xs-12'>
         <div class='albpdf-buttons float-xs-right'>
            <a class='btn-floating btn-small waves-effect waves-light' id='albpdf-btnNew'>
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
                <label for="albpdf_lvlSel">Niveles (Grados Escolares)</label>
                <select class="form-control msad-select" name="albpdf_lvlSel" id="albpdf_lvlSel"></select>
              </div>
           </div>
           <div class="col-sm-3">
             <div class="form-group">
               <label for="albpdf_intSel">Inteligencias (Materias)</label>
               <select class="form-control msad-select" name="albpdf_intSel" id="albpdf_intSel"></select>
             </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="albpdf_blSel">Bloques</label>
              <select class="form-control msad-select" name="albpdf_blSel" id="albpdf_blSel"></select>
            </div>
         </div>
         <div class="col-sm-3">
           <div class="form-group">
             <label for="albpdf_tpSel">Temas</label>
             <select class="form-control msad-select" name="albpdf_tpSel" id="albpdf_tpSel"></select>
           </div>
        </div>
         </div>
      </div>
   </div>

   <div class='row'>
      <div class='col-xs-12'>
         <table class='table table-hover table-striped z-depth-1 msad-table' id='albpdf-table'>
            <thead>
               <tr>
                  <th>Nombre</th><th>Acciones</th>
               </tr>
            </thead>
            <tbody></tbody>
         </table>
      </div>
   </div>

   <div class="modal fade msad-mdl" id="albpdf-modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header"></div>
         <div class="modal-body">
            <div class="form-group">
               <div class="input-group">
                 <span class="input-group-addon" id="albpdf-open">
                    <span class="fa fa-folder-open"></span>&nbsp;
                    Examinar
                 </span>
                 <input type="text" class="form-control albpdfInp" id="albpdf_name" name="albpdf_name" readonly>
               </div>
            </div>
            <form class="form form-horizontal" id="albpdf-form">
               <input type="file" name="albpdf_pdf" id="albpdf_pdf" class="albpdfInp">
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-default" id="albpdf-cancel" data-dismiss="modal">
              <span class="fa fa-reply"></span>&nbsp;
              Cancelar
            </button>
           <button type="button" class="btn btn-default" id="albpdf-save">
             <span class="fa fa-upload"></span>&nbsp;
             Guardar
           </button>
         </div>
       </div>
     </div>
   </div>
@stop

@section('js-plus')
   <script src="/packages/assets/js/administer/models/dist/Level-dist.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/dist/Intelligence-dist.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/dist/Block-dist.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/dist/Topic-dist.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/dist/Library_pdf-dist.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/controllers/albpdfController.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/dispatchers/dsp-albpdf.js?{{rand();}}" charset="utf-8"></script>
@stop
