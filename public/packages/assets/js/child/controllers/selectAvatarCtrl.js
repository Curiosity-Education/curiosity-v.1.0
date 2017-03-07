var selectAvatarController = {

	id : null,

	setId : function($id){
		this.id = $id;
	},

	hasAvatar : function(){
		selectAvatar.flag(this.redirection);
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

	redirection : function(response){
		console.log(response.data);
		if(response.data == 0){
			location.href = "/view-child.selectAvatar";
		}else{

		}
	},

	avatars : function(response){

	},

	styles : function(response){

	},

	selection : function(response){

	}


}
