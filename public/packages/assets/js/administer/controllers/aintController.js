var aintController = {

   typeOfSave : "save",
   formulary : $("#aint-form"),
   inputName : $("#aint_name"),
   inputDescript : $("#aint_descript"),
   id : null,

   setTypeOfSave : function(type){
      this.typeOfSave = type;
   },

   setId : function(id){
      this.id = id;
   },

   getLevels : function(){
      Curiosity.toastLoading.show();
      Level.any(null, "POST", this.makeLevelsList, "all");
   },

   makeLevelsList : function(response){
      if (response.length > 0){
         $.each(response, function(i, obj){
            $("#aint_lvlSel").append("<option value='"+obj.id+"'>"+obj.nombre+"</option>");
         });
         $("#aint_lvlSel").trigger("change");
      }
      else{
         $("#aint_lvlSel").prop("disabled", true);
      }
   },

   getIntelligences : function($level){
      Curiosity.toastLoading.show();
      Intelligence.any({id : $level}, "POST", this.makeIntelligencesList, "getByLevel");
   },

   makeIntelligencesList : function(response){
      $("#aint-table tbody").html("");
      $.each(response, function(i, obj){
         var newRow = "<tr id='"+obj.id+"'><td class='tdName'>"+obj.nombre+"</td><td><button type='button' class='btn msad-table-btnConf aint-btnConf "+obj.id+"Name "+obj.id+"id' data-dti='"+obj.id+"' data-dtn='"+obj.nombre+"' data-dtd='"+obj.descripcion+"'><span class='fa fa-gears'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel aint-btnDel "+obj.id+"id' data-dti='"+obj.id+"'><span class='fa fa-trash-o'></span></button></td></tr>";
         $("#aint-table tbody").append(newRow);
      });
      Curiosity.toastLoading.hide();
   },

   save : function(){
      switch (this.typeOfSave) {
         case "save":
            this.formulary.validate({
               rules : {
                  aint_name : {required:true, maxlength:100},
                  aint_descript : {required:true, maxlength:2000},
                  aint_lvlSel : {required:true}
               }
            });
            if (this.formulary.valid()){
               var intelligence = new Intelligence(this.inputName.val(), this.inputDescript.val(), $("#aint_lvlSel").val());
               Curiosity.toastLoading.show();
               intelligence.save("POST", this.addSuccess);
            }
            break;
         case "update":
            this.formulary.validate({
               rules : {
                  aint_name : {required:true, maxlength:100},
                  aint_descript : {required:true, maxlength:2000},
                  aint_lvlSel : {required:true}
               }
            });
            if (this.formulary.valid()){
               var intelligence = new Intelligence(this.inputName.val(), this.inputDescript.val(), $("#aint_lvlSel").val());
               Curiosity.toastLoading.show();
               intelligence.update(this.id, "POST", this.updSuccess);
            }
            break;
         default:
            alert("error");
            break;
      }
   },

   delete : function(){
      var $title = "Eliminar Inteligencia";
      var $text = "¿Estas seguro que deseas eliminar la inteligencia selecccionada?";
      var $type = "warning";
      var $id = this.id;
      Curiosity.notyConfirm($title, $text, $type, function(){ aintController.deleteIn($id); });
   },

   deleteIn : function($id){
      Curiosity.toastLoading.show();
      Intelligence.delete($id, "POST", this.delSuccess);
   },

   addSuccess : function(response){
      Curiosity.toastLoading.hide();
      switch (response.status) {
         case 200:
            console.log("Registro exitoso");
            $("#aint-modal").modal("hide");
            aintController.clearInputs();
            var newRow = "<tr id='"+response.data.id+"'><td class='tdName'>"+response.data.nombre+"</td><td><button type='button' class='btn msad-table-btnConf aint-btnConf "+response.data.id+"Name "+response.data.id+"id' data-dti='"+response.data.id+"' data-dtn='"+response.data.nombre+"' data-dtd='"+response.data.descripcion+"'><span class='fa fa-gears'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel aint-btnDel "+response.data.id+"id' data-dti='"+response.data.id+"'><span class='fa fa-trash-o'></span></button></td></tr>";
            $("#aint-table tbody").append(newRow);
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
   },

   updSuccess : function(response){
      Curiosity.toastLoading.hide();
      switch (response.status) {
         case 200:
            console.log("Actualización exitosa");
            $("#aint-modal").modal("hide");
            aintController.clearInputs();
            $("body").find("."+response.data.id+"Name").data("dtn", response.data.nombre);
            $("body").find("."+response.data.id+"Name").data("dtd", response.data.descripcion);
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

   clearInputs : function(){
      $(".aintInp").val("");
   }

}
