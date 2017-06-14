var atpController = {

   typeOfSave : "save",
   formulary : $("#atp-form"),
   inputName : $("#atp_name"),
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
      $("#atp-table tbody").html("");
      if (response.length > 0){
         $.each(response, function(i, obj){
            $("#atp_lvlSel").append("<option value='"+obj.id+"'>"+obj.nombre+"</option>");
         });
         $("#atp_lvlSel").trigger("change");
      }
      else{
         Curiosity.toastLoading.hide();
         $("#atp-btnNew").hide();
      }
   },

   getIntelligences : function($level){
      Curiosity.toastLoading.show();
      Intelligence.any({id : $level}, "POST", this.makeIntelligencesList, "getByLevel");
   },

   makeIntelligencesList : function(response){
      $("#atp_intSel").html("");
      $("#atp_blSel").html("");
      $("#atp-table tbody").html("");
      if (response.length > 0){
         $("#atp-btnNew").show("slow");
         $.each(response, function(i, obj){
            $("#atp_intSel").append("<option value='"+obj.id+"'>"+obj.nombre+"</option>");
         });
         $("#atp_intSel").trigger("change");
      }
      else{
         Curiosity.toastLoading.hide();
         $("#atp-btnNew").hide("slow");
      }
   },

   getBlocks : function($int){
      Curiosity.toastLoading.show();
      Block.any({id : $int}, "POST", this.makeBlocksList, "getByIntelligent");
   },

   makeBlocksList : function(response){
      $("#atp_blSel").html("");
      $("#atp-table tbody").html("");
      if (response.length > 0){
         $("#atp-btnNew").show("slow");
         $.each(response, function(i, obj){
            $("#atp_blSel").append("<option value='"+obj.id+"'>"+obj.nombre+"</option>");
         });
         $("#atp_blSel").trigger("change");
      }
      else{
         Curiosity.toastLoading.hide();
         $("#atp-btnNew").hide("slow");
      }
   },

   getTopics : function($int){
      Curiosity.toastLoading.show();
      Topic.any({id : $int}, "POST", this.makeTopicsList, "getByBlock");
   },

   makeTopicsList : function(response){
      $("#atp-table tbody").html("");
      $.each(response, function(i, obj){
         var newRow = "<tr id='"+obj.id+"'><td class='tdName'>"+obj.nombre+"</td><td><button type='button' class='btn msad-table-btnConf atp-btnConf "+obj.id+"Name "+obj.id+"id' data-dti='"+obj.id+"' data-dtn='"+obj.nombre+"'><span class='fa fa-gears'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel atp-btnDel "+obj.id+"id' data-dti='"+obj.id+"'><span class='fa fa-trash-o'></span></button></td></tr>";
         $("#atp-table tbody").append(newRow);
      });
      Curiosity.toastLoading.hide();
   },

   save : function(){
      switch (this.typeOfSave) {
         case "save":
            this.formulary.validate({
               rules : {
                  atp_name : {required:true, maxlength:100}
               }
            });
            if (this.formulary.valid()){
               var topic = new Topic(this.inputName.val(), $("#atp_blSel").val());
               Curiosity.toastLoading.show();
               topic.save("POST", this.addSuccess);
            }
            break;
         case "update":
            this.formulary.validate({
               rules : {
                  atp_name : {required:true, maxlength:100}
               }
            });
            if (this.formulary.valid()){
               var topic = new Topic(this.inputName.val(), $("#atp_blSel").val());
               Curiosity.toastLoading.show();
               topic.update(this.id, "POST", this.updSuccess);
            }
            break;
         default:
            alert("error");
            break;
      }
   },

   delete : function(){
      var $title = "Eliminar Tema";
      var $text = "¿Estas seguro que deseas eliminar el Tema selecccionado?";
      var $type = "warning";
      var $id = this.id;
      Curiosity.notyConfirm($title, $text, $type, function(){ atpController.deleteIn($id); });
   },

   deleteIn : function($id){
      Curiosity.toastLoading.show();
      Topic.delete($id, "POST", this.delSuccess);
   },

   addSuccess : function(response){
      Curiosity.toastLoading.hide();
      switch (response.status) {
         case 200:
            Curiosity.noty.success("Registro exitoso", "Bien hecho");
            $("#atp-modal").modal("hide");
            atpController.clearInputs();
            var newRow = "<tr id='"+response.data.id+"'><td class='tdName'>"+response.data.nombre+"</td><td><button type='button' class='btn msad-table-btnConf atp-btnConf "+response.data.id+"Name "+response.data.id+"id' data-dti='"+response.data.id+"' data-dtn='"+response.data.nombre+"'><span class='fa fa-gears'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel atp-btnDel "+response.data.id+"id' data-dti='"+response.data.id+"'><span class='fa fa-trash-o'></span></button></td></tr>";
            $("#atp-table tbody").append(newRow);
            break;
         case "CU-103":
            Curiosity.noty.warning("Los datos que intentas guardar ya exiten", "Atención");
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

   updSuccess : function(response){
      Curiosity.toastLoading.hide();
      switch (response.status) {
         case 200:
            Curiosity.noty.success("Actualización exitosa", "Bien hecho");
            $("#atp-modal").modal("hide");
            atpController.clearInputs();
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

   clearInputs : function(){
      $(".atpInp").val("");
   }

}
