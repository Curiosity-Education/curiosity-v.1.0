<!-- Prefix 'atpc' -->

@extends('templates.administer-menu')

@section('css-plus')
@stop

@section('baner-tittle')
   Temas
@stop

@section('content-administer')
   <div class='row'>
      <div class='col-xs-12'>
         <div class='atpc-buttons float-xs-right'>
            <a class='btn-floating btn-small waves-effect waves-light' id='atpc-btnNew'>
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
                <label for="atpc-levels">Niveles (Grados Escolares)</label>
                <select class="form-control msad-select" name="">
                   <option value="x">1ro</option>
                </select>
              </div>
           </div>
           <div class="col-sm-4">
             <div class="form-group">
               <label for="atpc-intelligences">Inteligencias (Materias)</label>
               <select class="form-control msad-select" name="">
                  <option value="x">Matematicas</option>
               </select>
             </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="atpc-block msad-select">Bloques</label>
              <select class="form-control msad-select" name="">
                 <option value="x">B1</option>
              </select>
            </div>
         </div>
         </div>
      </div>
   </div>

   <div class='row'>
      <div class='col-xs-12'>
         <table class='table table-hover table-striped z-depth-1 msad-table' id='atpc-table'>
            <thead>
               <tr>
                  <th>Nombre</th><th>Acciones</th>
               </tr>
            </thead>
            <tbody>
               @for ($i = 0; $i < 5; $i++)
               <tr>
                  <td>B1</td>
                  <td>
                     <button type='button' class='btn msad-table-btnConf atpc-btnConf'>
                        <span class='fa fa-gears'></span>
                     </button>
                     <button type='button' class='btn btn-outline-default msad-table-btnDel atpc-btnDel'>
                        <span class='fa fa-trash-o'></span>
                     </button>
                  </td>
               </tr>
               @endfor
            </tbody>
         </table>
      </div>
   </div>

   <div class="modal fade msad-mdl" id="atpc-modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header"></div>
         <div class="modal-body">
            <form class="form form-horizontal" id="atpc-form">
               <div class="form-group">
                 <label for="atpc-name" class="msad-mdl-label">Nombre</label>
                 <input type="text" class="form-control" id="atpc-name" name="atpc-name">
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-default" id="atpc-cancel">
              <span class="fa fa-reply"></span>&nbsp;
              Cancelar
            </button>
           <button type="button" class="btn btn-default" id="atpc-save">
             <span class="fa fa-upload"></span>&nbsp;
             Guardar
           </button>
         </div>
       </div>
     </div>
   </div>
@stop

@section('js-plus')
   <!-- <script src="/packages/assets/js/administer/models/Level.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/Controllers/atpcController.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/dispatchers/atpc.js" charset="utf-8"></script> -->
@stop
