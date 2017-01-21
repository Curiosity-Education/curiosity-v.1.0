var ascodeController = {

   typeOfSave     : "save",
   formulary      : null,
   id             : null,
   data           : null,

   getPlans : function(){
      Plan.any(null, "POST", this.makePlanList, "getHidden");
   },

   makePlanList : function(response){
      if (response.length > 0){
         $.each(response, function(index, obj) {
            $("#ascode_plan").append("<option value="+obj.id+">"+obj.name+"</option>");
         });
      }
      else{
         $("#ascode_plan").append("<option> No hay planes </option>");
         Curiosity.noty.info("No hay planes registrados.", "Mensaje informativo");
      }
   },

   getSalers : function(){
      Employee.any(null, "POST", this.makeSalersList, "getBySalers");
   },

   makeSalersList : function(response){
      if (response.length > 0){
         $.each(response, function(index, obj) {
            $("#ascode_employee").append("<option value="+obj.id+">"+obj.nombre+" "+obj.apellidos+" | "+obj.correo+"</option>");
         });
      }
      else{
         $("#ascode_plan").append("<option> No hay planes </option>");
         Curiosity.noty.info("No hay embajadores registrados.", "Mensaje informativo");
      }
   },

   getCodes : function(){
      Curiosity.toastLoading.show();
      SalerCode.all("POST", this.makeCodesList);
   },

   makeCodesList : function(response){
      if (response.length > 0){
         var datos = [];
         $.each(response, function(index, obj){
            datos.push({
               'saler' : obj.nombre+" "+obj.apellidos,
               'code' : obj.codigo,
               'plan' : obj.name,
               'actions' : "<button type='button' class='btn msad-table-btnConf ascode-btnConf' data-ascode='"+JSON.stringify(obj)+"'><span class='fa fa-refresh'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel ascode-btnDel' data-ascode='"+JSON.stringify(obj)+"'><span class='fa fa-trash-o'></span></button>"
            });
         });
         $('#ascode-table').bootstrapTable({ data : datos });
      }
      Curiosity.toastLoading.hide();
   },

   save : function(){
      switch (this.typeOfSave) {
         case "save":
            this.formulary.validate({
               rules : {
                  ascode_employee : {required:true},
                  ascode_plan : {required:true}
               }
            });
            if (this.formulary.valid()){
               var sc = new SalerCode($("#ascode_employee").val(), $("#ascode_plan").val());
               Curiosity.toastLoading.show();
               sc.save("POST", this.success);
            }
            break;
         case "update":
            var $title = "Nuevo código";
            var $text = "¿Estas seguro que deseas generar un nuevo código para éste embajador?";
            var $type = "question";
            var $id = this.id;
            Curiosity.notyConfirm($title, $text, $type, function(){ ascodeController.updateCode($id); });
            break;
         default:
            Curiosity.noty.error("Consulte al administrador", "Error desconocido");
            break;
      }
   },

   updateCode : function(id){
      $("#ascode-form").validate({
         rules : {
            ascode_employee : {required:true},
            ascode_plan : {required:true}
         }
      });
      if ($("#ascode-form").valid()){
         var sc = new SalerCode($("#ascode_employee").val(), $("#ascode_plan").val());
         Curiosity.toastLoading.show();
         sc.update(id, "POST", this.success);
      }
   },

   delete : function(){
      var $title = "Eliminar código para embajador";
      var $text = "¿Estas seguro que deseas eliminar el códido del embajador selecccionado?";
      var $type = "question";
      var $id = this.id;
      Curiosity.notyConfirm($title, $text, $type, function(){ ascodeController.deleteIn($id); });
   },

   deleteIn : function($id){
      Curiosity.toastLoading.show();
      SalerCode.delete($id, "POST", this.success);
   },

   success : function(response){
      switch (response.status) {
         case 200:
            window.location.reload();
            break;
         case "CU-103":
            Curiosity.toastLoading.hide();
            Curiosity.noty.warning("El embajador ya cuenta con un código asociado al plan seleccionado", "Atención");
            break;
         case "CU-104":
            Curiosity.toastLoading.hide();
            $.each(response.data, function(index, value){
              $.each(value, function(i, message){
                  Curiosity.noty.warning(message, "Algo va mal");
              });
            });
            break;
         case 401:
            Curiosity.toastLoading.hide();
            Curiosity.noty.error("Lo sentimos no cuentas con los permisos suficientes para realizar esta acción", "Error 401");
            break;
         default:
            Curiosity.toastLoading.hide();
            Curiosity.noty.error("Consulta con el administrador", "Error desconocido");
            break;
      }
   }

}
