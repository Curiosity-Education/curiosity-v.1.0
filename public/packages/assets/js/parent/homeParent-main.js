$(function(){


	/* Transitions of the View ------------------------------------ */

	$('#hm-btn-HelpSon').click(function(){
		$('#hm-viewHelp').removeClass("hm-content-disabled");
		$('#hm-init').addClass("hm-content-disabled");

	}); // show HELP MY SON

	$('.hm-close').click(function(){
		$('#hm-init').removeClass("hm-content-disabled");
		$('#hm-viewHelp').addClass("hm-content-disabled");

	}); // hide HELP MY SON




});
