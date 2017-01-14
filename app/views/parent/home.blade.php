@extends('templates.parent-menu')

@section('title')
	 INICIO
@stop

@section('css-plus')
<link rel="stylesheet" href="/packages/libs/materialize/css/carousel.css">
@stop

@section('content')
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
</div>
@stop

@section('js')
<script src="/packages/libs/materialize/js/materialize.min.js" charset="utf-8"></script>
<script src="/packages/assets/js/parent/homeParent-main.js" charset="utf-8"></script>
@stop
