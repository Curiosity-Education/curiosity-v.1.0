class Avatar extends CORM {
    constructor(name, intelligence){
        super();
        this.avatar = {
           nombre : name,
           inteligencia : intelligence
        }
        super.setPrefix('/admin-avatar');
    }
    save(method,success){
        super.save(this.avatar,method,success);
    }
    update(id,method,success){
        this.avatar.id = id;
        super.update(this.avatar,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/admin-avatar');
    }
    static all(method,success){
        super.all(method,success,'/avatar');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/avatar');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/avatar',pathRoute);
   }
}
