<?php


class Functions
{

    public static $url;
    public static $err;
    function __construct()
    {
        $err=array();
    }
    public function getIsSet(){
        if(empty(self::$url)){
            self::$err[] = "Sistem Parametresi Girilmedi";
            return false;

        }
        if(isset($_GET[self::$url])){
            $link = htmlspecialchars($_GET[self::$url]);
            $link = explode('/',$link);
            return $link;
        }
    }

    public function start(){
        $expContName = $this->getIsSet();

        if(isset($expContName[0])){

           // $expContName= explode('/',$contName);

            if($this->existsController($expContName[0]) && count($expContName)>1 ){

                $expContName[0].="Controller";
                $cont = new $expContName[0]();
                $function= $expContName[1];
                if($cont->existMethod($function)){
                    if(isset($expContName[2])){
                        $cont->$function($expContName[2]);
                    }else{
                        $cont->$function();
                    }

                }else{
                    self::$err[]="Sayfa Bulunamadı";
                }

            }else{
                if($expContName[0]!="page"){
                    include "Controllers/PageController.php";
                }
                $function= $expContName[0];
                $page = new PageController();

                if($page->existMethod($function)){
                    if(isset($expContName[1])){
                        $page->$function($expContName[1]);
                    }else{
                        $page->$function();
                    }

                }else{
                    self::$err[]="Sayfa Bulunamadı1";
                }
            }

        }else{
            include "Controllers/PageController.php";
            $Home = new PageController();
            $Home->home();
        }

    }
    public function existsController($contName){

      $fileName= "Controllers/".$contName."Controller.php";
        if(file_exists($fileName)){
            include "Controllers/".$contName."Controller.php";
            return true;
        }else{

            return false;

        }
    }
    public function showError(){

        if(!empty(self::$err)){
            foreach (self::$err as $key){
                echo $key;
            }
        }


    }

}
