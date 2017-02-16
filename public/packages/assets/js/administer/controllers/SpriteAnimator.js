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
	this.mvx = 0;
	this.mvy = 0;

	this.play = function(){
		this.elementjq.css({
         "width": "100%",
         "height": "20rem",
         "background-image": "url("+this.spreetsheet+")",
         "background-position": this.widthFrame - this.mvx +"px "+this.heightFrame - this.mvy + "px",
         "background-repeat": "repeat",
         "transform": "scale(0.7)",
         "margin": "0 auto",
      });
		this.element.style.backgroundPosition = (this.iterationX * this.widthFrame - this.mvx) + "px " + (this.iterationY * this.heightFrame - this.mvy) + "px";
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
