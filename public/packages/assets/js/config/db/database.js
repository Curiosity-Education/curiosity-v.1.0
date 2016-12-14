class Database{

    constructor(){

    }

    static all(prefix,callback,options){
        if(typeof options != "object"){
            options = {
                method:"GET",
                path:prefix,
                data:null
            }
        }
        if(typeof callback == "undefined"){
            callback = function(){

            }
        }
        Request.send(options.method,options.path,callback,options.data);
    }
    static find(table,id){
        var tableDATA = JSON.parse(localStorage.getItem(table));
        var data = null;
        for ( var i = 0 ; i < tableDATA.length ; i++ ){
            if(tableDATA[i].id == id){
                data = tableDATA[i];
            }
        }
        return data;
    }
    save(table,data){
        var tableDATA = JSON.parse(localStorage.getItem(table));
        data.id = this.autoincremented(table) + 1;
        if(tableDATA != null){
            tableDATA.push(data);
            localStorage.setItem(table,JSON.stringify(tableDATA));
        }
        else{
            var collection = [];
            collection.push(data);
            localStorage.setItem(table,JSON.stringify(collection));
        }



    }
    autoincremented (table){
        var tableDATA = JSON.parse(localStorage.getItem(table));
        if(tableDATA != null){
            for ( var i = 0 ; i < tableDATA.length ; i++ ){
                if(i == tableDATA.length - 1){
                   return tableDATA[i].id;
                }
            }
        }
        return 0;
    }
    delete(table,id){
        var tableDATA = JSON.parse(localStorage.getItem(table));
        for ( var i = 0 ; i < tableDATA.length ; i++ ){
            if(tableDATA[i].id == id){
               tableDATA.splice(i,1);
            }
        }
        localStorage.setItem(table,JSON.stringify(tableDATA));

    }
    update(table,id,data){
        var tableDATA = JSON.parse(localStorage.getItem(table));
        var updateData = [];
        var itemUpdate = {};
        for ( var i = 0 ; i < tableDATA.length ; i++ ){
            if(tableDATA[i].id == id){
               itemUpdate = data;
            }
            else{
                itemUpdate = tableDATA[i];
            }
            updateData.push(itemUpdate);
        }
        localStorage.setItem(table,JSON.stringify(updateData));
    }
    static where(table,column,value){
        var tableDATA = JSON.parse(localStorage.getItem(table));
        var data = null;
        for ( var i = 0 ; i < tableDATA.length ; i++ ){
            if(eval("tableDATA[i]."+column)== value){
                data = tableDATA[i];
            }
        }
        return data;
    }
    static orderBy(table,data,column,izq,der){
      var pivote=eval("data[izq]."+column); // tomamos primer elemento como pivote
      var objpivote = data[izq];
      var i=izq; // i realiza la búsqueda de izquierda a derecha
      var j=der; // j realiza la búsqueda de derecha a izquierda
      var aux;

      while(i<j){            // mientras no se crucen las búsquedas
         while(eval("data[i]."+column)<=pivote && i<j) i++; // busca elemento mayor que pivote
         while(eval("data[j]."+column)>pivote) j--;         // busca elemento menor que pivote
         if (i<j) {                      // si no se han cruzado
             aux= data[i];                  // los intercambia
             data[i]=data[j];
             data[j]=aux;
         }
       }
       data[izq]=data[j]; // se coloca el pivote en su lugar de forma que tendremos
       data[j]=objpivote; // los menores a su izquierda y los mayores a su derecha
       localStorage.setItem(table+"_sort",JSON.stringify(data));
       if(izq<j-1)
          this.orderBy(table,data,column,izq,j-1); // ordenamos subarray izquierdo
       if(j+1 <der)
          this.orderBy(table,data,column,j+1,der); // ordenamos subarray derecho
    }
}
