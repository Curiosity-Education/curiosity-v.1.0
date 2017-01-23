$(function(){

	msConstroller.getLevels();

	var type = null;
	var obj = null;

	$("body").on('click', '.ms-btnAccess', function() {
		obj = $(this).data("obj");
		type = $(this).data("name");
		switch (type) {
			case "level":
				msConstroller.getIntelligences(obj);
			break;
			default:
				console.log("error");
			break;
		}
	});

	$("#ms-conteiner-all > div").on('click', '#ms-back', function() {
		obj = $(this).data("obj");
		type = $(this).data("type");
		switch (type) {
			case "level":
				msConstroller.getLevels();
			break;
		}
	});

});
