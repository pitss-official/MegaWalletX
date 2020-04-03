<?php


namespace Transmission;

class Request
{
    protected $request;
    protected function getState(){
        if(is_null($this->request))
        $this->request=(object)($_GET+$_POST+json_decode(file_get_contents("php://input"),true));
        return $this->request;
    }
    public function all(){
        return $this->getState();
    }
    public function __get($name)
    {
        return $this->getState()->$name;
    }
}