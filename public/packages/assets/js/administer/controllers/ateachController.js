var ateachController = {

   typeOfSave     : "save",
   formulary      : null,
   formularyFile  : null,
   inputName      : null,
   id             : null,
   photoUrl       : null,
   photo          : null,
   photoDef       : null,
   photoImg       : null,
   data           : null,

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
                  ateach_name : {required:true, maxlength:50},
                  ateach_lName : {required:true, maxlength:250},
                  ateach_email : {required:true, maxlength:100, email:true},
                  ateach_school : {required:true}
               }
            });
            if (this.formulary.valid()){
               var formData = new FormData(this.formularyFile[0]);
               formData.append("nombre", $("#ateach_name").val());
               formData.append("apellidos", $("#ateach_lName").val());
               formData.append("email", $("#ateach_email").val());
               formData.append("escuela", $("#ateach_school").val());
               var th = new Teacher(formData);
               Curiosity.toastLoading.show();
               th.save("POST", this.success);
            }
            break;
         case "update":
            this.formulary.validate({
               rules : {
                  ateach_name : {required:true, maxlength:50},
                  ateach_lName : {required:true, maxlength:250},
                  ateach_email : {required:true, maxlength:100, email:true},
                  ateach_school : {required:true}
               }
            });
            if (this.formulary.valid()){
               var formData = new FormData(this.formularyFile[0]);
               formData.append("nombre", $("#ateach_name").val());
               formData.append("apellidos", $("#ateach_lName").val());
               formData.append("email", $("#ateach_email").val());
               formData.append("escuela", $("#ateach_school").val());
               var th2 = new Teacher(formData);
               Curiosity.toastLoading.show();
               th2.update(this.id, "POST", this.success);
            }
            break;
         default:
            Curiosity.noty.error("Consulte al administrador", "Error desconocido");
            break;
      }
   },

   delete : function(){
      var $title = "Eliminar Profesor";
      var $text = "¿Estas seguro que deseas eliminar el Profesor selecccionado?";
      var $type = "warning";
      var $id = this.id;
      Curiosity.notyConfirm($title, $text, $type, function(){ ateachController.deleteIn($id); });
   },

   deleteIn : function($id){
      Curiosity.toastLoading.show();
      Teacher.delete($id, "POST", this.success);
   },

   success : function(response){
      switch (response.status) {
         case 200:
            window.location.reload();
            break;
         case "CU-103":
            Curiosity.toastLoading.hide();
            Curiosity.noty.warning("Los datos que intentas guardar ya exiten", "Atención");
            break;
         case "CU-104":
            Curiosity.toastLoading.hide();
            $.each(response.data, function(index, value){
              $.each(value, function(i, message){
                  Curiosity.noty.warning(message, "Algo va mal");
              });
            });
            break;
         case 401:
            Curiosity.toastLoading.hide();
            Curiosity.noty.error("Lo sentimos no cuentas con los permisos suficientes para realizar esta acción", "Error 401");
            break;
         default:
            Curiosity.toastLoading.hide();
            Curiosity.noty.error("Consulta con el administrador", "Error desconocido");
            break;
      }
   },

   clearInputs : function(){
      this.photo = this.photoUrl +""+ this.photoDef;
      this.resetImage();
      $(".ateachInp").val("");
   },

   fillInputs : function(){
      $("#ateach_name").val(this.data.nombre);
      $("#ateach_lName").val(this.data.apellidos);
      $("#ateach_email").val(this.data.email);
      $("#ateach_school").val(this.data.escuelaId);
      this.photoImg.attr('src', this.photoUrl +""+ this.data.foto);
   }

}
