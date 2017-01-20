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
         "width": this.widthFrame+"px",
         "height": this.heightFrame+"px",
         "background-image": "url("+this.spreetsheet+")",
         "background-position": this.widthFrame+"px "+this.heightFrame+"px",
         "background-repeat": "repeat",
         "transform": "scale(.85)",
         "margin": "0 auto",
      });
		this.element.style.backgroundPosition = (this.iterationX * this.widthFrame) + "px " + (this.iterationY * this.heightFrame) + "px";
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
