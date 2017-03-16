$(function(){
	$("#msad-banner").hide("slow");
	$(".shme-img-member").click(function(event){
	    $(this).attr("src","/packages/assets/media/images/system/membreship-selected.png");
	    $("#shme-header-mem").show();
	});
});