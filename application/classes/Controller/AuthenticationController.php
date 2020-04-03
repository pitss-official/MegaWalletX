<?php


namespace Controller;
use Frontend\View;
use Middleware\Auth;
use System\DataBase;
use Transmission\Request;

class AuthenticationController extends DataBase
{
    public function login(Request $request){
        $user=$request->userName;
        //todo implementable email
        $password=hash('sha256',$request->password);
        $query= $this->DB()->prepare('SELECT * from users where username= ? and password = ?');
        $query->execute([$user,$password]);
        $user=$query->fetchObject();
        if($user)
        {
            Auth::setAuthenticated($user);
            return ['result'=>'success','auth'=>'success','url'=>parent::value('home')];
        }
        else return ['result'=>'error','auth'=>'fail','message'=>'Invalid username or password'];
    }
    public function register(Request $request){
        if(Auth::isAuthenticated())Auth::redirect();
        //todo validation;
        $query=$this->DB()->prepare("INSERT INTO `users` (`id`, `username`, `name`, `password`, `email`, `mobile`, `type`) VALUES (NULL, ?, ?, ?, ?, ?, '0');");
        $query->execute([$request->username,$request->name,hash('sha256',$request->password),$request->email,$request->mobile]);
//        $query=$this->DB()->prepare("INSERT INTO `accounts` (`number`, `user_id`, `balance`, `loan_limit`) VALUES (NULL, ?, '0', '0');");
//        $query->execute([$this->DB()->lastInsertId()]);
        if(parent::value('REGISTER_AUTOLOGIN')=='true')
        Auth::setAuthenticated($request->all());
        return ['result'=>'success','auth'=>'success','url'=>parent::value('home')];
    }
    public function logout(){
        Auth::destroy();
        Auth::redirect();
    }
    public function logoutAPI(){
        Auth::destroy();
        return ['result'=>'success','url'=>'/'];
    }
    public function loadRegisterView(){
        return View::compose('register');
    }
}