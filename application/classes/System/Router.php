<?php


namespace System;

use Frontend\View;
use Transmission\Middleware;
use Transmission\Request;

//use ;

class Router
{
    public function __construct()
    {
        if(!isset($_SESSION)) session_start();
    }
    protected static $routes = [];
    protected static $lastAddedRoute;
    public static function bootstrap(){
        $router = new static();
        return $router;
    }
    protected function execute(){
        $requestedRoute=trim($_SERVER['REQUEST_URI'],'/');
        $requestedMethod=strtolower($_SERVER['REQUEST_METHOD']);
        $middleware=new Middleware();
        $gate=$middleware->append($requestedRoute,$requestedMethod);
        if(!($gate===true)) return $gate;
        $controller=self::$routes[$requestedMethod][$requestedRoute][0];
        $handler=self::$routes[$requestedMethod][$requestedRoute][1];
        eval('$controller=new \Controller\\'.$controller.'();');
        eval('$controller= $controller->'.$handler.'(new Transmission\Request());');
        if($controller instanceof View) return $controller;
        else if ($controller instanceof Request) echo json_encode($controller->all());
        else echo json_encode($controller);
    }
    public function dispatch(){
        $requestedRoute=trim($_SERVER['REQUEST_URI'],'/');
        $requestedMethod=strtolower($_SERVER['REQUEST_METHOD']);
        if(!isset(self::$routes[$requestedMethod][$requestedRoute]))
            if(!isset(self::$routes[$requestedMethod]['*']))
            return View::compose('error.404');
            else{
                //todo improvice efficiency
                self::$routes[$requestedMethod][$requestedRoute]=self::$routes[$requestedMethod]['*'];
                return $this->execute();
            }
        else return $this->execute();
    }
    public static function __callStatic($name, $arguments)
    {
         $router = new static;
         $arguments[0]=trim($arguments[0],'/');
         if (!isset(self::$routes[strtolower($name)])) self::$routes[strtolower($name)]=[];
         self::$routes[strtolower($name)][$arguments[0]]=[$arguments[1],$arguments[2]];
         self::$lastAddedRoute=[strtolower($name),$arguments];
         return $router;
    }
}