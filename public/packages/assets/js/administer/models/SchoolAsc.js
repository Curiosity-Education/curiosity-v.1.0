class Schoolasc extends CORM {
    constructor(formData){
        super();
        this.schoolAsc = formData;
        super.setPrefix('/schoolasc');
    }
    save(method,success){
      $.ajax({
        url: '/schoolasc/save',
        type: 'POST',
        data: this.schoolAsc,
        cache: false,
        contentType: false,
        processData: false,
      })
      .done(function(r){
         success(r);
      });
      //   super.save(this.schoolAsc,method,success);
    }
    update(id,method,success){
        this.schoolAsc.id = id;
        super.update(this.schoolAsc,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/schoolasc');
    }
    static all(method,success){
        super.all(method,success,'/schoolasc');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/schoolasc');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/schoolasc',pathRoute);
   }
}
