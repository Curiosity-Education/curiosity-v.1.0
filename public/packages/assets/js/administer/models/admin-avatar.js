class avatar extends CORM {

  constructor(formData){
    super();
    this.avatar = formData;
    super.setPrefix('/avatar');
  }

  save(method,success){
    super.save(this.avatar,method,success);
  }

  update(id,method,success){
    this.avatar.append('id', id);
    super.update(this.avatar,method,success);
  }

  static delete(id,method,success){
    super.delete({id:id},method,success,'avatar');
  }

  static getAvatars(success){
    super.any(null,"POST",success,"/avatar","allStylesAvatars");
  }

  static addStyles(formData, success){
    super.any(formData,"POST",success,"/avatar","addStyle");
  }

  static deleteStyle(id,success){
    super.any(id,"POST",success,"/avatar","deleteStyle");
  }

  static updateStyle(data,success){
    super.any(data,"POST",success,"/avatar","updateStyle");
  }

  static getSprites(success){
    super.any(null,"POST",success,"/sprite","all");
  }
}
