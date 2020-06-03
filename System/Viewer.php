<?php


class Viewer
{

    public function __construct()
    {

    }
    public function view($str,$data = false){

        $fileName="Views/p_".$str.".php";
        if(file_exists($fileName)){
            include $fileName;
        }

    }



}
