var SpriteAnimation = function (e, w, h, x, y, fps){

	this.elemento = document.getElementById(e);
	this.anchura = w;
	this.altura = h;
	this.cantidadCuadrosX = x;
	this.cantidadCuadrosY = y;
	this.iteracionX = 0;
	this.iteracionY = 0;
	this.velocidad = fps;

	this.play = function(){
		this.elemento.style.backgroundPosition = (this.iteracionX * this.anchura) + "px " + (this.iteracionY * this.altura) + "px";
		if (this.iteracionX == this.cantidadCuadrosX) {
			this.iteracionX = 0;
			this.iteracionY += 1;
			if (this.iteracionY == this.cantidadCuadrosY) {
				this.iteracionY = 0;
			}
		}
		this.iteracionX += 1;
	};
}
