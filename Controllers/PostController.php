 <?php


class PostController extends Controller
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
    public function konuSil($id){
        include "Models/Konular.php";
        $konu = new Konular();
        $data = $konu->konuSil($id);
        if($data){
            Controller::$view->view("konular",$konu->getKonular());
        }
    }
    public function yeniKonu(){
        include "Models/Konular.php";
        $konu = new Konular();
        $yeni = $konu->yeniKonu(@$_POST['konuadi'],@$_POST['konubilgi'],@$_POST['konuicerik']);
        if($yeni){
        Controller::$view->view("home");
        }
        else{
            echo "başarısız"; exit();
        }
    }

}
