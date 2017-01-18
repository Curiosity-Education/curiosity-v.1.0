@extends('templates.parent-menu')

@section('title')
	 Ayuda para hijo
@stop

@section('content-parent')

@section('title-baner')
 <i class="fa fa-child"></i> Ayuda para mi hijo
@stop
	<div class="container-fluid">
		<div class="row">
			<section class="chp-help">
			  <div class="">
				<div class="row">
				  <div class="col-sm-6 col-md-4">
						<!--Panel-->
						<div class="card chp-cards chp-Weak-card">
							<div class="card-header chp-backColor white-text text-left">
								<i class="fa fa-eye"></i>&nbsp; Temas débiles de Juan
							</div>
							<div class="card-block" id="chp-contentTopics">
							<ul>
								<li>
									<div class="card hoverable chp-topics chp-cardTopic chp-active">
										<div class="card-block chp-topic-card">
										  <div class="card-left">
											<img src="http://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" class="chp-imgWeak z-depth-1">
										  </div>
										  <div class="card-right">
											<div class="chp-topicDesc">
											  <p>Fracciones</p>
											</div>
										  </div>
										</div>
								  </div>
								</li>
								<li>
								<div class="card hoverable chp-topics chp-cardTopic">
									<div class="card-block chp-topic-card">
									  <div class="card-left">
										<img src="http://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" class="chp-imgWeak z-depth-1">
									  </div>
									  <div class="card-right">
										<div class="chp-topicDesc">
										  <p>Sumas</p>
										</div>
									  </div>
									</div>
								 </div>
								</li>
								<li>
									<div class="card hoverable chp-topics chp-cardTopic">
										<div class="card-block chp-topic-card">
										  <div class="card-left">
											<img src="http://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" class="chp-imgWeak z-depth-1">
										  </div>
										  <div class="card-right">
											<div class="chp-topicDesc">
											  <p>Multiplicaciones</p>
											</div>
										  </div>
										</div>
									 </div>
								</li>
							</ul>
							</div>
						</div>
						<!--/.Panel-->
				  </div>
					<div class="col-sm-6 col-md-8">
						<div class="card chp-cards" id="chp-contentMaterial">
							<div class="card-header chp-backColor white-text">
						  		<i class="fa fa-cube"></i>&nbsp; Material para Fracciones
							</div>
						<div class="card-block">
							<div class="col-sm-12 col-md-6">
						  		<div class="chp-btn-mat">
									<center>
										<p>Click para ver la guía explicativa</p>
										<a href="#">
											<img src="packages/assets/media/images/parents/pdfs.png" alt="" class="chp-pdfImg">
										</a>
									</center>
						  		</div><br>
							</div>
							<div class="col-sm-12 col-md-6 chp-border chp-border-left">
								<div class="text-xs-center">
									<center>
										<p>Click para ver el video explicativo</p>
										<a href="#">
											<img src="packages/assets/media/images/parents/video.png" alt="" class="chp-videoImg">
										</a>
									</center>
								</div>
							</div>
						</div>
					</div>
					</div>

				  <div class="col-sm-12 col-md-8">
					<div class="card chp-cards">
						<div class="card-header chp-backColor white-text">
						  <i class="fa fa-bookmark"></i>&nbsp; Librerías SM te ofrece Material extra de refuerzo
						</div>
						<div class="card-block">
							<div class="col-sm-4 col-md-4">
								<div>
									<center>
										<img src="packages/assets/media/images/parents/documento.jpg" alt="" class="chp-bookImg">
									</center>
								</div>
							</div>
							<div class="col-md-4 col-sm-4">
						  	  <h3 class="h3-responsive text-xs-center">Fracciones</h3>
							  <p class="text-xs-center chp-book-desc">4to. Grado</p>
							  <p class="text-xs-center chp-book-desc">Librerías SM</p>
							</div>
							<div class="col-sm-4 col-md-4">
								<div class="chp-btn-book">
								  <center>
								  	 <a class="btn btn-rounded chp-btn chp-btn-bookshop">Adquirir para Juan</a>
								  </center>
								</div>
							</div>
						</div>
					</div>
					</div>
				  </div>
				</div>
			</section>
		</div>
	</div>
@stop

@section('js-plus')

@stop
