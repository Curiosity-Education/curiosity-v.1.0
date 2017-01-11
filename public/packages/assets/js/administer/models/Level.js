class Level extends CORM {
    constructor(name){
        super();
        this.level = { nombre : name }
        super.setPrefix('/levels');
    }
    save(method,success){
        super.save(this.level,method,success);
    }
    update(id,method,success){
        this.level.id = id;
        super.update(this.level,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/levels');
    }
    static all(method,success){
        super.all(method,success,'/levels');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/levels');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/levels',pathRoute);
   }
}
