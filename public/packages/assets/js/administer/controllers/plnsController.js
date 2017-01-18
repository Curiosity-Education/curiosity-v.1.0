var plnsController = {

   prefix:"plns",
   typeOfSave : "save",
   formulary : $("#plns-form"),
   rulesFormulary:{
       rules:{
           plns_name : {required:true},
           plns_amount : {required:true,digits:true},
           plns_currency : {required:true},
           plns_freeTrialDays : {digits:true},
           plns_interval : {required:true},
           plns_price : {required:true,digits:true},
       }
   },
   data:function(){
        var nameToLowerCase = $("#plns_name").val().toLowerCase();
        var reference = nameToLowerCase.replace(" ","_");
        reference = Curiosity.getCleanedString(reference);
        return {
            'name':$("#plns_name").val(),
            'amount':$("#plns_amount").val(),
            'limit':$("#plns_limit").val(),
            'reference': reference,
            'currency':$("#plns_currency").val(),
            'trial_period_days':$("#plns_freeTrialDays").val(),
            'price':$("#plns_price").val(),
            'interval':$("#plns_interval").val()
        }
   },
   id : null,

   openModalUpdate:function(element){
        plnsController.setTypeOfSave("update");
        $("#"+plnsController.prefix+"-modal").modal("show");
        plnsController.fillInputs($(element).data('info'));
   },

   setTypeOfSave : function(type){
      this.typeOfSave = type;
   },

   setId : function(id){
      this.id = id;
   },

   getPlans : function(){
      Curiosity.toastLoading.show();
      Plan.any(null, Curiosity.methodSend.POST , this.makePlansList, "all");
   },

   save : function(){
      switch (this.typeOfSave) {
         case "save":
            plnsController.formulary.validate(plnsController.rulesFormulary);
            if (plnsController.formulary.valid()){
               var plan = new Plan(this.data());
               Curiosity.toastLoading.show();
               plan.save(Curiosity.methodSend.POST, this.addSuccess);
            }
            break;
         case "update":
            plnsController.formulary.validate(plnsController.rulesFormulary);
            if (plnsController.formulary.valid()){
               var plan = new Plan(this.data());
               Curiosity.toastLoading.show();
               plan.update(plnsController.id.id, Curiosity.methodSend.POST, this.updSuccess);
            }
            break;
         default:
            alert("error");
            break;
      }
   },

   delete : function(){
      var $title = "Eliminar Plan";
      var $text = "¿Estas seguro que deseas eliminar el plan selecccionado?";
      var $type = "warning";
      var $id = this.id;
      Curiosity.notyConfirm($title, $text, $type, function(){ plnsController.deleteIn($id); });
   },

   deleteIn : function($id){
      Curiosity.toastLoading.show();
      Plan.delete($id, Curiosity.methodSend.POST, this.delSuccess);
   },

    makePlansList : function(response){
        $("#"+this.prefix+"-table tbody").html("");

        $.each(response, function(i, data){
            var newRow = "<tr id='"+data.id+"'><td class='tdName'>"+data.name+"</td><td><button type='button' class='btn msad-table-btnConf "+plnsController.prefix+"-btnConf "+data.id+"Name "+data.id+"id' data-info='"+JSON.stringify(data)+"' data-dti='"+data.id+"' data-reference='"+data.reference+"' data-dtn='"+data.nombre+"'><span class='fa fa-gears'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel "+plnsController.prefix+"-btnDel "+data.id+"id' data-reference='"+data.reference+"' data-dti='"+data.id+"'><span class='fa fa-trash-o'></span></button></td></tr>";
            $("#"+plnsController.prefix+"-table tbody").append(newRow);
        });
        Curiosity.toastLoading.hide();
   },

   addSuccess : function(response){
      Curiosity.toastLoading.hide();
      switch (response.status) {
         case 200:
            Curiosity.noty.success("Registro exitoso", "Bien hecho");
            $("#"+plnsController.prefix+"-modal").modal("hide");
            plnsController.clearInputs();
            var newRow = "<tr id='"+response.data.id+"'><td class='tdName'>"+response.data.name+"</td><td><button type='button' class='btn msad-table-btnConf "+this.prefix+"-btnConf "+response.data.id+"Name "+response.data.id+"id' data-info='"+JSON.stringify(response.data)+"' data-reference='"+response.data.reference+"' data-dti='"+response.data.id+"' data-dtn='"+response.data.nombre+"'><span class='fa fa-gears'></span></button><button type='button' class='btn btn-outline-default msad-table-btnDel "+plnsController.prefix+"-btnDel "+response.data.id+"id' data-reference='"+response.data.reference+"' data-dti='"+response.data.id+"'><span class='fa fa-trash-o'></span></button></td></tr>";
            $("#"+plnsController.prefix+"-table tbody").append(newRow);
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
            Curiosity.noty.error("Consulta con el administrador", "Error desconocido");
            break;
      }
   },

   updSuccess : function(response){
      Curiosity.toastLoading.hide();
      switch (response.status) {
         case 200:
            Curiosity.noty.success("Actualización exitosa", "Bien hecho");
            $("#"+plnsController.prefix+"-modal").modal("hide");
            plnsController.clearInputs();
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

    fillInputs:function(data){
      $("#plns_name").data('id',data.id);
      $("#plns_name").data('reference',data.reference);
      $("#plns_name").val(data.name);
      $("#plns_name").data('compare',data.name);
      $("#plns_amount").val(data.amount);
      $("#plns_amount").data('compare',data.amount);
      $("#plns_freeTrialDays").val(data.trial_period_days);
      $("#plns_freeTrialDays").prop('disabled',true);
      $("#plns_freeTrialDays").data('compare',data.trial_period_days);
      Curiosity.select.id = "#plns_interval";
      Curiosity.select.val(data.interval);
      $("#plns_interval").prop('disabled',true);
      Curiosity.select.id = "#plns_currency";
      Curiosity.select.val(data.currency);
      $("#plns_currency").prop('disabled',true);

   },

   clearInputs : function(){
      $("."+plnsController.prefix+"Inp").val("");
   }

}
