var actiController = {

   typeOfSave : "save",
   formulary : $("#acti-form-activity"),
   inputName : $("#acti_name"),
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
      $("#acti-table tbody").html("");
      if (response.length > 0){
         $.each(response, function(i, obj){
            $("#acti_lvlSel").append("<option value='"+obj.id+"'>"+obj.nombre+"</option>");
         });
         $("#acti_lvlSel").trigger("change");
      }
      else{
         Curiosity.toastLoading.hide();
         $("#acti-btnNew").hide();
      }
   },

   getIntelligences : function($level){
      Curiosity.toastLoading.show();
      Intelligence.any({id : $level}, "POST", this.makeIntelligencesList, "getByLevel");
   },

   openModalUpdate:function(element){
       var data = $(element).data('info');
       this.fillInputs(data);
       $("#acti-modal").modal("show");
       this.setTypeOfSave("update");
   },

   showOptionsGame:function(response){
       if(response.lenght > 0){
           var messageDialog = {
               title : "Espera un momento",
               text: "Hemos detectado que esta actividad ya cuenta con un juego, elige la opción que deseas realizar.",
               type: "question"
           }
           Curiosity.notyExtend(messageDialog.title,messageDialog.text,messageDialog.type,{
               leftBtn:"<span class='fa fa-gears'></span> Actualizar",
               leftBtnFn:function(){

               },
               rightBtn:"<span class='fa fa-trash-o'></span> Eliminar",
               rightBtnColor:"#ec2726",
               rightBtnFn:function(){
                   Curiosity.notyInput("Escribe la palabra ELIMINAR para continuar.","text",function(input){
                       if(input == "ELIMINAR")
                           swal({
                               type:"success",
                               title:"El juego ha sido eliminado.",
                           });
                   });
               }
           });
       }
       else{
           $("#acti-game-modal").modal('show');
       }
   },

   openModalGame:function(element){
       var dti = $(element).data('dti');
       $("#acti-form-game").data('dti',dti);
       Activity.any({id : dti}, "POST" , this.showOptionsGame,"has-game");
   },

   makeIntelligencesList : function(response){
      $("#acti_intSel").html("");
      $("#acti_blSel").html("");
      $("#acti-table tbody").html("");
      if (response.length > 0){
         $("#acti-btnNew").show("slow");
         $.each(response, function(i, obj){
            $("#acti_intSel").append("<option value='"+obj.id+"'>"+obj.nombre+"</option>");
         });
         $("#acti_intSel").trigger("change");
      }
      else{
         Curiosity.toastLoading.hide();
         $("#acti-btnNew").hide("slow");
      }
   },

   getBlocks : function($int){
      Curiosity.toastLoading.show();
      Block.any({id : $int}, "POST", this.makeBlocksList, "getByIntelligent");
   },

   makeBlocksList : function(response){
      $("#acti_blSel").html("");
      $("#acti-table tbody").html("");
      if (response.length > 0){
         $("#acti-btnNew").show("slow");
         $.each(response, function(i, obj){
            $("#acti_blSel").append("<option value='"+obj.id+"'>"+obj.nombre+"</option>");
         });
         $("#acti_blSel").trigger("change");
      }
      else{
         Curiosity.toastLoading.hide();
         $("#acti-btnNew").hide("slow");
      }
   },

   getTopics : function($int){
      Curiosity.toastLoading.show();
      Topic.any({id : $int}, "POST", this.makeTopicsList, "getByBlock");
   },

   makeTopicsList : function(response){
      $("#acti_tpSel").html("");
      $("#acti-table tbody").html("");
      if (response.length > 0){
         $("#acti-btnNew").show("slow");
         $.each(response, function(i, obj){
            $("#acti_tpSel").append("<option value='"+obj.id+"'>"+obj.nombre+"</option>");
         });
         $("#acti_tpSel").trigger("change");
      }
      else{
         Curiosity.toastLoading.hide();
         $("#acti-btnNew").hide("slow");
      }
   },

   getActivities : function($int){
      Curiosity.toastLoading.show();
      Activity.any({id : $int}, "POST", this.makeActivityList, "getByTopic");
   },

   makeActivityList : function(response){
      $("#acti-table tbody").html("");
      $.each(response, function(i, data){
         var newRow = "<tr id='"+data.id+"'><td class='tdName'>"+data.nombre+"</td><td><button type='button' class='btn btn-outline-default msad-table-btnDel acti-btnGame "+data.id+"id' data-dti='"+data.id+"'><span class='fa fa-gamepad'></span></button><button type='button' class='btn msad-table-btnConf acti-btnConf' data-info='"+JSON.stringify(data)+"' data-dti='"+data.id+"' data-dtn='"+data.nombre+"'><span class='fa fa-gears'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel acti-btnDel "+data.id+"id' data-dti='"+data.id+"'><span class='fa fa-trash-o'></span></button></td></tr></td></tr>";
         $("#acti-table tbody").append(newRow);
      });
      Curiosity.toastLoading.hide();
   },

   selectFile : function($input,exts,idInput){
      var $file = $input;
      if ($file.val() != ""){
         if(Curiosity.file.validExtension($file.val(), exts)){
            var files = Curiosity.file.validSize($file.attr("id"), 2048000);
            if (files != null){
               $(idInput).val(files.name);
            }
            else{
               $file.val("");
               Curiosity.noty.warning("El archivo excede los 2 MB máximos permitidos", "Demasiado grande");
            }
         }
         else{
            $file.val("");
            Curiosity.noty.info("Selecciona un archivo ZIP", "Formato invalido");
         }
      }
   },

   save : function(){
      switch (this.typeOfSave) {
         case "save":
            this.formulary.validate({
               rules : {
                  acti_name : {required:true},
                  acti_wallpaper : {required:true},
                  acti_estatus : {required:true}
               }
            });
            if (this.formulary.valid()){
               var formData = new FormData(this.formulary[0]);
               formData.append("tema", $("#acti_tpSel").val());
               var activity = new Activity(formData);
               Curiosity.toastLoading.show();
               activity.save("POST", this.addSuccess);
            }
            break;
        case "update":
            this.formulary.validate({
               rules : {
                  acti_name : {required:true},
                  acti_wallpaper : {required:true},
                  acti_estatus : {required:true}
               }
            });
            if (this.formulary.valid()){
               var formData = new FormData(this.formulary[0]);
               formData.append("tema", $("#acti_tpSel").val());
               var activity = new Activity(formData);
               Curiosity.toastLoading.show();
               activity.update($("#acti_name").data('id'),"POST", this.updSuccess);
            }
            break;
         default:
            alert("error");
            break;
      }
   },

    saveGame : function(){
      var formGame = $('#acti-form-game');
      switch (this.typeOfSave) {
         case "save":
            this.formulary.validate({
               rules : {
                  game : {required:true}
               }
            });
            if (this.formulary.valid()){

               var formData = new FormData(formGame[0]);
               formData.append("activity_id",formGame.data('dti'));
               var game = new Game(formData);
               Curiosity.toastLoading.show();
               game.save("POST", this.saveGameSuccess);
            }
            break;
        case "update":
            this.formulary.validate({
               rules : {
                  acti_name : {required:true},
                  acti_wallpaper : {required:true},
                  acti_estatus : {required:true}
               }
            });
            if (this.formulary.valid()){
               var formData = new FormData(this.formulary[0]);
               formData.append("tema", $("#acti_tpSel").val());
               var activity = new Activity(formData);
               Curiosity.toastLoading.show();
               activity.update($("#acti_name").data('id'),"POST", this.updSuccess);
            }
            break;
         default:
            alert("error");
            break;
      }
   },



   delete : function(){
      var $title = "Eliminar actividad de este tema";
      var $text = "¿Estas seguro que deseas eliminar la actividad selecccionada?";
      var $type = "question";
      var $id = this.id;
      Curiosity.notyConfirm($title, $text, $type, function(){ actiController.deleteIn($id); });
   },

   deleteIn : function($id){
      Curiosity.toastLoading.show();
      $("#"+$id).hide();
      Activity.delete($id, "POST", this.delSuccess);
   },

   addSuccess : function(response){
      Curiosity.toastLoading.hide();
      switch (response.status) {
         case 200:
            Curiosity.noty.success("Registro exitoso", "Bien hecho");
            $("#acti-modal").modal("hide");
            actiController.clearInputs();
            var newRow = "<tr id='"+response.data.id+"'><td class='tdName'>"+response.data.nombre+"</td><td><button type='button' class='btn msad-table-btnConf' data-info='"+JSON.stringify(response.data)+"' data-dti='"+response.data.id+"' data-dtn='"+response.data.nombre+"'><span class='fa fa-gears'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel acti-btnDel "+response.data.id+"id' data-dti='"+response.data.id+"'><span class='fa fa-trash-o'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel acti-btnDel "+response.data.id+"id' data-dti='"+response.data.id+"'><span class='fa fa-gamepad'></span></button></td></tr></td></tr>";
            $("#acti-table tbody").append(newRow);
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

   saveGameSuccess : function(response){
        Curiosity.toastLoading.hide();
        switch (response.status) {
            case 200:
                Curiosity.noty.success("El juego ha sido guardado con exito","Bien hecho");
                $("#acti-game-modal").modal('hide');
                break;
            case 'CU-103':
                Curiosity.noty.warning("Los datos que intentaste guardar ya existen","Atención");
                break;
            case 'CU-104':
                $.each(response.data,function(index,value){
                    $.each(value,function(i,message){
                        Curiosity.noty.warning(message,"Algo va mal");
                    });
                });
                break;
            default:
                Curiosity.noty.error("Consulta con el administrador","Error desconocido");
                break;
        }
   },

    updSuccess : function(response){
      Curiosity.toastLoading.hide();
      switch (response.status) {
         case 200:
            Curiosity.noty.success("Actualización exitosa", "Bien hecho");
            $("#acti-modal").modal("hide");
            $("#acti_tpSel").trigger('change');
            actiController.clearInputs();
            $("#"+response.data.id+" .tdName").html(response.data.nombre);
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
        $("#"+response.data.id).show();
          console.log(response);
         Curiosity.noty.error("Consulta con el administrador", "Error desconocido");
      }
   },

   fillInputs:function(data){
      $("#acti_name").data('id',data.id);
      $("#acti_name").val(data.nombre);
      $("#acti_name").data('compare',data.nombre);
      $("#acti_name_wallpaper").val(data.wallpaper);
      $("#acti_name_wallpaper").data('compare',data.wallpaper);
      $("#acti_estatus").data('compare',data.estatus);
      Curiosity.select.id = "#acti_estatus";
      Curiosity.select.val(data.estatus);

   },

   clearInputs : function(){
      $(".actiInp").val("");
   }

}
