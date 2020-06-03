<?php


class Menu extends ConnDb
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getItems()
    {

        $stmtKah = ConnDb::GETDB()->query("select * from items where menu_id='1' order by id desc ");
        $stmtCorba = ConnDb::GETDB()->query("select * from items where menu_id='2' order by id desc ");
        $stmtKirEt = ConnDb::GETDB()->query("select * from items where menu_id='3' order by id desc ");
        $stmtByzEt = ConnDb::GETDB()->query("select * from items where menu_id='4' order by id desc ");
        $stmtMeze = ConnDb::GETDB()->query("select * from items where menu_id='5' order by id desc ");
        $stmtTatli = ConnDb::GETDB()->query("select * from items where menu_id='6' order by id desc ");
        $stmtIcecek = ConnDb::GETDB()->query("select * from items where menu_id='7' order by id desc ");
        $kahvalti = $stmtKah->fetchAll(PDO::FETCH_ASSOC);
        $corba = $stmtCorba->fetchAll(PDO::FETCH_ASSOC);
        $kirmiziEt = $stmtKirEt->fetchAll(PDO::FETCH_ASSOC);
        $beyazEt = $stmtByzEt->fetchAll(PDO::FETCH_ASSOC);
        $meze = $stmtMeze->fetchAll(PDO::FETCH_ASSOC);
        $tatli = $stmtTatli->fetchAll(PDO::FETCH_ASSOC);
        $icecek = $stmtIcecek->fetchAll(PDO::FETCH_ASSOC);
        $items['kahvalti']=$kahvalti;
        $items['corba']=$corba;
        $items['kirmizi_et']=$kirmiziEt;
        $items['beyaz_et']=$beyazEt;
        $items['meze']=$meze;
        $items['tatli']=$tatli;
        $items['icecek']=$icecek;

        if (!empty($items)) {
            return $items;
        } else {

            $F = new Functions();
            $F::$err[] = "Başarısız";
            return false;
        }
    }
    public function getKahvalti(){
        $stmtKah = ConnDb::GETDB()->query("select * from items where menu_id='1' order by id desc ");
        $kahvalti = $stmtKah->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($kahvalti)){
            return $kahvalti;
        }
        else{
            $F = new Functions();
            $F::$err[] = "Kahvaltılıklar çekilemedi";
            return false;
        }
    }


}
