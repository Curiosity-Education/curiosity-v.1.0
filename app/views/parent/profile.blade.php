@extends('templates.parent-menu')

@section('title')
Curiosity | Perfil
@stop
@section('title-baner')
 <i class="fa fa-user"></i> Mi perfil
@stop
@section('content-parent')
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-5 col-lg-5">
            <!--Card-->
            <div class="card testimonial-card animated fadeInLeft" data-wow-delay="1s">

                <!--Bacground color-->
                <div class="card-up bg-blue">
                </div>

                <!--Avatar-->
                <div class="avatar"><img src="http://mdbootstrap.com/wp-content/uploads/2015/10/avatar-1.jpg" class="rounded-circle img-responsive">
                </div>

                <div class="card-block">
                    <!--Name-->
                    <h4 class="card-title">Username´s parent</h4>
                    <hr>
                    <!--Quotation-->
                    <a class="btn btn-green btn-border-curiosity waves-effect waves-light" data-card="card-1"><i class="fa fa-refresh"></i> Editar mis datos</a>  
                </div>
            </div>
            <!--/.Card-->
         </div>
         <div class="col-md-7 col-lg-7">
            <!--Form about novedades-->
            <div class="card animated fadeInRight" data-wow-delay="1s">
                <div class="card-block">

                    <!--Header-->
                    <div class="form-header p-novedades bg-blue darken-4">
                        <h3><i class="fa fa-matk-question"></i> Quzas te interese!</h3>
                    </div>

                   

                </div>

                <!--Footer-->
                <div class="modal-footer text-center">
                   <h5>Novedades</h5>
                </div>

            </div>
            <!--/Form about novedades-->
            <!--Form for refresh perfil-->
            <div class="card animated fadeInRight" data-wow-delay="1s">
                <div class="card-block">

                    <!--Header-->
                    <div class="form-header p-novedades bg-blue darken-4">
                        <h3><i class="fa fa-matk-question"></i> Mis datos!</h3>
                    </div>

                   

                </div>

                <!--Footer-->
                <div class="modal-footer text-center">
                   <h5>Ediatar datos</h5>
                </div>

            </div>
            <!--/Form for refresh perfil-->
         </div>
      </div>
   </div>
@stop

@section('js-plus')
@stop
