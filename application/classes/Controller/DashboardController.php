<?php


namespace Controller;
use Middleware\Auth;
use PDO;
use Frontend\View;
use System\DataBase;
use Transmission\Request;

class DashboardController extends DataBase
{
    public function view(){
        return View::compose('dashboard');
    }
    public function getUserBasicDetails(Request $request){
        $query = $this->DB()->query("select `username`,`name` , id from users where username = '".$request->username."'");
        return $query->fetchObject();
    }
    public function availableUsers(){
        $query = $this->DB()->query('select `username` as `value`, `name` as `label`, id from users');
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function balance(){
        $query = $this->DB()->query('select balance from users where username = "'.Auth::user()->username.'"');
        return $query->fetchObject();
    }
    public function recentPayments(){
        $query = $this->DB()->query('select distinct recieved_by from transactions where sent_by = 8 limit 50');
        $all = $query->fetchAll(PDO::FETCH_COLUMN);
        $ids= implode(',',$all);
        $query = $this->DB()->query("SELECT id,username,name FROM users WHERE id IN($ids)");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function favTable(){
        $rows = $this->recentPayments();
        return [
            'columns'=>[
                ['label'=>'ID','field'=>'id', 'width'=> 300],
                ['label'=>'Name','field'=>'name', 'width'=> 300],
                ['label'=>'Handle', 'field'=>'username','width'=> 300],
            ],
            'rows'=>$rows
        ];
    }
    public function test(){
        return $this->recentPayments();
    }
}