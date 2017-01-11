<?php
class viewsController extends BaseController{
    public function getViewWithData($controller = '',$method = '',$viewName){
        if($controller != '' || $method != ''){
            $callback = $controller."Controller@".$method;
            $data = ExternalCall::execute($callback);
        }
        else{
            $data = [];
        }
        return View::make($viewName,$data);
    }
    public function getViewWithOutData($viewName){
        return View::make($viewName);
    }
}
