$(function(){

	// show avatars
	selectAvatarController.getAvatars();

	// show styles
	$('.sela-click').click(function(){
		var avatar = $(this).data("avatar");
		selectAvatarController.setAvatar(avatar);
		selectAvatarController.getStyles();

	});

	// avatar selected
	selectAvatarController.selected();

});
