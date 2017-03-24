$(function(){
	$("#msad-banner").hide("slow");
	$(".shme-img-member").click(function(event){
		if($(this).hasClass("active")){
			// code all
			$(this).removeClass("active")
			$(this).attr("src","/packages/assets/media/images/system/membreship-not-selected.png");
		}else{
			$(this).addClass("active");
			$(this).attr("src","/packages/assets/media/images/system/membreship-selected.png");
		}
		$("#shme-header-mem").show();
	});
	$("#shme-select-all").click(function(event){
		if($("#shme-select-all input[type='checkbox']").is(':checked')){
			$(".shme-img-member").attr("src","/packages/assets/media/images/system/membreship-selected.png")
		}else{
			$(".shme-img-member").attr("src","/packages/assets/media/images/system/membreship-not-selected.png")
		}
	});
});