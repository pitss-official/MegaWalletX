<?php


namespace Controller;

use Middleware\Auth;
use PDO;
use Transmission\Request;

class ScheduleController extends TransactionController
{
    public function addTransaction(Request $request){
        $by= $this->getUserObjectFromUserName(Auth::user()->username);
        $to= $this->getUserObjectFromUserName($request->user);
        $this->DB()->exec(
            "INSERT INTO `scheduleTransactions` (`id`, `sch_by`, `sch_to`, `date`,`amount`, `state`) VALUES (NULL, '".$by->id."', '".$to->id."', '".$request->date."','".$request->amount."', '1')");
        return ["result"=>'success' ];
    }
    public static function exec(){
        $that = new static();
        $query = $that->DB()->prepare("select * from scheduleTransactions where scheduleTransactions.state = 1");
        $query->execute();
        $txns = $query->fetchAll(PDO::FETCH_OBJ);
        //3
        foreach ($txns as $tx){
           $that->transferMoney($that->getUserObjectFromUserID($tx->sch_by),$that->getUserObjectFromUserID($tx->sch_to),$tx->amount,3);
           $that->DB()->exec("update scheduleTransactions set scheduleTransactions.state = 0 where scheduleTransactions.id = ".$tx->id);
        }
        echo "Schedule Executed";
    }
    public function listSchedules(){
        $user = $this->getUserObjectFromUserName(Auth::user()->username);

    }
}