$(function(){

	$(".rfc-close-info").click(function(){
		$("#rfc-info").addClass('rfc-hidde');
		$("#rfc-show-info").removeClass('rfc-hidde');
	});

	$("#rfc-show-info").click(function(){
		$(this).addClass('rfc-hidde');
		$("#rfc-info").removeClass('flash');
		$("#rfc-info").addClass('fadeInRight');
		$("#rfc-info").removeClass('rfc-hidde');
	});

});
