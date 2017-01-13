var ateachController = {

   typeOfSave : "save",
   formulary : $("#ateach-form"),
   inputName : $("#ateach_name"),
   id : null,
   photo : "/packages/assets/media/images/parents/profile/mom-def.png",
   photoImg : $("#ateach_ph"),
   data : null,

   setPhoto : function(url){
      this.photo = url;
   },

   setData : function ($data){
      this.data = $data;
   },

   setTypeOfSave : function(type){
      this.typeOfSave = type;
   },

   setId : function(id){
      this.id = id;
   },

   getSchools : function(){
      Curiosity.toastLoading.show();
      Schoolasc.any(null, "POST", this.makeSchoolsList, "all");
   },

   makeSchoolsList : function(response){
      if (response.length > 0){
         $.each(response, function(index, obj) {
            $("#ateach_school").append("<option value="+obj.id+">"+obj.nombre+"</option>");
         });
      }
      else{
         Curiosity.noty.info("No hay escuelas registradas.", "Mensaje informativo");
      }
   },

   getTeachers : function(){
      Curiosity.toastLoading.show();
      Teacher.any(null, "POST", this.makeTeachersList, "getWithSchool");
   },

   makeTeachersList : function(response){
      if (response.length > 0){
         var datos = [];
         $.each(response, function(index, obj){
            datos.push({
               'teacher' : obj.nombre+" "+obj.apellidos,
               'school' : obj.escuelaNombre,
               'actions' : "<button type='button' class='btn msad-table-btnConf ateach-btnConf' data-teach='"+JSON.stringify(obj)+"'><span class='fa fa-gears'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel ateach-btnDel' data-teach='"+JSON.stringify(obj)+"'><span class='fa fa-trash-o'></span></button>"
            });
         });
         $('#ateach-table').bootstrapTable({ data : datos });
      }
      Curiosity.toastLoading.hide();
   },

   selectFile : function($input){
      var exts = new Array(".png", ".jpg", "jpeg", "JPEG", "JPG", "PNG");
      var $file = $input;
      var maxMegas = 2;
      if ($file.val() != ""){
         if(Curiosity.file.validExtension($file.val(), exts)){
            var files = Curiosity.file.validSize($file.attr("id"), maxMegas);
            if (files != null){
               var url = Curiosity.makeBlob($file.attr("id"));
               this.photoImg.attr("src", url);
               $("#ateach-resetPhoto").show();
               $("#ateach-resetPhoto").addClass('animated fadeIn');
            }
            else{
               this.resetImage();
               Curiosity.noty.warning("El archivo excede los "+maxMegas+" MB máximos permitidos", "Demasiado grande");
            }
         }
         else{
            $file.val("");
            Curiosity.noty.info("Selecciona un archivo de imagen valido", "Formato invalido");
         }
      }
   },

   resetImage : function(){
      this.photoImg.attr("src", this.photo);
      $("#ateach_photo").val("");
      $("#ateach-resetPhoto").hide();
   },

   save : function(){
      switch (this.typeOfSave) {
         case "save":
            this.formulary.validate({
               rules : {
                  ateach_name : {required:true}
               }
            });
            if (this.formulary.valid()){
               var formData = new FormData($("#ateach-form")[0]);
               formData.append("tema", $("#ateach_tpSel").val());
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
      Curiosity.notyConfirm($title, $text, $type, function(){ ateachController.deleteIn($id); });
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
            $("#ateach-modal").modal("hide");
            ateachController.clearInputs();
            var newRow = "<tr id='"+response.data.id+"'><td class='tdName'>"+response.data.nombre_real+"</td><td><button type='button' class='btn btn-outline-default msad-table-btnDel ateach-btnDel "+response.data.id+"id' data-dti='"+response.data.id+"'><span class='fa fa-trash-o'></span></button></td></tr>";
            $("#ateach-table tbody").append(newRow);
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
      this.photo = "/packages/assets/media/images/parents/profile/mom-def.png";
      this.resetImage();
      $(".ateachInp").val("");
   },

   fillInputs : function(){
      $("#ateach_name").val(this.data.nombre);
      $("#ateach_lastName").val(this.data.apellidos);
      $("#ateach_email").val(this.data.email);
      $("#ateach_school").val(this.data.escuelaId);
      this.photoImg.attr('src', "/packages/assets/media/images/parents/profile/"+this.data.foto);
   }

}
