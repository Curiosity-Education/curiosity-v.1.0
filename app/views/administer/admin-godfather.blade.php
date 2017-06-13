<!-- Prefix 'agf' -->

@extends('templates.administer-menu')

@section('css-plus')
<style media="screen">
    .imgoth-active{
        border: solid .3rem #ececec !important;
    }
</style>
@stop

@section('title')
Padrino Curiosity
@stop

@section('baner-tittle')
   Admin - Padrino Curiosity
@stop

@section('content-administer')
   <div class="row" id="agf-row-inst">
       @foreach($homes as $home)
       <div class="col-md-3">
            <div class='view overlay z-depth-1 agf-containerbox'>
                @if ($home->visible == 0)
                <h5 class="agf-colorvisible-red" id="agf{{$home->id}}hm1"><span class="fa fa-eye-slash"></span> &nbsp;No Visible</h5>
                @endif
                @if ($home->visible == 1)
                <h5 class="agf-colorvisible-green" id="agf{{$home->id}}hm1"><span class="fa fa-eye"></span> &nbsp;Visible</h5>
                @endif
                <img src='/packages/assets/media/images/institutions/{{ $home->logo }}' class='img-fluid'>
                <div class='mask flex-center'>
                    <center>
                        <a class='btn-floating btn-small waves-effect waves-light agf-btnround-conf' data-h="{{ $home->id }}">
                            <i class='fa fa-gears'></i>
                        </a>
                        @if ($home->visible == 1)
                        <a id="agf{{$home->id}}hm2" class='btn-floating btn-small waves-effect waves-light agf-btnvisible agf-btnvisible-red' data-h="{{ $home->id }}">
                            <i class='fa fa-eye-slash'></i>
                        </a>
                        @endif
                        @if ($home->visible == 0)
                        <a id="agf{{$home->id}}hm2" class='btn-floating btn-small waves-effect waves-light agf-btnvisible agf-btnvisible-green' data-h="{{ $home->id }}">
                            <i class='fa fa-eye'></i>
                        </a>
                        @endif
                    </center>
                </div>
                <h6>{{ $home->nombre }}</h6>
            </div>
       </div>
       @endforeach
   </div>

   <div class='row' id='agf-row-children'>
       <div id="adf-boxChildren-btns">
           <div class="col-md-12">
               <div class="chip animated bounce" id="agf-back">
                   <img src="/packages/assets/media/images/system/iconBack.png">
                   Regresar
               </div>
               <div class='acti-buttons float-xs-right'>
                   <a class='btn-floating btn-small waves-effect waves-light' id='agf-btnReg'>
                       <i class="fa fa-plus"></i>
                   </a>
               </div>
           </div>
       </div>
       <div id="adf-boxChildren"></div>
   </div>

   <div class="modal fade msad-mdl" id="agf-modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header"></div>
         <div class="modal-body">
            <div class="row">
               <div class="col-sm-4">
                  <img src="" class="img-fluid img-thumbnail z-depth-1" id="agf_ph">
                  <button type="button" class="btn btn-outline-default btn-block" id="agf-selectPhoto">
                    <span class="fa fa-folder-open"></span>&nbsp;
                    Abrir
                  </button>
                  <button type="button" class="btn btn-outline-default btn-block" id="agf-resetPhoto">
                    Restaurar
                  </button>
                  <!-- <button type="button" class="btn btn-outline-default btn-block" id="agf-selectPhotoOther">
                    <span class="fa fa-folder-open"></span>&nbsp;
                    Otras
                  </button> -->
                  <form class="form form-horizontal" id="agf-formPhoto">
                     <input type="file" name="agf_photo" id="agf_photo" class="agfInp">
                  </form>
               </div>
               <div class="col-sm-8">
                  <form class="form form-horizontal" id="agf-form">
                     <div class="form-group">
                       <label for="agf_name" class="msad-mdl-label">Nombre</label>
                       <input type="text" class="form-control agfInp" id="agf_name" name="agf_name">
                     </div>
                     <div class="form-group">
                       <label for="agf_lName" class="msad-mdl-label">Apellidos</label>
                       <input type="text" class="form-control agfInp" id="agf_lName" name="agf_lName">
                     </div>
                     <div class="form-group">
                       <label for="agf_genre" class="msad-mdl-label">Sexo</label>
                       <select class="form-control msad-select" name="agf_genre" id="agf_genre">
                           <option value="m">Masculino</option>
                           <option value="f">Femenino</option>
                       </select>
                     </div>
                     <div class="form-group">
                         <label for="agf_lHobby" class="msad-mdl-label">Pasatiempo</label>
                         <input type="text" class="form-control agfInp" id="agf_lHobby" name="agf_lHobby">
                     </div>
                     <div class="form-group">
                         <label for="agf_lSer_grande" class="msad-mdl-label">¿Qué quiero ser de grande?</label>
                         <input type="text" class="form-control agfInp" id="agf_lSer_grande" name="agf_lSer_grande">
                     </div>
                     <div class="form-group">
                       <label for="agf_sponsored" class="msad-mdl-label">¿Esta Apadrinado?</label>
                       <select class="form-control msad-select" name="agf_sponsored" id="agf_sponsored">
                           <option value="0">No</option>
                           <option value="1">Sí</option>
                       </select>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-default" id="agf-cancel" data-dismiss="modal">
              <span class="fa fa-reply"></span>&nbsp;
              Cancelar
            </button>
           <button type="button" class="btn btn-default" id="agf-save">
             <span class="fa fa-upload"></span>&nbsp;
             Guardar
           </button>
         </div>
       </div>
     </div>
   </div>

   <div class="modal fade" id="agf-mdl-others" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header" style="background: #2262ae;">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             <span class="sr-only">Close</span>
           </button>
           <h4 class="modal-title" style="font-size: 1rem;color: #fff;">Las imagenes se muestran segun el sexo</h4>
         </div>
         <div class="modal-body">
           <div class="row" id="agf-body-mdl-bdy">

           </div>
         </div>
         <div class="modal-footer" style="background: #ececec;">
           <button type="button" class="btn btn-primary" style="background: #2262ae;border-radius: 5rem;" id="btn-agf-oth" disabled="true">
               <span class="fa fa-check"></span>&nbsp;
               Aceptar
           </button>
         </div>
       </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
@stop

@section('js-plus')
<script src="/packages/assets/js/administer/models/dist/ChildrenHome-dist.js?{{rand();}}" charset="utf-8"></script>
<script src="/packages/assets/js/administer/controllers/admChHomController.js?{{rand();}}" charset="utf-8"></script>
<script src="/packages/assets/js/administer/dispatchers/dsp-childrenHome.js?{{rand();}}" charset="utf-8"></script>
@stop
