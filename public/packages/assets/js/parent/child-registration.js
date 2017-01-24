$(function(){
	var $formChild = $(".upch-frm-child");
    //Initializing carousel´s children
    $(".carousel").carousel();
    /*
    |--------------------------------------------------------------------------
    | managent of steps for registrate the children
    |--------------------------------------------------------------------------
    | in this section of code, we manage the steps for register the children
    | show and hide steps
    |
    */


    $(".btn-upload-child").click(function(ev){
    	console.log(this);
    	if($formChild.valid()){
			data = {
				username : document.getElementById("upch-username").value,
				name     : document.getElementById("upch-name").value,
				surnames : document.getElementById("upch-surnames").value,
				password : document.getElementById("upch-pass").value,
				cpassword: document.getElementById("upch-cpass").value,
				gender   : document.getElementById("upch-gender").value,
				average  : document.getElementById("upch-average").value
			};
			console.log(data);
			$(this).prop("disabled",true);
			var text = $(this).text()
			var these = this;
			$(this).html(text +' <i class="fa fa-spinner"></i>');
			childrenCtrl.save(data,function(response){
				console.log(response);
				if(response.status!=200){
					toastr.warning(response.message);
				}else{
					$(".btn-cancel").trigger("click");
					$(".btn-return").trigger("click");
					toastr.success(response.message);
				}
				$(these).prop("disabled",false);
				$(these).html(text);
			});
		}else{
			toastr.info("Verifica la información ingresada, algunos datos no son validos");
		}
    });
    /*
    |--------------------------------------------------------------------------
    | end of section for managent registration children steps
    |--------------------------------------------------------------------------
    */
	$(".btn-to-move").click(function(ev){
		var tab;
		if($(this).hasClass("btn-next")){//if btn has class btn-next move to fron
			tab = parseInt($(this).data("step"))+1;
		}else{//move to back
			tab = parseInt($(this).data("step"))-1;
		}
		if(tab <= $(".p-stepper-user>li").length){
			moveTab(tab);
		}
	});

	$(".p-stepper-user>li").click(function(){
		var tab = parseInt($(this).find("span").text());
		moveTab(tab);
	});


	function moveTab(tab){//function for move in tabs
		$(".btn-to-move").data("step",tab);
		$("[class*='tab']").removeClass("active");
		$("[class*='tab-"+tab+"']").addClass("active");
		$(".p-stepper-user>li").removeClass("active");
		$.each($(".p-stepper-user>li"),function(index,object){
			if(index==tab-1){
				$(object).addClass("active");
			}
		});//find to step with active for put class active
		if(tab>1){
			$(".btn-return").show();
			$(".btn-cancel").hide();
			$(".btn-next").hide();
			$(".btn-upload-child").show();
		}else{
			$(".btn-return").hide();
			$(".btn-cancel").show();
			$(".btn-next").show();
			$(".btn-upload-child").hide();
		}

	}
	$(".p-item-new").click(function(){
		$("#p-row-main").hide();
		$("#p-row-pdf").show();
		$("#container-baner").hide();
	});

	$("body,html").keyup(function(ev){
		if(ev.keyCode==27){
			$(".dismiss-card").trigger("click");
		}
	});

	$(".dismiss-card").click(function(ev){
		$($(this).data("dismiss-card")).hide();
		$("#container-baner").show();
		$("#p-row-main").show();
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
			gender:{required:true},
			average:{required:true}
		},messages:{
			cpassword:{equalTo:"Las contraseñas son diferentes"},
			username:{remote:"Nombre de usuario no disponible"}
		}
	});

});
