var aempController = {

   typeOfSave     : "save",
   formulary      : null,
   formularyFile  : null,
   id             : null,
   photo          : null,
   data           : null,

   getPositions : function(){
      Curiosity.toastLoading.show();
      Position.all("POST", this.makePositionsList);
   },

   makePositionsList : function(response){
      if (response.length > 0){
         $.each(response, function(index, obj) {            
            $("#aemp_posSel").append("<option value="+obj.id+">"+obj.nombre+"</option>");
         });
         $("#aemp_posSel").trigger('change');
      }
      else{
         $("#aemp-btnNew").hide();
         Curiosity.noty.info("No hay puestos registrados.", "Mensaje informativo");
      }
      Curiosity.toastLoading.hide();
   },

   getEmployees : function(idEmp){
      Curiosity.toastLoading.show();
      Employee.any(idEmp, "POST", this.makeEmployeeList, "getByPosition");
   },

   makeEmployeeList : function(response){
      $("#aemp-table tbody").html("");
      if (response.length > 0){
         $.each(response, function(index, obj) {
            var row = "<tr id='"+obj.id+"'>"+
               "<td class='tdName'> "+obj.nombre+" "+obj.apellidos+" </td>"+
               "<td class='tdEmail'> "+obj.correo+" </td>"+
               "<td>"+
                  "<button type='button' class='btn msad-table-btnConf aemp-btnConf' data-aemp='"+JSON.stringify(obj)+"'>"+
                     "<span class='fa fa-gears'></span>"+
                  "</button>"+
                  "<button type='button' class='btn btn-outline-default msad-table-btnDel aemp-btnDel' data-aemp='"+JSON.stringify(obj)+"'>"+
                     "<span class='fa fa-trash-o'></span>"+
                  "</button>"+
               "</td>"+
            "</tr>";
            $("#aemp-table tbody").prepend(row);
         });
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
               $("#aemp_ph").attr("src", url);
               $("#aemp-resetPhoto").show();
               $("#aemp-resetPhoto").addClass('animated fadeIn');
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
      $("#aemp_ph").attr("src", this.photo);
      $("#aemp_photo").val("");
      $("#aemp-resetPhoto").hide();
   },

   save : function(){
      this.formulary.validate({
         rules : {
            aemp_name  : {required:true, maxlength:50},
            aemp_lName : {required:true, maxlength:100},
            aemp_email : {maxlength:100, email:true},
            aemp_genre : {required:true},
            aemp_phone : {required:true, maxlength:13, minlength:7},
            aemp_posSel: {required:true}
         }
      });
      if (this.formulary.valid()){
         var formData = new FormData(this.formularyFile[0]);
         formData.append("nombre", $("#aemp_name").val());
         formData.append("apellidos", $("#aemp_lName").val());
         formData.append("correo", $("#aemp_email").val());
         formData.append("sexo", $("#aemp_genre").val());
         formData.append("telefono", $("#aemp_phone").val());
         formData.append("puesto", $("#aemp_posSel").val());
         var emp = new Employee(formData);
         $("#aemp-save").prop('disabled', true);
         Curiosity.toastLoading.show();
         switch (this.typeOfSave) {
            case "save":
               emp.save("POST", this.success);
               break;
            case "update":
                  emp.update(this.id, "POST", this.success);
               break;
            default:
               Curiosity.noty.error("Consulte al administrador", "Error desconocido");
               break;
         }
      }
   },

   delete : function(){
      var $title = "Eliminar Empleado";
      var $text = "¿Estas seguro que deseas eliminar el empleado selecccionado?";
      var $type = "warning";
      var $id = this.id;
      Curiosity.notyConfirm($title, $text, $type, function(){ aempController.deleteIn($id); });
   },

   deleteIn : function($id){
      Curiosity.toastLoading.show();
      Employee.delete($id, "POST", this.success);
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
      $("#aemp-save").prop('disabled', false);
   },

   clearInputs : function(){
      this.photo = this.photoUrl +""+ this.photoDef;
      this.resetImage();
      $(".aempInp").val("");
   },

   fillInputs : function(){
      console.log(this.data);
      $("#aemp_name").val(this.data.nombre);
      $("#aemp_lName").val(this.data.apellidos);
      $("#aemp_email").val(this.data.correo);
      $("#aemp_genre").val(this.data.sexo);
      $("#aemp_phone").val(this.data.telefono);
      $("#aemp_ph").attr('src', this.photoUrl +""+ this.data.foto);
   }

}
