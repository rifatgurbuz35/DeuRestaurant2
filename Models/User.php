<?php


class User extends ConnDb
{

    public function __construct()
    {
        parent::__construct();
    }

    public function kullaniciKontrol($name)
    {
        $response = [];
        //$qu=ConnDb::GETDB()->query("select * from customer where user_name='$name'",PDO::FETCH_ASSOC);
        $qu = ConnDb::GETDB()->query("select * from customer where user_name='$name'")->fetch(PDO::FETCH_ASSOC);

        if ($qu) {
           return 0;
        } else {
            return 1 ;
        }
    }

    public function yeniKullanici($data)
    {
        $response = [];

        if (isset($data)) {

            $querry = ConnDb::GETDB()
                ->prepare("INSERT INTO `customer`( `name`, `surname`, `user_name`,`password`,`mail`,`is_active`,`phone`,`isAdmin`) 
                        VALUES  ('" . $data[0]['isim'] . "','" . $data[0]['soyIsim'] . "','" . $data[0]['kullanıcıAdı'] . "',
                        '" . $data[0]['sifre'] . "','" . $data[0]['email'] . "','1','" . $data[0]['telefon'] . "','0')");
            $qu = $querry->execute();


            if ($qu) {

                return $response = [

                    'status' => true,
                    'message' => 'Kayıt Başarılı',
                    'code' => 1

                ];
            } else {
                return $response = [

                    'status' => true,
                    'message' => 'Kayıt Başarısz',
                    'code' => 2

                ];
            }
        } else {
            return $response = [

                'status' => false,
                'message' => 'Post işlemi Başarsız'

            ];
        }

    }

    public function loginKontrol($name, $pass)
    {

        $response = [];
        $qu = ConnDb::GETDB()->query("select id ,isAdmin from customer where user_name='$name' and password='$pass'")->fetch(PDO::FETCH_ASSOC);
        if ($qu) {
            $id = intval($qu['id']);
            $isAdmin = $qu['isAdmin'];

            session_start();
            $_SESSION['kullanıcıId'] = $id;
            if ($isAdmin == 1) {
                $_SESSION['isAdmin'] = true;
            }


            $response = [

                'status' => true,
                'message' => 'Mevcut'

            ];

            echo 1;
        } else {
            $response = [

                'status' => false,
                'message' => 'Mevcut Degil'

            ];
            echo 0;
        }
    }

    public  function getUserName(){


        if(isset($_SESSION['kullanıcıId'])){
            $adSoyad="";
            $id =$_SESSION['kullanıcıId'];
            $qu = ConnDb::GETDB()->query("select * from customer where id='$id'")->fetch(PDO::FETCH_ASSOC);
            if($qu){
                $name=$qu['name'];
                $surnama=$qu['surname'];
                return $name.' '.$surnama;

            }
            else{
                return "bış";
            }
        }

    }

    public function cikis(){
        session_start();
        session_destroy();
    }

}
