<!-- Prefix 'ablk' -->

@extends('templates.administer-menu')

@section('css-plus')
@stop

@section('title')
Bloques
@stop

@section('baner-tittle')
   Bloques
@stop

@section('content-administer')
   <div class='row'>
      <div class='col-xs-12'>
         <div class='ablk-buttons float-xs-right'>
            <a class='btn-floating btn-small waves-effect waves-light' id='ablk-btnNew'>
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
                <label for="ablk-levels">Niveles (Grados Escolares)</label>
                <select class="form-control msad-select" name="ablk_lvlSel" id="ablk_lvlSel"></select>
              </div>
           </div>
           <div class="col-sm-4">
             <div class="form-group">
               <label for="ablk-intelligences">Inteligencias (Materias)</label>
               <select class="form-control msad-select" name="ablk_intSel" id="ablk_intSel"></select>
             </div>
          </div>
         </div>
      </div>
   </div>

   <div class='row'>
      <div class='col-xs-12'>
         <table class='table table-hover table-striped z-depth-1 msad-table' id='ablk-table'>
            <thead>
               <tr>
                  <th>Nombre</th><th>Acciones</th>
               </tr>
            </thead>
            <tbody></tbody>
         </table>
      </div>
   </div>

   <div class="modal fade msad-mdl" id="ablk-modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header"></div>
         <div class="modal-body">
            <form class="form form-horizontal" id="ablk-form">
               <div class="form-group">
                 <label for="ablk-name" class="msad-mdl-label">Nombre</label>
                 <input type="text" class="form-control ablkInp" id="ablk_name" name="ablk_name">
               </div>
               <div class='form-group'>
                  <div class='input-group'>
                    <span class='input-group-addon' id='ablk-open'>
                       <span class='fa fa-folder-open'></span>&nbsp;
                       Examinar logotipo
                    </span>
                    <input type='text' class='form-control ablkInp' id='ablk_logoName' name='ablk_logoName' readonly>
                  </div>
               </div>
            </form>
            <form class='form form-horizontal' id='ablk-formLogo'>
               <input type='file' name='ablk_logo' id='ablk_logo' class='ablkInp' hidden>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-default" id="ablk-cancel" data-dismiss="modal">
              <span class="fa fa-reply"></span>&nbsp;
              Cancelar
            </button>
           <button type="button" class="btn btn-default" id="ablk-save">
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
   <script src="/packages/assets/js/administer/Controllers/ablkController.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/dispatchers/dsp-ablk.js?{{rand();}}" charset="utf-8"></script>
@stop
