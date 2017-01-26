var newsCtrl = {

	formADD : $("#nw-formADD"),
	pdf : $("#nw-pdf"),
	formEDIT : $("#nw-formEDIT"),
	pdf_edit : $("#nw-pdf_edit"),

	fileWeight : function($input){
		var exts = new Array(".pdf");
		  var $file = $input;
		  var maxMegas = 2;
		  if ($file.val() != ""){
			 if(Curiosity.file.validExtension($file.val(), exts)){
				var files = Curiosity.file.validSize($file.attr("id"), maxMegas);
				if (files != null){
				   $file.val(files.name);
				}
				else{
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

	save : function(success){
		this.formADD.validate({
			rules:{
				title_new:{
					required:true,
					remote:{
						url:'/news/title',
						type:"POST",
						data:{
							function(){
								return $("#title_new").val();
							}
						} // c-data
					} // c-remote
				}, // c-title
				link:{required:true}
			}, // c-rules
			messages:{
				title_new:{required:'Ingresa un titulo', remote:'Este titulo ya existe'},
				link:{required:'Ingresa el link'}
			} // c-messages
		}); // c-validate

		if(this.formADD.valid()){
			var formData = new FormData(this.formADD[0]);

		}
	},

	update : function(id,success){
		News.update(id,"POST",success);
	},

	delete : function(id,success){
		News.delete(id,"POST",success);
	},

	get : function(success){
		News.get(success);
	},

	title: function(success){
		News.title(success);
	}

};
