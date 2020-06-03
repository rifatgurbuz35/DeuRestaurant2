<?php


class Konular extends ConnDb
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getKonular(){

        $qu=ConnDb::GETDB()->query("select * from konular",PDO::FETCH_ASSOC);
        if($qu){
            return $qu;
        }
        else{
            $F = new Functions();
            $F::$err[] ="Başarısız";
            return false;
        }
    }
    public function getKonuById($data){

       $qu=ConnDb::GETDB()->query("select * from konular where id='".$data."'")->fetch(PDO::FETCH_ASSOC);

        if($qu){
            return $qu;
        }
        else{
            $F = new Functions();
            $F::$err[] ="Başarısız";
            return false;
        }
    }
    public function konuSil($id){

        $query = ConnDb::GETDB()->exec("delete from konular where id='".$id."'");
        if($query){
            return $query;
        }else{
            return false;

        }
    }
    public function yeniKonu($konuadi,$konubilgi,$konuicerik){

        if(isset($konuadi) && isset($konubilgi) && isset($konuicerik)
        && !empty($konuadi) && !empty($konubilgi) && !empty($konuicerik)){

            $querry = ConnDb::GETDB()->prepare("INSERT INTO `konular`( `konu_adi`, `konu_kisabilgi`, `konu_icerik`) VALUES  ('".$konuadi."','".$konubilgi."','".$konuicerik."')");
             $qu=$querry->execute();

        }
        if($qu){

            return true;
        }
        else{
            return false;
        }

    }

}
