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

	$("#rfc-btn-finish").click(function(event){		
		data = {
			username : document.getElementById("rfc-username").value,
			name     : document.getElementById("rfc-name").value,
			surnames : document.getElementById("rfc-surnames").value,
			password : document.getElementById("rfc-password").value,
			cpassword: document.getElementById("rfc-cpassword").value,
			gender   : document.getElementById("rfc-gender").value,
			average  : document.getElementById("rfc-average").value
		};
		childrenCtrl.save(data,function(response){
			console.log(response);
		});
	});
});
