class Request{

    constructor(){

    }


    static send(method,path,callback,data){
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                var status = this.status;
                callback(response,status,this);
            }
          };
          xhttp.open(method, path, true);
          if(data != null){
            xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhttp.send(JSON.stringify(data));
          }
          else{
            xhttp.send();
          }
    }

}
