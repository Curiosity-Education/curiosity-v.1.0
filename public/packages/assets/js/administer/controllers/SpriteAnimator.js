var SpriteAnimator = function (e, w, h, x, y, fps){

	this.element = document.getElementById(e);
   this.elementjq = $("#"+e);
	this.widthFrame = w;
	this.heightFrame = h;
	this.fx = x;
	this.fy = y;
	this.iterationX = 0;
	this.iterationY = 0;
	this.speed = fps;
   this.spreetsheet = "";

	this.play = function(){
		this.elementjq.css({
         "width": "100%",
         "height": "20rem",
         "background-image": "url("+this.spreetsheet+")",
         "background-position": this.widthFrame - 125 +"px "+this.heightFrame - 130 + "px",
         "background-repeat": "repeat",
         "transform": "scale(0.7)",
         "margin": "0 auto",
      });
		this.element.style.backgroundPosition = (this.iterationX * this.widthFrame - 125) + "px " + (this.iterationY * this.heightFrame - 130) + "px";
		if (this.iterationX == this.fx) {
			this.iterationX = 0;
			this.iterationY += 1;
			if (this.iterationY == this.fy) {
				this.iterationY = 0;
			}
		}
		this.iterationX += 1;
	};
}
