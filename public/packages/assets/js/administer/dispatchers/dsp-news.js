$(function(){

	// change form for edit
	$(".adNews-edit").click(function(e){
		e.preventDefault();
		$("#nw-formEdit").removeClass('nw-disabled');
		$("#nw-btnback").removeClass('nw-disabled');
		$("#adNews-actionForm").text("Editar");
		$("#nw-formAdd").addClass('nw-disabled');
		$(".nw-labelEdit").addClass('active');
		$("#title_newEdit").val($(this).data('title'));
		$("#nw_pdfEditname").val($(this).data('pdf'));
		newsCtrl.setId($(this).data('id'));
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
	});

	// update new
	$("#nw-formEdit").submit(function(e){
		e.preventDefault();
	});

	$("#new-submitEdit").click(function(){
		newsCtrl.update();
		$("#title_new-label").removeClass('active');
	});

	// delete new
	$(".adNews-delete").click(function(e){
		e.preventDefault();
		$("#nw-formEdit").addClass('nw-disabled');
		$("#nw-formAdd").removeClass('nw-disabled');
		newsCtrl.setId($(this).data('id'));
		newsCtrl.deleteConfirm();
	});

	// back to add form
	$("#nw-btnback").click(function(){
		$("#nw-formEdit").addClass('nw-disabled');
		$("#nw-formAdd").removeClass('nw-disabled');
		$("#nw-formAdd").addClass('bounceIn');
		$(this).addClass('nw-disabled');
	});

});
