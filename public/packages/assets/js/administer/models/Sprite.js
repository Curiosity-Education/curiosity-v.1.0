class Sprite extends CORM {
    constructor(name, intelligence){
        super();
        this.sprite = {
           nombre : name,
           inteligencia : intelligence
        }
        super.setPrefix('/admin-sprite');
    }
    save(method,success){
        super.save(this.sprite,method,success);
    }
    update(id,method,success){
        this.sprite.id = id;
        super.update(this.sprite,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/admin-sprite');
    }
    static all(method,success){
        super.all(method,success,'/sprite');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/sprite');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/sprite',pathRoute);
   }
}
