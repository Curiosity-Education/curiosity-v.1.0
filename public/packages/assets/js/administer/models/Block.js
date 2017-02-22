class Block extends CORM {
    constructor(formData){
        super();
        this.block = formData;
        super.setPrefix('/blocks');
    }
    save(method,success){
        super.save(this.block,method,success);
    }
    update(id,method,success){
        this.block.append('id', id);
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
 
