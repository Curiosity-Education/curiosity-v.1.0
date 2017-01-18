@extends('templates.parent-menu')

@section('title')
	 INICIO
@stop

@section('css-plus')
<link rel="stylesheet" href="/packages/libs/materialize/css/carousel.css">
@stop

@section('content')
<div id="hm-init">
	<div class="carousel hm-carousel">
	   @for($i = 0; $i < 5; $i++)
	   <a href="javascript:void(0)" class="carousel-item hm-carousel-item">
		  <div class="itemCarousel">
			 <img src="/packages/assets/media/images/child/store/ProfilePhotos/profDefM.png" >
			 <h6 class="h6-responsive text-xs-center">Nombre del hijo</h6>
		  </div>
	   </a>
	   @endfor
	</div>

	<div id="prntHome-contentInfo" class="z-depth-1">
	   <center><div id="prntHome-contentInfo-arrow"></div></center>
	   <h5>Nombre del hijo</h5>
	   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam, odio. Quis assumenda ipsa, non et autem tempore cum! Dolore harum tempore commodi rerum neque eligendi, ea illo nihil? Atque voluptatem, a id reprehenderit perferendis officiis repellat laudantium consequatur culpa cumque labore voluptas nihil molestiae perspiciatis, ut, doloribus provident dolores eaque nulla asperiores quos pariatur ex animi! Vero repellat tempora a pariatur sunt, sit inventore ex ut officia quam eum qui aspernatur tenetur, alias distinctio porro. Ratione excepturi, numquam dolores dolorum distinctio consequuntur sit consectetur nesciunt incidunt neque repellat expedita facilis fugit est error. Quia, officiis enim dolorem esse doloremque!
	   <button type="button" class="btn" id="hm-btn-HelpSon">Ayudar a mi Hijo</button>
	</div>
</div>

<div class="container-fluid hm-content-disabled" id="hm-viewHelp">
		<div class="row">

		<div class="view hm-black-strong z-depth-1 col-xs-12" id="chp-banner">
		  <div class="mask flex-center">
			 <h4 class="h4-responsive white-text"><i class="fa fa-heart hidden-xs-down"></i>&nbsp; Ayuda para Mi Hijo &nbsp;&nbsp;<i class="float-xs-right fa fa-times-circle hidden-sm-up lp-close"></i></h4>
		  </div>
			 <a class="btn-floating btn-small primary-color-dark float-xs-right hidden-xs-down hm-close"><i class="fa fa-times"></i></a>
		</div>

			<section class="chp-help">
			  <div class="">
				<div class="row">
				  <div class="col-sm-6 col-md-4 chp-panels">
						<!--Panel-->
						<div class="card chp-cards chp-Weak-card">
							<div class="card-header chp-backColor white-text text-left">
								<i class="fa fa-eye"></i>&nbsp; Temas débiles de Juan
							</div>
							<div class="card-block chp-" id="chp-contentTopics">
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
					<div class="col-sm-6 col-md-8 chp-panels">
						<div class="card chp-cards" id="chp-contentMaterial">
							<div class="card-header chp-backColor white-text">
						  		<i class="fa fa-cube"></i>&nbsp; Material para Fracciones
							</div>
						<div class="card-block">
							<div class="col-sm-12 col-md-6 col-xs-12">
						  		<div class="chp-btn-mat">
									<center>
										<p>Click para ver la guía explicativa</p>
										<a href="#">
											<img src="packages/assets/media/images/parents/pdfs.png" alt="" class="chp-pdfImg">
										</a>
									</center>
						  		</div><br>
							</div>
							<div class="col-sm-12 col-md-6 col-xs-12 chp-border chp-border-left">
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

				  <div class="col-sm-12 col-md-8" hidden="hidden">
					<div class="card chp-cards">
						<div class="card-header chp-backColor white-text">
						  <i class="fa fa-bookmark text-xs-left"></i>&nbsp; Librerías SM te ofrece Material extra de refuerzo
						</div>
						<div class="card-block">
							<div class="col-sm-4 col-md-4 col-xs-12">
								<div>
									<center>
										<img src="packages/assets/media/images/parents/documento.jpg" alt="" class="chp-bookImg">
									</center>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
						  	  <h3 class="h3-responsive text-xs-center">Fracciones</h3>
							  <p class="text-xs-center chp-book-desc">4to. Grado</p>
							  <p class="text-xs-center chp-book-desc">Librerías SM</p>
							</div>
							<div class="col-sm-4 col-md-4 col-xs-12">
								<div class="chp-btn-book">
								  <center>
								  	 <a id="chp-btnSM" class="btn btn-rounded chp-btn chp-btn-bookshop">Adquirir para Juan</a>
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

@section('js')
<script src="/packages/libs/materialize/js/materialize.min.js" charset="utf-8"></script>
<script src="/packages/assets/js/parent/homeParent-main.js" charset="utf-8"></script>
@stop
