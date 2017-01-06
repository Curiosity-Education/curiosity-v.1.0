class Block extends CORM {
    constructor(name, intelligence){
        super();
        this.block = {
           nombre : name,
           inteligencia : intelligence
        }
        super.setPrefix('/blocks');
    }
    save(method,success){
        super.save(this.block,method,success);
    }
    update(id,method,success){
        this.block.id = id;
        super.update(this.block,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/blocks');
    }
    static all(method,success){
        super.all(method,success,'/blocks');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/blocks');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/blocks',pathRoute);
   }
}
