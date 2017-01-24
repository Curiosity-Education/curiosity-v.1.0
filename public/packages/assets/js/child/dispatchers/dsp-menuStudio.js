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

	$("#ms-conteiner-all > div").on('click', '#ms-back', function() {
		msConstroller.getLevels();
		// obj = $(this).data("obj");
		// type = $(this).data("type");
		// switch (type) {
		// 	case "level":
		// 		msConstroller.getLevels();
		// 	break;
		// 	case "intelligence":
		// 		var levels = StorageDB.table.getByAttr("levels", "id", obj["nivel_id"]);
		// 		msConstroller.makeCard(levels, "level");
		// 	break;
		// 	case "block":
		// 		var show = StorageDB.table.getByAttr("blocks", "inteligencia_id", obj["inteligencia_id"]);
		// 		var intels = StorageDB.table.getByAttr("intelligences", "id", obj["inteligencia_id"])
		// 		msConstroller.makeCard(show, "block", null, "intelligence");
		// 	break;
		// }
	});

});
