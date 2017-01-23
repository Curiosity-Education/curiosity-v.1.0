class Employee extends CORM {
    constructor(formData){
        super();
        this.employee = formData;
        super.setPrefix('/admin-employee');
    }
    save(method,success){
      super.save(this.employee,method,success);
    }
    update(id,method,success){
        this.employee.append('id', id);
        super.update(this.employee,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/admin-employee');
    }
    static all(method,success){
        super.all(method,success,'/employee');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/employee');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/employee',pathRoute);
   }
}
