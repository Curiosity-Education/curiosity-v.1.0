@extends('templates.administer-menu')

@section('css-plus')
@stop

@section('title')
 Gestion avatar
@stop

@section('baner-tittle')
   Gestion avatar
@stop

@section('content-administer')

<div class="row">
  <!-- button -->
  <div class="col-md-2 col-xs-4">
    <div class="chip animated bounce btn" id="gst-back">
       <img src="/packages/assets/media/images/system/iconBack.png">
       regresa
    </div>
  </div>
  <div class="col-md-2 offset-md-8  col-xs-4 offset-xs-4">
      <a class="btn-floating btn-large red" data-toggle="modal" data-target="#modal-contact">
          <i class="fa fa-plus"></i>
      </a>
  </div>
  <!-- button -->
</div>

<div class="row">
  <div id="adAv-avatars-container">

  </div>
</div>

<!-- Modal Contact -->
<div class="modal fade modal-ext" id="modal-contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <!--Content-->
      <div class="modal-content">
          <!--Header-->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4>Resgistro de nuevo avatar</h4>
          </div>
          <!--Body-->
          <div class="modal-body">
              <br>
              <form class="form" id="adAv-form">
                <div class="md-form">
                  <i class="fa fa-user prefix"></i>
                  <input type="text" id="adAv-name" name="adAv-name" class="form-control">
                  <label for="form42">Nombre avatar</label>
                </div>

                <div class="md-form">
                  <i class="fa fa-file-text prefix"></i>
                    <label for="form34">Historia...</label>
                  <textarea name="adAv-story" rows="8" cols="80" type="text" id="adAv-story"  class="form-control"></textarea>
                </div>

                <div class="md-form">
                  <i class="fa fa-money prefix"></i>
                  <input type="text" id="adAv-cost" name="adAv-cost" class="form-control">
                  <label for="form34">Costo</label>
                </div>
              </form>
              <form  id="adAv-imgForm">
                <div class="md-form">
                  <div class="file-field">
                    <div class="btn btn-primary btn-rounded btn-sm">
                      <span>Choose file</span>
                      <input type="file" id="adAv-img" name="adAv-img">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Upload your file">
                    </div>
                  </div>
                </div><br><br>
              </form>
          </div>
          <!--Footer-->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
            <button type="button" class="btn btn-primary" id="adAv-save">Submit</button>
          </div>
      </div>
      <!--/.Content-->

  </div>
</div>


@stop

@section('js-plus')
<script src="/packages/assets/js/administer/models/admin-avatar.js" ></script>
<script src="/packages/assets/js/administer/controllers/aAvaController.js"></script>
<script src="/packages/assets/js/administer/dispatchers/dsp-aAva.js"></script>
@stop
