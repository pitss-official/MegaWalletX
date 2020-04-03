<?php


namespace Controller;

use Middleware\Auth;
use System\DataBase;
use Transmission\Request;
use PDO;


class TransactionController extends DataBase
{
    protected $types=[
        0=>'Add Money',
        1=>'Gift Card Purchase',
        2=>'Money Transfer',
        3=>'Scheduled Transfer'
    ];
    public function getUserObjectFromUserID($userID){
        $query = $this->DB()->query("select * from users where id = '$userID'");
        return $query->fetchObject();
    }
    public function getUserObjectFromUserName($userName){
        $userName=trim($userName,'"');
        $query = $this->DB()->query("select * from users where username = '$userName'");
        return $query->fetchObject();
    }
    public function transferMoney($source,$target,$amount,$type=0){
        if(is_integer($target))$target=$this->getUserObjectFromUserID($target);
        $amount=(int)$amount;
        $query = $this->DB()->prepare("INSERT INTO `transactions` (`id`, `type`, `recieved_by`, `sent_by`, `amount`, `executed_at`, `executed_by`) VALUES (NULL, ?, ?,? , ?, CURRENT_TIMESTAMP, ?);");
        $query->execute([$type,$target->id,$source->id,$amount,$source->id]);
        $id= $this->DB()->lastInsertId();
        $this->DB()->exec(
            "UPDATE `users` SET `balance` = '".((int)$source->balance-$amount)."' WHERE `users`.`id` = '".$source->id."';"
            );
        $this->DB()->exec("UPDATE `users` SET `balance` = '".((int)$target->balance+$amount)."' WHERE `users`.`id` = '".$target->id."';");
        return $id;
    }
    public function addMoney(Request $request){
        //0 = Add Money
        return[
            "result"=>'success',
            'id'=> $this->transferMoney(
                $this->getUserObjectFromUserName("system"),
                $this->getUserObjectFromUserName(Auth::user()->username),
                $request->amount,0)];
    }
    public function allTransactions(){
        $user = $this->getUserObjectFromUserName(Auth::user()->username)->id;
        $query = $this->DB()->prepare("select transactions.* from transactions where sent_by = ? or recieved_by= ?");
        $query->execute([$user,$user]);
        $fin=[];
        foreach ($query->fetchAll(PDO::FETCH_OBJ) as $obj){
            $obj->type=$this->types[$obj->type];
            $obj->recieved_by=$obj->recieved_by==Auth::user()->id?'You':$this->getUserObjectFromUserID((int)$obj->recieved_by)->name;
            $obj->sent_by=$obj->sent_by==Auth::user()->id?'You':$this->getUserObjectFromUserID((int)$obj->sent_by)->name;
            $obj->amount=$obj->sent_by==Auth::user()->id?'Rs. -'.$obj->amount:'Rs. '.$obj->amount;
            $obj->executed_by=$obj->executed_by==Auth::user()->id?'You':$this->getUserObjectFromUserID((int)$obj->executed_by)->name;
            $obj->executed_at=date('d.m.Y');
            array_push($fin,$obj);
        }
        return [
            'columns'=>[
              ['label'=>'ID','field'=>'id', 'width'=> 150],
              ['label'=>'Type','field'=>'type', 'width'=> 150],
              ['label'=>'Sent To', 'field'=>'recieved_by','width'=> 150],
              ['label'=>'Sent By','field'=>'sent_by', 'width'=> 150],
              ['label'=>'Amount','field'=>'amount', 'width'=> 150],
              ['label'=>'Time Stamp','field'=>'executed_at', 'width'=> 150],
              ['label'=>'Executed By','field'=>'executed_by', 'width'=> 150],
            ],
            'rows'=>$fin
            ];
    }
    public function initTransfer(Request $request){

        return[
            "result"=>'success',
            'id'=> $this->transferMoney(
                $this->getUserObjectFromUserName(Auth::user()->username),
                $this->getUserObjectFromUserName($request->user),
                $request->amount,2)];
    }
    public function sendCard(Request $request){
        $user= $this->getUserObjectFromUserName(Auth::user()->username);
        $targetUser = $this->getUserObjectFromUserName($request->user);
        $amount=$request->amount;
        $message = $request->message;
        if(strlen($message)<2)$message="You have Received a Gift Voucher";
        $query= $this->DB()->prepare(
            'INSERT INTO `giftcards` (`id`, `amount`, `sent_to`, `sent_by`, `timestamp`, `is_valid`, `message`) VALUES (NULL, ?, ?, ?, CURRENT_TIMESTAMP, "1", ?);
');
        $query->execute([$amount,$targetUser->id,$user->id,$message]);
        $this->transferMoney($user,808080,$amount,1);
        return ['result'=>'success'];
    }
}