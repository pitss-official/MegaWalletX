<?php

namespace System;
class Environment extends System{
    public function setVariables(){
        parent::$env=FileParser::parseEquals($this->FILE_ENV,$this->FILE_ENV_DEL);
        parent::$DB=new DataBase();
    }
    public function getVariables(){
        if(!isset(parent::$env)) $this->setVariables();
        return parent::$env;
    }
    public static function value($property){
        $env = new self();
        if(isset($env->getVariables()[$property]))
        return $env->getVariables()[$property];
        else return $env->getVariables()[strtoupper($property)];
    }
    public function __construct()
    {
        if(!isset(parent::$env)) $this->setVariables();
    }
}