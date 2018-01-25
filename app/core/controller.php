<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 12:08
 */

class Controller {

    /**
     * @var
     */
    public $model;
    /**
     * @var View
     */
    public $view;

    /**
     * Controller constructor.
     */
    function __construct()
    {
       
        $this->view = new View();
    }

    /**
     *
     */
    function index()
    {

    }
}