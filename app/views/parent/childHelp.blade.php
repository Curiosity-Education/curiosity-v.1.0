@extends('templates.parent-menu')

@section('title')
	 Ayuda para hijo
@stop

@section('content-parent')

@section('title-baner')
 <i class="fa fa-child"></i> Ayuda para mi hijo
@stop

<section class="chp-help">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-4">
  			<!--Panel-->
  			<div class="card chp-cards chp-Weak-card">
  			    <div class="card-header chp-backColor white-text">
  			        <i class="fa fa-user-circle-o"></i>&nbsp; Temas debiles de Juan
  			    </div>
  			    <div class="card-block">
  		        <ul>
  		        	<li>
  								<div class="card hoverable chp-topics">
                    <div class="card-block chp-topic-card">
                      <div class="card-left">
                        <img src="http://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" class="chp-imgWeak">
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
  								<div class="card hoverable chp-topics">
                    <div class="card-block chp-topic-card">
                      <div class="card-left">
                        <img src="http://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" class="chp-imgWeak">
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
  								<div class="card hoverable chp-topics">
                    <div class="card-block chp-topic-card">
                      <div class="card-left">
                        <img src="http://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" class="chp-imgWeak">
                      </div>
                      <div class="card-right">
                        <div class="chp-topicDesc">
                          <p>Fracciones</p>
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
  		<div class="col-sm-12 col-md-8">
  			<div class="card chp-cards">
  				<div class="card-header chp-backColor white-text">
  		      <i class="fa fa-info"></i>&nbsp; Material para Fracciones
  		    </div>
  		    <div class="card-block">
  	        <div class="col-sm-6 col-md-6">
              <div class="chp-btn-mat">
                <a class="btn btn-rounded chp-btn chp-btn-material">Primary</a>
              </div>
  	        </div>
  					<div class="col-sm-6 col-md-6 chp-border">
  						<div class="text-xs-center">
  							<img src="http://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" alt="" class=" chp-videoImg">
  						</div>
  					</div>
  		    </div>
        </div>
  		</div>
      <div class="col-sm-12 col-md-8">
        <div class="card chp-cards">
  				<div class="card-header chp-backColor white-text">
  		      <i class="fa fa-bookmark"></i>&nbsp; Material para Fracciones
  		    </div>
  		    <div class="card-block">
            <div class="col-sm-4 col-md-4">
              <div>
    							<img src="http://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" alt="" class="chp-bookImg">
    					</div>
  					</div>
            <div class="col-md-4 col-sm-4">
              <p class="text-xs-center chp-book-desc">Lorem ipsum dolor sit amet, consectetur adipisicing el</p>
            </div>
  	        <div class="col-sm-4 col-md-4">
                <div class="chp-btn-book">
                  <a class="btn btn-rounded chp-btn chp-btn-bookshop">Primary</a>
                </div>
  	        </div>
  		    </div>
  		</div>
    </div>
  </div>
</section>
@stop

@section('js-plus')

@stop
