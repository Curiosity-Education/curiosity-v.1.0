@extends('templates.child-menu')

@section('title')
	 Rincón de PDF'S
@stop

@section('content')

<div class="container-fluid">
	<!-- Buttons with the differents topics -->
	<div class="row">
		<button type="button" class="btn btn-primary lp-topic-active">Matemáticas</button>
		<button type="button" class="btn btn-info">Robótica</button>
	</div><br>

    <!-- Buttons with the degrees -->
	<div class="row" id="lp-row-degrees">
		<div class="col-md-8 col-sm-12 lp-container-degrees z-depth-1">
			<div class="col-md-2 col-sm-3 lp-text-degrees text-xs-center ">
				<h6 class="font-weight-bold lp-text">Grados</h6>
			</div>
			<button type="button" class="btn btn-info lp-btn-degrees">1°</button>
			<button type="button" class="btn btn-info lp-btn-degrees">2°</button>
			<button type="button" class="btn btn-info lp-btn-degrees">3°</button>
			<button type="button" class="btn btn-info lp-btn-degrees">4°</button>
			<button type="button" class="btn btn-info lp-btn-degrees">5°</button>
			<button type="button" class="btn btn-info lp-btn-degrees">6°</button>
		</div>
	</div><br>

    <!-- Container of the pdfs -->	
    <div class="row">
    	<div class="col-md-12 col-sm-12 lp-container-pdf z-depth-1">
    		<a href="#">
    			<div class="col-md-3 col-sm-3">
					<div class="lp-bg-card" data-toggle="tooltip" data-placement="top" title="click para ver">
						<div class="card-overlay lp-card-pdf">
						<!--Content-->
							<div class="white-text text-xs-center">
								<div class="card-block">
									<h5 class="h5-responsive lp-text-card"><i class="fa fa-file-pdf-o"></i> GUIA PDF</h5><hr class="lp-hr">
									<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

								</div>
							</div>
						</div>
					</div>
				</div>
    		</a>
    		<a href="#">
    			<div class="col-md-3 col-sm-3">
					<div class="lp-bg-card" data-toggle="tooltip" data-placement="top" title="click para ver">
						<div class="card-overlay lp-card-pdf">
						<!--Content-->
							<div class="white-text text-xs-center">
								<div class="card-block">
									<h5 class="h5-responsive lp-text-card"><i class="fa fa-file-pdf-o"></i> GUIA PDF</h5><hr class="lp-hr">
									<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

								</div>
							</div>
						</div>
					</div>
				</div>
    		</a>
    		<a href="#">
    			<div class="col-md-3 col-sm-3">
					<div class="lp-bg-card" data-toggle="tooltip" data-placement="top" title="click para ver">
						<div class="card-overlay lp-card-pdf">
						<!--Content-->
							<div class="white-text text-xs-center">
								<div class="card-block">
									<h5 class="h5-responsive lp-text-card"><i class="fa fa-file-pdf-o"></i> GUIA PDF</h5><hr class="lp-hr">
									<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

								</div>
							</div>
						</div>
					</div>
				</div>
    		</a>
    		<a href="#">
    			<div class="col-md-3 col-sm-3">
					<div class="lp-bg-card" data-toggle="tooltip" data-placement="top" title="click para ver">
						<div class="card-overlay lp-card-pdf">
						<!--Content-->
							<div class="white-text text-xs-center">
								<div class="card-block">
									<h5 class="h5-responsive lp-text-card"><i class="fa fa-file-pdf-o"></i> GUIA PDF</h5><hr class="lp-hr">
									<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

								</div>
							</div>
						</div>
					</div>
				</div>
    		</a>
    		<a href="#">
    			<div class="col-md-3 col-sm-3">
					<div class="lp-bg-card" data-toggle="tooltip" data-placement="top" title="click para ver">
						<div class="card-overlay lp-card-pdf">
						<!--Content-->
							<div class="white-text text-xs-center">
								<div class="card-block">
									<h5 class="h5-responsive lp-text-card"><i class="fa fa-file-pdf-o"></i> GUIA PDF</h5><hr class="lp-hr">
									<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

								</div>
							</div>
						</div>
					</div>
				</div>
    		</a>
    		<a href="#">
    			<div class="col-md-3 col-sm-3">
					<div class="lp-bg-card" data-toggle="tooltip" data-placement="top" title="click para ver">
						<div class="card-overlay lp-card-pdf">
						<!--Content-->
							<div class="white-text text-xs-center">
								<div class="card-block">
									<h5 class="h5-responsive lp-text-card"><i class="fa fa-file-pdf-o"></i> GUIA PDF</h5><hr class="lp-hr">
									<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

								</div>
							</div>
						</div>
					</div>
				</div>
    		</a>
    		<a href="#">
    			<div class="col-md-3 col-sm-3">
					<div class="lp-bg-card" data-toggle="tooltip" data-placement="top" title="click para ver">
						<div class="card-overlay lp-card-pdf">
						<!--Content-->
							<div class="white-text text-xs-center">
								<div class="card-block">
									<h5 class="h5-responsive lp-text-card"><i class="fa fa-file-pdf-o"></i> GUIA PDF</h5><hr class="lp-hr">
									<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

								</div>
							</div>
						</div>
					</div>
				</div>
    		</a>
    		<a href="#">
    			<div class="col-md-3 col-sm-3">
					<div class="lp-bg-card" data-toggle="tooltip" data-placement="top" title="click para ver">
						<div class="card-overlay lp-card-pdf">
						<!--Content-->
							<div class="white-text text-xs-center">
								<div class="card-block">
									<h5 class="h5-responsive lp-text-card"><i class="fa fa-file-pdf-o"></i> GUIA PDF</h5><hr class="lp-hr">
									<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

								</div>
							</div>
						</div>
					</div>
				</div>
    		</a>
    	</div>
    </div><br>
</div>

@stop

@section('js-plus')
	<script type="text/javascript">
		$(document).ready(function(){
     		$('[data-toggle="tooltip"]').tooltip();
		});
	</script>

	{{ HTML::script('/packages/assets/js/child/library_pdfs.js') }}
@stop
