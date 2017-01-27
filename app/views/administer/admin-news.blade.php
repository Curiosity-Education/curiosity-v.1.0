@extends('templates.administer-menu')

@section('css-plus')
@stop

@section('baner-tittle')
  <i class="fa fa-newspaper-o"></i>&nbsp; Gestión de novedades
@stop

@section('content-administer')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-5 adNews-borderRight z-depth-1" id="adNews-form">
			<h4 class="h4-responsive text-xs-left"><i class="fa fa-file-text"></i>&nbsp; Novedad - <small id="adNews-actionForm">Agregar</small></h4>
			<hr>
			<form action="" id="nw-formAdd">
				<div class="md-form">
					<i class="fa fa-envelope prefix"></i>
					<input type="text" id="title_new" name="title_new" class="form-control">
					<label for="title_new" id="title_new-label">Titulo de la novedad</label>
				</div>
				<div class="file-field">
					<div class="btn btn-primary btn-sm">
						<span>elige el PDF</span>
						<input type="file" id="nw_pdf" name="nw_pdf">
					</div>
					<div class="file-path-wrapper">
					   <input readonly id="nw_pdfName" name="nw_pdfName" class="file-path validate" type="text" placeholder="Archivo de la novedad">
					</div>
				</div>
				<br>
				<hr>
				<button type="submit" class="btn new-btn-default float-xs-right" id="new-submitAdd">Agregar</button>
			</form> <!-- / formAdd -->
			<form action="" id="nw-formEdit" class="nw-disabled animated bounceIn">
				<div class="md-form">
					<i class="fa fa-envelope prefix"></i>
					<input type="text" id="title_newEdit" name="title_newEdit" class="form-control">
					<label for="title_newEdit" class="nw-labelEdit">Titulo de la novedad</label>
				</div>
				<div class="file-field">
					<div class="btn btn-primary btn-sm">
						<span>elige el PDF</span>
						<input type="file" id="nw_pdfEdit" name="nw_pdfEdit">
					</div>
					<div class="file-path-wrapper">
					   <input readonly id="nw_pdfEditname" name="nw_pdfEditname" class="file-path validate" type="text" placeholder="Archivo de la novedad">
					</div>
				</div>
				<br>
				<hr>
				<button type="button" class="btn new-btn-default float-xs-right" id="new-submitEdit">Editar</button>
			</form> <!-- / formEdit -->
		</div>
		<div class="col-md-7 adNews-content">
			<div class="row">
				<div id="adNews-allnews" class="z-depth-1">
					<h4 class="h4-responsive text-xs-left"><i class="fa fa-file-text"></i>&nbsp; Lista de Novedades</h4>
					<hr>
					<div id="adNews-contentNews">
						@foreach($news as $new)
						<!--Panel-->
						<div class="card">
							<div class="card-header adNews-colorDefault white-text">
								<i class="fa fa-file-pdf-o"></i>&nbsp; {{$new -> titulo}}
								<a href="" class="float-xs-right adNews-option adNews-edit" id="adNews-edit" data-id="{{$new -> id}}" data-title="{{$new -> titulo}}" data-pdf="{{$new -> pdf}}"><i class="fa fa-edit"></i></a>
								<a href="" class="float-xs-right adNews-option adNews-delete" id="adNews-delete" data-id="{{$new -> id}}"><i class="fa fa-trash"></i></a>
							</div>
							<div class="card-block">
								<a target="_blank" href="/packages/assets/pdf/{{$new -> pdf}}"><h6 class="card-title">{{$new -> pdf}}</h6></a>
								<p class="card-text">Fecha Modificación: {{$new -> updated_at}}</p>
							</div>
						</div>
						<!--/.Panel-->
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('js-plus')
   <script src="/packages/assets/js/administer/models/News.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/controllers/newsController.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/dispatchers/dsp-news.js?{{rand();}}" charset="utf-8"></script>
@stop
