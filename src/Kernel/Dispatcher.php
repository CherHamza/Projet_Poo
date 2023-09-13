<?php

namespace hamza\poo\Kernel;
use hamza\poo\Configuration\Config;

class Dispatcher {
    private $controller;
    private $method;

    public function __construct()
    {
        session_start();
        
        $this->controller = Config::CONTROLLER.'home';
        $this->method = 'index';

   

        

        if (isset($_GET['controller'])) {           
            if(class_exists(Config::CONTROLLER.$_GET['controller'])) { //& session start condition//
                $this->controller = Config::CONTROLLER.$_GET['controller'];
            }
        }
        if (isset($_GET['method'])) {
            if (method_exists($this->controller, $_GET['method'])) {
                $this->method = $_GET['method'];
            } else {
                $this->controller = Config::CONTROLLER . 'home';
                $this->method = 'index';
            }
        }
    }
    
    public function Dispatch() {
      
    
        $method = $this->method;
        $cont = new $this->controller;
        $cont->$method();
    }
    
}
