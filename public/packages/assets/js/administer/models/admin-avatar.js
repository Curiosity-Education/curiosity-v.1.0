class avatar extends CORM {

  constructor(formData){
    super();
    this.avatar = formData;
    super.setPrefix('/avatar');
  }

  save(method,success){
    super.save(this.avatar,method,success);
  }

  static getAvatars(success){
    super.any(null,"POST",success,"/avatar","allStylesAvatars");
  }

}
