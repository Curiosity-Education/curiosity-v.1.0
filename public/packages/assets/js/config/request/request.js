class Request{

    constructor(){

    }


    static send(method,path,callback,data){
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                this.responseText;
                callback(this);
            }
          };
          xhttp.open(method, data, true);
          xhttp.send(data);
    }

}
