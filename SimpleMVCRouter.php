<?php 


class SimpleMVCRouter
{
    private $path = "src/controller";
    private $request;
    public function __construct($controller = "home", $action = "index")
    {

    }
    public function navigate(&$request, $controller = "home", $action = "index")
    {
        $this->request = $request;
        //echo($this->discoverController($controller));
        $controller = ($controller == "") ? "home" : $controller;
        $action = ($action == "") ? "index" : $action;
        try {
            if ($this->discoverController($controller)) {
                $targetController = require_once "src/controller/{$controller}Controller.php";
                $targetName = $controller . "Controller";                
                $t = new $targetName();               

                if ($this->discoverAction($t, $action)) {
                    $t->$action();                    
                } else {
                    throw new Exception();
                }

            } else {
                echo "n f";
            }
        } catch (Exception $ex) {
            return false; //redirect to error page...
        }
    }
    public function discoverController($controller)
    {
        $files = array_filter(array_map(function ($tryMe) {
            return strtolower(explode("Controller.php", $tryMe)[0]);
        }, scandir($this->path)), function ($tryMe) {
            return ($tryMe == "." || $tryMe == "..") ? false : true;
        });
        return ((array_search($controller, $files) !== "") ? true : false);
    }
    public function discoverAction($controller, $action)
    {        
        $controllerMethods = get_class_methods($controller);
        return ((array_search($action, $controllerMethods) !== "") ? true : false);
    }
    public function getRequestType()
    {
        return $this->request['REQUEST_METHOD'];
    }
}

            