$(function(){

	// show avatars
	selectAvatarController.getAvatars();

	// show styles
	$('.sela-click').click(function(){
		var avatar = $(this).data("avatar");
		selectAvatarController.setAvatar(avatar);
		selectAvatarController.getStyles();
		console.log(avatar);
	});

	// avatar selected
	selectAvatarController.selected();

});
