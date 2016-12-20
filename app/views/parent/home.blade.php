@extends('templates.parent-menu')

@section('css-plus')
<style media="screen">
.carousel {
  overflow: hidden;
  position: relative;
  width: 100%;
  height: 400px;
  -webkit-perspective: 500px;
          perspective: 500px;
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
  -webkit-transform-origin: 0% 50%;
          transform-origin: 0% 50%;
}

.carousel.carousel-slider {
  top: 0;
  left: 0;
  height: 0;
}

.carousel.carousel-slider .carousel-fixed-item {
  position: absolute;
  left: 0;
  right: 0;
  bottom: 20px;
  z-index: 1;
}

.carousel.carousel-slider .carousel-fixed-item.with-indicators {
  bottom: 68px;
}

.carousel.carousel-slider .carousel-item {
  width: 100%;
  height: 100%;
  min-height: 400px;
  position: absolute;
  top: 0;
  left: 0;
}

.carousel.carousel-slider .carousel-item h2 {
  font-size: 24px;
  font-weight: 500;
  line-height: 32px;
}

.carousel.carousel-slider .carousel-item p {
  font-size: 15px;
}

.carousel .carousel-item {
  display: none;
  width: 200px;
  height: 400px;
  position: absolute;
  top: 0;
  left: 0;
}

.carousel .carousel-item img {
  width: 100%;
}

.carousel .indicators {
  position: absolute;
  text-align: center;
  left: 0;
  right: 0;
  bottom: 0;
  margin: 0;
}

.carousel .indicators .indicator-item {
  display: inline-block;
  position: relative;
  cursor: pointer;
  height: 8px;
  width: 8px;
  margin: 24px 4px;
  background-color: rgba(255, 255, 255, 0.5);
  transition: background-color .3s;
  border-radius: 50%;
}

.carousel .indicators .indicator-item.active {
  background-color: #fff;
}
</style>
@stop

@section('content')
<div class="carousel">
   <a href="javascript:void(0)" class="carousel-item">
      <div class="itemCarousel">
         <img src="/packages/assets/media/images/parents/profile/mom-def.png" >
         <h6>Odaliz Ramirez</h6>
      </div>
   </a>
   <a href="javascript:void(0)" class="carousel-item">
      <div class="itemCarousel">
         <img src="/packages/assets/media/images/parents/profile/mom-def.png" >
         <h6>Odaliz Ramirez</h6>
      </div>
   </a>
   <a href="javascript:void(0)" class="carousel-item">
      <div class="itemCarousel">
         <img src="/packages/assets/media/images/parents/profile/mom-def.png" >
         <h6>Odaliz Ramirez</h6>
      </div>
   </a>
   <a href="javascript:void(0)" class="carousel-item">
      <div class="itemCarousel">
         <img src="/packages/assets/media/images/parents/profile/mom-def.png" >
         <h6>Odaliz Ramirez</h6>
      </div>
   </a>
   <a href="javascript:void(0)" class="carousel-item">
      <div class="itemCarousel">
         <img src="/packages/assets/media/images/parents/profile/mom-def.png" >
         <h6>Odaliz Ramirez</h6>
      </div>
   </a>
</div>

<div id="prntHome-contentInfo">
   <center><div id="prntHome-contentInfo-arrow"></div></center>
   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam, odio. Quis assumenda ipsa, non et autem tempore cum! Dolore harum tempore commodi rerum neque eligendi, ea illo nihil? Atque voluptatem, a id reprehenderit perferendis officiis repellat laudantium consequatur culpa cumque labore voluptas nihil molestiae perspiciatis, ut, doloribus provident dolores eaque nulla asperiores quos pariatur ex animi! Vero repellat tempora a pariatur sunt, sit inventore ex ut officia quam eum qui aspernatur tenetur, alias distinctio porro. Ratione excepturi, numquam dolores dolorum distinctio consequuntur sit consectetur nesciunt incidunt neque repellat expedita facilis fugit est error. Quia, officiis enim dolorem esse doloremque!
</div>
@stop

@section('js')
<script src="/packages/libs/materialize/js/materialize.min.js" charset="utf-8"></script>
<script type="text/javascript">
   $(function(){
      $(".carousel").carousel();
   });
</script>
@stop
