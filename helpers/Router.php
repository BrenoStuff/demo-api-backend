<?php

class Router {
    // Properties

    // Methods
    function gateKeeper(){
        $url = $_SERVER['REQUEST_URI']; // Get the url solicited
        $urlClean = str_replace(BASE_PATH,'',$url); // Clear the url solicited (remove the main path)
        $urlArray = explode('/', $urlClean); // Divide the $urlClean by the Slash
    
        if (isset($urlArray[0]) && $urlArray[0] != '' && isset($urlArray[1]) && $urlArray[1] != '') {
            $controller = $urlArray[0] . 'Controller';
            $removeParams = explode('?', $urlArray[1]);
            $action = str_replace('-', '', $removeParams[0]);
    
            if(file_exists(CONTROLLERS_FOLDER . $controller . '.php')){
                $obj = new $controller();
                if(method_exists($obj, $action)){
                    $obj->$action();
                    die;
                }
            }
        }
    }

    function allowedMethod($method){
        if($_SERVER['REQUEST_METHOD'] !== $method){
            $result['error']['message'] =  'Method ' . $_SERVER['REQUEST_METHOD'] . ' is not allowed';
            $output = new Output();
            $output->response($result, 405);
        }
    }

}

?>