$(function(){
	var $formChild = $("#rfc-form");
	//event click for button to close information about why we register our children
	$(".rfc-close-info").click(function(){
		$("#rfc-info").addClass('rfc-hidde');
		$("#rfc-show-info").removeClass('rfc-hidde');
	});

	//show infor about that register child
	$("#rfc-show-info").click(function(){
		$(this).addClass('rfc-hidde');
		$("#rfc-info").removeClass('flash');
		$("#rfc-info").addClass('fadeInRight');
		$("#rfc-info").removeClass('rfc-hidde');
	});
	//close information when page is ready
	$(".rfc-close-info").trigger("click");
	//click for register child
	$("#rfc-btn-finish").click(function(event){
		if($formChild.valid()){
			data = {
				username : document.getElementById("rfc-username").value,
				name     : document.getElementById("rfc-name").value,
				surnames : document.getElementById("rfc-surnames").value,
				password : document.getElementById("rfc-password").value,
				cpassword: document.getElementById("rfc-cpassword").value,
				gender   : document.getElementById("rfc-gender").value,
				average  : document.getElementById("rfc-average").value
			};
			$(this).prop("disabled",true);
			var text  = $(this).text()
			var these = this;
			$(this).html(text +' <i class="fa fa-spinner"></i>');
			childrenCtrl.save(data,function(response){
				console.log(response);
				if(response.status!=200){
					toastr.warning(response.message);
				}else{
					toastr.success(response.message);
				}
				$(these).prop("disabled",false);
				$(these).html(text);
				document.location = "/padre-inicio";
			});
		}else{
			toastr.info("Verifica la información ingresada, algunos datos no son validos");
		}
	});
	//validation data for register child
	$formChild.validate({
		rules:{
			username:{required:true,maxlength:50},
			name:{required:true,maxlength:100},
			surnames:{required:true,maxlength:100},
			password:{required:true,minlength:5},
			cpassword:{required:true,minlength:5,equalTo:function(){
				return $("input[name='password']");
			}},
			gender:{required:true},
			average:{required:true}
		},messages:{
			cpassword:{equalTo:"Las constraseñas"}
		}
	});
});
