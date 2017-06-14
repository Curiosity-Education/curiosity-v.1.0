class Library_pdf extends CORM {
    constructor(formData){
        super();
        this.pdf = formData;
        super.setPrefix('/pdfs');
    }
    save(method,success){
      $.ajax({
        url: '/pdfs/save',
        type: 'POST',
        data: this.pdf,
        cache: false,
        contentType: false,
        processData: false,
      })
      .done(function(r){
         success(r);
      });
      //   super.save(this.pdf,method,success);
    }
    update(){

    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/pdfs');
    }
    static all(method,success){
        super.all(method,success,'/pdfs');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/pdfs');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/pdfs',pathRoute);
   }
}
