<?php


namespace Middleware;
use Frontend\View;
use System\Environment;
use Transmission\Middleware;

class Auth extends Middleware
{
    protected $hidden = ['password'];
    public static function isAuthenticated(){
        if(isset($_SESSION))
        if(isset($_SESSION['user'])&&$_SESSION['auth']==true )
            return true;
        else return false;
        return false;
    }
    public function dispatch()
    {
        if(!self::isAuthenticated()) {
            if(Environment::value('AUTH_FAIL')=="REDIR")
            {
                View::compose('error.unauth');
                die(header('Location: /'));
            }
            else return false;
        } else return true;
    }
    public static function setAuthenticated($user){
        $self= new static();
        foreach ($self->hidden as $hidden){
            if(isset($user->$hidden))
            unset($user->$hidden);
        }
        $_SESSION['auth']=true;
        $_SESSION['user']=$user;
        return true;
    }
    public static function redirect(){
        header('Location: '.Environment::value('HOME'));
        return new static();
    }
    public static function user(){
        if(isset($_SESSION))return $_SESSION["user"];
        return false;
    }
    public static function destroy(){
        session_destroy();
        unset($_SESSION);
        return true;
    }
}