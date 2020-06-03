<?php


class Admin extends ConnDb
{

    public function __construct()
    {
        parent::__construct();
    }

    public function AdminSiparisCek()
    {
        //var_dump("sadad");exit();

        $siparis = ConnDb::GETDB()->query(
            "SELECT 
    cus.name,
    cus.surname,
    cart.count,
    items.item_name,
    cart.tutar,
    items.image_url,
    ord.gelis_zamani,
    menu.name mname
FROM
    deu_restaurant.order ord
        INNER JOIN
    customer cus ON ord.user_id = cus.id
    inner join order_cart cart on ord.id=cart.order_id
    inner join items on cart.menu_id=items.id
     inner join menu on items.menu_id=menu.id;
    ; ")->fetchAll(PDO::FETCH_ASSOC);

        return $siparis;


    }
}
