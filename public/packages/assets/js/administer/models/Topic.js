class Topic extends CORM {
    constructor(name, block){
        super();
        this.block = {
           nombre : name,
           bloque : block
        }
        super.setPrefix('/topics');
    }
    save(method,success){
        super.save(this.block,method,success);
    }
    update(id,method,success){
        this.block.id = id;
        super.update(this.block,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/topics');
    }
    static all(method,success){
        super.all(method,success,'/topics');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/topics');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/topics',pathRoute);
   }
}
