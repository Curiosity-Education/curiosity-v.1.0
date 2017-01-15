var aschController = {

   typeOfSave : "save",
   formulary : $("#asch-form"),
   formulary2 : $("#asch-form2"),
   inputName : $("#asch_name"),
   id : null,

   setTypeOfSave : function(type){
      this.typeOfSave = type;
   },

   setId : function(id){
      this.id = id;
   },

   getSchools : function(){
      Curiosity.toastLoading.show();
      Schoolasc.all("POST", this.makeSchoolList);
   },

   selectFile : function($input){
      var exts = new Array(".png", ".jpg", "jpeg");
      var $file = $input;
      var maxMegas = 2;
      if ($file.val() != ""){
         if(Curiosity.file.validExtension($file.val(), exts)){
            var files = Curiosity.file.validSize($file.attr("id"), maxMegas);
            if (files != null){
               $("#asch_logoName").val(files.name);
            }
            else{
               $("#asch_logoName").val("");
               $file.val("");
               Curiosity.noty.warning("El archivo excede los "+maxMegas+" MB máximos permitidos", "Demasiado grande");
            }
         }
         else{
            $file.val("");
            Curiosity.noty.info("Selecciona un archivo de imagen PNG, JPG, JPEG", "Formato invalido");
         }
      }
   },

   makeSchoolList : function(response){
      $("#asch-table tbody").html("");
      $.each(response, function(i, obj){
         var newRow = "<div class='col-sm-3' id='"+obj.id+"'>"+
            "<div class='view overlay asch-container z-depth-1'>"+
               "<img src='/packages/assets/media/images/schools/"+obj.logotipo+"' class='img-fluid asch"+obj.id+"'>"+
               "<div class='mask flex-center'>"+
                  "<center>"+
                     "<a class='btn-floating btn-small waves-effect waves-light dt"+obj.id+" asch-btnConf' data-asch='"+JSON.stringify(obj)+"'>"+
                        "<i class='fa fa-gears'></i>"+
                     "</a>"+
                     "<a class='btn-floating btn-small waves-effect waves-light dt"+obj.id+" asch-btnDel' data-asch='"+JSON.stringify(obj)+"'>"+
                        "<i class='fa fa-trash-o'></i>"+
                     "</a>"+
                  "</center>"+
               "</div>"+
               "<h6 id='asch"+obj.id+"'>"+obj.nombre+"</h6>"+
            "</div>"+
         "</div>";
         $("#asch-schoolRow").append(newRow);
      });
      Curiosity.toastLoading.hide();
   },

   save : function(){
      switch (this.typeOfSave) {
         case "save":
            this.formulary.validate({
               rules : {
                  asch_logo : {required:true}
               }
            });
            if (this.formulary.valid()){
               if ($("#asch_logoName").val() == null || $("#asch_logoName").val() == "" || $("#asch_logoName").val() == undefined){
                  Curiosity.noty.warning("Es necesario seleccionar un logotipo", "Atención");
               }
               else{
                  var formData = new FormData($("#asch-form")[0]);
                  formData.append("nombre", this.inputName.val());
                  var sc1 = new Schoolasc(formData);
                  Curiosity.toastLoading.show();
                  sc1.save("POST", this.addSuccess);
               }
            }
            break;
         case "update":
            this.formulary.validate({
               rules : { asch_name : {required:true, maxlength:100} }
            });
            if (this.formulary.valid()){
               var formData = new FormData($("#asch-form")[0]);
               formData.append("nombre", this.inputName.val());
               var sc2 = new Schoolasc(formData);
               Curiosity.toastLoading.show();
               sc2.update(this.id, "POST", this.updSuccess);
            }
            break;
         default:
            Curiosity.noty.error("No fue posible realizar la acción. Consulta al administrador", "Error desconocido");
            break;
      }
   },

   delete : function(){
      var $title = "Eliminar Tema";
      var $text = "¿Estas seguro que deseas eliminar el Tema selecccionado?";
      var $type = "warning";
      var $id = this.id;
      Curiosity.notyConfirm($title, $text, $type, function(){ aschController.deleteIn($id); });
   },

   deleteIn : function($id){
      Curiosity.toastLoading.show();
      Schoolasc.delete($id, "POST", this.delSuccess);
   },

   addSuccess : function(response){
      Curiosity.toastLoading.hide();
      switch (response.status) {
         case 200:
            Curiosity.noty.success("Registro exitoso", "Bien hecho");
            $("#asch-modal").modal("hide");
            aschController.clearInputs();
            var newRow = "<div class='col-sm-3' id='"+response.data.id+"'>"+
               "<div class='view overlay asch-container z-depth-1'>"+
                  "<img src='/packages/assets/media/images/schools/"+response.data.logotipo+"' class='img-fluid asch"+response.data.id+"'>"+
                  "<div class='mask flex-center'>"+
                     "<center>"+
                        "<a class='btn-floating btn-small waves-effect waves-light dt"+response.data.id+" asch-btnConf' data-asch='"+JSON.stringify(response.data)+"'>"+
                           "<i class='fa fa-gears'></i>"+
                        "</a>"+
                        "<a class='btn-floating btn-small waves-effect waves-light dt"+response.data.id+" asch-btnDel' data-asch='"+JSON.stringify(response.data)+"'>"+
                           "<i class='fa fa-trash-o'></i>"+
                        "</a>"+
                     "</center>"+
                  "</div>"+
                  "<h6 id='asch"+response.data.id+"'>"+response.data.nombre+"</h6>"+
               "</div>"+
            "</div>";
            $("#asch-schoolRow").append(newRow);
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
            $("#asch-modal").modal("hide");
            aschController.clearInputs();
            $("body").find(".asch"+response.data.id).attr("src", "/packages/assets/media/images/schools/"+response.data.logotipo);
            $("body").find("#asch"+response.data.id).html(response.data.nombre);
            $("body").find(".dt"+response.data.id).data("asch", response.data);
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
      $(".aschInp").val("");
   }

}
