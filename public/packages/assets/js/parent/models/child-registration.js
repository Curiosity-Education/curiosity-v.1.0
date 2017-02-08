class childRegistration extends CORM{

    static getSonsInfo(success){
      super.any(null,"POST",success,"/parent","get-sonsInfo");
    }

    static delete(id,method,success){
      super.delete({id:id},method,success,'admin-child');
    }
}
