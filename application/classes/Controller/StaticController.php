<?php
namespace Controller;

use Frontend\View;
use System\Environment;

class StaticController extends Environment{
    public function loadHome(){
        return View::compose('home');
    }
    public function about(){
        return View::compose('about');
    }
    public function contact(){
        return View::compose('contact');
    }
}