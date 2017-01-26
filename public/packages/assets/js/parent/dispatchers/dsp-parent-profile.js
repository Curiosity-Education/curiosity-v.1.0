$(function(){
	var $frm = $("#p-frm-user");
  $("#p-btn-update").prop("disabled",true);
  var data = {
        id            : document.getElementById("id").value,
        username      : document.getElementById("username").value,
        nombre        : document.getElementById("nombre").value,
        apellidos     : document.getElementById("apellidos").value,
        sexo          : document.getElementById("sexo").value,
        telefono      : document.getElementById("telefono").value,
        old_password  : document.getElementById("old_password").value,
        new_password  : document.getElementById("new_password").value,
        cnew_password : document.getElementById("cnew_password").value
  };
  var object = { //object with function use in this views
    checkIfdataChange: function(data){
      var changes = false;// nothing changes
      $.each(data,function(key,value){
        if($("input[name='"+key+"']").length>0){// if this is max to 0 them is a input
          if($("input[name='"+key+"']").val()!=value){
            changes = true;
          }
        }else{//theme this a select
          if($("select[name='"+key+"']").val()!=value){
            changes = true;
          }
        }
      });
      return changes;
    }
  }
  console.log(object.checkIfdataChange(data));
  $("#p-frm-user input,#p-frm-user select").on({
    keyup:function(event){
      if(object.checkIfdataChange(data)){
        $("#p-btn-update").prop("disabled",false);
      }else{
        $("#p-btn-update").prop("disabled",true);
      }
    },
    change:function(event){
      if(object.checkIfdataChange(data)){
        $("#p-btn-update").prop("disabled",false);
      }else{
        $("#p-btn-update").prop("disabled",true);
      }
    }
  });
	$frm.validate({
       rules:{
       		id:{required:true,digits:true},
            username:{
              required:true,
              maxlength:40, 
              remote:{
              	"url":"/remote-username-update",
                "type":"POST",
                "username":function(){
                  return $("input[name='username']").val();
                }
              }
            },
            nombre:{
                required:true
            },
            apellidos:{
                required:true
            },
            sexo:{
                required:true
            },
            old_password:{
                minlength:8,
                required:function(){
                	if(document.getElementById('new_password')!= '' && document.getElementById('cnew_password').value!=''){
                		return true;
                	}else{
                		return false;
                	}
                }
            },
            new_password:{
                minlength:8
            },
            cnew_password:{
              minlength:8,
              equalTo:function(){
                return $("input[name='new_password']");
              }
            },
            telefono:{
                required:true,
                digits:true,
                minlength:7,
                maxlength:13
            }
       },messages:{
          cnew_password:{equalTo:"Las contraseñas son diferentes"},
          username:{remote:"Nombre de usuario no disponible"}
       }
	});
	$("#p-btn-update").click(function(event){
    $(this).prop("disabled",true);
    var text  = $(this).html();
    $(this).html("<i class='fa fa-spinner fa-spin'></i>");
    var these = $(this);
		if($frm.valid()){
			var beforeData = data;
		  data = {//  new data updated
        id            : document.getElementById("id").value,
				username      : document.getElementById("username").value,
				nombre        : document.getElementById("nombre").value,
				apellidos     : document.getElementById("apellidos").value,
				sexo          : document.getElementById("sexo").value,
				telefono      : document.getElementById("telefono").value,
        old_password  : document.getElementById("old_password").value,
        new_password  : document.getElementById("new_password").value,
        cnew_password : document.getElementById("cnew_password").value
			};
			parentController.update(id,data,function(response){
        if(response.status == 200){
          Curiosity.noty.success(response.message);
          $("#btn-toggle-cards").trigger("click");
        }else if(response.status == 500){
          Curiosity.noty.error("Surgió algun problema al acutualizar la información, verifica la información e intenta nuevamente sí el problema persiste consulta con el administrador",'Alerta');
        }else if(response.status == "CU-104"){
          Curiosity.noty.warning(response.message,"Cuidado");
        }else if(response.status == "CU-107"){
          Curiosity.noty.warning(response.message,"Ups");
        }
        if(response.status != 200){
          data = beforeData;
        }
        $(these).html(text);
        $(these).prop("disabled",false);
			});
		}
	});
});