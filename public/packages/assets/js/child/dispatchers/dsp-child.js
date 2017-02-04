$(function(){
   Sprite.any(null, "POST", function(r){ StorageDB.table.create("spritesChild", r); }, "getByAvatarForChild");
   Secuence.all("POST", function(r){ StorageDB.table.create("secuences", r); });

   var sprites = StorageDB.table.getData("spritesChild");
   var secuences = StorageDB.table.getData("secuences");
   var secuenceHi = StorageDB.table.getByAttr("secuences", "nombre", "saludar");
   var saludo = StorageDB.table.getByAttr("spritesChild", "secuencia_id", secuenceHi[0].id);
   var animation = new SpriteAnimator('childMenu-avatarContainerDiv', saludo[0].widthFrame, saludo[0].heightFrame, saludo[0].framesX, saludo[0].framesY, saludo[0].fps);
   animation.spreetsheet = "/packages/assets/media/images/avatar/sprites"+saludo[0].folder+saludo[0].imagen;
   setInterval(function(){ animation.play(); }, animation.speed);

   Level.any(null, "POST", function(r){ StorageDB.table.create("levels", r);}, "getWithActivities");
   Intelligence.any(null, "POST", function(r){ StorageDB.table.create("intelligences", r);}, "getWithActivities");
   Block.any(null, "POST", function(r){ StorageDB.table.create("blocks", r);}, "getWithActivities");
   Topic.any(null, "POST", function(r){ StorageDB.table.create("topics", r);}, "getWithActivities");
   Activity.all("POST", function(r){ StorageDB.table.create("activities", r);});

});
