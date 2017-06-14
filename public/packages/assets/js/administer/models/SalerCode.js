class SalerCode extends CORM {
    constructor(trabajador, plan){
        super();
        this.SalerCode = {
           trabajador_id : trabajador,
           plan_id : plan
        }
        super.setPrefix('/admin-salerCode');
    }
    save(method,success){
        super.save(this.SalerCode,method,success);
    }
    update(id,method,success){
        this.SalerCode.id = id;
        super.update(this.SalerCode,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/admin-salerCode');
    }
    static all(method,success){
        super.all(method,success,'/salerCode');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/salerCode');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/salerCode',pathRoute);
   }
}
