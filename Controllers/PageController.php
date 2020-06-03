<?php


class PageController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function home($data = false)
    {

        include "Models/Home.php";
        $Home = new Home();
        $name = $Home->getUserName($data);
        Controller::$view->view("home", $name);

    }

    public function galeri()
    {

        Controller::$view->view("galeri");

    }

    public function hakkimizda()
    {

        Controller::$view->view("hakkimizda");

    }

    public function iletisim()
    {

        Controller::$view->view("iletisim");

    }

    public function login()
    {

        Controller::$view->view("login");

    }

    public function menu()
    {


        //$this->menu();
        Controller::$view->view("menu_yeni");


    }

    public function register()
    {

        Controller::$view->view("register");

    }

    public function kahvalti()
    {

        include "Models/Menu.php";
        $Menu = new Menu();
        $menu = $Menu->getKahvalti();
        Controller::$view->view("kahvalti",$menu);
    }
    public function rezarvasyon()
    {
        include "Controllers/SiparisController.php";
        $siparis= new SiparisController();

        $sipariler=$siparis->siparisCek();
        Controller::$view->view("rezarvasyon",$sipariler);
    }


    public function konular($data = false)
    {

        /* include "Models/Konular.php";
         $Konu =new Konular();
         $konular = $Konu->getKonular();
         Controller::$view->view("konular",$konular);*/

    }

    public function konu_goruntule($data = false)
    {

        /* include "Models/Konular.php";
         $Konu =new Konular();
         $konular = $Konu->getKonuById($data);
         if($konular){*/
        Controller::$view->view("konu_goruntule");
        //}


    }

    public function konuEkle($data = false)
    {

        include "Models/Konular.php";
        $Konu = new Konular();
        // $konular = $Konu->getKonuById($data);
        //if($konular){
        Controller::$view->view("yeni_konu");
        //}


    }
    public function admin(){

        include "Models/Admin.php";
        $Admin = new Admin();
        $data=$Admin->AdminSiparisCek();
        Controller::$view->view("admin", $data);

    }


    /**
     * @param $str
     * @return bool
     * Her Controllera bu method eklenmelidir.
     */
    public function existMethod($str)
    {

        if (method_exists($this, $str)) {
            return true;
        } else {
            return false;
        }
    }


}
