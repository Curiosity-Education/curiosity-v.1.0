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
				average  : document.getElementById("rfc-average").value,
				level    : document.getElementById("rfc-level").value
			};
			console.log(data);
			$(this).prop("disabled",true);
			var text  = $(this).text()
			var these = this;
			$(this).html(text +' <i class="fa fa-spinner"></i>');
			childrenCtrl.save(data,function(response){
				console.log(response);
				switch(response.status){
                    case 200:
                           Curiosity.noty.success(response.message);
					       document.location = "/padre-inicio";
                        break;
                    case "CUE-304":
                            Curiosity.noty.success(response.message);
                        break;
                    default:
                            toastr.warning(response.message);
                        break;
                }

				$(these).prop("disabled",false);
				$(these).html(text);
			});
		}else{
			toastr.info("Verifica la información ingresada, algunos datos no son validos");
		}
	});
	//validation data for register child
	$formChild.validate({
		rules:{
			username:{required:true,maxlength:50,remote:{
				"url":"/remote-username",
				"type":"POST",
				"username":function(){
					return $("input[name='username']").val();
				}
			}},
			name:{required:true,maxlength:100},
			surnames:{required:true,maxlength:100},
			password:{required:true,minlength:5},
			cpassword:{required:true,minlength:5,equalTo:function(){
				return $("input[name='password']");
			}},
			level:{required:true,digits:true},
			gender:{required:true},
			average:{required:true}
		},messages:{
			cpassword:{equalTo:"Las contraseñas son diferentes"},
			username:{remote:"Nombre de usuario no disponible"}
		}
	});
});
