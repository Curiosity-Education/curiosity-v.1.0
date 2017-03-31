class ChildrenHome extends CORM {
    constructor(formData){
        super();
        this.sponsored = formData;
        super.setPrefix('/admin-godhouses');
    }
    save(success){
      super.save(this.sponsored,Curiosity.methodSend.POST,success);
    }
    update(id,method,success){
        this.sponsored.append('id', id);
        super.update(this.sponsored,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/admin-godhouses');
    }
    static any(data,success,pathRoute){
      super.any(data,Curiosity.methodSend.POST,success,'/admin-godhouses',pathRoute);
   }
}
