$(function(){

	msConstroller.getLevels();

	var type = null;
	var obj = null;

	$("body").on('click', '.ms-btnAccess', function() {
		$(".ms-conteiners").addClass('ms-hide');
		obj = $(this).data("obj");
		type = $(this).data("name");
		switch (type) {
			case "level":
				msConstroller.getIntelligences(obj);
			break;
			case "intelligence":
				msConstroller.getBlocks(obj);
			break;
			case "block":
				msConstroller.getActivities(obj);
			break;
			case "activity":
				msConstroller.goToPlay(obj);
			break;
			default:
				console.log("error");
			break;
		}
	});

	$(".ms-conteiners > div").on('click', '#ms-back', function() {
		cont = $(this).data('cont');
		switch (cont) {
			case "intelligence":
				$(".ms-conteiners").addClass('ms-hide');
				$("#ms-conteiner-level").removeClass('ms-hide')
				break;
			case "block":
				$(".ms-conteiners").addClass('ms-hide');
				$("#ms-conteiner-intelligence").removeClass('ms-hide')
				break;
			case "activity":
				$(".ms-conteiners").addClass('ms-hide');
				$("#ms-conteiner-block").removeClass('ms-hide')
				break;
			default:

		}
	});

});
