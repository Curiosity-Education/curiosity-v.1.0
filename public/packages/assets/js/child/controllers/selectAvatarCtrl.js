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

	avatars : function(response){

	},

	styles : function(response){

	},

	selection : function(response){

	}


}
