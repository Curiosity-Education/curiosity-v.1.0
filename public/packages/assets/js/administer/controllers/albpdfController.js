var albpdfController = {

   typeOfSave : "save",
   formulary : $("#albpdf-form"),
   inputName : $("#albpdf_name"),
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
      $("#albpdf-table tbody").html("");
      if (response.length > 0){
         $.each(response, function(i, obj){
            $("#albpdf_lvlSel").append("<option value='"+obj.id+"'>"+obj.nombre+"</option>");
         });
         $("#albpdf_lvlSel").trigger("change");
      }
      else{
         Curiosity.toastLoading.hide();
         $("#albpdf-btnNew").hide();
      }
   },

   getIntelligences : function($level){
      Curiosity.toastLoading.show();
      Intelligence.any({id : $level}, "POST", this.makeIntelligencesList, "getByLevel");
   },

   makeIntelligencesList : function(response){
      $("#albpdf_intSel").html("");
      $("#albpdf_blSel").html("");
      $("#albpdf-table tbody").html("");
      if (response.length > 0){
         $("#albpdf-btnNew").show("slow");
         $.each(response, function(i, obj){
            $("#albpdf_intSel").append("<option value='"+obj.id+"'>"+obj.nombre+"</option>");
         });
         $("#albpdf_intSel").trigger("change");
      }
      else{
         Curiosity.toastLoading.hide();
         $("#albpdf-btnNew").hide("slow");
      }
   },

   getBlocks : function($int){
      Curiosity.toastLoading.show();
      Block.any({id : $int}, "POST", this.makeBlocksList, "getByIntelligent");
   },

   makeBlocksList : function(response){
      $("#albpdf_blSel").html("");
      $("#albpdf-table tbody").html("");
      if (response.length > 0){
         $("#albpdf-btnNew").show("slow");
         $.each(response, function(i, obj){
            $("#albpdf_blSel").append("<option value='"+obj.id+"'>"+obj.nombre+"</option>");
         });
         $("#albpdf_blSel").trigger("change");
      }
      else{
         Curiosity.toastLoading.hide();
         $("#albpdf-btnNew").hide("slow");
      }
   },

   getTopics : function($int){
      Curiosity.toastLoading.show();
      Topic.any({id : $int}, "POST", this.makeTopicsList, "getByBlock");
   },

   makeTopicsList : function(response){
      $("#albpdf_tpSel").html("");
      $("#albpdf-table tbody").html("");
      if (response.length > 0){
         $("#albpdf-btnNew").show("slow");
         $.each(response, function(i, obj){
            $("#albpdf_tpSel").append("<option value='"+obj.id+"'>"+obj.nombre+"</option>");
         });
         $("#albpdf_tpSel").trigger("change");
      }
      else{
         Curiosity.toastLoading.hide();
         $("#albpdf-btnNew").hide("slow");
      }
   },

   getPdfs : function($int){
      Curiosity.toastLoading.show();
      Library_pdf.any({id : $int}, "POST", this.makePdfsList, "getByTopic");
   },

   makePdfsList : function(response){
      $("#albpdf-table tbody").html("");
      $.each(response, function(i, obj){
         var newRow = "<tr id='"+obj.id+"'><td class='tdName'>"+obj.nombre_real+"</td><td><button type='button' class='btn btn-outline-default msad-table-btnDel albpdf-btnDel "+obj.id+"id' data-dti='"+obj.id+"'><span class='fa fa-trash-o'></span></button></td></tr>";
         $("#albpdf-table tbody").append(newRow);
      });
      Curiosity.toastLoading.hide();
   },

   selectFile : function($input){
      var exts = new Array(".pdf");
      var $file = $input;
      var maxMegas = 2;
      if ($file.val() != ""){
         if(Curiosity.file.validExtension($file.val(), exts)){
            var files = Curiosity.file.validSize($file.attr("id"), maxMegas);
            if (files != null){
               $("#albpdf_name").val(files.name);
            }
            else{
               $("#albpdf_name").val("");
               $file.val("");
               Curiosity.noty.warning("El archivo excede los "+maxMegas+" MB máximos permitidos", "Demasiado grande");
            }
         }
         else{
            $file.val("");
            Curiosity.noty.info("Selecciona un archivo PDF", "Formato invalido");
         }
      }
   },

   save : function(){
      switch (this.typeOfSave) {
         case "save":
            this.formulary.validate({
               rules : {
                  albpdf_name : {required:true}
               }
            });
            if (this.formulary.valid()){
               var formData = new FormData($("#albpdf-form")[0]);
               formData.append("tema", $("#albpdf_tpSel").val());
               var pdf = new Library_pdf(formData);
               Curiosity.toastLoading.show();
               pdf.save("POST", this.addSuccess);
            }
            break;
         default:
            alert("error");
            break;
      }
   },

   delete : function(){
      var $title = "Eliminar PDF de este tema";
      var $text = "¿Estas seguro que deseas eliminar el PDF selecccionado?";
      var $type = "warning";
      var $id = this.id;
      Curiosity.notyConfirm($title, $text, $type, function(){ albpdfController.deleteIn($id); });
   },

   deleteIn : function($id){
      Curiosity.toastLoading.show();
      Library_pdf.delete($id, "POST", this.delSuccess);
   },

   addSuccess : function(response){
      Curiosity.toastLoading.hide();
      switch (response.status) {
         case 200:
            Curiosity.noty.success("Registro exitoso", "Bien hecho");
            $("#albpdf-modal").modal("hide");
            albpdfController.clearInputs();
            var newRow = "<tr id='"+response.data.id+"'><td class='tdName'>"+response.data.nombre_real+"</td><td><button type='button' class='btn btn-outline-default msad-table-btnDel albpdf-btnDel "+response.data.id+"id' data-dti='"+response.data.id+"'><span class='fa fa-trash-o'></span></button></td></tr>";
            $("#albpdf-table tbody").append(newRow);
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
      $(".albpdfInp").val("");
   }

}
