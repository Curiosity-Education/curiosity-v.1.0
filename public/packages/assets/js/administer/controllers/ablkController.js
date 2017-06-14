var ablkController = {

   typeOfSave : "save",
   formulary : $("#ablk-form"),
   inputName : $("#ablk_name"),
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
      $("#ablk-table tbody").html("");
      if (response.length > 0){
         $.each(response, function(i, obj){
            $("#ablk_lvlSel").append("<option value='"+obj.id+"'>"+obj.nombre+"</option>");
         });
         $("#ablk_lvlSel").trigger("change");
      }
      else{
         Curiosity.toastLoading.hide();
         $("#ablk-btnNew").hide();
      }
   },

   getIntelligences : function($level){
      Curiosity.toastLoading.show();
      Intelligence.any({id : $level}, "POST", this.makeIntelligencesList, "getByLevel");
   },

   makeIntelligencesList : function(response){
      $("#ablk_intSel").html("");
      $("#ablk-table tbody").html("");
      if (response.length > 0){
         $("#ablk-btnNew").show("slow");
         $.each(response, function(i, obj){
            $("#ablk_intSel").append("<option value='"+obj.id+"'>"+obj.nombre+"</option>");
         });
         $("#ablk_intSel").trigger("change");
      }
      else{
         Curiosity.toastLoading.hide();
         $("#ablk-btnNew").hide("slow");
      }
   },

   getBlocks : function($int){
      Curiosity.toastLoading.show();
      Block.any({id : $int}, "POST", this.makeBlocksList, "getByIntelligent");
   },

   makeBlocksList : function(response){
      $("#ablk-table tbody").html("");
      $.each(response, function(i, obj){
         var newRow = "<tr id='"+obj.id+"'><td class='tdName'>"+obj.nombre+"</td><td><button type='button' class='btn msad-table-btnConf ablk-btnConf "+obj.id+"Name "+obj.id+"id' data-dti='"+obj.id+"' data-dtn='"+obj.nombre+"'><span class='fa fa-gears'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel ablk-btnDel "+obj.id+"id' data-dti='"+obj.id+"'><span class='fa fa-trash-o'></span></button></td></tr>";
         $("#ablk-table tbody").append(newRow);
      });
      Curiosity.toastLoading.hide();
   },

   save : function(){
      switch (this.typeOfSave) {
         case "save":
            this.formulary.validate({
               rules : {
                  ablk_name : {required:true, maxlength:100}
               }
            });
            if (this.formulary.valid()){
               if ($("#ablk_logo").val() != ""){
                  var formData = new FormData($("#ablk-formLogo")[0]);
                  formData.append('nombre', this.inputName.val());
                  formData.append('inteligencia', $("#ablk_intSel").val());
                  var block = new Block(formData);
                  Curiosity.toastLoading.show();
                  block.save("POST", this.addSuccess);
               }
               else{
                  Curiosity.noty.info("Por favor selecciona una imagen para este bloque", "Atención");
               }
            }
            break;
         case "update":
            this.formulary.validate({
               rules : {
                  ablk_name : {required:true, maxlength:100}
               }
            });
            if (this.formulary.valid()){
               var formData = new FormData($("#ablk-formLogo")[0]);
               formData.append('nombre', this.inputName.val());
               formData.append('inteligencia', $("#ablk_intSel").val());
               var block = new Block(formData);
               Curiosity.toastLoading.show();
               block.update(this.id, "POST", this.updSuccess);
            }
            break;
         default:
            alert("error");
            break;
      }
   },

   delete : function(){
      var $title = "Eliminar Bloque";
      var $text = "¿Estas seguro que deseas eliminar el bloque selecccionado?";
      var $type = "warning";
      var $id = this.id;
      Curiosity.notyConfirm($title, $text, $type, function(){ ablkController.deleteIn($id); });
   },

   deleteIn : function($id){
      Curiosity.toastLoading.show();
      Block.delete($id, "POST", this.delSuccess);
   },

   addSuccess : function(response){
      Curiosity.toastLoading.hide();
      switch (response.status) {
         case 200:
            Curiosity.noty.success("Registro exitoso", "Bien hecho");
            $("#ablk-modal").modal("hide");
            ablkController.clearInputs();
            var newRow = "<tr id='"+response.data.id+"'><td class='tdName'>"+response.data.nombre+"</td><td><button type='button' class='btn msad-table-btnConf ablk-btnConf "+response.data.id+"Name "+response.data.id+"id' data-dti='"+response.data.id+"' data-dtn='"+response.data.nombre+"'><span class='fa fa-gears'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel ablk-btnDel "+response.data.id+"id' data-dti='"+response.data.id+"'><span class='fa fa-trash-o'></span></button></td></tr>";
            $("#ablk-table tbody").append(newRow);
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
            $("#ablk-modal").modal("hide");
            ablkController.clearInputs();
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
      $(".ablkInp").val("");
   },

   selectFile : function($input){
      var exts = new Array(".png", ".jpg", "jpeg", ".PNG", ".JPG", ".JPEG");
      var $file = $input;
      var maxMegas = 2;
      if ($file.val() != ""){
         if(Curiosity.file.validExtension($file.val(), exts)){
            var files = Curiosity.file.validSize($file.attr("id"), maxMegas);
            if (files != null){
               $("#ablk_logoName").val(files.name);
            }
            else{
               $("#ablk_logoName").val("");
               $file.val("");
               Curiosity.noty.warning("El archivo excede los "+maxMegas+" MB máximos permitidos", "Demasiado grande");
            }
         }
         else{
            $file.val("");
            Curiosity.noty.info("Selecciona un archivo de imagen PNG, JPG, JPEG", "Formato invalido");
         }
      }
   }

}
