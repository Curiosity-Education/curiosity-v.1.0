@extends('templates.child-menu')

@section('title')
	 Rincón de PDF'S
@stop

@section('content')

     <!-- Botones con los diferentes temas -->
     <div class="row">
     	<a class="waves-effect waves-light btn btn-topic active-topic">Matemáticas</a>
     	<a class="waves-effect waves-light btn btn-topic">Robotica</a>
     </div>

     <!-- Botones con los grados escolares -->
     <div class="row">
     	<div class="col m8 s12 z-depth-1" id="content-degrees">
			<div class="col m2 s12 degrees center-align"><h6>Grados</h6></div>
			<a class="waves-effect waves-light btn active-degrees">1°</a>
			<a class="waves-effect waves-light btn">2°</a>
			<a class="waves-effect waves-light btn">3°</a>
			<a class="waves-effect waves-light btn">4°</a>
			<a class="waves-effect waves-light btn">5°</a>
			<a class="waves-effect waves-light btn">6°</a>
		 </div>
     </div>

     <!-- Contenedor de los pdfs -->
     <div class="row">
     	<div class="col s12 m4">
				<div class="card horizontal">
				  <div class="card-image">
					<img src="/packages/assets/media/images/child/pdf.png">
				  </div>
				  <div class="card-stacked">
					<div class="card-content">
					  <p>Sucesión Numerica.</p>
					</div>
					<div class="card-action">
					  <a href="#">Ver PDF</a>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="col s12 m4">
				<div class="card horizontal">
				  <div class="card-image">
					<img src="/packages/assets/media/images/child/pdf.png">
				  </div>
				  <div class="card-stacked">
					<div class="card-content">
					  <p>Sucesión Numerica.</p>
					</div>
					<div class="card-action">
					  <a href="#">Ver PDF</a>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="col s12 m4">
				<div class="card horizontal">
				  <div class="card-image">
					<img src="/packages/assets/media/images/child/pdf.png">
				  </div>
				  <div class="card-stacked">
					<div class="card-content">
					  <p>Sucesión Numerica.</p>
					</div>
					<div class="card-action">
					  <a href="#">Ver PDF</a>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="col s12 m4">
				<div class="card horizontal">
				  <div class="card-image">
					<img src="/packages/assets/media/images/child/pdf.png">
				  </div>
				  <div class="card-stacked">
					<div class="card-content">
					  <p>Sucesión Numerica.</p>
					</div>
					<div class="card-action">
					  <a href="#">Ver PDF</a>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="col s12 m4">
				<div class="card horizontal">
				  <div class="card-image">
					<img src="/packages/assets/media/images/child/pdf.png">
				  </div>
				  <div class="card-stacked">
					<div class="card-content">
					  <p>Sucesión Numerica.</p>
					</div>
					<div class="card-action">
					  <a href="#">Ver PDF</a>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="col s12 m4">
				<div class="card horizontal">
				  <div class="card-image">
					<img src="/packages/assets/media/images/child/pdf.png">
				  </div>
				  <div class="card-stacked">
					<div class="card-content">
					  <p>Sucesión Numerica.</p>
					</div>
					<div class="card-action">
					  <a href="#">Ver PDF</a>
					</div>
				  </div>
				</div>
			  </div>
     </div>

@stop

@section('js')
	{{ HTML::script('/packages/assets/js/child/library_pdfs.js') }}
@stop
