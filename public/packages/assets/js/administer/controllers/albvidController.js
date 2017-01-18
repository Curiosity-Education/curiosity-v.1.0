var albvidController = {

   typeOfSave : "save",
   formulary : $("#albvid-formCode"),
   inputName : $("#albvid_posterName"),
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

   getShools : function(){
      Schoolasc.any(null, "POST", this.makeShoolsList, "all");
   },

   makeShoolsList : function(response){
      if (response.length > 0){
         $.each(response, function(i, obj){
            $("#albvid_school").append("<option value='"+obj.id+"'>"+obj.nombre+"</option>");
         });
         $("#albvid_school").trigger("change");
      }
      else {
         $("#albvid_school").css('color', 'rgba(255, 0, 0, 0.68)');
         $("#albvid_school").append("<option>No hay escuelas</option>");
         $("#albvid_teacher").css('color', 'rgba(255, 0, 0, 0.68)');
         $("#albvid_teacher").append("<option>No hay profesores</option>");
      }
   },

   getTeachers : function($id){
      Teacher.any($id, "POST", this.makeTeachersList, "getBySchool");
   },

   makeTeachersList : function(response){
      $("#albvid_teacher").html("");
      $("#albvid_teacher").prop('disabled', true);
      $("#albvid_teacher").css('color', 'rgba(0, 0, 0, 0.7)');
      if (response.length > 0){
         $.each(response, function(i, obj){
            $("#albvid_teacher").append("<option value='"+obj.id+"'>"+obj.nombre+" "+obj.apellidos+"</option>");
         });
      }
      else {
         $("#albvid_teacher").css('color', 'rgba(255, 0, 0, 0.68)');
         $("#albvid_teacher").append("<option>No hay profesores</option>");
      }
      $("#albvid_teacher").prop('disabled', false);
   },

   makeLevelsList : function(response){
      $("#albvid-table tbody").html("");
      if (response.length > 0){
         $.each(response, function(i, obj){
            $("#albvid_lvlSel").append("<option value='"+obj.id+"'>"+obj.nombre+"</option>");
         });
         $("#albvid_lvlSel").trigger("change");
      }
      else{
         Curiosity.toastLoading.hide();
         $("#albvid-btnNew").hide();
      }
   },

   getIntelligences : function($level){
      Curiosity.toastLoading.show();
      Intelligence.any({id : $level}, "POST", this.makeIntelligencesList, "getByLevel");
   },

   makeIntelligencesList : function(response){
      $("#albvid_intSel").html("");
      $("#albvid_blSel").html("");
      $("#albvid-table tbody").html("");
      if (response.length > 0){
         $("#albvid-btnNew").show("slow");
         $.each(response, function(i, obj){
            $("#albvid_intSel").append("<option value='"+obj.id+"'>"+obj.nombre+"</option>");
         });
         $("#albvid_intSel").trigger("change");
      }
      else{
         Curiosity.toastLoading.hide();
         $("#albvid-btnNew").hide("slow");
      }
   },

   getBlocks : function($int){
      Curiosity.toastLoading.show();
      Block.any({id : $int}, "POST", this.makeBlocksList, "getByIntelligent");
   },

   makeBlocksList : function(response){
      $("#albvid_blSel").html("");
      $("#albvid-table tbody").html("");
      if (response.length > 0){
         $("#albvid-btnNew").show("slow");
         $.each(response, function(i, obj){
            $("#albvid_blSel").append("<option value='"+obj.id+"'>"+obj.nombre+"</option>");
         });
         $("#albvid_blSel").trigger("change");
      }
      else{
         Curiosity.toastLoading.hide();
         $("#albvid-btnNew").hide("slow");
      }
   },

   getTopics : function($int){
      Curiosity.toastLoading.show();
      Topic.any({id : $int}, "POST", this.makeTopicsList, "getByBlock");
   },

   makeTopicsList : function(response){
      $("#albvid_tpSel").html("");
      $("#albvid-table tbody").html("");
      if (response.length > 0){
         $("#albvid-btnNew").show("slow");
         $.each(response, function(i, obj){
            $("#albvid_tpSel").append("<option value='"+obj.id+"'>"+obj.nombre+"</option>");
         });
         $("#albvid_tpSel").trigger("change");
      }
      else{
         Curiosity.toastLoading.hide();
         $("#albvid-btnNew").hide("slow");
      }
   },

   getVideos : function($int){
      Curiosity.toastLoading.show();
      Library_video.any({id : $int}, "POST", this.makeVideosList, "getByTopic");
   },

   makeVideosList : function(response){
      $("#albvid-table tbody").html("");
      $.each(response, function(i, obj){
         var newRow = "<tr id='"+obj.id+"'><td class='tdEmbed'>"+obj.embed+"</td><td><button type='button' class='btn msad-table-btnConf albvid-btnConf "+obj.id+"obj' data-vid='"+JSON.stringify(obj)+"'><span class='fa fa-gears'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel albvid-btnPlay "+obj.id+"obj' data-vid='"+JSON.stringify(obj)+"'><span class='fa fa-youtube-play'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel albvid-btnDel "+obj.id+"obj' data-vid='"+JSON.stringify(obj)+"'><span class='fa fa-trash-o'></span></button></td></tr>";
         $("#albvid-table tbody").prepend(newRow);
      });
      Curiosity.toastLoading.hide();
   },

   selectFile : function($input){
      var exts = new Array(".png", ".jpg", ".jpeg", ".PNG", ".JPG", ".JPEG");
      var $file = $input;
      var maxMegas = 2;
      if ($file.val() != ""){
         if(Curiosity.file.validExtension($file.val(), exts)){
            var files = Curiosity.file.validSize($file.attr("id"), maxMegas);
            if (files != null){
               $("#albvid_posterName").val(files.name);
            }
            else{
               $("#albvid_posterName").val("");
               $file.val("");
               Curiosity.noty.warning("El archivo excede los "+maxMegas+" MB máximos permitidos", "Demasiado grande");
            }
         }
         else{
            $file.val("");
            $("#albvid_posterName").val("");
            Curiosity.noty.info("Selecciona un archivo video", "Formato invalido");
         }
      }
   },

   save : function(){
      switch (this.typeOfSave) {
         case "save":
            this.formulary.validate({
               rules : {
                  albvid_link : {required:true},
                  albvid_school : {required:true},
                  albvid_teacher : {required:true}
               }
            });
            if (this.formulary.valid()){
               var formData = new FormData($("#albvid-form")[0]);
               formData.append("tema", $("#albvid_tpSel").val());
               formData.append("profesor", $("#albvid_teacher").val());
               formData.append("embed", $("#albvid_link").val());
               var video = new Library_video(formData);
               Curiosity.toastLoading.show();
               video.save("POST", this.addSuccess);
            }
            break;
         case "update":
            if ($().val() != ""){
               this.formulary.validate({
                  rules : {
                     albvid_link : {required:true},
                     albvid_school : {required:true},
                     albvid_teacher : {required:true}
                  }
               });
               if (this.formulary.valid()){
                  var formData = new FormData($("#albvid-form")[0]);
                  formData.append("tema", $("#albvid_tpSel").val());
                  formData.append("profesor", $("#albvid_teacher").val());
                  formData.append("embed", $("#albvid_link").val());
                  var video = new Library_video(formData);
                  Curiosity.toastLoading.show();
                  video.update(this.id, "POST", this.updSuccess);
               }
            }
            else{
               Curiosity.noty.warning("Porfavor seleccione una imagen para poster del video", "Poster requerido");
            }
            break;
         default:
            alert("error");
            break;
      }
   },

   delete : function(){
      var $title = "Eliminar video de este tema";
      var $text = "¿Estas seguro que deseas eliminar el video selecccionado?";
      var $type = "warning";
      var $id = this.id;
      Curiosity.notyConfirm($title, $text, $type, function(){ albvidController.deleteIn($id); });
   },

   deleteIn : function($id){
      Curiosity.toastLoading.show();
      Library_video.delete($id, "POST", this.delSuccess);
   },

   addSuccess : function(response){
      Curiosity.toastLoading.hide();
      switch (response.status) {
         case 200:
            Curiosity.noty.success("Registro exitoso", "Bien hecho");
            $("#albvid-modal").modal("hide");
            albvidController.clearInputs();
            var newRow = "<tr id='"+response.data.id+"'><td class='tdEmbed'>"+response.data.embed+"</td><td><button type='button' class='btn msad-table-btnConf albvid-btnConf "+response.data.id+"obj' data-vid='"+JSON.stringify(response.data)+"'><span class='fa fa-gears'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel albvid-btnPlay "+response.data.id+"obj' data-vid='"+JSON.stringify(response.data)+"'><span class='fa fa-youtube-play'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel albvid-btnDel "+response.data.id+"obj' data-vid='"+JSON.stringify(response.data)+"'><span class='fa fa-trash-o'></span></button></td></tr>";
            $("#albvid-table tbody").prepend(newRow);
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
      window.location.reload();
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

   fillInputs : function(obj){
      $("#albvid_link").val(obj.embed);
      $("#albvid_teacher").val(obj.profesor_apoyo_id);
   },

   clearInputs : function(){
      $(".albvidInp").val("");
   }

}
