<?php


namespace Transmission;
use System\Router;

class Middleware extends Router
{
    protected static $handles;
    public function append($requestedRoute,$requestedMethod){
        if (isset(self::$handles[$requestedMethod][$requestedRoute])){
            $handler = new self::$handles[$requestedMethod][$requestedRoute]();
            return $handler->dispatch();
        }
        else return true;
    }
    public function apply($class){
        $route=parent::$lastAddedRoute;
        if (!isset(self::$handles[$route[0]]))
            self::$handles[$route[0]]=[];
        self::$handles[$route[0]][$route[1][0]]=$class;
    }
}