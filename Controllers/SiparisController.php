<?php


class SiparisController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $str
     * @return bool
     * Her Controllera bu method eklenmelidir.
     */
    public function existMethod($str){

        if(method_exists($this,$str)){
            return true;
        }
        else{
            return false;
        }
    }

    public function siparisOlustur(){
        $response=[];
        session_start();
        if(isset($_SESSION['kullanıcıId'])){
            include "Models/Siparis.php";
            $siparis = new Siparis();
            if(isset($_POST['rezarvazyon'])){
                $data = $_POST['rezarvazyon'];
                $kontrol = $siparis->siparisOlustur($data);


            }


        }
        else{
            $response=[
                "success"=>false,
                "message"=>"Lutfen Giris Yapiniz."
            ];
        }

    }

    public function siparisCek()
    {
        $response = [];

        session_start();

        if (isset($_SESSION['kullanıcıId'])) {

            include "Models/Siparis.php";
            $siparis = new Siparis();
                $response = $siparis->siparisCek();
                return $response;
        }


    }
    public function siparisUpdate(){
        session_start();


        if (isset($_SESSION['kullanıcıId'])) {
            include "Models/Siparis.php";

            $siparis = new Siparis();
            if(isset($_POST['updated'])){
                $data = $_POST['updated'];
                $tutar= $_POST['tutar'];
                $tarih=$_POST['tarih'];

                $kontrol = $siparis->siparisUpdate($data,$tutar,$tarih);
            }
        }
    }
}
