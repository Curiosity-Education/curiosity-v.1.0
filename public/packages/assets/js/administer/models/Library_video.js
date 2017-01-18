class Library_video extends CORM {
    constructor(formData){
        super();
        this.video = formData;
        super.setPrefix('/admin-video');
    }
    save(method,success){
        super.save(this.video,method,success);
    }
    update(id,method,success){
        this.video.append('id', id);
        super.update(this.video,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/admin-video');
    }
    static all(method,success){
        super.all(method,success,'/video');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/video');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/video',pathRoute);
   }
}
