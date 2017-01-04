<?
class viewController extends BaseController{
    public function getView($controller,$method,$viewName){
        $callback = $controller."Controller@".$method;
        $data = ExternalCall::execute($callback);
        return View::make($viewName,$data);
    }
}
