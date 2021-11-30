<?php

namespace MVC;

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        
        Router::parse($this->request->url, $this->request);
        
        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $name = $this->request->controller . "Controller";
        $file = ROOT .'Controllers/' . $name . '.php';
        $classname = 'MVC\Controllers\\'. $name;
        $controller = new $classname();
        return $controller;
    }

}
?>