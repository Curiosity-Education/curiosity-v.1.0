$(function(){
	$(".btn-view-more").click(function(evt){
		$(".row-slide-main").hide("slow")
		$(".panels").hide("slow");
		$("#card-container-games").show("slow");
	});
});