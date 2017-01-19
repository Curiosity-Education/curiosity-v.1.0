class ItemGroup extends CORM {
    constructor(name, intelligence){
        super();
        this.itemGroup = {
           nombre : name,
           inteligencia : intelligence
        }
        super.setPrefix('/admin-itemGroup');
    }
    save(method,success){
        super.save(this.itemGroup,method,success);
    }
    update(id,method,success){
        this.itemGroup.id = id;
        super.update(this.itemGroup,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/admin-itemGroup');
    }
    static all(method,success){
        super.all(method,success,'/itemGroup');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/itemGroup');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/itemGroup',pathRoute);
   }
}
