<!-- Prefix 'asch' -->

@extends('templates.administer-menu')

@section('css-plus')
@stop

@section('baner-tittle')
   Escuelas Asociadas
@stop

@section('content-administer')
   <div class='row'>
      <div class='col-xs-12'>
         <div class='asch-buttons float-xs-right'>
            <a class='btn-floating btn-small waves-effect waves-light' id='asch-btnNew'>
               <i class='fa fa-plus'></i>
            </a>
         </div>
      </div>
   </div>

   <div class='row' id="asch-schoolRow"></div>

   <div class='modal fade in msad-mdl' id='asch-modal' tabindex='-1' role='dialog' aria-hidden='true' data-backdrop='static' data-keyboard='false'>
     <div class='modal-dialog'>
       <div class='modal-content'>
         <div class='modal-header'></div>
         <div class='modal-body'>
            <form id="asch-form2">
               <div class='form-group'>
                 <label for='asch_name'>Nombre de la escuela</label>
                 <input type='text' class='form-control aschInp' id='asch_name' name='asch_name'>
               </div>
               <div class='form-group'>
                  <div class='input-group'>
                    <span class='input-group-addon' id='asch-open'>
                       <span class='fa fa-folder-open'></span>&nbsp;
                       Examinar logotipo
                    </span>
                    <input type='text' class='form-control aschInp' id='asch_logoName' name='asch_logoName' readonly>
                  </div>
               </div>
            </form>
            <form class='form form-horizontal' id='asch-form'>
               <input type='file' name='asch_logo' id='asch_logo' class='aschInp' hidden>
            </form>
         </div>
         <div class='modal-footer'>
            <button type='button' class='btn btn-outline-default' id='asch-cancel' data-dismiss='modal'>
              <span class='fa fa-reply'></span>&nbsp;
              Cancelar
            </button>
           <button type='button' class='btn btn-default' id='asch-save'>
             <span class='fa fa-upload'></span>&nbsp;
             Guardar
           </button>
         </div>
       </div>
     </div>
   </div>
@stop

@section('js-plus')
   <script src='/packages/assets/js/administer/models/SchoolAsc.js?{{rand();}}' charset='utf-8'></script>
   <script src='/packages/assets/js/administer/Controllers/aschController.js?{{rand();}}' charset='utf-8'></script>
   <script src='/packages/assets/js/administer/dispatchers/dsp-asch.js?{{rand();}}' charset='utf-8'></script>
@stop
