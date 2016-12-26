<?
class viewController extends BaseController{
    public function getView($controller,$view){
        $callback = $controller."Controller@all";
        $data = ExternalCall::execute($callback);
        return View::make($view,$data);
    }
}
