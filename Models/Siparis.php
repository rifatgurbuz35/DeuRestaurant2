<?php


class Siparis extends ConnDb
{
    public function __construct()
    {
        parent::__construct();
    }

    public function siparisOlustur($data)
    {
        /* Burada ilk önce order tablosuna sessiondaki kullanıcı Id ile kayıt var mı kontrolü yapılacak
           eğer varsa order tablosundan ilgii kaydın id si alınarak order_cart'a bu id ile kayıt atılacak..
         * Kayıt yoksa ilk önce order tablosuna kayıt atılacak kayıt atıldıktan id si alınıp order_cart'a  kayıt atılacak.
         * Burada order ile order_cart arasında 1-n ilişkisi vardır.
         */
        if (isset($_SESSION['kullanıcıId'])) {
            $user_id = $_SESSION['kullanıcıId'];


            if (isset($data)) {

                //burada user id kontrolü yap
                $orderKontrol = ConnDb::GETDB()->query("select * from deu_restaurant.order where user_id='$user_id' and siparis_tamam=0")->fetch(PDO::FETCH_ASSOC);
                if ($orderKontrol) {
                    $id = $orderKontrol['id'];
                    foreach ($data as $deger) {
                        $this->orderCartKaydet($deger, $id, $user_id);
                    }

                } else {

                    $querry = ConnDb::GETDB()
                        ->prepare("INSERT INTO `order`( `user_id`, `toplam_tutar`, `rezarvasyon_tarihi`,`gelis_zamani`,`siparis_tamam`) 
                        VALUES  ('" . $user_id . "','0','2020-05-31 00:00:00','2020-05-31 00:00:00','0')");
                    $qu = $querry->execute();
                    $id = ConnDb::GETDB()->lastInsertId();
                    foreach ($data as $deger) {
                        $this->orderCartKaydet($deger, $id, $user_id);
                    }
                }

            }
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }

    }

    public function orderCartKaydet($deger, $id, $user_id)
    {

        $menu_id = $deger['urun_id'];
        $count = $deger['adet'];
        $tutar = $deger['fiyat'];
        $kategori_id = $deger['kahvalti'];
        $querryCart = ConnDb::GETDB()
            ->prepare("INSERT INTO `order_cart`( `user_id`, `menu_id`, `count`,`tutar`,`durum`,`order_id`,`kategori_id`) 
                        VALUES  ('" . $user_id . "','" . $menu_id . "','" . $count . "','" . $tutar . "','0','" . $id . "','" . $kategori_id . "')");
        $querryCart->execute();

    }

    public function siparisCek()
    {

        if (isset($_SESSION['kullanıcıId'])) {

            $user_id = $_SESSION['kullanıcıId'];
            $orderId = 0;
            $siparisler = [];
            $orderIdQuery = ConnDb::GETDB()->query("select * from deu_restaurant.order where user_id='$user_id' and siparis_tamam=0")->fetch(PDO::FETCH_ASSOC);

            if ($orderIdQuery) {

                $orderId = $orderIdQuery["id"];
                $distinct = ConnDb::GETDB()->query("select distinct menu_id from order_cart where user_id='$user_id' and order_id='$orderId' and durum=0; ")->fetchAll(PDO::FETCH_ASSOC);

                $toplam=0;
                foreach ($distinct as $deger) {

                    $menu_id = $deger['menu_id'];
                    $siparis = ConnDb::GETDB()->query("select cart.*,menu.id menu_id,menu.name kategori from order_cart cart inner join menu on cart.kategori_id=menu.id where menu_id='$menu_id' and durum=0 limit 1 ;")->fetch(PDO::FETCH_ASSOC);
                    $order_idd=$siparis['order_id'];
                    $adet = ConnDb::GETDB()->query("select sum(tutar) tutar, sum(count) adet from order_cart where menu_id='$menu_id' and durum=0 and order_id='$order_idd' ;")->fetch(PDO::FETCH_ASSOC);
                    $total = ConnDb::GETDB()->query("select tutar * (select  sum(count) adet  from order_cart where menu_id='$menu_id' and order_id='$order_idd') tutar from order_cart where menu_id='$menu_id' and durum=0 limit 1;")->fetch(PDO::FETCH_ASSOC);
                    $urun = ConnDb::GETDB()->query("select * from items where id='$menu_id' limit 1 ;")->fetch(PDO::FETCH_ASSOC);
                    $toplam+=$total["tutar"];
                    $siparisler[] = array(
                        "user_id" => $siparis["user_id"],
                        "menu_id" => $menu_id,
                        "count" => $adet["adet"],
                        "tutar" => $siparis["tutar"],
                        "durum" => $siparis["durum"],
                        "order_id" => $siparis["order_id"],
                        "kategori_id" => $siparis["kategori_id"],
                        "toplam_tutar" => $total["tutar"],
                        "urun_adi" => $urun["item_name"],
                        "urun_id" => $urun["id"],
                        "content" => $urun["content"],
                        "image_url" => $urun["image_url"],
                        "kategori"=>$siparis["kategori"],

                    );

                }

                $_SESSION['toplam']=$toplam;
           // var_dump($siparisler);exit();
                return $siparisler;

            }


        }

    }

    public  function siparisUpdate($data,$tutar,$tarih){

        if (isset($_SESSION['kullanıcıId'])) {
            $kullanıcıId=$_SESSION['kullanıcıId'];
            $response=[];
            if(isset($data)){
                foreach ($data as $key){
                    $menu_id=$key['menu_id'];
                    $siparis = ConnDb::GETDB()->query("select cart.*,menu.id menu_id,menu.name kategori from order_cart cart inner join menu on cart.kategori_id=menu.id where menu_id='$menu_id' and durum=0 limit 1 ;")->fetch(PDO::FETCH_ASSOC);
                    $adet = ConnDb::GETDB()->query("select sum(tutar) tutar, sum(count) adet from order_cart where menu_id='$menu_id' and durum=0 ;")->fetch(PDO::FETCH_ASSOC);
                    $total = ConnDb::GETDB()->query("select tutar * (select  sum(count) adet  from order_cart where menu_id='$menu_id' and durum=0) tutar from order_cart where menu_id='$menu_id' and durum=0 limit 1;")->fetch(PDO::FETCH_ASSOC);
                    $urun = ConnDb::GETDB()->query("select * from items where id='$menu_id' limit 1 ;")->fetch(PDO::FETCH_ASSOC);
                    $response[]=array(
                        "user_id" => $siparis["user_id"],
                        "menu_id" => $menu_id,
                        "count" => $adet["adet"],
                        "toplam_tutar" => $total["tutar"],
                        "durum" => 1,
                        "order_id" => $siparis["order_id"],
                        "kategori_id" => $siparis["kategori_id"],
                        "tutar" => $siparis["tutar"]



                    );
                }
                $this->insertUpdateCart($response);
                $this->deleteCart($data,$kullanıcıId);

                $this->updateOrder($kullanıcıId,$tutar,$tarih);

            }
        }
    }

    public function deleteCart($data,$kullanıcıId){

       if(isset($data)){
           foreach ($data as $key){
               $menu_id=$key['menu_id'];
               $query= ConnDb::GETDB()->prepare("delete from order_cart where user_id='$kullanıcıId' and durum=0");
               $result=$query->execute();
           }
       }

    }

    public function insertUpdateCart($data){

       if(isset($data)){
           foreach ($data as $key){

               $user_id=$key['user_id']; $menu_id=$key['menu_id']; $count=$key['count']; $tutar=$key['toplam_tutar'];$durum=$key['durum'];
               $order_id=$key['order_id']; $kategori_id=$key['kategori_id'];
               $querryCart = ConnDb::GETDB()
                   ->prepare("INSERT INTO `order_cart`( `user_id`, `menu_id`, `count`,`tutar`,`durum`,`order_id`,`kategori_id`) 
                        VALUES  ('" . $user_id . "','" . $menu_id . "','" . $count . "','" . $tutar . "','1','" . $order_id . "','" . $kategori_id . "')");
               $querryCart->execute();

           }
       }

}

    public function updateOrder($kullanıcıId,$tutar,$tarih){

        $date = date('Y-m-d h:i:s', strtotime($tarih));

        if(isset($kullanıcıId)){

            //$query= ConnDb::GETDB()->prepare("update deu_restaurant.order set toplam_tutar='$tutar',gelis_zamani='$tarih',siparis_tamam='1' where user_id='$kullanıcıId' and siparis_tamam='0'");
            $query= ConnDb::GETDB()->prepare("update deu_restaurant.order set toplam_tutar='$tutar',gelis_zamani='2020-05-03 00:00:00',siparis_tamam='1' where user_id='$kullanıcıId' and siparis_tamam='0'");
            $result=$query->execute();


        }

    }
}
