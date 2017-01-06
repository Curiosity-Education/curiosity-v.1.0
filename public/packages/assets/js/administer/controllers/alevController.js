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
               this.lockActions();
               Curiosity.toastLoading.show();
               this.level.save("POST", this.addSuccess);
            }
            break;
         case "update":
            this.formulary.validate({rules : {alev_name : {required:true, maxlength:100}}});
            if (this.formulary.valid()){
               this.level = new Level(this.inputName.val());
               this.lockActions();
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
      var $text = "¿Estas seguro que deseas eliminar el nivel selecccionado? \n\" "+$("body").find("#"+this.levelId+" .tdName").text();+" \"";
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
            console.log("Registro exitoso");
            $("#alev-modal").modal("hide");
            $("#alev_name").val("");
            var newRow = "<tr id='"+response.data.id+"'><td class='tdName'>"+response.data.nombre+"</td><td><button type='button' class='btn msad-table-btnConf alev-btnConf "+response.data.id+"Name "+response.data.id+"id' data-dti='"+response.data.id+"' data-dtn='"+response.data.nombre+"'><span class='fa fa-gears'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel alev-btnDel "+response.data.id+"id' data-dti='"+response.data.id+"'><span class='fa fa-trash-o'></span></button></td></tr>";
            $("#alev-table tbody").append(newRow);
            break;
         case "CU-103":
            console.log("Lo siento, los datos que intentas guardar ya exiten");
            break;
         case "CU-104":
            $.each(response.data, function(index, value){
              $.each(value, function(i, message){
                  console.log(message);
              });
            });
            break;
         default:
            console.log(response);
            console.log("Error desconocido\nConsulta con el administrador");
            break;
      }
      $("#alev_name").prop("disabled", false);
      $("#alev-cancel").prop("disabled", false);
      $("#alev-save").prop("disabled", false);
   },
   updSuccess : function(response){
      Curiosity.toastLoading.hide();
      switch (response.status) {
         case 200:
            console.log("Actualización exitosa");
            $("#alev-modal").modal("hide");
            $("#alev_name").val("");
            $("body").find("."+response.data.id+"Name").data("dtn", response.data.nombre);
            $("body").find("#"+response.data.id+" .tdName").html(response.data.nombre);
            $("body").find("."+response.data.id+"id").data("dti", response.data.id);
            break;
         case "CU-103":
            console.log("Lo siento, los datos que intentas guardar ya exiten");
            break;
         case "CU-104":
            $.each(response.data, function(index, value){
              $.each(value, function(i, message){
                  console.log(message);
              });
            });
            break;
         default:
            console.log(response);
            console.log("Error desconocido\nConsulta con el administrador");
            break;
      }
      $("#alev_name").prop("disabled", false);
      $("#alev-cancel").prop("disabled", false);
      $("#alev-save").prop("disabled", false);
   },
   delSuccess : function(response){
      if (response.status == 200){
         $("body").find("#"+response.data.id).remove();
         Curiosity.toastLoading.hide();
      }
      else{
         console.log(response);
         console.log("Error desconocido\nConsulta con el administrador");
      }
   },
   lockActions : function(){
      this.inputName.prop("disabled", true);
      this.btnCancel.prop("disabled", true);
      this.btnSave.prop("disabled", true);
   },
   getAll : function(){
      Level.any(null, "POST", this.makeFirstContent, "all");
   },
   makeFirstContent : function(response){
      for (var i = 0; i < response.length; i++) {
         var newRow = "<tr id='"+response[i].id+"'><td class='tdName'>"+response[i].nombre+"</td><td><button type='button' class='btn msad-table-btnConf alev-btnConf "+response[i].id+"Name "+response[i].id+"id' data-dti='"+response[i].id+"' data-dtn='"+response[i].nombre+"'><span class='fa fa-gears'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel alev-btnDel "+response[i].id+"id' data-dti='"+response[i].id+"'><span class='fa fa-trash-o'></span></button></td></tr>";
         $("#alev-table tbody").append(newRow);
      }
   }
}
