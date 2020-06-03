<?php


class Home extends ConnDb
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserName($data){

        //$qu=ConnDb::GETDB()->query("select * from users where name='".$data."'")->fetch(PDO::FETCH_ASSOC);
        /*if($qu){
          return $qu['name'];
        }
        else{
            $F = new Functions();
            $F::$err[] ="Başarısız";
            return false;
        }*/
        return false;
    }

}
