class childRegistration extends CORM{

    static getSons(success){
      super.any(null,"POST",success,"/parent","get-sons");
    }

    static delete(id,method,success){
      super.delete({id:id},method,success,'admin-child');
    }
}
