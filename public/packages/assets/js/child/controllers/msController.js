var msConstroller = {

   levels : [],
   intelligences : [],
   blocks : [],
   topics : [],
   activities : [],

   getLevels : function(){
      this.levels = StorageDB.table.getData("levels");
      this.makeCard(this.levels, "level");
   },

   makeCard : function($obj, type, objRef, typeRef){
      $("#ms-conteiner-all > div").html("");
      if (type != "level"){
         var code = "<div class='col-xs-12'><div class='chip animated bounce' id='ms-back' style='cursor:pointer;'><img src='/packages/assets/media/images/system/iconBack.png'> Regresar </div></div>";
         $("#ms-conteiner-all > div").append(code);
      }
      $.each($obj, function(index, obj) {
   		var code = "<div class='col-md-4 col-sm-4'>"+
   			"<div class='card card-game hm-black-light ms-card animated zoomIn'>"+
   				"<div class='view mask'>"+
   					"<div class='ms-bannerWhitOut'></div>"+
   					"<a href='#'>"+
   						"<div class='mask'></div>"+
   					"</a>"+
   				"</div>"+
   				"<div class='card-block text-center'>"+
   					"<h5 class='card-title'>"+obj.nombre+"</h5>"+
   					"<a class='btn ms-btn-info btn-rounded ms-btnAccess' data-name='"+type+"' data-obj='"+JSON.stringify(obj)+"'>Entrar</a>"+
   				"</div>"+
   			"</div>"+
   		"</div>";
   		$("#ms-conteiner-all > div").append(code);
   	});
      $("#ms-conteiner-all > div").find('#ms-back').data("type", typeRef);
      $("#ms-conteiner-all > div").find('#ms-back').data("obj", objRef);
   },

   getIntelligences : function(level){
      this.intelligences = StorageDB.table.getByAttr("intelligences", "nivel_id", level["id"]);
      this.makeCard(this.intelligences, "intelligence", null, "level");
   },

   getBlocks : function(intelligence){
      this.blocks = StorageDB.table.getByAttr("blocks", "inteligencia_id", intelligence["id"]);
      this.makeCard(this.blocks, "block", intelligence, "intelligence");
   },

   getActivities : function(block){
      console.log(StorageDB.table.getData("activities"));
      this.topics = StorageDB.table.getByAttr("topics", "bloque_id", block["id"]);
      var acts = new Array();
      $.each(this.topics, function(index, obj) {
         this.activities = StorageDB.table.getByAttr("activities", "tema_id", obj["id"]);
         acts.push(this.activities);
      });
      console.log(acts);
   }

}