$(function(){

	// reloadPage function
	function reloadPage(){
		location.reload(true);
	};

	// change form for edit
	$(".adNews-edit").click(function(e){
		e.preventDefault();
		$("#nw-formEdit").removeClass('nw-disabled');
		$("#adNews-actionForm").text("Editar");
		$("#nw-formAdd").addClass('nw-disabled');
		$(".nw-labelEdit").addClass('active');
		$("#title_newEdit").val($(this).data('title'));
		$("#pdf-edit").val($(this).data('pdf'));
		$("#nw-pdfEditname").val("");
	});

	// select pdf validation
	$("#nw_pdf").change(function(){
		newsCtrl.fileWeight($(this));
	});

	$("#nw_pdfEdit").change(function(){
		newsCtrl.fileWeight($(this));
	});

	// save new
	$("#nw-formAdd").submit(function(e){
		e.preventDefault();
	});

	$("#new-submitAdd").click(function(){
		newsCtrl.save();
		$("#title_new-label").removeClass('active');
		onload="setInterval('location.reload()',3000)";
		setInterval(reloadPage,'3000');
	});

});
