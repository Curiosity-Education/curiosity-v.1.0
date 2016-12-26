<?php
class ExternalCall{

    private static $_externalCall;

    private function __construct(){

    }

    public static function getInstance(){
        if (self::$_externalCall) {
            return self::$_externalCall;
        } else {
            $class = __CLASS__;
            self::$_externalCall = new $class();
            return self::$_externalCall;

        }
    }

    public static function execute($callback = NULL){
        if(is_callable($callback))
            return call_user_func_array($callback, array_slice(["GET","POST"], 1));
        else{
            $callbackStr = explode('@',$callback);
            $controller = new $callbackStr[0];

            return call_user_func_array(array($controller,$callbackStr[1]),array_slice(["GET","POST"], 1));

        }
    }
}

