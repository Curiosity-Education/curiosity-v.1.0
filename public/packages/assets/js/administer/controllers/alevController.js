var alevController = {
   typeOfSave : "save",
   levelName : "",
   formulary : $("#alev-form"),
   inputName : $("#alev_name"),
   btnCancel : $("#alev-cancel"),
   btnSave : $("#alev-save"),
   levels : null,
   levelId : null,
   setTypeOfSave : function(type){ this.typeOfSave = type; },
   setLevelId : function(id){ this.levelId = id; },
   save (){
      switch (this.typeOfSave) {
         case "save":
            this.formulary.validate({rules : {alev_name : {required:true, maxlength:100}}});
            if (this.formulary.valid()){
               this.level = new Level(this.inputName.val());
               Curiosity.toastLoading.show();
               this.level.save("POST", this.addSuccess);
            }
            break;
         case "update":
            this.formulary.validate({rules : {alev_name : {required:true, maxlength:100}}});
            if (this.formulary.valid()){
               this.level = new Level(this.inputName.val());
               Curiosity.toastLoading.show();
               this.level.update(this.levelId, "POST", this.updSuccess);
            }
            break;
         default:
            alert("error");
            break;
      }
   },
   delete : function(){
      var $title = "Eliminar Nivel";
      var $text = "¿Estas seguro que deseas eliminar el nivel selecccionado?";
      var $type = "warning";
      var $id = this.levelId;
      Curiosity.notyConfirm($title, $text, $type, function(){ alevController.deleteIn($id); });
   },
   deleteIn : function($id){
      Curiosity.toastLoading.show();
      Level.delete($id, "POST", this.delSuccess);
   },
   addSuccess : function(response){
      Curiosity.toastLoading.hide();
      switch (response.status) {
         case 200:
            Curiosity.noty.success("Registro exitoso", "Bien hecho");
            $("#alev-modal").modal("hide");
            alevController.clearInputs();
            var newRow = "<tr id='"+response.data.id+"'><td class='tdName'>"+response.data.nombre+"</td><td><button type='button' class='btn msad-table-btnConf alev-btnConf "+response.data.id+"Name "+response.data.id+"id' data-dti='"+response.data.id+"' data-dtn='"+response.data.nombre+"'><span class='fa fa-gears'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel alev-btnDel "+response.data.id+"id' data-dti='"+response.data.id+"'><span class='fa fa-trash-o'></span></button></td></tr>";
            $("#alev-table tbody").append(newRow);
            break;
         case "CU-103":
            Curiosity.noty.warning("Los datos que intentas guardar ya exiten", "Atención");
            break;
         case "CU-104":
            $.each(response.data, function(index, value){
              $.each(value, function(i, message){
                  console.log(message);
                  Curiosity.noty.warning(message, "Algo va mal");
              });
            });
            break;
         default:
            console.log(response);
            Curiosity.noty.error("Consulta con el administrador", "Error desconocido");
            break;
      }
   },
   updSuccess : function(response){
      Curiosity.toastLoading.hide();
      switch (response.status) {
         case 200:
            Curiosity.noty.success("Actualización exitosa", "Bien hecho");
            $("#alev-modal").modal("hide");
            alevController.clearInputs();
            $("body").find("."+response.data.id+"Name").data("dtn", response.data.nombre);
            $("body").find("#"+response.data.id+" .tdName").html(response.data.nombre);
            $("body").find("."+response.data.id+"id").data("dti", response.data.id);
            break;
         case "CU-103":
            Curiosity.noty.warning("Los datos que intentas guardar ya existen", "Atención");
            break;
         case "CU-104":
            $.each(response.data, function(index, value){
              $.each(value, function(i, message){
                  Curiosity.noty.warning(message, "Algo va mal");
              });
            });
            break;
         default:
            console.log(response);
            Curiosity.noty.error("Consulta con el administrador", "Error desconocido");
            break;
      }
   },
   delSuccess : function(response){
      if (response.status == 200){
         $("body").find("#"+response.data.id).remove();
         Curiosity.toastLoading.hide();
         Curiosity.noty.success("Removido exitosamente", "Bien hecho");
      }
      else{
         console.log(response);
         Curiosity.noty.error("Consulta con el administrador", "Error desconocido");
      }
   },
   getAll : function(){
      Level.any(null, "POST", this.makeFirstContent, "all");
   },
   makeFirstContent : function(response){
      for (var i = 0; i < response.length; i++) {
         var newRow = "<tr id='"+response[i].id+"'><td class='tdName'>"+response[i].nombre+"</td><td><button type='button' class='btn msad-table-btnConf alev-btnConf "+response[i].id+"Name "+response[i].id+"id' data-dti='"+response[i].id+"' data-dtn='"+response[i].nombre+"'><span class='fa fa-gears'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel alev-btnDel "+response[i].id+"id' data-dti='"+response[i].id+"'><span class='fa fa-trash-o'></span></button></td></tr>";
         $("#alev-table tbody").append(newRow);
      }
   },
   clearInputs : function(){
      $(".alevInp").val("");
   }
}
