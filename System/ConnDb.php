<?php


class ConnDb
{
    private static $DB;

    public function __construct()
    {
        self::$DB=new PDO("mysql:hostname=localhost;dbname=deu_restaurant","root","root");
        self::$DB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    public static function GETDB(){
        return self::$DB;
    }
}
