var selectAvatarController = {

	id : null,

	setId : function($id){
		this.id = $id;
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

	avatars : function(){

		// TOT
		var sprites = StorageDB.table.getData("spritesChild");
		var secuences = StorageDB.table.getData("secuences");
		var secuenceHi = StorageDB.table.getByAttr("secuences","nombre","saludar");
		var saludo = StorageDB.table.getByAttr("spritesChild","secuencia_id",secuenceHi[0].id);
		var animation = new SpriteAnimator('sela-divTot', saludo[0].widthFrame, saludo[0].heightFrame, saludo[0].framesX, saludo[0].framesY, saludo[0].fps);

		animation.spreetsheet = "/packages/assets/media/images/avatar/sprites" + saludo[0].folder + saludo[0].imagen;
		animation.mvx = 65;
		animation.mvy = 130;
		animation.scale = 0.8;
		setInterval(function(){
			animation.play();
		}, animation.speed);


		// SIA
		var sprites2 = StorageDB.table.getData("spritesChild");
		var secuences2 = StorageDB.table.getData("secuences");
		var secuenceHi2 = StorageDB.table.getByAttr("secuences","nombre","saludar");
		var saludo2 = StorageDB.table.getByAttr("spritesChild","secuencia_id",secuenceHi2[0].id);
		var animation2 = new SpriteAnimator('sela-divSia', saludo2[0].widthFrame, saludo2[0].heightFrame, saludo2[0].framesX, saludo2[0].framesY, saludo2[0].fps);

		animation2.spreetsheet = "/packages/assets/media/images/avatar/sprites" + saludo2[0].folder + saludo2[0].imagen;
		animation2.mvx = 65;
		animation2.mvy = 130;
		animation2.scale = 0.8;
		setInterval(function(){
			animation2.play();
		}, animation2.speed);



	},

	styles : function(response){

	},

	selection : function(response){

	}


}
