$(function(){

	/*
	|--------------------------------------------------------------------------
	| area of buttons referents to degrees and inteligent of curiosity
	|--------------------------------------------------------------------------
	|
	| this section is for management the inteligents and degrees, that
	| those are hadled in curiosity
	*/

	$("body").on("click", ".btn-inteligent", function(){
		console.log($(this).data('data'));
		$(".card-title-level").text($(this).text()+" | Grados");
		// makeGrades();
		if($(this).hasClass("active")){
			$(".row-level").toggle("slow");
			$(this).removeClass("active");
		}else{
			$(".row-level").show("slow");
			$(".btn-inteligent").removeClass("active");
			$(this).addClass("active");
		}
		$(".row-bloque").hide("slow");
	});
	$(".btn-level").click(function(){
		$(".row-level").toggle("slow");
		$(".row-bloque").toggle("slow");
		$(".btn-bloque").removeClass("active");
		$(".card-title-bloque").text($(".btn-inteligent.active").text()+" "+$(this).text()+" | bloques");
	});

	$(".btn-bloque").click(function(){
		$(".btn-bloque").removeClass("active");
		$(this).addClass("active");
	});
	$("a.dismiss").click(function(){
		$($(this).data("dismiss-target")).hide("slow");
		$(".btn-inteligent").removeClass("active");
	});

	$("body,html").keyup(function(evt){
		if(evt.keyCode==27){
			$("a.dismiss").trigger("click");
		}
	});
	/*
	|--------------------------------------------------------------------------
	| //.. end to management of inteligent and degrees ..//
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| Objeto del modulo correspondiente
	|--------------------------------------------------------------------------
	|
	| Este objeto de dicho modulo contendrá las funciones necesarioas
	| para la iteraccion del usuario con dicho modulo
	|
	|
	*/

	$("#row-inteligents").html("");
   var intells = StorageDB.table.getData("intelligences");
   $.each(intells, function(index, obj) {
      var code = "<div class='col-xs-12 col-sm-4 col-md-3 col-inteligent'>"+
        "<a class='btn btn-purple btn-block btn-inteligent btn-"+obj.id+"' data-data='"+JSON.stringify(obj)+"'><i class='fa fa-book'></i>&nbsp; "+obj.nombre+""+
          "<div class='ms-arrow'></div>"+
        "</a>"+
      "</div>";
      $("#row-inteligents").append(code);
   });

	var makeGrades = function(int, grad){
		var intSel = StorageDB.table.getByAttr("intelligences", "id", int);
		// var grades = StorageDB.table.getByAttr("levels", );

		var code = "<a class='btn btn-purple btn-level'> 1°</a>"+
		"<a class='btn btn-purple btn-level'> 2°</a>"+
		"<a class='btn btn-purple btn-level'> 3°</a>"+
		"<a class='btn btn-purple btn-level'> 4°</a>"+
		"<a class='btn btn-purple btn-level'> 5°</a>"+
		"<a class='btn btn-purple btn-level'> 6°</a>"+
		"<a class='dismiss' data-dismiss-target='.row-level'>x</a>";
		$(".card-level > div").append(code);
	}

});
