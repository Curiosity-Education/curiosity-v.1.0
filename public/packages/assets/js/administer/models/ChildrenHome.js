class ChildrenHome extends CORM {
    constructor(formData){
        super();
        this.sponsored = formData;
        super.setPrefix('/admin-godhouses');
    }
    save(success){
      super.save(this.sponsored,Curiosity.methodSend.POST,success);
    }
    /*Default image for child
    /*********************************************************************************************/
    // save_with_default(success){
    //   super.save_with_default( this.sponsored, Curiosity.methodSend.POST, success );
    // }
    /*********************************************************************************************/
    update(id,success){
        this.sponsored.append('id', id);
        super.update(this.sponsored,Curiosity.methodSend.POST,success);
    }
    static delete(id,success){
        super.delete({id:id},Curiosity.methodSend.POST,success,'/admin-godhouses');
    }
    static any(data,success,pathRoute){
      super.any(data,Curiosity.methodSend.POST,success,'/admin-godhouses',pathRoute);
   }
}
