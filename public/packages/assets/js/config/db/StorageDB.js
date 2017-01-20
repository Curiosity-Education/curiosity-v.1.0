var StorageDB = {

   table : {

      create : function(name, obj){
         var data = this.getData(name);
         if (data == null || data == ""){
            try {
               localStorage.setItem(name, JSON.stringify(obj));
            } catch (e) {
               console.error(e);
            }
         }
      },

      getData : function(name){
         var data = localStorage.getItem(name);
         if (data == null || data == ""){
            return null;
         }
         else{
            return JSON.parse(data);
         }
      },

      getByAttr : function(name, attr, value){
         var data = localStorage.getItem(name);
         if (data == null || data == ""){ data = new Array(); }
         else { data = JSON.parse(data); }
         var object = new Array();
         $.each(data, function(index, obj) {
            if (obj[attr] == value){
               object.push(obj);
            }
         });
         return object;
      },

   },

   clearAll : function(){
      localStorage.clear();
   }

}
