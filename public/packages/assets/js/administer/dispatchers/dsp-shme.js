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
	$("#shme-add-users").click(function(event){
		var range;
		var idInstitute;
		idInstitute = $(this).data("school");
		console.log(idInstitute);
		range       = $("#range_memberships").val();
		console.log(institutesUsersController);
		institutesUsersController.save(idInstitute,range);

	});
	$("#shme-trash-users").click(function(event){
		var ids = [];
		var idInstitute;
		$("img[src*='membreship-selected.png'].active").each(function(ind,obj){
			ids.push($(obj).data("user"));
		});
		idInstitute = $(this).data("school");
		console.log(ids);
	});
});
