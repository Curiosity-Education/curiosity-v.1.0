<!-- Prefix 'ateach' -->

@extends('templates.administer-menu')

@section('css-plus')
   <link rel="stylesheet" href="/packages/libs/bootstrap-table/bootstrap-table.min.css">
@stop

@section('baner-tittle')
   Profesores Asociados
@stop

@section('content-administer')
   <div id="ateach-tools" class="btn-group">
      <a class='btn-floating btn-small waves-effect waves-light' id='ateach-btnNew'>
         <i class="fa fa-plus"></i>
      </a>
   </div>

   <div class='row'>
      <div class='col-xs-12'>
         <table id="ateach-table" class="table table-striped table-hover msad-table z-depth-1"
                     data-pagination="false"
                     data-search="true"
                     data-show-toggle="false"
                     data-show-columns="true"
                     data-toolbar="#ateach-tools"
                     data-minimum-count-columns='3'
                     data-page-list="[6, 15, 30, 50, 100, Todo]">
            <thead>
               <tr>
                  <th data-field='teacher'>Nombre</th>
                  <th data-field='school'>Escuela</th>
                  <th data-field='actions'>Acciones</th>
               </tr>
            </thead>
         </table>
      </div>
   </div>
   <br><br><br><br>

   <div class="modal fade msad-mdl" id="ateach-modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header"></div>
         <div class="modal-body">
            <div class="row">
               <div class="col-sm-4">
                  <img src="" class="img-fluid img-thumbnail z-depth-1" id="ateach_ph">
                  <button type="button" class="btn btn-outline-default btn-block" id="ateach-selectPhoto">
                    <span class="fa fa-folder-open"></span>&nbsp;
                    Abrir
                  </button>
                  <button type="button" class="btn btn-outline-default btn-block" id="ateach-resetPhoto">
                    Restaurar
                  </button>
                  <form class="form form-horizontal" id="ateach-formPhoto">
                     <input type="file" name="ateach_photo" id="ateach_photo" class="ateachInp">
                  </form>
               </div>
               <div class="col-sm-8">
                  <form class="form form-horizontal" id="ateach-form">
                     <div class="form-group">
                       <label for="ateach_name" class="msad-mdl-label">Nombre</label>
                       <input type="text" class="form-control ateachInp" id="ateach_name" name="ateach_name">
                     </div>
                     <div class="form-group">
                       <label for="ateach_lName" class="msad-mdl-label">Apellidos</label>
                       <input type="text" class="form-control ateachInp" id="ateach_lName" name="ateach_lName">
                     </div>
                     <div class="form-group">
                       <label for="ateach_email" class="msad-mdl-label">E-Mail</label>
                       <input type="email" class="form-control ateachInp" id="ateach_email" name="ateach_email">
                     </div>
                     <div class="form-group">
                       <label for="ateach_school" class="msad-mdl-label">Escuela</label>
                       <select class="form-control msad-select" name="ateach_school" id="ateach_school"></select>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-default" id="ateach-cancel" data-dismiss="modal">
              <span class="fa fa-reply"></span>&nbsp;
              Cancelar
            </button>
           <button type="button" class="btn btn-default" id="ateach-save">
             <span class="fa fa-upload"></span>&nbsp;
             Guardar
           </button>
         </div>
       </div>
     </div>
   </div>
@stop

@section('js-plus')
   <script src="/packages/libs/bootstrap-table/bootstrap-table.min.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/libs/bootstrap-table/locale/bootstrap-table-es-MX.min.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/Teacher.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/models/Schoolasc.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/Controllers/ateachController.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/dispatchers/dsp-ateach.js?{{rand();}}" charset="utf-8"></script>
@stop
