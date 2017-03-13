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
  <div class="col-md-2 col-xs-4" id="back-btn">

  </div>
  <div class="col-md-2 offset-md-8  col-xs-4 offset-xs-4" id="adAv-add-btn">
      <a class="btn-floating btn-large green" data-toggle="modal" data-target="#modal-contact">
          <i class="fa fa-plus"></i>
      </a>
  </div>
  <!-- button -->
</div>

<div class="row">
  <div id="adAv-avatars-container">

  </div>
  <div id="adAv-avatarStyles-container">

  </div>
  <div id="adAv-avatarSprites-container">

  </div>
</div>

<div id="adAv-modal">

</div>

@stop

@section('js-plus')
<script src="/packages/assets/js/administer/models/admin-avatar.js" ></script>
<script src="/packages/assets/js/administer/controllers/aAvaController.js"></script>
<script src="/packages/assets/js/administer/dispatchers/dsp-aAva.js"></script>
@stop
