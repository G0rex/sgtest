<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 12:08
 */

class Controller {

    public $model;
    public $view;

    function __construct()
    {
       
        $this->view = new View();
    }

    function index()
    {

    }
}