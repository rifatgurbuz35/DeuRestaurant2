<?php


class UserController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function yeniKullanici()
    {
        $response = [];
        if (isset($_POST['dataKullanici'])) {
            $data = $_POST['dataKullanici'];
            include "Models/User.php";
            $user = new User();
            $kontrol = $user->kullaniciKontrol($data[0]['kullanıcıAdı']);

            if ($kontrol) {

                $kayıt = $user->yeniKullanici($data);
                echo "1";
            } else {
                echo "2";
            }
        } else {
            echo "3";
        }

    }

    public function loginKontrol()
    {

        $response = [];
        if (isset($_POST['dataLogin'])) {
            $data = $_POST['dataLogin'];
            include "Models/User.php";
            $user = new User();
            $kontrol = $user->loginKontrol($data[0]['kullaniciAdi'], $data[0]['pass']);
            $sonuc = json_decode($kontrol, true);
            if ($sonuc) {

                return $sonuc;
            } else {
                $response = [

                    'status' => false,
                    'message' => 'Kullanici Bulunamadi'


                ];
                return json_encode($response);


            }
        } else {
            $response = [

                'status' => false,
                'message' => 'Kullanici Bulunamadi'

            ];
            return json_encode($response);
        }

    }

    public function existMethod($str)
    {

        if (method_exists($this, $str)) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserName()
    {
        include "Models/User.php";
        $user = new User();
        return $kontrol = $user->getUserName();

    }
    public function cikis()
    {
        include "Models/User.php";
        $user = new User();
        $user->cikis();

        include 'Controllers/PageController.php';
        $page = new PageController();
        $page->home();

    }
}
