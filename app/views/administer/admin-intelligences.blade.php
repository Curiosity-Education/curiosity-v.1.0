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
            <a class='btn-floating btn-small waves-effect waves-light' id='aint-btnNew'></a>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="container-fluid">
         <div class="col-xs-12 msad-selectGroup z-depth-1">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="aint-levels">Niveles (Grados Escolares)</label>
                <select class="form-control msad-select" name="">
                   <option value="x">1ro</option>
                </select>
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
            <tbody>
               <tr>
                  <td>1ro</td>
                  <td>
                     <button type='button' class='btn msad-table-btnConf aint-btnConf'>
                        <span class='fa fa-gears'></span>
                     </button>
                     <button type='button' class='btn btn-outline-default msad-table-btnDel aint-btnDel'>
                        <span class='fa fa-trash-o'></span>
                     </button>
                  </td>
               </tr>
               <tr>
                  <td>2do</td>
                  <td>
                     <button type='button' class='btn msad-table-btnConf aint-btnConf'>
                        <span class='fa fa-gears'></span>
                     </button>
                     <button type='button' class='btn btn-outline-default msad-table-btnDel aint-btnDel'>
                        <span class='fa fa-trash-o'></span>
                     </button>
                  </td>
               </tr>
            </tbody>
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
                 <input type="text" class="form-control" id="aint-name" name="aint-name">
               </div>
               <div class="form-group">
                 <label for="aint-name" class="msad-mdl-textArea">Descripción</label>
                 <textarea id="aint-descript" name="aint-descript" rows="15" class="form-control"></textarea>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-default" id="aint-cancel">
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
   <script src="/packages/assets/js/administer/models/Level.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/Controllers/aintController.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/dispatchers/aint.js" charset="utf-8"></script>
@stop
