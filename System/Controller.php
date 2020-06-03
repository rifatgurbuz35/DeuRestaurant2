<?php


class Controller
{
    public static $view;
    public function __construct()
    {
        self::$view=  new Viewer();

    }

}
