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

  // static addAvatarSprite(data,method,success,pathRoute){
  //   super.any({data:data},method,success,'/avatar',pathRoute);
  // }

}
