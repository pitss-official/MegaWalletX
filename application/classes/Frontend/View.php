<?php


namespace Frontend;

use mysql_xdevapi\Exception;
use System\Environment;

class View extends Environment
{
    public static function compose($viewName,...$data){
        function env($name){
            return Environment::value($name);
        }
        $names=explode('.',$viewName);
        $viewName="";
        foreach ($names as $name)$viewName.=DIRECTORY_SEPARATOR.$name;
        $view = new static();
        try {
            include_once ("application".DIRECTORY_SEPARATOR."views".$viewName.'.view.php');
        }catch (Exception $e){
            die($e->getMessage());
        }
        return $view;
    }
    public static function component($componentName){
        $names=explode('.',$componentName);
        $componentName="";
        foreach ($names as $name)$componentName.=DIRECTORY_SEPARATOR.$name;
        try{
            include_once
            ('application'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'components'.$componentName.'.component.view.php');
        }catch (\Exception $exception){
            die($exception->getMessage());
        }
    }
}