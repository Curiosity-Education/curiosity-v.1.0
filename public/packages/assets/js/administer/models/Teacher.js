class Teacher extends CORM {
    constructor(formData){
        super();
        this.teacher = formData;
        super.setPrefix('/admin-teacher');
    }
    save(method,success){
      super.save(this.teacher,method,success);
    }
    update(id,method,success){
        this.teacher.append('id', id);
        super.update(this.teacher,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/admin-teacher');
    }
    static all(method,success){
        super.all(method,success,'/teacher');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/teacher');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/teacher',pathRoute);
   }
}
