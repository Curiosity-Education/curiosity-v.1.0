<?php
class infoSessionsController extends BaseController{

    public function missedSession(){

        return View::make('missedSession');
    }
    public function getLastSession(){
        if(Auth::check()){
            Session::put('sesionInfo',array(
                'device'  => Auth::user()->sesion_info->device,
                'browser' => Auth::user()->sesion_info->browser,
                'app_version' => Auth::user()->sesion_info->app_version,
                'mobile'    => Auth::user()->sesion_info->mobile,
                'date_login' => Auth::user()->sesion_info->updated_at
            ));
            Auth::logout();
        }
        return Session::get('sesionInfo');
    }
    public function getBrowsers($limit = 30){
        if(Auth::check()){
            if(Request::method() == "GET"){
                return View::make('vista_browsers');
            }
            else{
                return DB::select("SELECT browser, COUNT( browser ) AS  'uso'
                    FROM  `sesiones_info`
                    WHERE id !=0
                    GROUP BY (
                    browser
                    )
                    ORDER BY (
                    COUNT( browser )
                    ) DESC
                    LIMIT 0 , $limit"
                );
            }
        }
        else
            return Redirect::to('/');
    }
}
?>
