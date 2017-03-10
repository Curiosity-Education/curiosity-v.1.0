var selectAvatarController = {

	avatar : null,

	setAvatar : function($avatar){
		this.avatar = $avatar;
	},

	getAvatars : function(){
		selectAvatar.getAvatars(this.avatars);
	},

	getStyles : function(){
		selectAvatar.getStyles(this.styles);
	},

	selected : function(){
		selectAvatar.selected(this.selection);
	},

	avatars : function(response){

		var sprites = response.dataSprite;
		var secuences = response.dataSecuence;
		var secuenceHi = response.dataSecuence[0].nombre;

		// TOT
		var animationTot = new SpriteAnimator('sela-divTot', sprites[0].widthFrame, sprites[0].heightFrame, sprites[0].framesX, sprites[0].framesY, sprites[0].fps);

		animationTot.spreetsheet = "/packages/assets/media/images/avatar/sprites" + sprites[0].folder + sprites[0].imagen;
		animationTot.mvx = 65;
		animationTot.mvy = 130;
		animationTot.scale = 0.8;
		setInterval(function(){
			animationTot.play();
		}, animationTot.speed);


		// SIA
		var animationSia = new SpriteAnimator('sela-divSia', sprites[2].widthFrame, sprites[2].heightFrame, sprites[2].framesX, sprites[2].framesY, sprites[2].fps);

		animationSia.spreetsheet = "/packages/assets/media/images/avatar/sprites" + sprites[2].folder + sprites[2].imagen;
		animationSia.mvx = 65;
		animationSia.mvy = 110;
		animationSia.scale = 0.7;
		setInterval(function(){
			animationSia.play();
		}, animationSia.speed);

		// button selection
		$('#sela-btnSelection').attr("disabled",true);

	},

	styles : function(response){

		console.log(this.avatar);
		// hidde text
		//$('#sela-textStyle').addClass('sela-hidden');



		/*

			<div class="col-md-6 sela-content">
							<img src="/packages/assets/media/images/avatar/sprites/sia/preview-estilos/espacial.png" class="img-fluid" alt="">
						</div>

		*/

	},

	selection : function(response){

	}


}
