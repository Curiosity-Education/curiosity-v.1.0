<?php
class viewsController extends BaseController{
    public function getView($viewName,$controller = '',$method = ''){
        $callback = $controller."Controller@".$method;
        $data = ExternalCall::execute($callback);
        return View::make($viewName,$data);
    }
}
