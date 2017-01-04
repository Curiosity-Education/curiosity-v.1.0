<!-- Prefix 'ablk' -->

@extends('templates.administer-menu')

@section('css-plus')
@stop

@section('baner-tittle')
   Bloques
@stop

@section('content-administer')
   <div class='row'>
      <div class='col-xs-12'>
         <div class='ablk-buttons float-xs-right'>
            <a class='btn-floating btn-small waves-effect waves-light' id='ablk-btnNew'></a>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="container-fluid">
         <div class="col-xs-12 msad-selectGroup z-depth-1">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="ablk-levels">Niveles (Grados Escolares)</label>
                <select class="form-control msad-select" name="">
                   <option value="x">1ro</option>
                </select>
              </div>
           </div>
           <div class="col-sm-4">
             <div class="form-group">
               <label for="ablk-intelligences">Inteligencias (Materias)</label>
               <select class="form-control msad-select" name="">
                  <option value="x">Matematicas</option>
               </select>
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
            <tbody>
               @for ($i = 0; $i < 5; $i++)
               <tr>
                  <td>B1</td>
                  <td>
                     <button type='button' class='btn msad-table-btnConf ablk-btnConf'>
                        <span class='fa fa-gears'></span>
                     </button>
                     <button type='button' class='btn btn-outline-default msad-table-btnDel ablk-btnDel'>
                        <span class='fa fa-trash-o'></span>
                     </button>
                  </td>
               </tr>
               @endfor
            </tbody>
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
                 <input type="text" class="form-control" id="ablk-name" name="ablk-name">
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-default" id="ablk-cancel">
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
   <script src="/packages/assets/js/administer/models/Level.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/Controllers/ablkController.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/dispatchers/ablk.js" charset="utf-8"></script>
@stop
