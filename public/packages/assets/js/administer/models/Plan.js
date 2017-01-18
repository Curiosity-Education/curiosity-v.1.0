class Plan extends CORM {
    constructor(plan){
        super();
        this.plan = plan;
        super.setPrefix('/plans-admin');
    }
    save(method,success){
        super.save(this.plan,method,success);
    }
    update(id,method,success){
        this.plan.id = id;
        super.update(this.plan,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/plans-admin');
    }
    static all(method,success){
        super.all(method,success,'/plans-admin');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/plans-admin');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/plans-admin',pathRoute);
   }
}
